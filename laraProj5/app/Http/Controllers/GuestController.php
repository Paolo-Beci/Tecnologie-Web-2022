<?php

namespace App\Http\Controllers;

use App\Models\Guest;

class GuestController extends Controller {

    protected $_guestUserModel;

    public function __construct() {
        //$this->middleware('guest');
        $this->_guestUserModel = new Guest();
    }

    public function index() {

        //Faq
        $faq = $this->_guestUserModel->getFaqByTarget('utente non registrato');

        return view('layouts/content-home')
            ->with('faq', $faq); //la variabile faq (array) viene passata alla view

    }

    public function showPublicCatalog(){

        $alloggi = $this->_guestUserModel->getAlloggi();

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggi); //la variabile alloggi (array) viene passata alla view

    }

    public function showPublicCatalogAppartamenti(){

        $alloggi = $this->_guestUserModel->getAlloggioByTip('Appartamento');

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggi); //la variabile appartamenti (array) viene passata alla view

    }

    public function showPublicCatalogPostiLetto(){

        $alloggi = $this->_guestUserModel->getAlloggioByTip('Posto letto');

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggi); //la variabile posti letto (array) viene passata alla view
    }
}
