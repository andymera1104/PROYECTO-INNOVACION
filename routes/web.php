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

Route::get('/', function () { return view('login/login');});

Route:: get('inicio',function(){return view('/layouts/admin');});	

Route::auth();

Route::get('/main', 'AuthController@index')->name('main');
Route::post('/main/checklogin', 'AuthController@checklogin');
Route::get('main/successlogin', 'AuthController@successlogin');
Route::get('main/logout', 'AuthController@logout');


Route::resource('postulacion/postulantes', 'postulanteController'); 
Route::resource('postulacion/asignaturas','asignaturaController');
Route::resource('postulacion/propuestas','propuestaController');
Route::resource('proyectos/propuestas','proyectosController');
Route::get('proyectos/evaluaciones','proyectosController@indexEvaluacion');
Route::get('proyectos/ganadores','proyectosController@indexGanadores');
Route::get('resultados/evaluaciones','proyectosController@indexResultados');
Route::resource('evaluacion','CriteriosController');



