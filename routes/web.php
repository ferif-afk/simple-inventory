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
Auth::routes();

Route::get('signout', ['as' => 'auth.signout', 'uses' => 'Auth\loginController@signout']);
Route::group(['middleware' => 'auth'], function(){
Route::group(['middleware' => 'admin.only'], function(){

//email
Route::get('/kirimemail','EmailController@send');

//fakultas
Route::get('fakultas', ['as' => 'fakultas.index', 'uses' => 'FakultasController@index']);
Route::get('fakultas/create', ['as' => 'fakultas.create', 'uses' => 'FakultasController@create']);
Route::post('fakultas', ['as' => 'fakultas.store', 'uses' => 'FakultasController@store']);

Route::get('fakultas/edit/{id}', ['as' => 'fakultas.edit', 'uses' => 'FakultasController@edit']);
Route::patch('fakultas/{id}', ['as' => 'fakultas.update', 'uses' => 'FakultasController@update']);
Route::get('fakultas/{id}', ['as' => 'fakultas.delete', 'uses' => 'FakultasController@destroy']);
});

//jurusan
Route::get('jurusan', ['as' => 'jurusan.index', 'uses' => 'JurusanController@index']);
Route::get('jurusan/create', ['as' => 'jurusan.create', 'uses' => 'JurusanController@create']);
Route::post('jurusan', ['as' => 'jurusan.store', 'uses' => 'JurusanController@store']);

Route::get('jurusan/edit/{id}', ['as' => 'jurusan.edit', 'uses' => 'JurusanController@edit']);
Route::patch('jurusan/{id}', ['as' => 'jurusan.update', 'uses' => 'JurusanController@update']);
Route::get('jurusan/{id}', ['as' => 'jurusan.delete', 'uses' => 'JurusanController@destroy']);

// Ruangan
Route::get('/ruangan', 'RuanganController@index');
Route::post('/ruangan/add', 'RuanganController@add');
Route::get('/ruangan/{id}/delete','RuanganController@delete');
Route::get('/ruangan/{id}/edit', 'RuanganController@edit');
Route::post('/ruangan/{id}/update', 'RuanganController@update');
Route::get('ruangan/create', ['as' => 'ruangan.create', 'uses' => 'RuanganController@create']);

Route::get('/', ['as' => 'fakultas.index', 'uses' => 'FakultasController@index']);

// Barang
Route::get('/barang', 'BarangController@index');
Route::get('/barang/tambahBarang','BarangController@create');
Route::post('/barang/add', 'BarangController@add');
Route::get('/barang/{id}/delete','BarangController@delete');
Route::get('/barang/{id}/edit', 'BarangController@edit');
Route::post('/barang/{id}/update', 'BarangController@update');

Route::get('/barang', 'BarangController@index');
Route::get('/barang/export_excel', 'BarangController@export_excel');

Route::get('/', 'DashboardController@index')->name('/');});


