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
    return redirect()->action('ThingController@index');
});

Route::resource('things','ThingController');
Route::resource('rips','RipsController');
Route::resource('players','PlayerController');
Route::resource('registrationkeys', 'RegistrationkeysController', ['except' => ['show','update','edit']]);


//Route::get('/', 'ThingController@index');
Auth::routes();

Route::get('/home', 'HomeController@index');
