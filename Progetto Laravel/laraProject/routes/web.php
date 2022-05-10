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

Route::get('/', '')
    ->name('home');

Route::get('/registrati', '')
    ->name('registrazione');

Route::get('/homeLocatore', '')
    ->name('homeLocatore');

Route::get('/homeLocatario', '')
    ->name('homeLocatario');

Route::get('/admin', '')
    ->name('admin');

Route::get('/catalogoGuest', '')
    ->name('catalogoGuest');

Route::get('/catalogoLocatario', '')
    ->name('catalogoLocatario');

Route::get('/catalogoAdmin', '')
    ->name('catalogoAdmin');

Route::view('/where', 'where')
    ->name('');

