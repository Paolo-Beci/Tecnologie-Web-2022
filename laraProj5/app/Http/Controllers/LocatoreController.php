<?php

namespace App\Http\Controllers;
use App\Models\Locatore;

class LocatoreController extends Controller {

    protected $_locatoreModel;

    public function __construct() {
        $this->middleware('can:isLocatore');
        $this->_locatoreModel = new Locatore();
    }

    public function index() {

        //Faq
        $faq = $this->_locatoreModel->getFaqByTarget('locatore');

        return view('layouts/content-home')
            ->with('faq', $faq); //la variabile faq (array) viene passata alla view
    }

    // metodo utilizzato per tornare gli alloggi in catalogo
    public function showCatalog(){
        $alloggi = $this->_locatoreModel->getAlloggi();

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggi); //la variabile alloggi (array) viene passata alla view

    }

    // metodo utilizzato per tornare gli appartamenti in catalogo
    public function showCatalogAppartamenti(){

        $alloggi = $this->_locatoreModel->getAlloggioByTip('Appartamento');

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggi); //la variabile appartamenti (array) viene passata alla view

    }

    // metodo utilizzato per tornare i posti letto in catalogo
    public function showCatalogPostiLetto(){

        $alloggi = $this->_locatoreModel->getAlloggioByTip('Posto_letto');

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggi); //la variabile posti letto (array) viene passata alla view
    }

    // metodo utilizzato per tornare i dettagli dell'alloggio selezionato in catalogo
    public function showLocatoreAlloggi(){
        $alloggiLocatore = $this->_locatoreModel->getAlloggiByLocatore();
        return view('alloggio/content-gestione-alloggi-locatore')
            ->with('alloggiLocatore', $alloggiLocatore);
    }

    public function showInserisciAlloggio(){
        return view('alloggio/inserisci-alloggio');
    }

    public function inserisciAlloggio(){  // TO DO
//        $alloggio = new Alloggio();
//        $alloggio->nome = request('nome');
//        $alloggio->tipologia = request('tipologia');
//        $alloggio->descrizione = request('descrizione');
//        $alloggio->prezzo = request('prezzo');
//        $alloggio->utente = auth()->user()->getAuthIdentifier();
//        $alloggio->save();
        return redirect('/locatore/gestione-alloggi');
    }

    // metodo utilizzato per tornare i dettagli dell'alloggio selezionato in catalogo
    public function showDettaglioAlloggio($id_alloggio, $tipologia){
        $info_generali = $this->_locatoreModel->getAlloggio($id_alloggio, $tipologia);

        return view('alloggio/dettagli-alloggio')
            ->with('info_generali', $info_generali);
    }

    //metodo da utilizzare al posto del precedente
    public function showAccount(){
        $dati_personali = $this->_locatoreModel->getDatiLocatore();
        return view('layouts/content-account')
            ->with('dati_personali', $dati_personali);
    }
}
