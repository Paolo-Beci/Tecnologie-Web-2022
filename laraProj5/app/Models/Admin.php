<?php

namespace App\Models;

use App\Models\Resources\Alloggio;
use App\Models\Resources\DatiPersonali;
use App\Models\Resources\Faq;
use App\Models\Resources\Interazione;
use App\Models\Resources\Messaggio;
use App\Models\Resources\User;

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
        return Alloggio::leftJoin('interazione', 'alloggio.id_alloggio', '=', 'interazione.alloggio')
            ->leftJoin('utente', 'interazione.utente', '=', 'utente.id')
            ->leftJoin('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
            ->where('utente.ruolo', 'locatore')
            ->get();
    }

    //metodo per tornare un'array di alloggi in base alla tipologia e alla data in stats
    public function getOfferteAlloggioByTipAndDate($tipologia, $data_init, $data_fin){
        return Alloggio::leftJoin('interazione', 'alloggio.id_alloggio', '=', 'interazione.alloggio')
            ->leftJoin('utente', 'interazione.utente', '=', 'utente.id')
            ->leftJoin('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
            ->where('utente.ruolo', '=','locatore')
            ->whereIn('tipologia', $tipologia)
            ->where('data_inserimento_offerta', '<=', $data_fin)
            ->where('data_inserimento_offerta', '>=', $data_init)
            ->get();
    }

    //metodo per ritornare le offerte di locazione (alloggi che interessano, tramite messaggio, a qualcuno)
    public function getOfferteLocazione(){
        return Messaggio::join('alloggio', 'messaggio.alloggio', '=', 'alloggio.id_alloggio')
            ->join('utente', 'messaggio.mittente', '=', 'utente.id')
            ->join('foto', 'messaggio.alloggio', '=', 'foto.alloggio')
            ->where('messaggio.contenuto', '=', '<span>Ciao, ho visto la casa e sono interessato!</span>')
            ->get();
    }

    //metodo per ritornare il numero di offerte di locazione
    public function getNumOfferteLocazione(){
        return Messaggio::where('messaggio.contenuto', '=', '<span>Ciao, ho visto la casa e sono interessato!</span>')
            ->count();
    }

    //metodo per ritornare le offerte di locazione in base alla tipologia e alla data in stats
    public function getOfferteLocazioneByTipAndDate($tipologia, $data_init, $data_fin){
        return Messaggio::leftJoin('alloggio', 'messaggio.alloggio', '=', 'alloggio.id_alloggio')
            ->leftJoin('utente', 'messaggio.mittente', '=', 'utente.id')
            ->leftJoin('foto', 'messaggio.alloggio', '=', 'foto.alloggio')
            ->where('messaggio.contenuto', '=', '<span>Ciao, ho visto la casa e sono interessato!</span>')
            ->whereIn('tipologia', $tipologia)
            ->where('data_invio', '<=', $data_fin)
            ->where('data_invio', '>=', $data_init)
            ->get();
    }

    //metodo per ritornare gli alloggi allocati con il loro locatario
    public function getAlloggiAllocati(){
        return Interazione::leftJoin('utente', 'interazione.utente', 'utente.id')
            ->leftJoin('alloggio', 'interazione.alloggio', 'alloggio.id_alloggio')
            ->leftJoin('foto', 'interazione.alloggio', '=', 'foto.alloggio')
            ->where('utente.ruolo', '=', 'locatario')
            ->get();
    }

    //metodo per ritornare il numero di alloggi allocati
    public function getNumAlloggiAllocati(){
        return Interazione::leftJoin('utente', 'interazione.utente', 'utente.id')
            ->where('utente.ruolo', 'locatario')
            ->count();
    }

    //metodo per ritornare gli alloggi allocati in base alla tipologia e alla data in stats
    public function getAlloggiAllocatiByTipAndDate($tipologia, $data_init, $data_fin){
        return Interazione::leftJoin('utente', 'interazione.utente', 'utente.id')
            ->leftJoin('alloggio', 'interazione.alloggio', 'alloggio.id_alloggio')
            ->leftJoin('foto', 'interazione.alloggio', '=', 'foto.alloggio')
            ->where('utente.ruolo', '=', 'locatario')
            ->whereIn('tipologia', $tipologia)
            ->where('data_interazione', '<=', $data_fin)
            ->where('data_interazione', '>=', $data_init)
            ->get();
    }

    //metodo per ritornare tutti gli alloggi per visualizzarli in catalogo (si paginate)
    //metodo che torna gli alloggi insieme alle info sulle foto
    public function getAlloggi(){
        return Alloggio::leftJoin('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
            ->paginate(3);
    }

    //metodo per tornare un'array di alloggi in base alla tipologia
    public function getAlloggioByTip($tipologia){
        return Alloggio::where('tipologia', $tipologia)
            ->leftJoin('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
            ->paginate(3);
    }

    // metodo per tornare i dati di un locatario
    public function getDatiAdmin(){
        $admin = auth()->user()->getAuthIdentifier();

        return User::where('id', $admin)
            ->leftJoin('dati_personali', 'utente.dati_personali', '=', 'dati_personali.id_dati_personali')
            ->get();
    }
}
