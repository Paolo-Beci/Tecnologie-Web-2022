<?php

namespace App\Http\Controllers;

use App\Models\PublicUser;

class PublicController extends Controller
{
    protected $_publicUserModel;

    public function __construct()
    {
        $this->_publicUserModel = new PublicUser();
    }

    public function showPublicHome(){

        //Faq
        $faq = $this->_publicUserModel->getFaqByTarget('utente non registrato');

        return view('layouts/content-public')
            ->with('user', 'public')
            ->with('faq', $faq); //la variabile faq (array) viene passata alla view
    }

    public function showPublicCatalog(){

        $alloggi = $this->_publicUserModel->getAlloggi();

         return view('layouts/content-catalogo-public')
             ->with('user', 'public')
             ->with('alloggi', $alloggi); //la variabile alloggi (array) viene passata alla view
            
    }

    public function showPublicCatalogAppartamenti(){

        $alloggi = $this->_publicUserModel->getAlloggioByTip('Appartamento');

         return view('layouts/content-catalogo-public')
             ->with('user', 'public')
             ->with('alloggi', $alloggi); //la variabile appartamenti (array) viene passata alla view

    }

    public function showPublicCatalogPostiLetto(){

        $alloggi = $this->_publicUserModel->getAlloggioByTip('Posto letto');

         return view('layouts/content-catalogo-public')
             ->with('user', 'public')
             ->with('alloggi', $alloggi); //la variabile posti letto (array) viene passata alla view
    }

}
