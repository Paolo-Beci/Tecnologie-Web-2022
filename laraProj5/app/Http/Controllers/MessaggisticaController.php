<?php

namespace App\Http\Controllers;

use App\Models\Messaggistica;

class MessaggisticaController extends Controller {

    protected $_messaggisticaModel;

    public function __construct() {
        $this->middleware('can:messaggistica');
        $this->_messaggisticaModel = new Messaggistica();
    }

    public function showMessaggistica() {
        
        $auth_username = auth()->user()->username;

        $messages = $this->_messaggisticaModel->getUserMessages();
        
        $contacts = array();

        // Generazione primo livello array contact. Alloggi
        foreach($messages as $message) {

            $alloggio = $message->alloggio;

            if(!array_key_exists($alloggio, $contacts))
                $contacts[$alloggio] = array();
            // else
            //     array_push($contacts[$alloggio], $message);
        }

        // Generazione secondo livello array contact. Username
        foreach($messages as $message) {

            $alloggio = $message->alloggio;
            $mittente = $message->mittente;
            $destinatario = $message->destinatario;

            if($mittente != $auth_username && !array_key_exists($mittente, $contacts[$alloggio]))
                $contacts[$alloggio][$mittente] = array();

            if($destinatario != $auth_username && !array_key_exists($destinatario, $contacts[$alloggio]))
                $contacts[$alloggio][$destinatario] = array();

        }

        // Generazione terzo livello array contact. Giorno. Popolazione dell'array
        foreach($messages as $message) {

            $alloggio = $message->alloggio;
            $mittente = $message->mittente;
            $destinatario = $message->destinatario;
            $message_date = date("d F Y", strtotime($message->data_invio));

            if(array_key_exists($mittente, $contacts[$alloggio])) {
                if(!array_key_exists($message_date, $contacts[$alloggio][$mittente]))
                    $contacts[$alloggio][$mittente][$message_date] = array($message);
                else
                    array_push($contacts[$alloggio][$mittente][$message_date], $message);
            }
            
            if(array_key_exists($destinatario, $contacts[$alloggio])) {
                if(!array_key_exists($message_date, $contacts[$alloggio][$destinatario]))
                    $contacts[$alloggio][$destinatario][$message_date] = array($message);
                else
                    array_push($contacts[$alloggio][$destinatario][$message_date], $message);
            }
            
        }


        // echo "<pre>".print_r($contacts, true)."</pre>";

        return view('messaging')
            ->with('contacts', $contacts);

    }

}
