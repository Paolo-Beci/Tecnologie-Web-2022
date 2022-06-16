<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\Locatario;
use App\Models\Resources\DatiPersonali;
use App\Models\Resources\Foto;
use App\Models\Resources\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

// CONTROLLER DEL LOCATARIO
class LocatarioController extends Controller {

    protected $_locatarioModel;

    public function __construct() {
        $this->middleware('can:isLocatario');
        $this->_locatarioModel = new Locatario();
    }

    // Funzione che mostra la home locatario con le FAQ pertinenti
    public function index() {

        //Faq
        $faq = $this->_locatarioModel->getFaqByTarget('locatario');

        return view('layouts/content-home')
            ->with('faq', $faq); //la variabile faq (array) viene passata alla view
    }

    // Funzione utilizzata per tornare un array di alloggi in catalogo
    public function showCatalog(){
        $alloggi = $this->_locatarioModel->getAlloggi();

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggi) //la variabile alloggi (array) viene passata alla view
            ->with('tipologia', 'NULL')
            ->with('citta', '')
            ->with('piano', '--')
            ->with('num_pl', '--')
            ->with('minmq', '')
            ->with('maxmq', '')
            ->with('minprezzo', '')
            ->with('maxprezzo', '')
            ->with('num_camere_tot', '')
            ->with('tipo', 'NULL');

    }

    // Funzione che mostra la pagina catalogo con alloggi di tipologia -> APPARTAMENTO
    public function showCatalogAppartamenti(){

        $alloggi = $this->_locatarioModel->getAlloggioByTip('Appartamento');

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggi) //la variabile appartamenti (array) viene passata alla view
            //Dati usati per la ricerca nei filtri:
            ->with('tipologia', 'NULL')
            ->with('citta', '')
            ->with('piano', '--')
            ->with('num_pl', '--')
            ->with('minmq', '')
            ->with('maxmq', '')
            ->with('minprezzo', '')
            ->with('maxprezzo', '')
            ->with('num_camere_tot', '')
            ->with('tipo', 'NULL');
    }

    // Funzione che mostra la pagina catalogo con alloggi di tipologia -> POSTO LETTO
    public function showCatalogPostiLetto(){

        $alloggi = $this->_locatarioModel->getAlloggioByTip('Posto_letto');

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggi) //la variabile posti letto (array) viene passata alla view
            //Dati usati per la ricerca nei filtri:
            ->with('tipologia', 'NULL')
            ->with('citta', '')
            ->with('piano', '--')
            ->with('num_pl', '--')
            ->with('minmq', '')
            ->with('maxmq', '')
            ->with('minprezzo', '')
            ->with('maxprezzo', '')
            ->with('num_camere_tot', '')
            ->with('tipo', 'NULL');
    }

    // Funzione utilizzata per tornare gli alloggi locati da un determinato locatario
    public function showStoricoAlloggi(){

        $alloggiLocatario = $this->_locatarioModel->getStoricoAlloggiByLocatario();

        return view('alloggio/content-storico-alloggi-locatario')
            ->with('alloggiLocatario', $alloggiLocatario);
    }

    // Funzione utilizzata per tornare i dettagli dell'alloggio selezionato in catalogo
    public function showDettaglioAlloggio($id_alloggio, $tipologia){

        $info_generali = $this->_locatarioModel->getAlloggio($id_alloggio, $tipologia);

        return view('alloggio/content-dettagli-alloggio')
            ->with('info_generali', $info_generali);
    }

    // Funzione utilizzata per tornare gli alloggi in base alla città
    public function showAlloggiByCity() {

        $alloggiByCity = $this->_locatarioModel->getAlloggiByCity($_POST['citta']);

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggiByCity);
    }

    // Funzione utilizzata per tornare gli alloggi in base a tutti i filtri
    public function showAlloggiFiltered(Request $request) {

        $array = $request->all();
        /*effettua controlli sui campi delle form: se sono vuoti, il controller fa sì che
        il filtraggio avvenga senza considerare i campi non compilati*/
        $check = $array['check'] ?? ['Libero', 'Locato'];

        $servizi = $array['check2'] ?? [];

        if ($array['citta'] == '') {
            $citta = $this->_locatarioModel->getCity();
        } else $citta = array($array['citta']);

        if ($array['num_camere'] == '') {
            $num_camere = range(0, 20);
        } else $num_camere = array($array['num_camere']);

        if ($array['number_pl_app'] == '') {
            $number_pl_app = range(0, 20);
        } else $number_pl_app = array($array['number_pl_app']);

        if ($array['tipo'] == 'NULL') {
            $tipo = ['Doppia', 'Singola'];
        } else $tipo = array($array['tipo']);

        if (isset($array['periodo'])) {
            $periodo = array($array['periodo']);
        } else $periodo = [12, 9, 6];

        if (isset($array['gender'])) {
            $gender = array($array['gender']);
        } else $gender = ['m', 'f', 'u'];

        if ($array['number_piano'] == '') {
            $number_piano = range(0,127);
        } else $number_piano = array($array['number_piano']);

        if ($array['min-mq'] == '') {
            $min_mq = 0;
        } else $min_mq = $array['min-mq'];

        if ($array['max-mq'] == '') {
            $max_mq = 999999;
        } else $max_mq = $array['max-mq'];

        if ($array['min-mq'] == '') {
            $min_prezzo = 0;
        } else $min_prezzo = $array['min-prezzo'];

        if ($array['max-prezzo'] == '') {
            $max_prezzo = 999999;
        } else $max_prezzo = $array['max-prezzo'];

        $alloggiFiltered = $this->_locatarioModel->getAlloggiFiltered(
            $array['tipologia'], $check, $periodo,
            $gender, $number_piano, $number_pl_app,
            $citta, $min_mq, $max_mq, $min_prezzo,
            $max_prezzo, $servizi, $num_camere, $tipo);

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggiFiltered)
            ->with('tipologia', $array['tipologia'])
            ->with('citta', $array['citta'])
            ->with('piano', $array['number_piano'])
            ->with('num_pl', $array['number_pl_app'])
            ->with('minmq', $array['min-mq'])
            ->with('maxmq', $array['max-mq'])
            ->with('minprezzo', $array['min-prezzo'])
            ->with('maxprezzo', $array['max-prezzo'])
            ->with('num_camere_tot', $array['num_camere'])
            ->with('tipo', $array['tipo']);
    }

    // Funzione utilizzata per tornare i dettagli dell'account attualmente loggato
    public function showAccount() {
        $dati_personali = $this->_locatarioModel->getDatiLocatario();

        return view('layouts/content-account')
            ->with('dati_personali', $dati_personali);
    }

    // Funzione utilizzata per modificare i dati personali dell'utente
    public function showModificaAccount(UpdateProfileRequest $request){
        // prendo l'id_foto_profilo più grande nel DB per asssegnare il nome ad una nuova immagine inserita
        $imageName = DatiPersonali::select('id_foto_profilo')->max('id_foto_profilo') + 1;
        $user = User::find(auth()->user()->getAuthIdentifier());

        // mi accerto che l'utente abbia caricato un'immagine
        if ($request->hasFile('image')) {
            // rinomino l'immagine caricata
            //seleziono l'oggetto immagine e lo assegno ad una variabile
            $image = $request->file('image');
            //estraggo il nome dell'immagine dall'oggetto che la rappresenta
            $oldName = $image->getClientOriginalName();
            //decompongo il nome separando il nome fornito dall'utente dall'estensione, posizionandolo dentro un array
            $array = explode('.', $oldName);
            //aggiungo all'estensione il "."
            $estensione = '.'.$array[1];
            //assemblo il nuovo nome dell'immagine
            $fullImageName = $imageName.$estensione;

            //update del DB con immagine
            DatiPersonali::where('id_dati_personali', auth()->user()->getAuthIdentifier())
                ->update(['nome' => $request['name'], 'cognome' => $request['surname'], 'luogo_nascita' => $request['birthplace']
                    , 'sesso' => $request['gender'], 'citta' => $request['city'], 'num_civico' => $request['house-number']
                    , 'mail' => $request['email'], 'data_nascita' => $request['birthtime'], 'codice_fiscale' => $request['cf']
                    , 'via' => $request['street'], 'cap' => $request['cap'], 'cellulare' => $request['telephone']
                    , 'id_foto_profilo' => $imageName, 'estensione_p' => $estensione]);

            //spostiamo l'immagine nella cartella images-profilo
            if(!is_null($imageName))
            {
                $destinationPath = public_path().'/images_profilo';
                $image->move($destinationPath, $fullImageName);
            }
            }
        else{
            //update del DB senza immagine - tabella dati_personali
            DatiPersonali::where('id_dati_personali', auth()->user()->getAuthIdentifier())
                ->update(['nome' => $request['name'], 'cognome' => $request['surname'], 'luogo_nascita' => $request['birthplace']
                    , 'sesso' => $request['gender'], 'citta' => $request['city'], 'num_civico' => $request['house-number']
                    , 'mail' => $request['email'], 'data_nascita' => $request['birthtime'], 'codice_fiscale' => $request['cf']
                    , 'via' => $request['street'], 'cap' => $request['cap'], 'cellulare' => $request['telephone']]);
        }

        // aggiorno username e password solo se sono stati inseriti
        if(!is_null($request['username']))
            $user->username = $request['username'];
        if(!is_null($request['password']))
            $user->password = Hash::make($request['password']);
        // salvataggio dei dati dell'utente
        $user->save();

        // al completamento dell'operazione ritorno alla pagina dell'account
        return redirect()->action('LocatarioController@showAccount');
    }

    // Funzione utilizzata per aggiornare l'immagine di profilo nel caso in cui venisse modificata
    public function showImmagineProfilo(){
        return redirect()->action('LocatarioController@showAccount');
    }

    // Funzione utilizzata per visualizzare il contratto dell'alloggio selezionato - si apre dalla messaggistica di un locatario
    public function showContratto(Request $request) {

        $array = $request->all();

        $dati = $this->_locatarioModel->getDatiContratto($array['locatore'], $array['locatario'], $array['alloggio']);

        return view('layouts/contratto')
            ->with('dati', $dati);

    }

}
