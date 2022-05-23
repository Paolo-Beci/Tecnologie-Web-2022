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
Route::post('/login', 'Auth\LoginController@login')->name('login');

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
Route::prefix('locatore')->group(function () {
    Route::get('/', 'LocatoreController@showLocatoreHome')->name('home-locatore')->middleware('isLocatore');

    Route::get('/catalogo', 'LocatoreController@showLocatoreCatalog')->name('catalogo-locatore')->middleware('isLocatore');

    Route::get('/gestione-alloggi', 'LocatoreController@showLocatoreAlloggi')->name('gestione-alloggi')->middleware('isLocatore');

});

//LOCATARIO
Route::prefix('locatario')->group(function () {
    Route::get('/', 'LocatarioController@showLocatarioHome')->name('home-locatario')->middleware('isLocatario');

    Route::get('/catalogo', 'LocatarioController@showLocatarioCatalog')->name('catalogo-locatario')->middleware('isLocatario');

    Route::get('/catalogo/dettagli-annuncio', function () {
        return view('layouts/content-dettagli-annuncio')
            ->with('user', 'locatario');
        })->name('dettagli-annuncio')->middleware('isLocatario');
});

//ADMIN
Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@showAdminHome')->name('home-admin')->middleware('isAdmin');

    Route::get('/gestione_faq', 'AdminController@showFaq')->name('gestione_faq')->middleware('isAdmin');
});



