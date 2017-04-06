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

Route::group(['middleware' => ['auth', 'admin'] , 'as' => 'admin.'], function(){
	Route::get('/admin', 'HomeAdminController@index');
});

Route::group(['middleware' => ['auth', 'professor'] , 'as' => 'professor.'], function(){
	Route::get('/professor', 'HomeProfessorController@index');
});

Route::group(['middleware' => ['auth', 'admin'] , 'as' => 'admin.', 'prefix' => 'admin'], function(){
	Route::resource('products', 'Admin\ProductsController');
	Route::resource('turmas', 'Admin\TurmasController');
	Route::resource('users', 'Admin\UsersController');

	Route::get('/turmas/{id?}', 'TurmasController@show');

});

Route::group(['middleware' => ['auth', 'admin'] , 'as' => 'admin.', 'prefix' => 'admin/turmas'], function(){
	Route::resource('turma-alunos', 'Admin\TurmaAlunosController');
});


// Route::get('sendemail', function () {
//     $data = array(
//         'name' => "Learning Laravel",
//     );
//     Mail::send('emails.welcome', $data, function ($message) {
//         $message->from('julio.ceorn@gmail.com', 'Learning Laravel');
//         $message->to('julio.ceorn@gmail.com')->subject('Learning Laravel test email');
//     });
//     return "Your email has been sent successfully";
// });



