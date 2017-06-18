
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


var getJSON = function(url, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.responseType = 'json';
    xhr.onload = function() {
      	var status = xhr.status;
      	if (status == 200) {
        	callback(null, xhr.response);
      	} else {
        	callback(status);
      	}
    };
    xhr.send();
};



$( document ).ready(function() {

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

	$('#data_conteudo').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
	$('#data_avaliacao').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
	$('#data_reserva').bootstrapMaterialDatePicker({ weekStart : 0, time: false });

    fetch('/api/agenda').then(res => res.json()).then((out) => {
  		console.log('Checkout this JSON! ', out.result);
   
	    var optionsReserva = {
	        view: 'month',
	        tmpl_path: '/tmpls/',
	        events_source: out.result,
	        onAfterViewLoad: function(view) {
	            $('#calendar-title').text(this.getMonth());
	        },
		};

	    var calendarReserva = $('#calendar-reservas').calendar(optionsReserva);

	    calendarReserva.setLanguage('pt-BR');
	    calendarReserva.view();
	 }).catch(err => console.error(err));
});