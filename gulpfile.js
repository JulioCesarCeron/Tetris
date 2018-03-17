var elixir = require('laravel-elixir');


elixir(function(mix) {
	
	mix.styles([
		'../../../node_modules/bootstrap/dist/css/bootstrap.css',
		//'../../../node_modules/bootstrap/dist/css/bootstrap-theme.css',
		'../../../node_modules/font-awesome/css/font-awesome.css',
		'bootstrap-material-design.css',
		'../../../bower_components/bootstrap-calendar/css/calendar.css',
		'../../../bower_components/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css',
		'styles.css',
		'tetris.css',
		'../../../bower_components/angular-bootstrap-calendar/dist/css/angular-bootstrap-calendar.css'
	], 'public/css/app.css');


	mix.scripts([
		'../../../node_modules/jquery/dist/jquery.js',
		'../../../node_modules/bootstrap/dist/js/bootstrap.js',
		'../../../node_modules/underscore/underscore.js',
		'../../../bower_components/bootstrap-calendar/js/calendar.js',
		'../../../bower_components/bootstrap-calendar/js/language/',
		'../../../node_modules/moment/moment.js',
		'../../../bower_components/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js',
		'material.js',
		'ripples.js',
		'app.js',
	], 'public/js/app.js');

    mix.copy('resources/assets/js/cfdg/index.js', 'public/js/cfdg/')
	mix.copy('resources/assets/fonts/', 'public/fonts');
	mix.copy('bower_components/bootstrap-material-design/dist/fonts/Material-Design-Icons.eot', 'public/fonts');
	mix.copy('bower_components/bootstrap-material-design/dist/fonts/Material-Design-Icons.ttf', 'public/fonts');
	mix.copy('bower_components/bootstrap-material-design/dist/fonts/Material-Design-Icons.woff', 'public/fonts');
	mix.copy('bower_components/bootstrap-calendar/tmpls/', 'public/tmpls');



	mix.copy('bower_components/bootstrap-calendar/img/', 'public/img/');
	//mix.sass('app.scss');
});