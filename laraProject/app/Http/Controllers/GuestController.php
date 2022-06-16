<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewUserRequest;
use App\Models\Guest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

// CONTROLLER DELL'UTENTE NON REGISTRATO
class GuestController extends Controller {

    protected $_guestUserModel;

    public function __construct() {
        $this->middleware('guest');
        $this->_guestUserModel = new Guest();
    }

    // Funzione che mostra la home generica con le FAQ pertinenti all'utente non registrato
    public function index() {

        //Faq
        $faq = $this->_guestUserModel->getFaqByTarget('utente non registrato');

        return view('layouts/content-home')
            ->with('faq', $faq); //la variabile faq (array) viene passata alla view

    }

    // Funzione che mostra la pagina con il catalogo pubblico
    public function showPublicCatalog(){

        $alloggi = $this->_guestUserModel->getAlloggi();

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggi); //la variabile alloggi (array) viene passata alla view

    }

    // Funzione che mostra la pagina catalogo con alloggi di tipologia -> APPARTAMENTO
    public function showPublicCatalogAppartamenti(){

        $alloggi = $this->_guestUserModel->getAlloggioByTip('Appartamento');

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggi); //la variabile appartamenti (array) viene passata alla view

    }

    // Funzione che mostra la pagina catalogo con alloggi di tipologia -> POSTO LETTO
    public function showPublicCatalogPostiLetto(){

        $alloggi = $this->_guestUserModel->getAlloggioByTip('Posto_letto');

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggi); //la variabile posti letto (array) viene passata alla view
    }

    //Funzione che mostra la pagina della registrazione dei dati personali nel caso in cui la validazione
    //dei dati di registrazione utente sia andata a buon fine. Essa immagazzina le informazioni della
    //form da cui proviene nella sessione
    protected function showRegisterDatiPersonaliPost(NewUserRequest $request) {

        $array = $request->all();


        if(isset($array['sign-up-username'], $array['sign-up-password'], $array['role'])){
            Session::put('sign-up-username', $array['sign-up-username']);
            Session::put('sign-up-password', $array['sign-up-password']);
            Session::put('role', $array['role']);
        }

        return view('auth/register-dati-personali');

    }

    //Funzione che mostra la pagina della registrazione dei dati personali solo quando la sessione presenta
    // i dati di registrazione utente. Questa metodo viene utilizzato ad esempio quando fallisce la validazione
    // dei dati della formd i registrazione dei dati personali
    protected function showRegisterDatiPersonaliGet() {

        if(Session::has(['sign-up-username', 'sign-up-password', 'role']) ){
            return view('auth/register-dati-personali');
        } else {
            return redirect()->route('home-guest');
        }

    }

}
