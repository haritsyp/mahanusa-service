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

Route::group(['middleware' => 'usersession'], function () {
	Route::get('/admin/proyek/delete/{id}', 'ProyekController@deleteProyek');
	Route::resource('/admin/proyek','ProyekController');

	Route::get('/admin/kota/delete/{id}', 'KotaController@deleteKota');
	Route::resource('/admin/kota','KotaController');

	Route::get('/admin/unit/delete/{id}', 'UnitController@deleteUnit');
	Route::resource('/admin/unit','UnitController');

	Route::get('/admin/image/delete/{id}', 'ImageController@deleteImage');
	Route::resource('/admin/image','ImageController');

	
});

Route::get('/image/{id_proyek}', 'ImageController@getImage');
Route::get('/proyek', 'ProyekController@getProyek');
Route::get('/proyek/{latitude}/{longitude}', 'ProyekController@getProyekNear');
Route::get('/distance', 'ProyekController@getDistance');
Route::get('proyek/{id_kota}', 'ProyekController@getProyekByKota');
Route::get('/proyeks/{id_proyek}', 'ProyekController@getProyekById');
Route::get('/kota', 'KotaController@getKota');
Route::post('/auth', 'LoginController@login');
Route::get('/logout', 'LoginController@destroy')->name('login.destroy');
Route::get('image/{filename}','ImageController@image');
Route::get('/unit/{id_proyek}', 'UnitController@getUnit');
