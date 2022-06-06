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

    Route::get('/account', 'LocatoreController@showAccount')->name('account-locatore');
    Route::post('/modifica-dati', 'LocatoreController@showModificaAccount')->name('modifica-dati-locatore');
    Route::post('/account/immagine-profilo', 'LocatoreController@showImmagineProfilo')->name('immagine-profilo-locatore');

    Route::get('/dettagli-alloggio/{id_alloggio?}/{tipologia_alloggio?}', 'LocatoreController@showDettaglioAlloggio')->name('dettagli-alloggio-locatore');

    Route::prefix('gestione-alloggi')->group(function () {
        Route::get('/','LocatoreController@showLocatoreAlloggi')->name('gestione-alloggi');

        Route::get('/dettagli-alloggio/{id_alloggio?}/{tipologia_alloggio?}', 'LocatoreController@showDettaglioAlloggio')->name('dettagli-alloggio-locatore');

        Route::prefix('modify')->group(function () {
            Route::get('/{id_alloggio?}/{tipologia_alloggio?}', 'LocatoreController@showModificaAlloggio')->name('modifica-annuncio');

            Route::post('/', 'LocatoreController@modifyAlloggio')->name('modifica-annuncio.store');
        });

        Route::get('/delete/{id}', 'LocatoreController@deleteAlloggioById')->name('cancella-alloggio.store');
    });

    Route::prefix('inserisci-annuncio')->group(function () {
        Route::get('/', 'LocatoreController@insertAnnuncio')->name('new-annuncio');

        Route::post('/', 'LocatoreController@storeAnnuncio')->name('new-annuncio.store');
    });

    Route::prefix('catalogo')->group(function () {
        Route::get('/', 'LocatoreController@showCatalog')->name('catalogo-locatore');

        Route::get('/appartamenti', 'LocatoreController@showCatalogAppartamenti')->name('catalogo-appartamenti-locatore');

        Route::get('/posti-letto', 'LocatoreController@showCatalogPostiLetto')->name('catalogo-posti-letto-locatore');
    });
});

//LOCATARIO
Route::prefix('locatario')->group(function () {
    Route::get('/', 'LocatarioController@index')->name('home-locatario');

    Route::get('/account', 'LocatarioController@showAccount')->name('account-locatario');
    Route::post('/modifica-dati', 'LocatarioController@showModificaAccount')->name('modifica-dati-locatario');
    Route::post('/account/immagine-profilo', 'LocatarioController@showImmagineProfilo')->name('immagine-profilo-locatario');

    Route::get('/storico-alloggi', 'LocatarioController@showStoricoAlloggi')->name('storico-alloggi');

    Route::prefix('catalogo')->group(function () {
        Route::get('/', 'LocatarioController@showCatalog')->name('catalogo-locatario');

        Route::post('/filtered', 'LocatarioController@showAlloggiByCity')->name('filtered');

        Route::get('/appartamenti', 'LocatarioController@showCatalogAppartamenti')->name('catalogo-appartamenti-locatario');

        Route::get('/posti-letto', 'LocatarioController@showCatalogPostiLetto')->name('catalogo-posti-letto-locatario');

        Route::get('/dettagli-alloggio/{id_alloggio?}/{tipologia_alloggio?}', 'LocatarioController@showDettaglioAlloggio')->name('dettagli-alloggio-locatario');
    });
});

//ADMIN
Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('home-admin');

    Route::prefix('gestione-faq')->group(function () {
        Route::get('/', 'AdminController@showFaq')->name('gestione-faq');

        Route::get('/account', 'AdminController@showAccount')->name('account-admin');

        Route::get('/inserisci-faq', 'AdminController@insertFaq')->name('inserisci-faq');

        Route::post('/inserisci-faq', 'AdminController@storeFaq')->name('inserisci-faq.store');

        Route::get('/cancella-faq', 'AdminController@deleteFaq')->name('cancella-faq');

        Route::get('/delete/{id}', 'AdminController@deleteFaqById')->name('cancella-faq.store');

        Route::prefix('modifica-faq')->group(function () {
            Route::get('/', 'AdminController@modifyFaq')->name('modifica-faq');

            Route::get('/show-faq/{id}', 'AdminController@showFaqById')->name('show-faq');
        });

        Route::post('/modifica-faq', 'AdminController@modifyFaqStore')->name('modifica-faq.store');

        Route::get('/conferma', 'AdminController@confirm')->name('conferma');

        Route::post('offerte-alloggio-filtrate', 'AdminController@getOfferteAlloggioByTipAndDate')->name('getOffAllFiltered');

        Route::post('offerte-locazione-filtrate', 'AdminController@getOfferteLocazioneByTipAndDate')->name('getOffLocFiltered');

        Route::post('alloggi-allocati-filtrati', 'AdminController@getAlloggiAllocatiByTipAndDate')->name('getAllAlLocatiFiltered');
    });

    Route::prefix('catalogo')->group(function () {
        Route::get('/', 'AdminController@showCatalog')->name('catalogo-admin');

        Route::get('/appartamenti', 'AdminController@showCatalogAppartamenti')->name('catalogo-appartamenti-admin');

        Route::get('/posti-letto', 'AdminController@showCatalogPostiLetto')->name('catalogo-posti-letto-admin');
    });
});

//AUTENTICAZIONE E REGISTRAZIONE
Route::get('/registrazione-dati-personali', 'GuestController@showRegisterDatiPersonaliGet');

Route::post('/registrazione-dati-personali', 'GuestController@showRegisterDatiPersonaliPost')->name('registrazione-dati-personali');

Route::post('registrazione', 'Auth\RegisterController@register')->name('registrazione');

Route::post('login', 'Auth\LoginController@login')->name('login');

Route::post('logout', 'Auth\LoginController@logout')->name('logout');


//CATALOGO
Route::prefix('catalogo')->group(function () {
    Route::get('/', 'GuestController@showPublicCatalog')->name('catalogo');

    Route::get('/appartamenti', 'GuestController@showPublicCatalogAppartamenti')->name('catalogo-appartamenti');

    Route::get('/posti-letto', 'GuestController@showPublicCatalogPostiLetto')->name('catalogo-posti-letto');
});

//MESSAGGISTICA

Route::get('/messaggistica', 'MessaggisticaController@showMessaggistica')->name('messaggistica');

Route::post('/messaggistica', 'MessaggisticaController@sendMessage')->name('send-message');

Route::post('/opzionamento', 'MessaggisticaController@opzionamento')->name('opzionamento');
