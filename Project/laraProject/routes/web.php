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

Route::get('/home-admin', 'AdminController@showAdminHome')->name('home-admin');

Route::get('/registrazione', function () {
    return view('registrazione-dati-personali');
})->name('registrazione');

// CATALOGO PUBBLICO
Route::get('/catalogo', 'PublicController@showPublicCatalog')->name('catalogo');

Route::get('/catalogo/appartamenti', 'PublicController@showPublicCatalogAppartamenti')->name('catalogo-appartamenti');

Route::get('/catalogo/posti-letto', 'PublicController@showPublicCatalogPostiLetto')->name('catalogo-posti-letto');

// CATALOGO LOCATORE
Route::get('/catalogo-locatore', 'LocatoreController@showLocatoreCatalog')->name('catalogo-locatore');

// CATALOGO LOCATARIO
Route::get('/catalogo-locatario', 'LocatarioController@showLocatarioCatalog')->name('catalogo-locatario');

Route::get('/catalogo/dettagli-annuncio', function () {
    return view('layouts/content-dettagli-annuncio')
        ->with('user', 'locatario');
})->name('dettagli-annuncio');

// GESTIONE FAQ
Route::get('/gestione_faq', 'AdminController@showFaq')->name('gestione_faq');

