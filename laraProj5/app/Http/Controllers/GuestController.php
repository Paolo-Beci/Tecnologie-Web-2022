<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewUserRequest;
use App\Models\Guest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GuestController extends Controller {

    protected $_guestUserModel;

    public function __construct() {
        $this->middleware('guest');
        $this->_guestUserModel = new Guest();
    }

    public function index() {

        //Faq
        $faq = $this->_guestUserModel->getFaqByTarget('utente non registrato');

        return view('layouts/content-home')
            ->with('faq', $faq); //la variabile faq (array) viene passata alla view

    }

    public function showPublicCatalog(){

        $alloggi = $this->_guestUserModel->getAlloggi();

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggi); //la variabile alloggi (array) viene passata alla view

    }

    public function showPublicCatalogAppartamenti(){

        $alloggi = $this->_guestUserModel->getAlloggioByTip('Appartamento');

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggi); //la variabile appartamenti (array) viene passata alla view

    }

    public function showPublicCatalogPostiLetto(){

        $alloggi = $this->_guestUserModel->getAlloggioByTip('Posto letto');

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggi); //la variabile posti letto (array) viene passata alla view
    }

    protected function showRegisterDatiPersonaliPost(NewUserRequest $request) {

        $array = $request->all();


        if(isset($array['sign-up-username'], $array['sign-up-password'], $array['role'])){
            Session::put('sign-up-username', $array['sign-up-username']);
            Session::put('sign-up-password', $array['sign-up-password']);
            Session::put('role', $array['role']);
        }

        return view('auth/register-dati-personali');

    }
    
    protected function showRegisterDatiPersonaliGet() {

        if(Session::has(['sign-up-username', 'sign-up-password', 'role']) ){
            return view('auth/register-dati-personali');
        } else {
            return redirect()->route('home-guest');
        }

    }

}
