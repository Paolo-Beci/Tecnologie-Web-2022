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

    public function getAlloggio($idAlloggio){
        return Alloggio::where('id_alloggio', $idAlloggio)->get();
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
