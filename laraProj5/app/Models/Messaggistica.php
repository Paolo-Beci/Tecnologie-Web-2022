<?php

namespace App\Models;

use App\Models\Resources\Messaggio;

class Messaggistica {

    public function getUserMessages() {

        $user_id = auth()->user()->getAuthIdentifier();

        return Messaggio::select('messaggio.data_invio', 'messaggio.contenuto', 'messaggio.stato',
                                'messaggio.alloggio', 'mittente.username as mittente',
                                'destinatario.username as destinatario')
                        ->leftJoin('utente as mittente', 'messaggio.mittente', '=', 'mittente.id')
                        ->leftJoin('utente as destinatario', 'messaggio.destinatario', '=', 'destinatario.id')
                        ->where('mittente', $user_id)
                        ->orWhere('destinatario', $user_id)
                        ->orderBy('messaggio.data_invio', 'DESC')
                        ->get();
    }

}