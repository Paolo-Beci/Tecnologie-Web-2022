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

//GUEST
Route::get('/', 'GuestController@index')->name('home-guest');

//LOCATORE
Route::prefix('locatore')->group(function () {
    Route::get('/', 'LocatoreController@index')->name('home-locatore');

    Route::prefix('catalogo')->group(function () {
        Route::get('/', 'LocatoreController@showCatalog')->name('catalogo-locatore');

        Route::get('/appartamenti', 'LocatoreController@showCatalogAppartamenti')->name('catalogo-appartamenti');

        Route::get('/posti-letto', 'LocatoreController@showCatalogPostiLetto')->name('catalogo-posti-letto');
    });
});

//LOCATARIO
Route::prefix('locatario')->group(function () {
    Route::get('/', 'LocatarioController@index')->name('home-locatario');

    Route::prefix('catalogo')->group(function () {
        Route::get('/', 'LocatarioController@showCatalog')->name('catalogo-locatario');

        Route::get('/appartamenti', 'LocatarioController@showCatalogAppartamenti')->name('catalogo-appartamenti');

        Route::get('/posti-letto', 'LocatarioController@showCatalogPostiLetto')->name('catalogo-posti-letto');
    });
});

//ADMIN
Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('home-admin');

    Route::get('/gestione-faq', 'AdminController@showFaq')->name('gestione-faq');

    Route::prefix('catalogo')->group(function () {
        Route::get('/', 'AdminController@showCatalog')->name('catalogo-admin');

        Route::get('/appartamenti', 'AdminController@showCatalogAppartamenti')->name('catalogo-appartamenti');

        Route::get('/posti-letto', 'AdminController@showCatalogPostiLetto')->name('catalogo-posti-letto');
    });
});

//AUTENTICAZIONE E REGISTRAZIONE
Route::get('/registrazione', function () {
        return view('registrazione-dati-personali');
})->name('registrazione');

Route::post('login', 'Auth\LoginController@login')->name('login');

Route::post('logout', 'Auth\LoginController@logout')
        ->name('logout');


//CATALOGO
Route::prefix('catalogo')->group(function () {
    Route::get('/', 'GuestController@showPublicCatalog')->name('catalogo');

    Route::get('/appartamenti', 'GuestController@showPublicCatalogAppartamenti')->name('catalogo-appartamenti');

    Route::get('/posti-letto', 'GuestController@showPublicCatalogPostiLetto')->name('catalogo-posti-letto');
});
