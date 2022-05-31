<?php

namespace App\Models;

use App\Models\Resources\Alloggio;
use App\Models\Resources\DatiPersonali;
use App\Models\Resources\Faq;
use App\Models\Resources\Interazione;
use Illuminate\Support\Facades\DB;

class Locatore {

    //metodo per tornare un'array di faq in base ad un target dato
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
}
