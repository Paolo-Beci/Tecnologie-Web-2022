<?php

namespace App\Http\Controllers;

class GuestController extends Controller {

    public function __construct() {
        $this->middleware('guest');
    }

    public function index() {

    //Faq
    $faq = $this->_guestUserModel->getFaqByTarget('utente non registrato');

    return view('layouts/content-public')
        ->with('faq', $faq); //la variabile faq (array) viene passata alla view

        return view('layouts/content-home');
    }



}
