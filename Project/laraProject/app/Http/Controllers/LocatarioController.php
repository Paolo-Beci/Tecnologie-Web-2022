<?php

namespace App\Http\Controllers;

use App\Models\Locatario;

class LocatarioController extends Controller
{
    protected $_locatarioModel;

    public function __construct()
    {
        $this->_locatarioModel = new Locatario();
    }

    public function showLocatarioHome(){

        //Faq
        $faq = $this->_locatarioModel->getFaqByTarget('locatario');

        return view('layouts/content-home-locatario')
            ->with('user', 'locatario')
            ->with('faq', $faq); //la variabile faq viene passata alla view
    }

    public function showLocatarioCatalog(){

        $appartamenti = $this->_locatarioModel->getAlloggioByTip('Appartamento');
        $posti_letto = $this->_locatarioModel->getAlloggioByTip('Posto letto');

         return view('layouts/content-catalogo-locatario')
             ->with('user', 'locatario')
             ->with('appartamenti', $appartamenti) //la variabile appartamenti (array) viene passata alla view
             ->with('posti_letto', $posti_letto); //la variabile posti letto (array) viene passata alla view

    }

}
