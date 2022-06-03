<?php

namespace App\Http\Controllers;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Locatore;
use App\Models\Resources\DatiPersonali;
use App\Models\Resources\User;
use Illuminate\Support\Facades\Hash;

class LocatoreController extends Controller {

    protected $_locatoreModel;

    public function __construct() {
        $this->middleware('can:isLocatore');
        $this->_locatoreModel = new Locatore();
    }

    public function index() {

        //Faq
        $faq = $this->_locatoreModel->getFaqByTarget('locatore');

        return view('layouts/content-home')
            ->with('faq', $faq); //la variabile faq (array) viene passata alla view
    }

    // metodo utilizzato per tornare gli alloggi in catalogo
    public function showCatalog(){
        $alloggi = $this->_locatoreModel->getAlloggi();

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggi); //la variabile alloggi (array) viene passata alla view

    }

    // metodo utilizzato per tornare gli appartamenti in catalogo
    public function showCatalogAppartamenti(){

        $alloggi = $this->_locatoreModel->getAlloggioByTip('Appartamento');

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggi); //la variabile appartamenti (array) viene passata alla view

    }

    // metodo utilizzato per tornare i posti letto in catalogo
    public function showCatalogPostiLetto(){

        $alloggi = $this->_locatoreModel->getAlloggioByTip('Posto_letto');

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggi); //la variabile posti letto (array) viene passata alla view
    }

    // metodo utilizzato per tornare gli alloggi inseriti da un determinato locatore
    public function showLocatoreAlloggi(){
        $alloggiLocatore = $this->_locatoreModel->getAlloggiByLocatore();
        return view('alloggio/content-gestione-alloggi-locatore')
            ->with('alloggiLocatore', $alloggiLocatore);
    }

    //metodo per tornare le tipologie di alloggio
    public function tipologieAlloggio(){
        $tipologieAlloggio = $this->_locatoreModel->getTipologieAlloggio();
        return view('alloggio/inserisci-annuncio')
            ->with('tipologieAlloggio', $tipologieAlloggio);
    }

    public function inserisciAnnuncio2(){
//        $alloggio = new Alloggio();
//        $alloggio->nome = request('nome');
//        $alloggio->tipologia = request('tipologia');
//        $alloggio->descrizione = request('descrizione');
//        $alloggio->prezzo = request('prezzo');
//        $alloggio->utente = auth()->user()->getAuthIdentifier();
//        $alloggio->save();
        return redirect('/locatore/gestione-alloggi');
    }

    // metodo utilizzato per tornare i dettagli dell'alloggio selezionato in catalogo
    public function showDettaglioAlloggio($id_alloggio, $tipologia){
        $info_generali = $this->_locatoreModel->getAlloggio($id_alloggio, $tipologia);

        return view('alloggio/content-dettagli-alloggio')
            ->with('info_generali', $info_generali);
    }

    //metodo da utilizzare al posto del precedente
    //questa funzione apre la sezione di inserimento annuncio
    public function inserisciAnnuncio() {
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

    //questa funzione inserisce effettivamente l'annuncio
    public function storeFaq(NewProductRequest $request)
    {
        $new_faq = new Faq;
        $new_faq->fill($request->validated());
        $new_faq->save();

        return redirect()->action('AdminController@confirm');
    }

    public function showAccount(){
        $dati_personali = $this->_locatoreModel->getDatiLocatore();     // si riesce a passare dati_personali alla view tramite auth??

        return view('layouts/content-account')
            ->with('dati_personali', $dati_personali);
    }

    public function showModificaAccount(UpdateProfileRequest $request){

        DatiPersonali::where('id_dati_personali', auth()->user()->getAuthIdentifier())
            ->update(['nome' => $request['name'], 'cognome' => $request['surname'], 'luogo_nascita' => $request['birthplace']
                , 'sesso' => $request['gender'], 'citta' => $request['city'], 'num_civico' => $request['house-number']
                , 'mail' => $request['email'], 'data_nascita' => $request['birthtime'], 'codice_fiscale' => $request['cf']
                , 'via' => $request['street'], 'cap' => $request['cap'], 'cellulare' => $request['telephone']]);

        User::where('id', auth()->user()->getAuthIdentifier())
            ->update(['username' => $request['username'], 'password' => Hash::make($request['password'])]);

        return redirect()->action('LocatoreController@showAccount');
    }

    public function showMessaggistica() {
        
        $auth_username = auth()->user()->username;

        $messages = $this->_locatoreModel->getUserMessages();
        
        $contacts = array();

        // Generazione primo livello array contact. Alloggi
        foreach($messages as $message) {

            $alloggio = $message->alloggio;

            if(!array_key_exists($alloggio, $contacts))
                $contacts[$alloggio] = array();
            // else
            //     array_push($contacts[$alloggio], $message);
        }

        // Generazione secondo livello array contact. Username
        foreach($messages as $message) {

            $alloggio = $message->alloggio;
            $mittente = $message->mittente;
            $destinatario = $message->destinatario;

            if($mittente != $auth_username && !array_key_exists($mittente, $contacts[$alloggio]))
                $contacts[$alloggio][$mittente] = array();

            if($destinatario != $auth_username && !array_key_exists($destinatario, $contacts[$alloggio]))
                $contacts[$alloggio][$destinatario] = array();

        }

        // Generazione terzo livello array contact. Giorno. Popolazione dell'array
        foreach($messages as $message) {

            $alloggio = $message->alloggio;
            $mittente = $message->mittente;
            $destinatario = $message->destinatario;
            $message_date = date("d F Y", strtotime($message->data_invio));

            if(array_key_exists($mittente, $contacts[$alloggio])) {
                if(!array_key_exists($message_date, $contacts[$alloggio][$mittente]))
                    $contacts[$alloggio][$mittente][$message_date] = array($message);
                else
                    array_push($contacts[$alloggio][$mittente][$message_date], $message);
            }
            
            if(array_key_exists($destinatario, $contacts[$alloggio])) {
                if(!array_key_exists($message_date, $contacts[$alloggio][$destinatario]))
                    $contacts[$alloggio][$destinatario][$message_date] = array($message);
                else
                    array_push($contacts[$alloggio][$destinatario][$message_date], $message);
            }
            
        }


        // echo "<pre>".print_r($contacts, true)."</pre>";

        return view('messaging')
            ->with('contacts', $contacts);

    }

}
