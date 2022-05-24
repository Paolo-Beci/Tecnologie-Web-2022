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

Route::get('/', function(){
        return view('layouts/content-home');
})->name('home-guest');

Route::get('/locatore', 'LocatoreController@index')->name('home-locatore');

Route::get('/locatario', 'LocatarioController@index')->name('home-locatario');

Route::get('/admin', 'AdminController@index')->name('home-admin');

Route::get('/registrazione', function () {
        return view('registrazione-dati-personali');
})->name('registrazione');

Route::post('login', 'Auth\LoginController@login')->name('login');

Route::post('logout', 'Auth\LoginController@logout')
        ->name('logout');

Route::get('/catalogo', function(){
        return view('layouts/content-catalogo');
})->name('catalogo');

