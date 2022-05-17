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
        $faq = $this->_locatoreModel->getFaqByTarget('locatore');

        return view('layouts/content-home-locatore')
            ->with('user', 'locatore')
            ->with('faq', $faq); //la variabile faq viene passata alla view
    }

}
