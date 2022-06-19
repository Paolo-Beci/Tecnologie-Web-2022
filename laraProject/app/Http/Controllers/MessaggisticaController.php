<?php

namespace App\Http\Controllers;

use App\Models\Messaggistica;
use Illuminate\Http\Request;

class MessaggisticaController extends Controller {

    protected $_messaggisticaModel;

    public function __construct() {
        $this->middleware('can:messaggistica');
        $this->_messaggisticaModel = new Messaggistica();
    }

    public function showMessaggistica() {

        $authUsername = auth()->user()->username;

        //prendo i mex relativi all'username
        $messages = $this->_messaggisticaModel->getUserMessages();

        $contacts = array();

        // Generazione primo livello array contact. Alloggi(IDalloggio)
        //E' stato creato questo livello perché altrimenti non saremmo riusciti a distinguere due alloggi
        // opzionati da uno stesso locatore relativi ad uno stesso locatario, quindi sarebbero comparsi
        // nella stessa chat
        foreach($messages as $message) {

            $alloggio = $message->alloggio;

            //nell'array avrò alloggi distinti
            if(!array_key_exists($alloggio, $contacts))
                $contacts[$alloggio] = array();

        }

        // Generazione secondo livello array contact. Username
        foreach($messages as $message) {

            $alloggio = $message->alloggio;
            $mittente = $message->mittente;
            $destinatario = $message->destinatario;

            //Controllo per non far visualizzare all'utente loggato una chat con sè stesso
            //Controllo inoltre i messaggi che vengono inviati all'utente loggato
            if($mittente != $authUsername && !array_key_exists($mittente, $contacts[$alloggio]))
                $contacts[$alloggio][$mittente] = array();

            //Controllo i messaggi che vengono inviati dall'utente loggato, infatti controllo che io non
            //sia il destinatario
            if($destinatario != $authUsername && !array_key_exists($destinatario, $contacts[$alloggio]))
                $contacts[$alloggio][$destinatario] = array();

        }

        // Generazione terzo livello array contact. Giorno. Popolazione del terzo livello
        //Suddivido in giorni le chat
        foreach($messages as $message) {

            $alloggio = $message->alloggio;
            $mittente = $message->mittente;
            $destinatario = $message->destinatario;
            //strtotime() torna l'istante d'invio come un intero UNIX
            //date() trasforma l'intero UNIX nel formato specificato
            $messageDate = date("d F Y", strtotime($message->data_invio));

            //verifico se dentro ogni array Alloggio è presente il mittente indicato
            if(array_key_exists($mittente, $contacts[$alloggio])) {
                //verifico se dentro il mittente non è presente la data indicata
                if(!array_key_exists($messageDate, $contacts[$alloggio][$mittente]))
                    //popolo il terzo livello con un array di mex
                    //E' un array perché i mex relativi a quel giorno possono essere più di uno
                    $contacts[$alloggio][$mittente][$messageDate] = array($message);
                else
                    //se la data già esiste, allora mi basta inserire il mex nell'array
                    array_push($contacts[$alloggio][$mittente][$messageDate], $message);
            }

            //stesso discorso per il destinatario
            if(array_key_exists($destinatario, $contacts[$alloggio])) {
                if(!array_key_exists($messageDate, $contacts[$alloggio][$destinatario]))
                    $contacts[$alloggio][$destinatario][$messageDate] = array($message);
                else
                    array_push($contacts[$alloggio][$destinatario][$messageDate], $message);
            }

        }

        //echo "<pre>".print_r($contacts, true)."</pre>";

        return view('messaging')
            ->with('authUser', auth()->user())
            ->with('usernameIdUsers', $this->_messaggisticaModel->getusernameIdUsers())
            ->with('usersPhoto', $this->_messaggisticaModel->getUsersPhoto())
            ->with('contacts', $contacts)
            ->with('alloggi', $this->_messaggisticaModel->getAlloggi());

    }

    public function sendMessage(Request $request) {

        $message = $request->all();

        $messageCreated = $this->_messaggisticaModel->createMessage($message['contenuto'], $message['mittente'],
                                                $message['destinatario'], $message['alloggio']);

        //Dati in json relativi al mex ritornati alla view
        //Info utili per la creazione del mex nella view
        return response()->json([
            'contenuto' => $messageCreated->contenuto,
            'data_invio' => date("d F Y", strtotime($messageCreated->data_invio)),
            'ora_invio' => date('H:i', strtotime($messageCreated->data_invio))]);

    }

    // Funzione che permette ad un locatario che visualizza un alloggio libero di opzionarlo mandando
    // un messaggio al locatore relativo all'alloggio e ridireziona alla pagina di messaggistica
    public function opzionamento(Request $request) {

        $message = $request->all();

        $this->_messaggisticaModel->createMessage($message['contenuto'], $message['mittente'],
                                                  $message['destinatario'], $message['alloggio']);

        return redirect()->route('messaggistica');

    }

    public function assegnamento(Request $request) {

        $message = $request->all();

        $messageCreated = $this->_messaggisticaModel->createMessage($message['contenuto'], $message['mittente'],
                                                $message['destinatario'], $message['alloggio']);

        $this->_messaggisticaModel->setAssegnamento($message['alloggio'], $message['destinatario']);

        return response()->json([
            'contenuto' => $messageCreated->contenuto,
            'data_invio' => date("d F Y", strtotime($messageCreated->data_invio)),
            'ora_invio' => date('H:i', strtotime($messageCreated->data_invio)),
            'stato' => 'locato']);

    }

}
