<?php

namespace App\Models;

use App\Models\Resources\Alloggio;
use App\Models\Resources\DatiPersonali;
use App\Models\Resources\Disponibilita;
use App\Models\Resources\Faq;
use App\Models\Resources\Foto;
use App\Models\Resources\User;
use Illuminate\Support\Facades\DB;

class Locatario {

    //metodo per tornare un' array di faq in base a un target dato
    public function getFaqByTarget($target){
        return Faq::where('target', $target)->get();
    }

    public function getAlloggi(){
        return Alloggio::paginate(3);
    }

    //metodo per tornare un' array di alloggi in base alla tipologia
    public function getAlloggioByTip($tipologia){
        return Alloggio::where('tipologia', $tipologia)->paginate(3);
    }


    //funzione che torna l'istanza dell'alloggio considerato insieme alle sue foto e alle info del locatore
    public function getAlloggio($idAlloggio, $tipologia){
        if($tipologia == 'Appartamento'){
            return DB::table('alloggio')
                ->where('id_alloggio', $idAlloggio)
                ->join('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
                ->join('disponibilita', 'alloggio.id_alloggio', '=', 'disponibilita.alloggio')
                ->join('interazione', 'alloggio.id_alloggio', '=', 'interazione.alloggio')
                ->join('utente', 'interazione.utente', '=', 'utente.id')
                ->join('dati_personali', 'utente.dati_personali', '=', 'dati_personali.id_dati_personali')
                ->join('appartamento', 'alloggio.id_alloggio', '=', 'appartamento.alloggio')
                ->get();
        }
        else{
            return DB::table('alloggio')
            ->where('id_alloggio', $idAlloggio)
            ->join('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
            ->join('disponibilita', 'alloggio.id_alloggio', '=', 'disponibilita.alloggio')
            ->join('interazione', 'alloggio.id_alloggio', '=', 'interazione.alloggio')
            ->join('utente', 'interazione.utente', '=', 'utente.id')
            ->join('dati_personali', 'utente.dati_personali', '=', 'dati_personali.id_dati_personali')
            ->join('posto_letto', 'alloggio.id_alloggio', '=', 'posto_letto.alloggio')
            ->get();

        }

    }

    public function getFotoAlloggio($id_alloggio)
    {
        return Foto::where('alloggio', $id_alloggio)->get();
    }

    public function getServiziAlloggio($id_alloggio)
    {
        return Disponibilita::where('alloggio', $id_alloggio)->get();
    }

    public function getDatiPersonali() {
        $locatario = auth()->user()->getAuthIdentifier();

        return DatiPersonali::where('id_dati_personali', $locatario)->get();
    }
}
