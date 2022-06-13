<?php

namespace App\Models;

use App\Models\Resources\Alloggio;
use App\Models\Resources\Interazione;
use App\Models\Resources\Messaggio;
use App\Models\Resources\User;

class Messaggistica {

    // Ritorna tutti i messaggi(mandati e ricevuti) relativi all'utente autenticato
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

    public function getAlloggi() {
        return Alloggio::get();
    }

    // Ritorna un array map in cui all'id di un utente viene associata una stringa
    // che indica il nome del file della foto profilo
    public function getUsersPhoto() {
        $utenti = User::select('utente.id', 'id_foto_profilo', 'estensione_p')
            ->leftJoin('dati_personali', 'utente.dati_personali', '=', 'dati_personali.id_dati_personali')
            ->get();

        $usersPhoto = array();

        foreach($utenti as $utente) {
            $profilePhoto = $utente->id_foto_profilo . $utente->estensione_p;
            $usersPhoto[$utente->id] = $profilePhoto;
        }
        
        return $usersPhoto;

    }

    // Ritorna un array map a in cui allo username di un utente associa il suo id
    public function getUsernameIdUsers() {
        $utenti = User::select('id', 'username')->get();

        $usernameIdUsers = array();

        foreach($utenti as $utente) {
            $usernameIdUsers[$utente->username] = $utente->id;
        }
        
        return $usernameIdUsers;
    }

    // Funzione che modifica lo stato di un alloggio da libero a locato e crea una istanza
    // di interazione tra l'alloggio e il locatario a cui esso è stato assagnato
    public function setAssegnamento($idAlloggio, $locatario) {

        $alloggio = Alloggio::find($idAlloggio);

        $alloggio->stato = 'locato';

        $alloggio->save();

        Interazione::create([
            'utente' => $locatario,
            'alloggio' => $idAlloggio,
            'data_interazione' => now()
        ]);

    }

}