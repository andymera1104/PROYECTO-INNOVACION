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
    return view('login/login');
});

Route:: get('inicio',function(){
   return view('/layouts/admin');
});	


//Route::get('/uploadfile', 'UploadfileController@index');
//Route::post('/uploadfile', 'UploadfileController@upload');
Route::auth();

Route::get('/main', 'AuthController@index')->name('main');
Route::post('/main/checklogin', 'AuthController@checklogin');
Route::get('main/successlogin', 'AuthController@successlogin');
Route::get('main/logout', 'AuthController@logout');


Route::resource('postulacion/postulantes', 'postulanteController'); 
Route::resource('postulacion/asignaturas','asignaturaController');
Route::resource('postulacion/propuestas','propuestaController');
Route::resource('proyectos/propuestas','proyectosController');
//Route::resource('postulacion/asignaturas/crear','asignaturaController@fetch')->name('asignaturaController.fetch');


