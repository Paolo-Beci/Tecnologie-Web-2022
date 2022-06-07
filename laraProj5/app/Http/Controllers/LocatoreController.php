<?php

namespace App\Http\Controllers;
use App\Http\Requests\NewAlloggioRequest;
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


        return redirect()->action('LocatoreController@showAccount');
    }

    //metodo che apre la sezione di inserimento annuncio
    public function insertAnnuncio(){
        //togliere
        $tipologie = ["Appartamento" => 'Appartamento', "Posto letto" => 'Posto letto'];
        $genere = $this->_locatoreModel->getGenereAlloggio()->pluck('genere');
        $periodoLocazione = $this->_locatoreModel->getPeriodoLocazioneAlloggio()->pluck('periodo_locazione');
        return view('alloggio.inserisci-annuncio')
            ->with('tipologie', $tipologie)
            ->with('genere', $genere)
            ->with('periodoLocazione', $periodoLocazione);
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
            'eta_minima' => $array['genere'],
            'eta_massima' => $array['genere'],
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
            $array = $this->imageCompose($image);
            $estensione = '.' . $array[1];

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

        //popolamento array
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

    /*
        //metodo per inserire un annuncio
        public function storeAnnuncio(NewAlloggioRequest $request) {

            //creo l'alloggio
            $alloggio = new Alloggio;
            $alloggio->fill($request->validated());
            $alloggio->save();

            //creo  foto legata all'alloggio
            /*
            $foto = new Foto();

            if ($request->hasFile('immagine')) {
                $image = $request->file('immagine');
                $imageName = $image->getClientOriginalName();
                $array = explode('.', $imageName);
                $foto->fill($request->validated());
                $foto->estensione = '.'.$array[1];
                //rinomino l'immagine
                $imageName = $foto->id_foto.$foto->estensione;
            } else {
                $foto->fill($request->validated());
                $foto->estensione = NULL;
            }
            $foto->save();

            if (!is_null($foto->estensione)) {
                $destinationPath = public_path() . '/images/images_case';
                $image->move($destinationPath, $imageName);
            }


            return response()->json(['redirect' => route('gestione-alloggi')]);
        }
    */
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
    public function showModificaAlloggio($id, $tipologia) {

        $alloggio1 = $this->_locatoreModel->getAlloggioByIdAndTip($id, $tipologia);
        $servizi = $this->_locatoreModel->getServiziAlloggioById($id);

        return view('alloggio/modifica-annuncio')
            ->with('alloggio1', $alloggio1)
            ->with('servizi', $servizi);
    }
}
