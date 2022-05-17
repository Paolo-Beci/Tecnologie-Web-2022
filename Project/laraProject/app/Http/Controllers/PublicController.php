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

    public function showPublicCatalog($tipologia){
         $alloggi = $this->_publicUserModel->getAlloggioByTip($tipologia);

         //Alloggio
         return view('layouts/content-catalogo')
             ->with('user', 'public')
             ->with('alloggi', $alloggi); //la variabile alloggi (array) viene passato alla view
    }

}
