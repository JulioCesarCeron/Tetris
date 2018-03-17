<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        

        <title>Tetris</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ secure_asset('css/app.css') }}">
        <style>

            canvas {
                position: absolute;
                width: 100%; 
                height: 100%;
                user-select: none;
                cursor: pointer;
                
            }

            .button-home {
                display: flex;
                background: #ffffffd4;
                height: 30px;
                align-items: center;
                margin-right: 30px;
            }
        </style>
        <script src="{{ secure_asset('js/cfdg/index.js') }}"></script>
    </head>
    <body>
            <canvas></canvas>       
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check() && Auth::user()->isAdmin())
                        <a href="{{ url('/admin') }}" class="button-home" >Home</a>
                    @elseif(Auth::check() && Auth::user()->isProfessor())
                        <a href="{{ url('/professor') }}" class="button-home" >Home</a>
                    @endif
                    @if (!Auth::check())
                        <a href="{{ url('/login') }}" class="button-home" >Login</a>
                        {{-- <a href="{{ url('/register') }}">Register</a> --}}
                    @endif
                </div>
            @endif

            <div class="content" style="background: #ffffffd4;">
                <div class="title m-b-md">
                    <img class="image-home-logo" src="images/tetris.png" alt="tetris logo home">
                </div> 
            </div>
        </div>
    </body>
</html>

<script>
    "use strict";

    //////////////////////////////////////////////////////////////////
    // Adapted from a CFDG program
    // https://www.contextfreeart.org/gallery2/index.html#design/688
    // cubies by Guigui, May 7th, 2007
    //////////////////////////////////////////////////////////////////
    {
        
        const code = {
            setup() {
                this.render({
                    startShape: 'START',
                    background: '#ececec',
                    transform: {sat: -1, b: 0.1},
                    zoom: 1.5,
                    speed: 200
                });
            },
            rules() { 
                return {
                    START: s => {
                        this.loop(12, s, {}, s => {
                            this.CUBIES(s);
                        });
                    },
                    CUBIES: [
                        1, s => {
                            this.CUBE(s);
                            this.CUBIES(s, {x: -1, y: .5774, z: -1, s: .99});
                        },
                        1, s => {
                            this.CUBE(s);
                            this.CUBIET(s, {x: -1, y: .5774, z: -1, s: .99});
                        },
                        1, s => {
                            this.CUBE(s);
                            this.CUBIES(s, {x: 1, y: .5774, z: -1, s: .99});
                        },
                        1, s => {
                            this.CUBE(s);
                            this.CUBIETT(s, {x: 1, y: .5774, z: -1, s: .99});
                        },
                        1, s => {
                            this.CUBE(s);
                            this.CUBIES(s, {y: -1, z: -1, s: .99, b: 0.04});
                        },
                        1, s => {
                            this.CUBE(s);
                            this.CUBIETTT(s, {y: -1, z: -1, s: .99});
                        },
                        0.5, s => {}
                    ],
                    CUBIET: [
                        1, s => {
                            this.CUBE(s);
                            this.CUBIET(s, {x: -1, y: .5774, z: -1, s: .99, b: 0.04});
                        },
                        0.3, s => {
                            this.CUBE(s);
                            this.CUBIES(s, {x: -1, y: .5774, z: -1, s: .99});
                        }
                    ],
                    CUBIETT: [
                        1, s => {
                            this.CUBE(s);
                            this.CUBIETT(s, {x: 1, y: .5774, z: -1, s: .99, b: 0.04});
                        },
                        0.3, s => {
                            this.CUBE(s);
                            this.CUBIES(s, {x: 1, y: .5774, z: -1, s: .99});
                        }
                    ],
                    CUBIETTT: [
                        1, s => {
                            this.CUBE(s);
                            this.CUBIETTT(s, {y: -1, z: -1, s: .99});
                        },
                        0.3, s => {
                            this.CUBE(s);
                            this.CUBIES(s, {y: -1, z: -1, s: .99});
                        }
                    ],
                    CUBE: [
                        0.1, s => {	},
                        1, s => {
                            this.loop(2, s, {s: [-1, 1]}, s => {
                                this.SIDE(s, {});
                                this.TOP(s, {b: 0.2});
                            });
                        }
                    ],
                    SIDE: s => {
                        this.FACE(s, {skew: [0, 30]});
                    },
                    TOP: s => {
                        this.FACE(s, {s:[1.413, 0.816], r: 135});
                    },
                    FACE: s => {
                        this.SQUARE(s, {x: .5, y: -.5});
                        this.SQU(s, {y: -.5, b: 1});
                        this.SQU(s, {x: 1, y: -.5});
                        this.SQU(s, {x: .5, r: 90, b: 1});
                        this.SQU(s, {x: .5, r: 90, y: -1});
                    },
                    SQU: [
                        1, s => {
                            this.SQUARE(s, {s: [.02, 1], b: -0.5});
                        },
                        0.3, s => {
                            this.SQU(s, {s: [1, 1.5]});
                        }
                    ]
                }
            }
        };
        // import cfdg library
        cfdg.apply(code);
        // run code
        code.setup();
        // Click canvas to generate a new image
        ["click", "touchdown"].forEach(event => {
            document.addEventListener(event, e => code.setup(), false);
        });

    }
</script>
