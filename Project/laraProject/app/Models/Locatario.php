<?php

namespace App\Models;
use App\Models\Resources\Alloggio;
use App\Models\Resources\Faq;

class Locatario
{
    //metodo per tornare una faq in base ad un target dato
    public function getFaqByTarget($target){
        return Faq::where('target', $target)->get();
    }

    //metodo per tornare un'array di alloggi in base alla tipologia
    public function getAlloggioByTip($tipologia){
        return Alloggio::where('tipologia', $tipologia)->get();
    }

}
