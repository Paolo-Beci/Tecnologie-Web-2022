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

// HOMEPAGE
Route::get('/', 'PublicController@showPublicHome')->name('homepage');

Route::get('/home-locatore', 'LocatoreController@showLocatoreHome')->name('home-locatore');

Route::get('/home-locatario', 'LocatarioController@showLocatarioHome')->name('home-locatario');

Route::get('/home-admin', function () {
    return view('layouts/content-home-admin');
})->name('home-admin');

Route::get('/registrazione', function () {
    return view('registrazione-dati-personali');
})->name('registrazione');

// CATALOGO
Route::get('/catalogo', 'PublicController@showPublicCatalog')->name('catalogo');

Route::get('/catalogo-locatore', 'LocatoreController@showLocatoreCatalog')->name('catalogo-locatore');

Route::get('/catalogo-locatario', 'LocatarioController@showLocatarioCatalog')->name('catalogo-locatario');

Route::get('/catalogo/dettagli-annuncio', function () {
    return view('layouts/content-dettagli-annuncio')
        ->with('user', 'locatario');
})->name('dettagli-annuncio');

