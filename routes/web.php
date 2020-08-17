<?php

use Illuminate\Support\Facades\Route;

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
    return view('contenido/contenido');
});

Route::get('/carrera', 'CarreraController@index');
Route::post('/carrera/registrar', 'CarreraController@registrar');
Route::put('/carrera/actualizar', 'CarreraController@actualizar');
Route::put('/carrera/desactivar_matutino', 'CarreraController@desactivar_matutino');
Route::put('/carrera/activar_matutino', 'CarreraController@activar_matutino');
Route::put('/carrera/desactivar_vespertino', 'CarreraController@desactivar_vespertino');
Route::put('/carrera/activar_vespertino', 'CarreraController@activar_vespertino');
Route::put('/carrera/desactivar_nocturno', 'CarreraController@desactivar_nocturno');
Route::put('/carrera/activar_nocturno', 'CarreraController@activar_nocturno');

