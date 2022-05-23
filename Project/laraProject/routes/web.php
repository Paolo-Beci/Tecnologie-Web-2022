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

//Rotte legate all'autenticazione
Auth::routes();

// AUTENTICAZIONE
Route::get('login', 'Auth\LoginController@showLoginForm')   //    Noi abbiamo la nostra?
    ->name('login');

Route::post('login', 'Auth\LoginController@login');

Route::post('logout', 'Auth\LoginController@logout')
    ->name('logout');

// REGISTRAZIONE
Route::get('register', 'Auth\RegisterController@showRegistrationForm')
    ->name('register');

Route::post('register', 'Auth\RegisterController@register');

// PUBLIC
Route::get('/', 'PublicController@showPublicHome')->name('homepage');

Route::get('/registrazione', function () {
    return view('registrazione-dati-personali');
    })->name('registrazione');

Route::get('/catalogo', 'PublicController@showPublicCatalog')->name('catalogo');

Route::get('/catalogo/appartamenti', 'PublicController@showPublicCatalogAppartamenti')->name('catalogo-appartamenti');

Route::get('/catalogo/posti-letto', 'PublicController@showPublicCatalogPostiLetto')->name('catalogo-posti-letto');

//LOCATORE
Route::get('/home-locatore', 'LocatoreController@showLocatoreHome')->name('home-locatore');  // ->middleware('can:isLocatore')

Route::get('/catalogo-locatore', 'LocatoreController@showLocatoreCatalog')->name('catalogo-locatore');

Route::get('/gestione-alloggi', 'LocatoreController@showLocatoreAlloggi')->name('gestione-alloggi');

//LOCATARIO
Route::get('/home-locatario', 'LocatarioController@showLocatarioHome')->name('home-locatario');  // ->middleware('can:isLocatario')

Route::get('/catalogo-locatario', 'LocatarioController@showLocatarioCatalog')->name('catalogo-locatario');

Route::get('/catalogo/dettagli-annuncio', function () {
    return view('layouts/content-dettagli-annuncio')
        ->with('user', 'locatario');
})->name('dettagli-annuncio');

//ADMIN
Route::get('/home-admin', 'AdminController@showAdminHome')->name('home-admin'); // ->middleware('can:isAdmin')

Route::get('/gestione_faq', 'AdminController@showFaq')->name('gestione_faq');




