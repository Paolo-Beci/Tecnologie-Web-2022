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
Route::get('/', function () {
    return view('layouts/content-public')
    ->with('user', 'public');
})->name('homepage');

Route::get('/home-locatore', function () {
    return view('layouts/content-home-locatore')
        ->with('user', 'locatore');
})->name('home-locatore');

Route::get('/registrazione', function () {
    return view('registrazione-dati-personali');
})->name('registrazione');

// CATALOGO
Route::get('/catalogo', function () {
    return view('layouts/content-catalogo')
    ->with('user', 'public');
})->name('catalogo');

Route::get('/catalogo/dettagli-annuncio', function () {
    return view('layouts/content-dettagli-annuncio')
        ->with('user', 'locatario');
})->name('dettagli-annuncio');

// HOMEPAGE
Route::get('/locatore', function () {
    return view('layouts/content-locatore')
    ->with('user', 'locatore');
});
