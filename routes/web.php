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
    return view('auth/login');
});
Route::get('/persons', 'PersonsController@index');

Route::put('/persons/actualizar', 'PersonsController@update');

Route::post('/persons/guardar', 'PersonsController@store');

Route::delete('/persons/borrar/{id}', 'PersonsController@destroy');

Route::get('/persons/buscar', 'PersonsController@show');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
