<?php

namespace App\Models;

use App\Models\Resources\Alloggio;
use App\Models\Resources\Faq;

class Admin {

    public function getFaq(){
        return Faq::all();
    }

    public function getAlloggi(){
        return Alloggio::paginate(3);
    }

    //metodo per tornare un'array di alloggi in base alla tipologia
    public function getAlloggioByTip($tipologia){
        return Alloggio::where('tipologia', $tipologia)->paginate(2);
    }
}
