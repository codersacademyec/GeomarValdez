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

Route::get('/', 'usuariosController@index');
Route::post('/store', 'usuariosController@guardar');

Route::get('/registro', 'usuariosController@inicio_sesion');
Route::post('/store_api', 'usuariosController@store_api')->name('store_api');;

Route::get('/registrar/comprobante', 'usuariosController@registrar_comprobante');
Route::post('/store_comprobante', 'usuariosController@store_comprobante')->name('store_comprobante');;



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
