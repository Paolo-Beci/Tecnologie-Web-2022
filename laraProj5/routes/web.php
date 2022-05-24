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
});

//LOCATARIO
Route::prefix('locatario')->group(function () {
    Route::get('/', 'LocatarioController@index')->name('home-locatario');
});

//ADMIN
Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('home-admin');

    Route::get('/gestione-faq', 'AdminController@showFaq')->name('gestione-faq');
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
    Route::get('/catalogo', 'GuestController@showPublicCatalog')->name('catalogo');

    Route::get('/catalogo/appartamenti', 'GuestController@showPublicCatalogAppartamenti')->name('catalogo-appartamenti');

    Route::get('/catalogo/posti-letto', 'GuestController@showPublicCatalogPostiLetto')->name('catalogo-posti-letto');
});
