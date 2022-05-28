<?php

namespace App\Models;

use App\Models\Resources\Alloggio;
use App\Models\Resources\Faq;

class Admin {

    public function getFaq(){
        return Faq::all();
    }

    public function getFaqById($id){
        return Faq::find($id);
    }

    //metodo per ritornare il numero di offerte di alloggio
    public function getOfferteAlloggio(){
        return Alloggio::count();
    }

    //metodo per ritornare tutti gli alloggi per visualizzarli in stats (no paginate per ora)
    public function getStatsAlloggi(){
        return Alloggio::all();
    }

    //metodo per tornare un'array di alloggi in base alla tipologia in stats (no paginate per ora)
    public function getStatsAlloggioByTip($tipologia){
        return Alloggio::where('tipologia', $tipologia);
    }

    //da mettere la funzione per le foto

    //metodo per ritornare il numero di offerte di locazione
    public function getOfferteLocazione(){

    }

    //metodo per ritornare il numero di alloggi allocati
    public function getAlloggiAllocati(){

    }

    //metodo per ritornare tutti gli alloggi per visualizzarli in catalogo (si paginate)
    public function getAlloggi(){
        return Alloggio::paginate(3);
    }

    //metodo per tornare un'array di alloggi in base alla tipologia in catalogo (si paginate)
    public function getAlloggioByTip($tipologia){
        return Alloggio::where('tipologia', $tipologia)->paginate(3);
    }
}
