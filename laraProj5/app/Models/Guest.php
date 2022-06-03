<?php

namespace App\Models;

use App\Models\Resources\Alloggio;
use App\Models\Resources\Faq;
use Illuminate\Support\Facades\DB;

class Guest {

    //metodo per tornare un'array di faq in base ad un target dato
    public function getFaqByTarget($target){
        return Faq::where('target', $target)->get();
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

}
