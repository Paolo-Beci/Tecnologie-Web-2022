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
        $numOffAll = $this->_adminModel->getOfferteAlloggio();
        $alloggiStats = $this->_adminModel->getStatsAlloggi();

        return view('layouts/content-home')
            ->with('numOffAll', $numOffAll)
            ->with('alloggiStats', $alloggiStats);
        //mancano i with relativi agli altri due campi delle stats e quelli relativi ad appartamenti e posti letto
    }

    public function showFaq() {
        $faq = $this->_adminModel->getFaq();

        return view('faq/gestione-faq')
            ->with('faq', $faq);
    }

    //questa funzione apre la sezione di inserimento
    public function insertFaq() {

        $tg = ['locatore'=>'locatore', 'locatario'=>'locatario', 'utente non registrato'=>'utente non registrato'];
        return view('faq/insert-faq')
            ->with('navbar', 'Inserisci')
            ->with('rotta_navbar', 'inserisci-faq')
            ->with('descrizione', 'Utilizza questa form per inserire una nuova faq')
            ->with('rotta', 'inserisci-faq.store')
            ->with('tg', $tg)
            ->with('domanda', '')
            ->with('risposta', '')
            ->with('target', '')
            ->with('azione', 'Aggiungi Faq');
    }

    //questa funzione inserisce effettivamente la faq
    public function storeFaq(NewProductRequest $request)
    {
        $new_faq = new Faq;
        $new_faq->fill($request->validated());
        $new_faq->save();

        return redirect()->action('AdminController@confirm');
    }

    //questa funzione apre la sezione cancella
    public function deleteFaq() {

        $faq = $this->_adminModel->getFaq();

        return view('faq/delete-faq')
            ->with('faq', $faq);
    }

    //questa funzione cancella effettivamente la particolare faq
    public function deleteFaqById($id) {

        $faq = $this->_adminModel->getFaqById($id);
        $faq->delete();

        return redirect()->action('AdminController@confirm');
    }

    //questa funzione apre la sezione modifica
    public function modifyFaq() {

        $faq = $this->_adminModel->getFaq();

        return view('faq/modify-faq')
            ->with('faq', $faq);
    }

    //questa sezione apre la modifica della particolare faq
    public function showFaqById($id) {

        $faq = $this->_adminModel->getFaqById($id);

        $tg = ['locatore'=>'locatore', 'locatario'=>'locatario', 'utente non registrato'=>'utente non registrato'];
        return view('faq/insert-faq')
            ->with('navbar', 'Modifica')
            ->with('rotta_navbar', 'modifica-faq')
            ->with('descrizione', 'Utilizza questa form per modificare la faq selezionata')
            ->with('rotta', 'modifica-faq.store')
            ->with('tg', $tg)
            ->with('domanda', $faq->domanda)
            ->with('risposta', $faq->risposta)
            ->with('target', $faq->target)
            ->with('azione', 'Modifica Faq')
            //passo l'id faq per metterlo nel campo nascosto della form nel caso di modifica faq
            ->with('hidden', $faq->id_faq);
    }

    //questa funzione aggiorna effettivamente la particolare faq
    public function modifyFaqStore(NewProductRequest $request) {

        $faq = $this->_adminModel->getFaqById($request->id_faq);

        $faq->domanda = $request->domanda;
        $faq->risposta = $request->risposta;
        $faq->target = $request->target;
        $faq->save();

        return redirect()->action('AdminController@confirm');

    }

    //questa funzione mostra una pagina di conferma operazione andata a buon fine
    public function confirm() {
        return view('faq/confirm');
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

    // metodo utilizzato per tornare i dettagli dell'account attualmente loggato
    public function showAccount() {
        $dati_personali = $this->_adminModel->getDatiPersonali();

        return view('layouts/content-account')
            ->with('dati_personali', $dati_personali);
    }
}
