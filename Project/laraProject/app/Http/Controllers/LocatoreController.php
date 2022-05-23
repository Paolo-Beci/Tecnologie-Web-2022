<?php

namespace App\Http\Controllers;

use App\Models\Locatore;

class LocatoreController extends Controller
{
    protected $_locatoreModel;

    public function __construct()
    {
        $this->_locatoreModel = new Locatore();
    }

    public function showLocatoreHome(){

        //Faq
        $faq = Locatore::getFaqByTarget('locatore');

        return view('layouts/content-home-locatore')
            ->with('user', 'locatore')
            ->with('faq', $faq); //la variabile faq viene passata alla view
    }

    public function showLocatoreCatalog(){

        $appartamenti = $this->_locatoreModel->getAlloggioByTip('Appartamento');
        $posti_letto = $this->_locatoreModel->getAlloggioByTip('Posto letto');

         return view('layouts/content-catalogo-public')
             ->with('user', 'locatore')
             ->with('appartamenti', $appartamenti) //la variabile appartamenti (array) viene passata alla view
             ->with('posti_letto', $posti_letto); //la variabile posti letto (array) viene passata alla view

    }

    //metodo utilizzato per tornare gli alloggi in Gestione alloggi (per ora non sono ancora filtrati)
    public function showLocatoreAlloggi(){
        $alloggi = $this->_locatoreModel->getAlloggi();

        return view('layouts/content-gestione-alloggi-locatore')
            ->with('user', 'public')
            ->with('alloggi', $alloggi);
    }

}
