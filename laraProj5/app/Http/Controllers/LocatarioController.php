<?php

namespace App\Http\Controllers;

use App\Models\Locatario;
use Illuminate\Support\Facades\DB;

class LocatarioController extends Controller {

    protected $_locatarioModel;

    public function __construct() {
        $this->middleware('can:isLocatario');
        $this->_locatarioModel = new Locatario();
    }

    public function index() {

        //Faq
        $faq = $this->_locatarioModel->getFaqByTarget('locatario');

        return view('layouts/content-home')
            ->with('faq', $faq); //la variabile faq (array) viene passata alla view
    }

    public function showCatalog(){

        $alloggi = $this->_locatarioModel->getAlloggi();

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggi); //la variabile alloggi (array) viene passata alla view

    }

    public function showCatalogAppartamenti(){

        $alloggi = $this->_locatarioModel->getAlloggioByTip('Appartamento');

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggi); //la variabile appartamenti (array) viene passata alla view

    }

    public function showCatalogPostiLetto(){

        $alloggi = $this->_locatarioModel->getAlloggioByTip('Posto letto');

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggi); //la variabile posti letto (array) viene passata alla view
    }

    public function showDettaglioAlloggio($id_alloggio){
        $alloggio = $this->_locatarioModel->getAlloggio($id_alloggio);
        $foto = $this->_locatarioModel->getFotoAlloggio($id_alloggio);
        $servizi = $this->_locatarioModel->getServiziAlloggio($id_alloggio);
//        $tipologia = $this->_locatarioModel->getTipAlloggio($id_alloggio);    come lo collego alle altre tabelle??

        return view('layouts/dettagli-alloggio')
            ->with('alloggio', $alloggio)
            ->with('foto', $foto)
            ->with('servizi', $servizi);
    }
}
