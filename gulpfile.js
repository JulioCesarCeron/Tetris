var elixir = require('laravel-elixir');


elixir(function(mix) {
	
	mix.styles([
		'../../../node_modules/bootstrap/dist/css/bootstrap.css',
		//'../../../node_modules/bootstrap/dist/css/bootstrap-theme.css',
		//'../../../node_modules/bootstrap/dist/css/bootstrap.css.map',
		'../../../node_modules/font-awesome/css/font-awesome.css',
		'bootstrap-material-design.css',
		//'bootstrap-material-design.css.map'
	], 'public/css/app.css');


	mix.scripts([
		'../../../node_modules/jquery/dist/jquery.js',
		'../../../node_modules/bootstrap/dist/js/bootstrap.js',
		'material.js',
		'ripples.js',
		//'app.js',
	], 'public/js/app.js');


	mix.copy('resources/assets/fonts/', 'public/fonts');


	//mix.sass('app.scss');
});