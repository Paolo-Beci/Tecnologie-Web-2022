<?php

namespace App\Models;

use App\Models\Resources\Alloggio;
use App\Models\Resources\DatiPersonali;
use App\Models\Resources\Disponibilita;
use App\Models\Resources\Faq;
use App\Models\Resources\Interazione;
use App\Models\Resources\Servizio;
use App\Models\Resources\User;

class Locatore {

    //metodo per tornare un'array di faq in base ad un target dato
    public function getFaqByTarget($target){
        return Faq::where('target', $target)->get();
    }

    //metodo che torna l'alloggio relativo all'id passato
    public function getAlloggioById($idAlloggio){
        return Alloggio::find( $idAlloggio);
    }

    //metodo che torna gli alloggi in base all'id
    public function getAlloggioByIdAndTip($idAlloggio, $tipAlloggio){
        if($tipAlloggio == 'Appartamento'){
           return Alloggio::where('id_alloggio', $idAlloggio)
                ->leftJoin('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
                ->leftJoin('appartamento', 'alloggio.id_alloggio', '=', 'appartamento.alloggio')
                ->get();
        }
        else{
            return Alloggio::where('id_alloggio', $idAlloggio)
                ->leftJoin('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
                ->leftJoin('posto_letto', 'alloggio.id_alloggio', '=', 'posto_letto.alloggio')
                ->get();
        }
    }

    //metodo che torna i servizi di un alloggio in base all'id
    public function getServiziAlloggioById($idAlloggio){
        return Disponibilita::where('alloggio', $idAlloggio)->get();
    }

    //metodo che torna tutti i servizi
    public function getAllServizi(){
        return Servizio::all();
    }

    //metodo che torna gli alloggi insieme alle info sulle foto
    public function getAlloggi(){
        return Alloggio::leftJoin('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
            ->orderBy('data_inserimento_offerta', 'DESC')
            ->paginate(3);
    }

    //metodo per tornare un'array di alloggi in base alla tipologia
    public function getAlloggioByTip($tipologia){
        return Alloggio::where('tipologia', $tipologia)
            ->leftJoin('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
            ->orderBy('data_inserimento_offerta', 'DESC')
            ->paginate(3);
    }

    //funzione che torna l'istanza dell'alloggio considerato insieme alle sue foto e alle info del locatore
    public function getAlloggio($idAlloggio, $tipologia){
        if($tipologia == 'Appartamento'){
            return Alloggio::where('id_alloggio', $idAlloggio)
                ->leftJoin('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
                ->leftJoin('interazione', 'alloggio.id_alloggio', '=', 'interazione.alloggio')
                ->leftJoin('disponibilita', 'alloggio.id_alloggio', '=', 'disponibilita.alloggio')
                ->leftJoin('utente', 'interazione.utente', '=', 'utente.id')
                ->where('ruolo','=', 'locatore')
                ->leftJoin('dati_personali', 'utente.dati_personali', '=', 'dati_personali.id_dati_personali')
                ->leftJoin('appartamento', 'alloggio.id_alloggio', '=', 'appartamento.alloggio')
                ->get();
        }
        else{
            return Alloggio::where('id_alloggio', $idAlloggio)
                ->leftJoin('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
                ->leftJoin('interazione', 'alloggio.id_alloggio', '=', 'interazione.alloggio')
                ->leftJoin('disponibilita', 'alloggio.id_alloggio', '=', 'disponibilita.alloggio')
                ->leftJoin('utente', 'interazione.utente', '=', 'utente.id')
                ->where('ruolo', '=', 'locatore')
                ->leftJoin('dati_personali', 'utente.dati_personali', '=', 'dati_personali.id_dati_personali')
                ->leftJoin('posto_letto', 'alloggio.id_alloggio', '=', 'posto_letto.alloggio')
                ->get();
        }
    }

    //metodo per tornare un' array di alloggi di un locatore
    public function getAlloggiByLocatore(){
        $locatore = auth()->user()->getAuthIdentifier();

         return Alloggio::leftJoin('interazione', 'alloggio.id_alloggio', '=', 'interazione.alloggio')
            ->leftJoin('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
            ->where('utente', $locatore)
            ->paginate(3);
    }

    // metodo per tornare i dati di un locatore
    public function getDatiLocatore(){
        $locatore = auth()->user()->getAuthIdentifier();

        return User::where('id', $locatore)
            ->leftJoin('dati_personali', 'utente.dati_personali', '=', 'dati_personali.id_dati_personali')
            ->get();
    }

    //metodo che tornare le tipologie degli alloggi
    public function getTipologieAlloggio(){
        return Alloggio::select('tipologia')->distinct();
    }

    //metodo che tornare il genere di locatario per gli alloggi
    public function getGenereAlloggio(){
        return Alloggio::select('genere')->distinct()->get();
    }

    //metodo che tornare il genere di locatario per gli alloggi
    public function getPeriodoLocazioneAlloggio(){
        return Alloggio::select('periodo_locazione')->distinct()->get();
    }

    public function getLocatarioById($id) {
        return User::where('id', $id)
            ->leftJoin('dati_personali', 'utente.dati_personali', '=', 'dati_personali.id_dati_personali')
            ->get();
    }
}
