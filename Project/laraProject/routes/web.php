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

Route::get('/locatore', function () {
    return view('layouts/content-locatore')
    ->with('user', 'locatore');
});