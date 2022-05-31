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

    // metodo utilizzato per tornare gli alloggi in catalogo
    public function showCatalog(){

        $alloggi = $this->_locatarioModel->getAlloggi();

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggi); //la variabile alloggi (array) viene passata alla view

    }

    // metodo utilizzato per tornare gli appartamenti in catalogo
    public function showCatalogAppartamenti(){

        $alloggi = $this->_locatarioModel->getAlloggioByTip('Appartamento');

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggi); //la variabile appartamenti (array) viene passata alla view

    }

    // metodo utilizzato per tornare i posti letto in catalogo
    public function showCatalogPostiLetto(){

        $alloggi = $this->_locatarioModel->getAlloggioByTip('Posto letto');

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggi); //la variabile posti letto (array) viene passata alla view
    }

    // metodo utilizzato per tornare i dettagli dell'alloggio selezionato in catalogo
    public function showDettaglioAlloggio2($id_alloggio){
        $alloggio = $this->_locatarioModel->getAlloggio($id_alloggio);
        $foto = $this->_locatarioModel->getFotoAlloggio($id_alloggio);
        $servizi = $this->_locatarioModel->getServiziAlloggio($id_alloggio);
//        $tipologia = $this->_locatarioModel->getTipAlloggio($id_alloggio);    come lo collego alle altre tabelle??

        return view('layouts/dettagli-alloggio')
            ->with('alloggio', $alloggio)
            ->with('foto', $foto)
            ->with('servizi', $servizi);
    }

    //metodo sostitutivo del precedente
    public function showDettaglioAlloggio($id_alloggio, $tipologia){
        $info_generali = $this->_locatarioModel->getAlloggio($id_alloggio, $tipologia);

        return view('layouts/dettagli-alloggio')
            ->with('info_generali', $info_generali);
    }

    // metodo utilizzato per tornare i dettagli dell'account attualmente loggato
    public function showAccount() {
        $dati_personali = $this->_locatarioModel->getDatiLocatario();

        return view('layouts/content-account')
            ->with('dati_personali', $dati_personali);
    }
}
