<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home',      'HomeController@index');
Route::get('/professor', 'HomeProfessorController@index');

// ADMIN
Route::group(['middleware' => ['auth', 'admin'] , 'as' => 'admin.'], function(){
	Route::get('/admin', 'HomeAdminController@index');
});

Route::group(['middleware' => ['auth', 'admin'] , 'as' => 'admin.', 'prefix' => 'admin'], function(){
	Route::resource('users',         'Admin\UsersController'         );
	Route::resource('products',      'Admin\ProductsController'      );
	Route::resource('materias',      'Admin\MateriasController'      );
	Route::resource('item-reserva',  'Admin\ItemReservasController'  );
	Route::resource('horarios',      'Admin\HorariosController'      );
	Route::resource('turmas',        'Admin\TurmasController', ['parameters' => ['turmas' => 'turma']]);
});

	
Route::group(['middleware' => ['auth', 'admin'] , 'as' => 'admin.', 'prefix' => 'admin/turmas'], function(){
	Route::resource('turma-alunos', 'Admin\TurmaAlunosController');

	Route::group(['as' => 'turma.turma-alunos.adiciona'], function(){
		Route::get('turma-alunos/{id}/adiciona', 'Admin\TurmaAlunosController@adiciona');
		Route::post('turma-alunos/{id}/adiciona', 'Admin\TurmaAlunosController@adicionaStore');
	});
});



//PROFESSOR
Route::group(['middleware' => ['auth', 'professor'] , 'as' => 'professor.'], function(){
	Route::get('/professor', 'HomeProfessorController@index');
});

Route::group(['middleware' => ['auth', 'professor'], 'as' => 'professor.', 'prefix' => 'professor'], function(){
	Route::resource('conteudo-aula',  'Professor\ConteudoAulasController');
	Route::resource('avaliacao',      'Professor\AvaliacoesController');
	Route::resource('notas',          'Professor\NotasController');
	Route::resource('reservas',       'Professor\ReservasController');
	Route::resource('presencas',      'Professor\PresencasController');

	Route::group(['as' => 'presencas.materias'], function(){	
		Route::get('presencas/turma/{turma_id}', 'Professor\PresencasController@materias');
	});

	Route::group(['as' => 'presencas.alunos'], function(){	
		Route::get('presencas/turma/{turma_id}/{materia_id}', 'Professor\PresencasController@alunos');
	});	

	Route::group(['as' => 'notas.ver'], function(){	
		Route::get('ver-notas', 'Professor\NotasController@verNotas');
	});

	Route::group(['as' => 'notas.ver.turma'], function(){	
		Route::get('ver-notas/{turma_id}', 'Professor\NotasController@verNotasAlunos');
	});

	Route::group(['as' => 'notas.adiciona'], function(){
		Route::get('notas/{avaliacao}/{aluno}/adiciona', 'Professor\NotasController@adicionaNota');
	});
});




/** TESTAR ENVIO DE EMAIL
Route::get('sendemail', function () {
    $data = array(
        'name' => "Learning Laravel",
    );
    Mail::send('emails.welcome', $data, function ($message) {
        $message->from('julio.ceorn@gmail.com', 'Learning Laravel');
        $message->to('julio.ceorn@gmail.com')->subject('Learning Laravel test email');
    });
    return "Your email has been sent successfully";
});
*/




