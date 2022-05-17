<?php

namespace App\Models;
use App\Models\Resources\Alloggio;
use App\Models\Resources\Faq;

class Locatore
{
    //metodo per tornare una faq in base ad un target dato
    public function getFaqByTarget($target){
        return Faq::where('target', $target)->get();
    }

    public function getAlloggioByTip($tipologia){
        return Alloggio::where('tipologia', $tipologia)->get();
    }

}
