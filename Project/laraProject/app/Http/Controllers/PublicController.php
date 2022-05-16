<?php

namespace App\Http\Controllers;
use PublicUser;

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

        return view('content-public')
            ->with('faq', $faq); //la variabile faq viene passata alla view
    }

}
