<?php

namespace App\Http\Controllers;
use App\Http\Requests\NewAlloggioRequest;
use App\Http\Requests\UpdateAlloggioRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Locatore;
use App\Models\Resources\Alloggio;
use App\Models\Resources\Appartamento;
use App\Models\Resources\DatiPersonali;
use App\Models\Resources\Disponibilita;
use App\Models\Resources\Foto;
use App\Models\Resources\Interazione;
use App\Models\Resources\Messaggio;
use App\Models\Resources\PostoLetto;
use App\Models\Resources\Servizio;
use App\Models\Resources\User;
use Illuminate\Support\Facades\Hash;

// CONTROLLER DEL LOCATORE
class LocatoreController extends Controller {

    protected $_locatoreModel;

    public function __construct() {
        $this->middleware('can:isLocatore');
        $this->_locatoreModel = new Locatore();
    }

    // Funzione che mostra la home locatore con le FAQ pertinenti
    public function index() {

        //Faq
        $faq = $this->_locatoreModel->getFaqByTarget('locatore');

        return view('layouts/content-home')
            ->with('faq', $faq); //la variabile faq (array) viene passata alla view
    }

    // Funzione utilizzata per tornare un array di alloggi in catalogo
    public function showCatalog(){
        $alloggi = $this->_locatoreModel->getAlloggi();

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggi); //la variabile alloggi (array) viene passata alla view

    }

    // Funzione che mostra la pagina catalogo con alloggi di tipologia -> APPARTAMENTO
    public function showCatalogAppartamenti(){

        $alloggi = $this->_locatoreModel->getAlloggioByTip('Appartamento');

        return view('layouts/content-catalogo')
            ->with('alloggi', $alloggi); //la variabile appartamenti (array) viene passata alla view

    }

    // Funzione che mostra la pagina catalogo con alloggi di tipologia -> POSTO LETTO
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

    // metodo utilizzato per tornare i dettagli dell'alloggio selezionato in catalogo
    public function showDettaglioAlloggio($id_alloggio, $tipologia){
        $info_generali = $this->_locatoreModel->getAlloggio($id_alloggio, $tipologia);

        return view('alloggio/content-dettagli-alloggio')
            ->with('info_generali', $info_generali);
    }

    public function showAccount(){
        $dati_personali = $this->_locatoreModel->getDatiLocatore();     // si riesce a passare dati_personali alla view tramite auth??

        return view('layouts/content-account')
            ->with('dati_personali', $dati_personali);
    }

    //riscrivere con codice più pulito
    public function showModificaAccount(UpdateProfileRequest $request){
        //prendo l'id_foto_profilo più grande nel DB
        $imageName = DatiPersonali::select('id_foto_profilo')->max('id_foto_profilo') + 1;
        $user = User::find(auth()->user()->getAuthIdentifier());

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

        if(!is_null($request['username']))
            $user->username = $request['username'];
        if(!is_null($request['password']))
            $user->password = Hash::make($request['password']);
        $user->save();


        return redirect()->action('LocatoreController@showAccount');
    }

    //metodo che apre la sezione di inserimento annuncio
    public function insertAnnuncio(){
        return view('alloggio.inserisci-annuncio');
    }

    public function storeAnnuncio(NewAlloggioRequest $request)
    {
        $array = $request->all();
        $time = now();

        //crea l'alloggio
        $new_alloggio = Alloggio::create([
            'descrizione' => $array['descrizione'],
            'utenze' => $array['utenze'],
            'canone_affitto' => $array['canoneAffitto'],
            'periodo_locazione' => $array['periodoLocazione'],
            'genere' => $array['genere'],
            'eta_minima' => $array['etaMin'],
            'eta_massima' => $array['etaMax'],
            'dimensione' => $array['dimensione'],
            'num_posti_letto_tot' => $array['numPostiLettoTot'],
            'via' => $array['via'],
            'citta' => $array['citta'],
            'num_civico' => $array['numCivico'],
            'cap' => $array['cap'],
            'interno' => $array['interno'],
            'piano' => $array['piano'],
            'data_inserimento_offerta' => $time,
            'tipologia' => $array['tipologia'],
            'stato' => 'libero'
        ]);

        //crea l'interazione
        $new_interazione = Interazione::create([
            'utente' => auth()->user()->getAuthIdentifier(),
            'alloggio' => $new_alloggio->id_alloggio,
            'data_interazione' => $time
        ]);

        //crea la foto
        if ($request->hasFile('immagine')) {
            $image = $request->file('immagine');
            $arrayImage = $this->imageCompose($image);
            $estensione = '.' . $arrayImage[1];

            $new_foto = Foto::create([
                'estensione' => $estensione,
                'alloggio' => $new_alloggio->id_alloggio
            ]);

            $fullImageName = $new_foto->id_foto.$estensione;

            //sposta l'immagine
            $destinationPath = public_path() . '/images_case';
            $image->move($destinationPath, $fullImageName);
        }


        //crea l'appartamento
        if($new_alloggio->tipologia == 'Appartamento'){
            $new_appartamento = Appartamento::create([
                'num_camere' => $array['numCamere'],
                'alloggio' => $new_alloggio->id_alloggio
            ]);
        }
        else{
            $new_posto_letto = PostoLetto::create([
                'tipologia_camera' => $array['tipologiaCamera'],
                'alloggio' => $new_alloggio->id_alloggio
            ]);
        }

        //creazione dei servizi
        $servizi = Servizio::all();

        foreach ($servizi as $servizio){
            if(array_key_exists($servizio->nome_servizio, $array)){
                $new_servizio = Disponibilita::create([
                    'alloggio' => $new_alloggio->id_alloggio,
                    'servizio' => $servizio->nome_servizio,
                    'quantita' => $array[$servizio->nome_servizio]
                ]);
            }
        }

        return response()->json(['redirect' => route('gestione-alloggi')]);
    }

    //funzione che torna l'array relativo all'immagine
    public function imageCompose($image){
        $imageId = Foto::select('id_foto')->max('id_foto') + 1;

        $imageName = $image->getClientOriginalName();
        $array = explode('.', $imageName);
        $array[0] = $imageId;
        return $array;
    }

    // funzione che cancella l'alloggio selezionato
    public function deleteAlloggioById($id) {

        $annuncio = $this->_locatoreModel->getAlloggioById($id);
        $annuncio->delete();

        return redirect()->action('LocatoreController@showLocatoreAlloggi');
    }

    public function showImmagineProfilo(){
        return redirect()->action('LocatoreController@showAccount');
    }

    //questa funzione apre la sezione modifica
    public function showAlloggio($id, $tipologia) {
        $alloggi = $this->_locatoreModel->getAlloggioByIdAndTip($id, $tipologia);
        $servizi = $this->_locatoreModel->getAllServizi();
        $servizi_disponibili = array();

        foreach($this->_locatoreModel->getServiziAlloggioById($id) as $servizio_disponibile) {
            $servizi_disponibili[$servizio_disponibile->servizio] = $servizio_disponibile->quantita;
        }

        return view('alloggio/modifica-annuncio')
            ->with('alloggi', $alloggi)
            ->with('servizi_disponibili', $servizi_disponibili)
            ->with('servizi', $servizi);

        // echo "<pre>" . print_r($servizi_disponibili, true) . "</pre>";
    }

    public function modifyAlloggio(UpdateAlloggioRequest $request){
        $array = $request->all();
        $time = now();

        //modifico i dati relativi all'alloggio
        Alloggio::where('id_alloggio', $array['id_alloggio'])
            ->update([
                'descrizione' => $array['descrizione'],
                'utenze' => $array['utenze'],
                'canone_affitto' => $array['canoneAffitto'],
                'periodo_locazione' => $array['periodoLocazione'],
                'genere' => $array['genere'],
                'eta_minima' => $array['etaMin'],
                'eta_massima' => $array['etaMax'],
                'dimensione' => $array['dimensione'],
                'num_posti_letto_tot' => $array['numPostiLettoTot'],
                'via' => $array['via'],
                'citta' => $array['citta'],
                'num_civico' => $array['numCivico'],
                'cap' => $array['cap'],
                'interno' => $array['interno'],
                'piano' => $array['piano'],
                'data_inserimento_offerta' => $time,
                'tipologia' => $array['tipologia'],
                'stato' => 'libero'
            ]);

        //prendo la foto
        if ($request->hasFile('immagine')) {
            $image = $request->file('immagine');
            $oldName = $image->getClientOriginalName();
            $arrayNomeImage = explode('.', $oldName);
            $estensione = '.'.$arrayNomeImage[1];
            $fullImageName = $array['id_foto'].$estensione;

            //Modifico la foto
            Foto::where('id_foto', $array['id_foto'])
                ->update([
                    'estensione' => $estensione
                ]);

            //spostiamo l'immagine
            if(!is_null($array['id_foto']))
            {
                $destinationPath = public_path().'/images_case';
                $image->move($destinationPath, $fullImageName);
            }
        }

        //Modifico l'appartamento
        if($array['tipologia'] == 'Appartamento'){
            Appartamento::where('alloggio', $array['id_alloggio'])
            ->update([
                'num_camere' => $array['numCamere'],
            ]);
        }
        else{
            PostoLetto::where('id_posto_letto', $array['id_posto_letto'])
            ->update([
                'tipologia_camera' => $array['tipologiaCamera'],
            ]);
        }

        //Modifico i servizi (deve contenere anche la creazione di nuovi servizi e l'eliminazione di quelli che sono stati rimossi

        $servizi = Servizio::all();

        //cancello dal DB tutti i campi relativi un determinato alloggio
        Disponibilita::where('alloggio', $array['id_alloggio'])->delete();

        //ripopolo il DB con i servizi inseriti dall'utente
        foreach ($servizi as $servizio){
            if(array_key_exists($servizio->nome_servizio, $array)){
                Disponibilita::create([
                    'alloggio' => $array['id_alloggio'],
                    'servizio' => $servizio->nome_servizio,
                    'quantita' => $array[$servizio->nome_servizio]
                ]);
            }
        }

        return redirect()->action('LocatoreController@showLocatoreAlloggi');

    }

    public function showLocatarioById($id) {
        $locatario = $this->_locatoreModel->getLocatarioById($id);
        return view('layouts/content-account')
            ->with('dati_personali', $locatario);
    }
}
