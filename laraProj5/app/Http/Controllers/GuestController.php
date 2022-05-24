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



}
