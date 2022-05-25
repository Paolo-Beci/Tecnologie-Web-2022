<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewProductRequest;
use App\Models\Admin;
use App\Models\Resources\Faq;

class AdminController extends Controller {

    protected $_adminModel;

    public function __construct() {
        $this->middleware('can:isAdmin');
        $this->_adminModel = new Admin();
    }

    public function index() {
        return view('layouts/content-home');
    }

    public function showFaq() {
        $faq = $this->_adminModel->getFaq();

        return view('faq/gestione-faq')
            ->with('faq', $faq);
    }

    public function insertFaq() {

        $tg = ['locatore'=>'locatore', 'locatario'=>'locatario', 'utente non registrato'=>'utente non registrato'];
        return view('faq/insert-faq')
            ->with('tg', $tg);
    }

    public function storeFaq(NewProductRequest $request)
    {
        $new_faq = new Faq;
        $new_faq->fill($request->validated());
        $new_faq->save();

        //temporaneo, dovremo metterci un popup di conferma
        sleep(5);

        return redirect()->action('AdminController@showFaq');
    }

    public function deleteFaq() {
        return view('faq/delete-faq');
    }

    public function modifyFaq() {
        return view('faq/modify-faq');
    }

    public function showCatalog(){

        $alloggi = $this->_adminModel->getAlloggi();

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggi); //la variabile alloggi (array) viene passata alla view

    }

    public function showCatalogAppartamenti(){

        $alloggi = $this->_adminModel->getAlloggioByTip('Appartamento');

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggi); //la variabile appartamenti (array) viene passata alla view

    }

    public function showCatalogPostiLetto(){

        $alloggi = $this->_adminModel->getAlloggioByTip('Posto letto');

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggi); //la variabile posti letto (array) viene passata alla view
    }
}
