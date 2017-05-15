var elixir = require('laravel-elixir');


elixir(function(mix) {
	
	mix.styles([
		'../../../node_modules/bootstrap/dist/css/bootstrap.css',
		//'../../../node_modules/bootstrap/dist/css/bootstrap-theme.css',
		'../../../node_modules/font-awesome/css/font-awesome.css',
		'bootstrap-material-design.css',
		'../../../bower_components/bootstrap-calendar/css/calendar.css',
		'styles.css',
	], 'public/css/app.css');


	mix.scripts([
		'../../../node_modules/jquery/dist/jquery.js',
		'../../../node_modules/bootstrap/dist/js/bootstrap.js',
		'../../../node_modules/underscore/underscore.js',
		'../../../bower_components/bootstrap-calendar/js/calendar.js',
		'../../../bower_components/bootstrap-calendar/js/language/',
		'material.js',
		'ripples.js',
		'app.js',
	], 'public/js/app.js');


	mix.copy('resources/assets/fonts/', 'public/fonts');
	mix.copy('bower_components/bootstrap-calendar/tmpls/', 'public/tmpls')


	//mix.sass('app.scss');
});