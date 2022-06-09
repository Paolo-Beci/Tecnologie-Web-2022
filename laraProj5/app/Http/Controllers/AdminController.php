<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Resources\Faq;
use App\Models\Resources\Modifica;

use Illuminate\Http\Request;

class AdminController extends Controller {

    protected $_adminModel;

    public function __construct() {
        $this->middleware('can:isAdmin');
        $this->_adminModel = new Admin();
    }

    public function index() {

        //per offerte di alloggio
        $numOffAll = $this->_adminModel->getNumOfferteAlloggio();
        $offAll = $this->_adminModel->getOfferteAlloggio();

        //per offerte di locazione
        $numOffLoc = $this->_adminModel->getNumOfferteLocazione();
        $offLoc = $this->_adminModel->getOfferteLocazione();

        //per alloggi allocati
        $numAllAllocati = $this->_adminModel->getNumAlloggiAllocati();
        $allAllocati = $this->_adminModel->getAlloggiAllocati();

        return view('layouts/content-home')
            ->with('numOffAll', $numOffAll)
            ->with('offAll', $offAll)
            ->with('numOffLoc', $numOffLoc)
            ->with('offLoc', $offLoc)
            ->with('numAllAllocati', $numAllAllocati)
            ->with('allAllocati', $allAllocati)
            ->with('type', '')
            ->with('da', '')
            ->with('a', '')
            ->with('type2', '')
            ->with('da2', '')
            ->with('a2', '')
            ->with('type3', '')
            ->with('da3', '')
            ->with('a3', '');
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
            ->with('insert', 'active')
            ->with('edit', '')
            ->with('descrizione', 'Utilizza questa form per inserire una nuova faq')
            ->with('rotta', 'inserisci-faq.store')
            ->with('tg', $tg)
            ->with('domanda', '')
            ->with('risposta', '')
            ->with('target', '')
            ->with('azione', 'Aggiungi Faq');
    }

    //questa funzione inserisce effettivamente la faq
    public function storeFaq(Request $request)
    {
        $array = $request->all();

        $idFaq = Faq::create([
            'domanda' => $array['domanda'],
            'risposta' => $array['risposta'],
            'target' => $array['target']
        ])->id_faq;

        Modifica::create([
            'utente' => auth()->user()->id,
            'faq' => $idFaq,
            'data_modifica' => now()
        ]);

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
            ->with('insert', '')
            ->with('edit', 'active')
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
    public function modifyFaqStore(Request $request) {

        $faq = $this->_adminModel->getFaqById($request->id_faq);

        $faq->domanda = $request->domanda;
        $faq->risposta = $request->risposta;
        $faq->target = $request->target;
        $faq->save();

        Modifica::create([
            'utente' => auth()->user()->id,
            'faq' => $request->id_faq,
            'data_modifica' => now()
        ]);

        return redirect()->action('AdminController@confirm');

    }

    //questa funzione mostra una pagina di conferma operazione andata a buon fine
    public function confirm() {
        return view('faq/confirm');
    }

    //questa funzione mostra le offerte di alloggio filtrate per tipologia e data
    public function getOfferteAlloggioByTipAndDate(/*$tipologia, $data_init, $data_fin*/){

        if ($_POST['type']=='Indefinito') {
            $type = ['Appartamento', 'Posto_letto'];
        } else $type = array($_POST['type']);

        if ($_POST['da']=='') {
            $da = "1900-01-01";
        } else $da = $_POST['da'];

        if ($_POST['a']=='') {
            $a = "2099-12-31";
        } else $a = $_POST['a'];

        //per offerte di alloggio
        $numOffAll = $this->_adminModel->getNumOfferteAlloggio();
        $offAll = $this->_adminModel->getOfferteAlloggioByTipAndDate($type, $da, $a/*$tipologia, $data_init, $data_fin*/);

        //per offerte di locazione
        $numOffLoc = $this->_adminModel->getNumOfferteLocazione();
        $offLoc = $this->_adminModel->getOfferteLocazione();

        //per alloggi allocati
        $numAllAllocati = $this->_adminModel->getNumAlloggiAllocati();
        $allAllocati = $this->_adminModel->getAlloggiAllocati();

        return view('layouts/content-home')
            ->with('numOffAll', $numOffAll)
            ->with('offAll', $offAll)
            ->with('numOffLoc', $numOffLoc)
            ->with('offLoc', $offLoc)
            ->with('numAllAllocati', $numAllAllocati)
            ->with('allAllocati', $allAllocati)
            ->with('type', $_POST['type'])
            ->with('da', $_POST['da'])
            ->with('a', $_POST['a'])
            ->with('type2', '')
            ->with('da2', '')
            ->with('a2', '')
            ->with('type3', '')
            ->with('da3', '')
            ->with('a3', '');
    }

    //questa funzione mostra le offerte di locazione filtrate per tipologia e data
    public function getOfferteLocazioneByTipAndDate(/*$tipologia, $data_init, $data_fin*/){

        if ($_POST['type2']=='Indefinito') {
            $type2 = ['Appartamento', 'Posto_letto'];
        } else $type2 = array($_POST['type2']);

        if ($_POST['da2']=='') {
            $da2 = "1900-01-01";
        } else $da2 = $_POST['da2'];

        if ($_POST['a2']=='') {
            $a2 = "2099-12-31";
        } else $a2 = $_POST['a2'];

        //per offerte di alloggio
        $numOffAll = $this->_adminModel->getNumOfferteAlloggio();
        $offAll = $this->_adminModel->getOfferteAlloggio();

        //per offerte di locazione
        $numOffLoc = $this->_adminModel->getNumOfferteLocazione();
        $offLoc = $this->_adminModel->getOfferteLocazioneByTipAndDate($type2, $da2, $a2);/*$tipologia, $data_init, $data_fin*/

        //per alloggi allocati
        $numAllAllocati = $this->_adminModel->getNumAlloggiAllocati();
        $allAllocati = $this->_adminModel->getAlloggiAllocati();

        return view('layouts/content-home')
            ->with('numOffAll', $numOffAll)
            ->with('offAll', $offAll)
            ->with('numOffLoc', $numOffLoc)
            ->with('offLoc', $offLoc)
            ->with('numAllAllocati', $numAllAllocati)
            ->with('allAllocati', $allAllocati)
            ->with('type', '')
            ->with('da', '')
            ->with('a', '')
            ->with('type2', $_POST['type2'])
            ->with('da2', $_POST['da2'])
            ->with('a2', $_POST['a2'])
            ->with('type3', '')
            ->with('da3', '')
            ->with('a3', '');
    }

    //questa funzione mostra gli alloggi locati filtrate per tipologia e data
    public function getAlloggiAllocatiByTipAndDate(){

        if ($_POST['type3']=='Indefinito') {
            $type3 = ['Appartamento', 'Posto_letto'];
        } else $type3 = array($_POST['type']);

        if ($_POST['da3']=='') {
            $da3 = "1900-01-01";
        } else $da3 = $_POST['da3'];

        if ($_POST['a3']=='') {
            $a3 = "2099-12-31";
        } else $a3 = $_POST['a3'];

        //per offerte di alloggio
        $numOffAll = $this->_adminModel->getNumOfferteAlloggio();
        $offAll = $this->_adminModel->getOfferteAlloggio();

        //per offerte di locazione
        $numOffLoc = $this->_adminModel->getNumOfferteLocazione();
        $offLoc = $this->_adminModel->getOfferteLocazione();

        //per alloggi allocati
        $numAllAllocati = $this->_adminModel->getNumAlloggiAllocati();
        $allAllocati = $this->_adminModel->getAlloggiAllocatiByTipAndDate($type3, $da3, $a3);

        return view('layouts/content-home')
            ->with('numOffAll', $numOffAll)
            ->with('offAll', $offAll)
            ->with('numOffLoc', $numOffLoc)
            ->with('offLoc', $offLoc)
            ->with('numAllAllocati', $numAllAllocati)
            ->with('allAllocati', $allAllocati)
            ->with('type', '')
            ->with('da', '')
            ->with('a', '')
            ->with('type2', '')
            ->with('da2', '')
            ->with('a2', '')
            ->with('type3', $_POST['type3'])
            ->with('da3', $_POST['da3'])
            ->with('a3', $_POST['a3']);
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

        $alloggi = $this->_adminModel->getAlloggioByTip('Posto_letto');

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggi); //la variabile posti letto (array) viene passata alla view
    }

    // metodo utilizzato per tornare i dettagli dell'account attualmente loggato
    public function showAccount() {
        $dati_personali = $this->_adminModel->getDatiAdmin();

        return view('layouts/content-account')
            ->with('dati_personali', $dati_personali);
    }
}
