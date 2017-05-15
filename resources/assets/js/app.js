
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example', require('./components/Example.vue'));

// const app = new Vue({
// 	el: '#app'
// });


$( document ).ready(function() {
    console.log( "ready!" );

 //    var options = {
	// 	events_source: 'events.json.php',
	// 	view: 'month',
	// 	tmpl_path: 'tmpls/',
	// 	tmpl_cache: false,
	// 	day: '2013-03-12',
	// 	onAfterEventsLoad: function(events) {
	// 		if(!events) {
	// 			return;
	// 		}
	// 		var list = $('#eventlist');
	// 		list.html('');

	// 		$.each(events, function(key, val) {
	// 			$(document.createElement('li'))
	// 				.html('<a href="' + val.url + '">' + val.title + '</a>')
	// 				.appendTo(list);
	// 		});
	// 	},
	// 	onAfterViewLoad: function(view) {
	// 		$('.page-header h3').text(this.getTitle());
	// 		$('.btn-group button').removeClass('active');
	// 		$('button[data-calendar-view="' + view + '"]').addClass('active');
	// 	},
	// 	classes: {
	// 		months: {
	// 			general: 'label'
	// 		}
	// 	}
	// };


    var options = {
		view: 'week',
		tmpl_path: '/tmpls/',
		events_source: function () { return [];},
		onAfterViewLoad: function(view) {
			$('#calendar-title').text(this.getMonth());
		},
	};

	var calendar = $('#calendar').calendar(options);

	calendar.setLanguage('pt-BR');
	calendar.view();



});