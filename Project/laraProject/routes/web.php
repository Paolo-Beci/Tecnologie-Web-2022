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
    return view('layouts/content-public')
    ->with('user', 'public');
});

/* CATALOGO */
Route::get('/catalogo-no-log', function () {
    return view('layouts/content-catalogo_1')
    ->with('user', 'public');
});

Route::get('/catalogo-locatore', function () {
    return view('layouts/content-catalogo_2')
        ->with('user', 'public');
});

Route::get('/catalogo-locatario', function () {
    return view('layouts/content-catalogo_3')
        ->with('user', 'public');
});

Route::get('/catalogo-admin', function () {
    return view('layouts/content-catalogo_4')
        ->with('user', 'public');
});

/* HOMEPAGE */
Route::get('/locatore', function () {
    return view('layouts/content-locatore')
    ->with('user', 'locatore');
});
