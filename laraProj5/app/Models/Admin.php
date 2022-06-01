<?php

namespace App\Models;

use App\Models\Resources\Alloggio;
use App\Models\Resources\DatiPersonali;
use App\Models\Resources\Faq;
use Illuminate\Support\Facades\DB;

class Admin {

    public function getFaq(){
        return Faq::all();
    }

    public function getFaqById($id){
        return Faq::find($id);
    }

    //metodo per ritornare il numero di offerte di alloggio
    public function getNumOfferteAlloggio(){
        return Alloggio::count();
    }

    //metodo per ritornare tutti gli alloggi con il locatore per visualizzarli in stats
    public function getOfferteAlloggio(){
        return DB::table('alloggio')
            ->join('interazione', 'alloggio.id_alloggio', '=', 'interazione.alloggio')
            ->join('utente', 'interazione.utente', '=', 'utente.id')
            ->join('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
            ->where('utente.ruolo', 'locatore')
            ->get();
    }

    //metodo per tornare un'array di alloggi in base alla tipologia e alla data in stats
    public function getOfferteAlloggioByTipAndDate($tipologia, $data_init, $data_fin){
        return DB::table('alloggio')
            ->join('interazione', 'alloggio.id_alloggio', '=', 'interazione.alloggio')
            ->join('utente', 'interazione.utente', '=', 'utente.id')
            ->join('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
            ->where('utente.ruolo', '=','locatore')
            ->where('tipologia', $tipologia)
            ->where('data_inserimento_offerta', '<', $data_fin)
            ->where('data_inserimento_offerta', '>', $data_init)
            ->get();
    }

    //metodo per ritornare le offerte di locazione (alloggi che interessano, tramite messaggio, a qualcuno)
    public function getOfferteLocazione(){
        return DB::table('messaggio')
            ->join('alloggio', 'messaggio.alloggio', '=', 'alloggio.id_alloggio')
            ->join('utente', 'messaggio.mittente', '=', 'utente.id')
            ->join('foto', 'messaggio.alloggio', '=', 'foto.alloggio')
            ->where('messaggio.contenuto', '=', 'Ciao, ho visto la casa e sono interessato')
            ->get();
    }

    //metodo per ritornare il numero di offerte di locazione
    public function getNumOfferteLocazione(){
        return DB::table('messaggio')
            ->where('messaggio.contenuto', '=', 'Ciao, ho visto la casa e sono interessato')
            ->count();
    }

    //metodo per ritornare le offerte di locazione in base alla tipologia e alla data in stats
    public function getOfferteLocazioneByTipAndDate($tipologia, $data_init, $data_fin){
        return DB::table('messaggio')
            ->join('alloggio', 'messaggio.alloggio', '=', 'alloggio.id_alloggio')
            ->join('utente', 'messaggio.mittente', '=', 'utente.id')
            ->join('foto', 'messaggio.alloggio', '=', 'foto.alloggio')
            ->where('messaggio.contenuto', '=', 'Ciao, ho visto la casa e sono interessato')
            ->where('tipologia', $tipologia)
            ->where('data_interazione', '<', $data_fin)
            ->where('data_interazione', '>', $data_init)
            ->get();
    }

    //metodo per ritornare gli alloggi allocati con il loro locatario
    public function getAlloggiAllocati(){
        return DB::table('interazione')
            ->join('utente', 'interazione.utente', 'utente.id')
            ->join('alloggio', 'interazione.alloggio', 'alloggio.id_alloggio')
            ->join('foto', 'interazione.alloggio', '=', 'foto.alloggio')
            ->where('utente.ruolo', '=', 'locatario')
            ->get();
    }

    //metodo per ritornare il numero di alloggi allocati
    public function getNumAlloggiAllocati(){
        return DB::table('interazione')
            ->join('utente', 'interazione.utente', 'utente.id')
            ->where('utente.ruolo', 'locatario')
            ->count();
    }

    //metodo per ritornare gli alloggi allocati in base alla tipologia e alla data in stats
    public function getAlloggiAllocatiByTipAndDate($tipologia, $data_init, $data_fin){
        return DB::table('interazione')
            ->join('utente', 'interazione.utente', 'utente.id')
            ->join('alloggio', 'interazione.alloggio', 'alloggio.id_alloggio')
            ->join('foto', 'interazione.alloggio', '=', 'foto.alloggio')
            ->where('utente.ruolo', '=', 'locatario')
            ->where('tipologia', $tipologia)
            ->where('data_interazione', '<', $data_fin)
            ->where('data_interazione', '>', $data_init)
            ->get();
    }

    //metodo per ritornare tutti gli alloggi per visualizzarli in catalogo (si paginate)
    public function getAlloggi(){
        return Alloggio::paginate(3);
    }

    //metodo per tornare un'array di alloggi in base alla tipologia in catalogo (si paginate)
    public function getAlloggioByTip($tipologia){
        return Alloggio::where('tipologia', $tipologia)->paginate(3);
    }

    // metodo per tornare i dati di un locatario
    public function getDatiAdmin(){
        $admin = auth()->user()->getAuthIdentifier();

        return DB::table('utente')
            ->where('id', $admin)
            ->join('dati_personali', 'utente.dati_personali', '=', 'dati_personali.id_dati_personali')
            ->get();
    }
}
