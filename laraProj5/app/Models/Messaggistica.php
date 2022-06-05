<?php

namespace App\Models;

use App\Models\Resources\Messaggio;
use App\Models\Resources\User;

class Messaggistica {

    public function getUserMessages() {

        $user_id = auth()->user()->getAuthIdentifier();

        return Messaggio::select('messaggio.data_invio', 'messaggio.contenuto',
                                'messaggio.alloggio', 'mittente.username as mittente',
                                'destinatario.username as destinatario')
                        ->leftJoin('utente as mittente', 'messaggio.mittente', '=', 'mittente.id')
                        ->leftJoin('utente as destinatario', 'messaggio.destinatario', '=', 'destinatario.id')
                        ->where('mittente', $user_id)
                        ->orWhere('destinatario', $user_id)
                        ->orderBy('messaggio.data_invio', 'DESC')
                        ->get();
    }

    public function createMessage($contenuto, $mittente, $destinatario, $alloggio) {

        return Messaggio::create([
            'data_invio' => date('Y-m-d H:i:s'),
            'contenuto' => $contenuto,
            'mittente' => $mittente,
            'destinatario' => $destinatario,
            'alloggio' => $alloggio
        ]);

    }

}