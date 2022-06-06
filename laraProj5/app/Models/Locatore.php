<?php

namespace App\Models;

use App\Models\Resources\Alloggio;
use App\Models\Resources\DatiPersonali;
use App\Models\Resources\Disponibilita;
use App\Models\Resources\Faq;
use App\Models\Resources\Interazione;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

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
           return DB::table('alloggio')
                ->find($idAlloggio)
                ->join('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
                ->join('interazione', 'alloggio.id_alloggio', '=', 'interazione.alloggio')
                ->join('utente', 'interazione.utente', '=', 'utente.id')
                ->where('ruolo','=', 'locatore')
                ->join('dati_personali', 'utente.dati_personali', '=', 'dati_personali.id_dati_personali')
                ->join('appartamento', 'alloggio.id_alloggio', '=', 'appartamento.alloggio');
        }
        else{
            return DB::table('alloggio')
                ->where('id_alloggio', $idAlloggio)
                ->join('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
                ->join('interazione', 'alloggio.id_alloggio', '=', 'interazione.alloggio')
                ->join('utente', 'interazione.utente', '=', 'utente.id')
                ->where('ruolo','=', 'locatore')
                ->join('dati_personali', 'utente.dati_personali', '=', 'dati_personali.id_dati_personali')
                ->join('posto_letto', 'alloggio.id_alloggio', '=', 'posto_letto.alloggio');
        }
    }

    //metodo che torna i servizi di un alloggio in base all'id
    public function getServiziAlloggioById($idAlloggio){
        return Disponibilita::where('alloggio', $idAlloggio);
    }

    //metodo che torna gli alloggi insieme alle info sulle foto
    public function getAlloggi(){
        return DB::table('alloggio')
            ->join('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
            ->paginate(3);
    }

    //metodo per tornare un'array di alloggi in base alla tipologia
    public function getAlloggioByTip($tipologia){
        return DB::table('alloggio')
            ->where('tipologia', $tipologia)
            ->join('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
            ->paginate(3);
    }

    //funzione che torna l'istanza dell'alloggio considerato insieme alle sue foto e alle info del locatore
    public function getAlloggio($idAlloggio, $tipologia){
        if($tipologia == 'Appartamento'){
            return DB::table('alloggio')
                ->where('id_alloggio', $idAlloggio)
                ->join('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
                ->join('interazione', 'alloggio.id_alloggio', '=', 'interazione.alloggio')
                ->join('disponibilita', 'alloggio.id_alloggio', '=', 'disponibilita.alloggio')
                ->join('utente', 'interazione.utente', '=', 'utente.id')
                ->where('ruolo','=', 'locatore')
                ->join('dati_personali', 'utente.dati_personali', '=', 'dati_personali.id_dati_personali')
                ->join('appartamento', 'alloggio.id_alloggio', '=', 'appartamento.alloggio')
                ->get();
        }
        else{
            return DB::table('alloggio')
                ->where('id_alloggio', $idAlloggio)
                ->join('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
                ->join('interazione', 'alloggio.id_alloggio', '=', 'interazione.alloggio')
                ->join('disponibilita', 'alloggio.id_alloggio', '=', 'disponibilita.alloggio')
                ->join('utente', 'interazione.utente', '=', 'utente.id')
                ->where('ruolo', '=', 'locatore')
                ->join('dati_personali', 'utente.dati_personali', '=', 'dati_personali.id_dati_personali')
                ->join('posto_letto', 'alloggio.id_alloggio', '=', 'posto_letto.alloggio')
                ->get();
        }
    }

    //metodo per tornare un' array di alloggi di un locatore
    public function getAlloggiByLocatore(){
        $locatore = auth()->user()->getAuthIdentifier();

         return DB::table('alloggio')
            ->join('interazione', 'alloggio.id_alloggio', '=', 'interazione.alloggio')
            ->join('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
            ->where('utente', $locatore)
            ->paginate(3);
    }

    // metodo per tornare i dati di un locatore
    public function getDatiLocatore(){
        $locatore = auth()->user()->getAuthIdentifier();

        return DB::table('utente')
            ->where('id', $locatore)
            ->join('dati_personali', 'utente.dati_personali', '=', 'dati_personali.id_dati_personali')
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
}
