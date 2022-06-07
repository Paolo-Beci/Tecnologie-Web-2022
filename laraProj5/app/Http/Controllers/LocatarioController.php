<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\Locatario;
use App\Models\Resources\DatiPersonali;
use App\Models\Resources\Foto;
use App\Models\Resources\User;
use Illuminate\Support\Facades\Hash;

class LocatarioController extends Controller {

    protected $_locatarioModel;

    public function __construct() {
        $this->middleware('can:isLocatario');
        $this->_locatarioModel = new Locatario();
    }

    public function index() {

        //Faq
        $faq = $this->_locatarioModel->getFaqByTarget('locatario');

        return view('layouts/content-home')
            ->with('faq', $faq); //la variabile faq (array) viene passata alla view
    }

    // metodo utilizzato per tornare gli alloggi in catalogo
    public function showCatalog(){
        $alloggi = $this->_locatarioModel->getAlloggi();

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggi) //la variabile alloggi (array) viene passata alla view
            ->with('citta', 'Ancona')
            ->with('piano', '--')
            ->with('minmq', '')
            ->with('maxmq', '')
            ->with('minprezzo', '')
            ->with('maxprezzo', '');

    }

    // metodo utilizzato per tornare gli appartamenti in catalogo
    public function showCatalogAppartamenti(){

        $alloggi = $this->_locatarioModel->getAlloggioByTip('Appartamento');

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggi); //la variabile appartamenti (array) viene passata alla view

    }

    // metodo utilizzato per tornare i posti letto in catalogo
    public function showCatalogPostiLetto(){

        $alloggi = $this->_locatarioModel->getAlloggioByTip('Posto_letto');

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggi); //la variabile posti letto (array) viene passata alla view
    }

    // metodo utilizzato per tornare gli alloggi locati da un determinato locatario
    public function showStoricoAlloggi(){
        $alloggiLocatario = $this->_locatarioModel->getStoricoAlloggiByLocatario();
        return view('alloggio/content-storico-alloggi-locatario')
            ->with('alloggiLocatario', $alloggiLocatario);
    }

    // metodo utilizzato per tornare i dettagli dell'alloggio selezionato in catalogo
    public function showDettaglioAlloggio($id_alloggio, $tipologia){
        $info_generali = $this->_locatarioModel->getAlloggio($id_alloggio, $tipologia);

        return view('alloggio/content-dettagli-alloggio')
            ->with('info_generali', $info_generali);
    }

    //metodo utilizzato per tornare gli alloggi in base alla città
    public function showAlloggiByCity() {
        $alloggiByCity = $this->_locatarioModel->getAlloggiByCity($_POST['citta']);

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggiByCity);
    }

    //metodo utilizzato per tornare gli alloggi in base a tutti i filtri
    public function showAlloggiFiltered() {
        $check = $_POST['check'] ?? ['Libero', 'Locato', 'Opzionato'];

        if (isset($_POST['periodo'])) {
            $periodo = array($_POST['periodo']);
        } else $periodo = [12, 9, 6];

        if (isset($_POST['gender'])) {
            $gender = array($_POST['gender']);
        } else $gender = ['m', 'f', 'u'];

        if ($_POST['number_piano'] == '') {
            $number_piano = range(0,127);
        } else $number_piano = array($_POST['number_piano']);

        if ($_POST['min-mq'] == '') {
            $min_mq = 0;
        } else $min_mq = $_POST['min-mq'];

        if ($_POST['max-mq'] == '') {
            $max_mq = 999999;
        } else $max_mq = $_POST['max-mq'];

        if ($_POST['min-mq'] == '') {
            $min_prezzo = 0;
        } else $min_prezzo = $_POST['min-prezzo'];

        if ($_POST['max-prezzo'] == '') {
            $max_prezzo = 999999;
        } else $max_prezzo = $_POST['max-prezzo'];

        $alloggiFiltered = $this->_locatarioModel->getAlloggiFiltered(
            $check, $periodo, $gender,
            $number_piano, $_POST['citta'],
            $min_mq, $max_mq, $min_prezzo, $max_prezzo);

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggiFiltered)
            ->with('citta', $_POST['citta'])
            ->with('piano', $_POST['number_piano'])
            ->with('minmq', $_POST['min-mq'])
            ->with('maxmq', $_POST['max-mq'])
            ->with('minprezzo', $_POST['min-prezzo'])
            ->with('maxprezzo', $_POST['max-prezzo']);
    }

    // metodo utilizzato per tornare i dettagli dell'account attualmente loggato
    public function showAccount() {
        $dati_personali = $this->_locatarioModel->getDatiLocatario();

        return view('layouts/content-account')
            ->with('dati_personali', $dati_personali);
    }

    public function showModificaAccount(UpdateProfileRequest $request){
        //prendo l'id_foto_profilo più grande nel DB
        $imageName = DatiPersonali::select('id_foto_profilo')->max('id_foto_profilo') + 1;
        // rinomino l'immagine

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $oldName = $image->getClientOriginalName();
            $array = explode('.', $oldName);
            $estensione = '.'.$array[1];
            $fullImageName = $imageName.$estensione;

            //update del DB con immagine
            DatiPersonali::where('id_dati_personali', auth()->user()->getAuthIdentifier())
                ->update(['nome' => $request['name'], 'cognome' => $request['surname'], 'luogo_nascita' => $request['birthplace']
                    , 'sesso' => $request['gender'], 'citta' => $request['city'], 'num_civico' => $request['house-number']
                    , 'mail' => $request['email'], 'data_nascita' => $request['birthtime'], 'codice_fiscale' => $request['cf']
                    , 'via' => $request['street'], 'cap' => $request['cap'], 'cellulare' => $request['telephone']
                    , 'id_foto_profilo' => $imageName, 'estensione_p' => $estensione]);

            //spostiamo l'immagine
            if(!is_null($imageName))
            {
                $destinationPath = public_path().'/images_profilo';
                $image->move($destinationPath, $fullImageName);
            }
            }
        else{
            //update del DB senza immagine
            DatiPersonali::where('id_dati_personali', auth()->user()->getAuthIdentifier())
                ->update(['nome' => $request['name'], 'cognome' => $request['surname'], 'luogo_nascita' => $request['birthplace']
                    , 'sesso' => $request['gender'], 'citta' => $request['city'], 'num_civico' => $request['house-number']
                    , 'mail' => $request['email'], 'data_nascita' => $request['birthtime'], 'codice_fiscale' => $request['cf']
                    , 'via' => $request['street'], 'cap' => $request['cap'], 'cellulare' => $request['telephone']]);
        }



        if(is_null($request['username']))
            User::where('id', auth()->user()->getAuthIdentifier())
                ->update(['password' => $request['password']]);
        else
            User::where('id', auth()->user()->getAuthIdentifier())
                ->update(['username' => $request['username'], 'password' => $request['password']]);


        return redirect()->action('LocatarioController@showAccount');
    }

    public function showImmagineProfilo(){
        return redirect()->action('LocatarioController@showAccount');
    }
}
