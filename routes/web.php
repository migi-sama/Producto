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

Route::get('/home', 'HomeController@index')->name('home');


Route::get('hola', function(){
    return 'carebola';
});

Route::get('usuario/{nombre}', function($nombre){
    return 'Usuario '.$nombre;
});

Route::get('user/{nombre?}', function($nombre='Anon'){
    return 'Usuario '.$nombre;
})->where('nombre', '[A-z]+');