"use strict";
// CFDG library code - WebGL rendering backend version
// https://codepen.io/ge1doot/pen/rdeWrK
// last modified 16 March 2018
const cfdg = function() {
	// state variables
	let width = 0,
		height = 0,
		scale = 0,
		offsetX = 0,
		offsetY = 0,
		minSize = 0,
		comp = 0,
		rectx = 0,
		recty = 0,
		rectw = 0,
		recth = 0,
		seed = 0,
		iter = null,
		speed = 0,
		accel = 0,
		square = null,
		triangle = null,
		circle = null,
		prepass = true,
		tile = 0;
	const stack = [],
		shapes = [];
	const uMat = new Float32Array([0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1]);
	// WebGL context
	const canvas = document.querySelector("canvas");
	const options = {
		alpha: false,
		depth: true,
		preserveDrawingBuffer: true
	};
	const gl =
		canvas.getContext("webgl", options) ||
		canvas.getContext("experimental-webgl", options);
	if (!gl) return false;
	// Compile Shaders
	const vertexShader = gl.createShader(gl.VERTEX_SHADER);
	gl.shaderSource(
		vertexShader,
		`
			precision highp float;
			uniform mat4 uMatrix;
			attribute vec2 aPosition;
			uniform vec4 uColor;
			uniform vec2 uResolution;
			uniform float zIndex;
			varying vec4 vColor;

			vec3 hsv2rgb(vec3 c) {
					vec4 K = vec4(1.0, 2.0 / 3.0, 1.0 / 3.0, 3.0);
					vec3 p = abs(fract(c.xxx + K.xyz) * 6.0 - K.www);
					return c.z * mix(K.xxx, clamp(p - K.xxx, 0.0, 1.0), c.y);
			}

			void main() {
				vec4 pos = uMatrix * vec4(aPosition, zIndex, 1.0);
				gl_Position = vec4(
					((pos.x / uResolution.x * 2.0) - 1.0),
					((pos.y / uResolution.y * 2.0) - 1.0),
					zIndex, 1.0);
					vColor = vec4(hsv2rgb(uColor.rgb), uColor.w);
			}
		`
	);
	gl.compileShader(vertexShader);
	const fragmentShader = gl.createShader(gl.FRAGMENT_SHADER);
	gl.shaderSource(
		fragmentShader,
		`
			precision highp float;
			varying vec4 vColor;
			void main() {
				gl_FragColor = vColor;
			}
		`
	);
	gl.compileShader(fragmentShader);
	// combining alpha blending *AND* depth testing
	gl.enable(gl.BLEND);
	gl.blendFunc(gl.SRC_ALPHA, gl.ONE_MINUS_SRC_ALPHA);
	gl.enable(gl.DEPTH_TEST);
	gl.depthFunc(gl.LEQUAL);
	// clear drawing/depth buffers
	const clearScreen = (hex) => {
		let rgb = hex.replace(/^#?([a-f\d])([a-f\d])([a-f\d])$/i
    					,(m, r, g, b) => '#' + r + r + g + g + b + b)
    .substring(1).match(/.{2}/g)
    .map(x => parseInt(x, 16));
		gl.clearColor(rgb[0] / 256, rgb[1] / 256, rgb[2] / 256, 1.0);
		gl.clear(gl.COLOR_BUFFER_BIT | gl.DEPTH_BUFFER_BIT);
	};
	// create webGL programs and preload buffers
	const createProgram = (vertexShader, fragmentShader, vert) => {
		const program = gl.createProgram();
		gl.attachShader(program, vertexShader);
		gl.attachShader(program, fragmentShader);
		gl.linkProgram(program);
		gl.useProgram(program);
		const aPosition = gl.getAttribLocation(program, "aPosition");
		gl.enableVertexAttribArray(aPosition);
		const positionBuffer = gl.createBuffer();
		const uMatrix = gl.getUniformLocation(program, "uMatrix");
		const uResolution = gl.getUniformLocation(program, "uResolution");
		gl.enableVertexAttribArray(uResolution);
		const zIndex = gl.getUniformLocation(program, "zIndex");
		gl.enableVertexAttribArray(zIndex);
		const uColor = gl.getUniformLocation(program, "uColor");
		gl.enableVertexAttribArray(uColor);
		const num = vert.length / 2;
		const squareVertices = new Float32Array(vert);
		gl.bindBuffer(gl.ARRAY_BUFFER, positionBuffer);
		gl.bufferData(gl.ARRAY_BUFFER, squareVertices, gl.STATIC_DRAW);
		gl.vertexAttribPointer(aPosition, 2, gl.FLOAT, false, 0, 0);
		return {
			draw(uMat, h, t, v, a, z) {
				gl.useProgram(program);
				gl.uniform4f(uColor, h, t, v, a);
				gl.uniform1f(zIndex, z);
				gl.uniformMatrix4fv(uMatrix, false, uMat);
				gl.bindBuffer(gl.ARRAY_BUFFER, positionBuffer);
				gl.vertexAttribPointer(aPosition, 2, gl.FLOAT, false, 0, 0);
				gl.drawArrays(gl.TRIANGLES, 0, num);
			},
			resize(width, height) {
				gl.useProgram(program);
				gl.enableVertexAttribArray(uResolution);
				gl.uniform2f(uResolution, width, height);
			}
		};
	};
	// create WebGL primitives
	const primitives = (() => {
		square = createProgram(vertexShader, fragmentShader, [
			-0.5, -0.5, -0.5, 0.5, 0.5, -0.5,
			0.5, -0.5, -0.5, 0.5, 0.5, 0.5
		]);
		triangle = createProgram(vertexShader, fragmentShader, [
			0, 0.577350269,
			-0.5, -0.28867513,
			0.5, -0.28867513
		]);
		const verts = [],
			step = 2 * Math.PI / 72;
		for (let i = 0; i < 2 * Math.PI - step; i += step) {
			verts.push(
				0.5 * Math.cos(i - step),
				0.5 * Math.sin(i - step),
				0,
				0,
				0.5 * Math.cos(i),
				0.5 * Math.sin(i)
			);
		}
		circle = createProgram(vertexShader, fragmentShader, verts);
		return [square, circle, triangle];
	})();
	// Context Free adjustments
	const transforms = {
		x(m, v) {
			m[4] += v * m[0];
			m[5] += v * m[1];
		},
		y(m, v) {
			m[4] += v * m[2];
			m[5] += v * m[3];
		},
		z(m, v) {
			m[10] -= v;
		},
		s(m, v) {
			const a = Array.isArray(v);
			const x = a ? v[0] : v;
			const y = a ? v[1] : x;
			m[0] *= x;
			m[1] *= x;
			m[2] *= y;
			m[3] *= y;
		},
		r(m, v) {
			const rad = Math.PI * v / 180;
			const cos = Math.cos(rad);
			const sin = Math.sin(rad);
			const r00 = cos * m[0] + sin * m[2];
			const r01 = cos * m[1] + sin * m[3];
			m[2] = cos * m[2] - sin * m[0];
			m[3] = cos * m[3] - sin * m[1];
			m[0] = r00;
			m[1] = r01;
		},
		f(m, v) {
			const rad = Math.PI * v / 180;
			const x = Math.cos(rad);
			const y = Math.sin(rad);
			const n = 1 / (x * x + y * y);
			const b00 = (x * x - y * y) / n;
			const b01 = 2 * x * y / n;
			const b10 = 2 * x * y / n;
			const b11 = (y * y - x * x) / n;
			const r00 = b00 * m[0] + b01 * m[2];
			const r01 = b00 * m[1] + b01 * m[3];
			m[2] = b10 * m[0] + b11 * m[2];
			m[3] = b10 * m[1] + b11 * m[3];
			m[0] = r00;
			m[1] = r01;
		},
		skew(m, v) {
			const x = Math.tan(Math.PI * v[0] / 180);
			const y = Math.tan(Math.PI * v[1] / 180);
			const r00 = m[0] + y * m[2];
			const r01 = m[1] + y * m[3];
			m[2] = x * m[0] + m[2];
			m[3] = x * m[1] + m[3];
			m[0] = r00;
			m[1] = r01;
		},
		h(m, v) {
			m[6] += v;
			m[6] %= 360;
		},
		sat(m, v) {
			this.col(m, v, 7);
		},
		b(m, v) {
			this.col(m, v, 8);
		},
		a(m, v) {
			this.col(m, v, 9);
		},
		col(m, v, p) {
			if (v > 0) {
				m[p] += v * (1 - m[p]);
			} else {
				m[p] += v * m[p];
			}
		},
		m0(m, v) {m[11] = v;},
		m1(m, v) {m[12] = v;}
	};
	transforms.hue = transforms.h;
	transforms.flip = transforms.f;
	transforms.scale = transforms.s;
	transforms.size = transforms.s;
	transforms.rotate = transforms.r;
	transforms.alpha = transforms.a;
	// execute context free adjustments
	const transform = (s, p, mintest) => {
		let m = copy(s);
		for (const c in p) {
			if (transforms[c]) transforms[c](m, p[c]);
			else console.log("error: " + c);
		}
		if (mintest) {
			const x = m[0] * m[0] + m[1] * m[1];
			const y = m[2] * m[2] + m[3] * m[3];
			return x < minSize && y < minSize ? false : m;
		}
		return m;
	};
	// execute loop
	const loop = (n, s, t, f) => {
		let ls = copy(s);
		for (let i = 0; i < n; i++) {
			f(ls, i);
			ls = transform(ls, t, true);
		}
	};
	// push drawcall in draw buffer (first pass)
	const drawPush = (s, t, p) => {
		s = transform(s, t, false);
		if (prepass) {
			// bounding box
			const x = s[4];
			const y = s[5];
			if (x < rectx) rectx = x;
			else if (x > recty) recty = x;
			if (y < rectw) rectw = y;
			else if (y > recth) recth = y;
		} else {
			// WebGL drawCall
			uMat[0] = s[0] * scale;
			uMat[1] = s[1] * scale;
			uMat[4] = s[2] * scale;
			uMat[5] = s[3] * scale;
			uMat[12] = s[4] * scale + offsetX;
			uMat[13] = s[5] * scale + offsetY;
			primitives[p].draw(
				uMat,
				s[6] / 360,
				s[7],
				s[8],
				s[9],
				0.5 + s[10] / 100000
			);
			if (tile) {
				const dx = [1, -1, 0,  0];
				const dy = [0,  0, 1, -1];
				for (let i = 0; i < 4; i++) {
					uMat[12] = s[4] * scale + offsetX + (dx[i] * tile * width);
					uMat[13] = s[5] * scale + offsetY + (dy[i] * tile * height);
					primitives[p].draw(
						uMat,
						s[6] / 360,
						s[7],
						s[8],
						s[9],
						0.5 + s[10] / 100000
					);
				}
			}
		}
	};
	// random seedable function
	const random = _ => {
		seed = (seed * 16807) % 2147483647;
		return (seed - 1) / 2147483646;
	};
	// random integers
	const randint = (s, e = 0) => {
		if (e === 0) {
			e = s;
			s = 0;
		}
		return Math.floor(s + random() * (e - s + 1));
	};
	// return random position in array
	const randpos = a => {
		return a[Math.floor(random() * a.length)];
	};
	// copy state
	const copy = s => {
		return [
			s[0],  // a00
			s[1],  // a10
			s[2],  // a01
			s[3],  // a11
			s[4],  // tx
			s[5],  // ty
			s[6],  // hue
			s[7],  // saturation
			s[8],  // brillance
			s[9],  // alpha
			s[10], // zIndex
			s[11], // m0
			s[12], // m1
			s[13]  // primitive
		];
	};
	// center/scale scene
	const autoscale = s => {
		scale =
			Math.min(width / (recty - rectx), height / (recth - rectw)) * s;
		offsetX = width * 0.5 - (rectx + recty) * 0.5 * scale;
		offsetY = height * 0.5 - (recth + rectw) * 0.5 * scale;
	};
	// return execute function for single rule
	const singlerule = i => {
		return (s, t) => {
			s = transform(s, t, true);
			if (!s) return;
			s[13] = i;
			stack.push(s);
		};
	};
	// return execute function for multiple rules
	const randomrule = (totalWeight, weight, index, len) => {
		return (s, t) => {
			s = transform(s, t, true);
			if (!s) return;
			let w = 0;
			const r = random() * totalWeight;
			for (let i = 0; i < len; i++) {
				w += weight[i];
				if (r <= w) {
					s[13] = index[i];
					stack.push(s);
					return;
				}
			}
		};
	};
	// compile JS shapes functions
	const compileshapes = () => {
		shapes.length = 0;
		this.code = this.rules(11, 12);
		for (const namerule in this.code) {
			const rules = this.code[namerule];
			if (Array.isArray(rules)) {
				let totalWeight = 0;
				const weight = [];
				const index = [];
				for (let i = 0; i < rules.length; i += 2) {
					totalWeight += rules[i];
					shapes.push(rules[i + 1]);
					weight.push(rules[i]);
					index.push(shapes.length - 1);
				}
				this[namerule] = randomrule(totalWeight, weight, index, index.length);
			} else {
				shapes.push(rules);
				this[namerule] = singlerule(shapes.length - 1);
			}
		}
	};
	// run iterator
	const iterator = function * () {
		let k = 0;
		do {
				const s = stack.shift();
				shapes[s[13]](s);
				comp++;
				if (!prepass && speed && (k++ > (speed += accel))) {
					k = 0;
					yield next();
				}
			} while (stack.length);
	}
	// flatten out recursive JS calls
	const runshapes = (start, t, p) => {
		this.prepass = prepass = p;
		let minComplexity = this.minComplexity || 100;
		do {
			comp = 0;
			rectx = 0;
			recty = 0;
			rectw = 0;
			recth = 0;
			stack.length = 0;
			this[start]([1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0], t);
			iter && iter.return();
			iter = iterator();
			iter.next();
		} while (comp < minComplexity--);
	};
	// request Annimation Frame
	const next = _ => {
		requestAnimationFrame(() => iter.next());
	};
	// start first shape
	const render = (p) => {
		// resize canvas
		width = canvas.width = canvas.offsetWidth * 2;
		height = canvas.height = canvas.offsetHeight * 2;
		square.resize(width, height);
		triangle.resize(width, height);
		circle.resize(width, height);
		gl.viewport(0, 0, gl.drawingBufferWidth, gl.drawingBufferHeight);
		clearScreen(p.background || '#000');
		minSize = (p.minSize || 0.1) / 100;
		speed = p.speed || 0;
		accel = p.accel || 0;
		if (!this.code) compileshapes();
		if (p.seed) seed = p.seed;
		else seed = Math.round(Math.random() * 1000000);
		const oseed = seed;
		// running shapes (prepass)
		if (p.scale) scale = p.scale;
		else {
			runshapes(p.startShape, p.transform || {}, true);
			autoscale(p.zoom || 1);
		}
		if (p.offsetX || p.offsetY || p.scale) {
			offsetX = (width * p.offsetX) || (width * 0.5);
			offsetY = (height * p.offsetY) || (height * 0.5);
		}
		tile = p.tile || 0;
		// running shapes (draw)
		seed = oseed;
		if (p.prerun) p.prerun(gl);
		runshapes(p.startShape, p.transform || {}, false);
	};
	// public functions
	this.SQUARE = (s, t) => drawPush(s, t, 0);
	this.CIRCLE = (s, t) => drawPush(s, t, 1);
	this.TRIANGLE = (s, t) => drawPush(s, t, 2);
	this.RAF = (s, t) => {};
	this.random = random;
	this.randint = randint;
	this.randpos = randpos;
	this.render = render;
	this.transform = transform;
	this.loop = loop;
};