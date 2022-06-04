<?php

namespace App\Http\Controllers;
use App\Http\Requests\NewAlloggioRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Locatore;
use App\Models\Resources\Alloggio;
use App\Models\Resources\DatiPersonali;
use App\Models\Resources\Foto;
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

    public function showModificaAccount(UpdateProfileRequest $request){

        DatiPersonali::where('id_dati_personali', auth()->user()->getAuthIdentifier())
            ->update(['nome' => $request['name'], 'cognome' => $request['surname'], 'luogo_nascita' => $request['birthplace']
                , 'sesso' => $request['gender'], 'citta' => $request['city'], 'num_civico' => $request['house-number']
                , 'mail' => $request['email'], 'data_nascita' => $request['birthtime'], 'codice_fiscale' => $request['cf']
                , 'via' => $request['street'], 'cap' => $request['cap'], 'cellulare' => $request['telephone']]);

        if(is_null($request['username']))
            User::where('id', auth()->user()->getAuthIdentifier())
                ->update(['password' => Hash::make($request['password'])]);
        else
            User::where('id', auth()->user()->getAuthIdentifier())
                ->update(['username' => $request['username'], 'password' => Hash::make($request['password'])]);

        return redirect()->action('LocatoreController@showAccount');
    }

    //metodo che apre la sezione di inserimento annuncio
    public function insertAnnuncio(){
        $tipologie = ["Appartamento" => 'Appartamento', "Posto letto" => 'Posto letto'];
        $genere = $this->_locatoreModel->getGenereAlloggio()->pluck('genere');
        $periodoLocazione = $this->_locatoreModel->getPeriodoLocazioneAlloggio()->pluck('periodo_locazione');
        return view('alloggio.inserisci-annuncio')
            ->with('tipologie', $tipologie)
            ->with('genere', $genere)
            ->with('periodoLocazione', $periodoLocazione);
    }

    //metodo per inserire un annuncio
    public function storeAnnuncio(NewAlloggioRequest $request) {

        //creo l'alloggio
        $alloggio = new Alloggio;
        $alloggio->fill($request->validated());
        $alloggio->save();

        //creo la foto legata all'alloggio
        $foto = new Foto();

        if ($request->hasFile('immagine')) {
            $image = $request->file('immagine');
            $imageName = $image->getClientOriginalName();
            $array = explode('.', $imageName);
            $foto->fill($request->validated());
            $foto->estensione = '.'.$array(1);
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

        return response()->json(['redirect' => route('locatore/gestione-alloggi')]);
    }

    // funzione che cancella l'alloggio selezionato
    public function deleteAlloggioById($id) {

        $annuncio = $this->_locatoreModel->getAlloggioById($id);
        $annuncio->delete();

        return redirect()->action('LocatoreController@showLocatoreAlloggi');
    }


}
