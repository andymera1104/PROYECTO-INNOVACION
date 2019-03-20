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

Route:: get('main/inicio',function(){
   return view('/layouts/admin');
});	


//Route::get('/uploadfile', 'UploadfileController@index');
//Route::post('/uploadfile', 'UploadfileController@upload');
Route::get('/main', 'AuthController@index');
Route::post('/main/checklogin', 'AuthController@checklogin');
Route::get('main/successlogin', 'AuthController@successlogin');
Route::get('main/logout', 'AuthController@logout');


Route::resource('postulacion/propuesta', 'postulacionController'); 

Route:: get('/main/postulacion',function(){ 
	return view('/postulacion/create');
	});	