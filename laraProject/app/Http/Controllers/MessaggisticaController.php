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

        $messages = $this->_messaggisticaModel->getUserMessages();

        $contacts = array();

        // Generazione primo livello array contact. Alloggi
        foreach($messages as $message) {

            $alloggio = $message->alloggio;

            if(!array_key_exists($alloggio, $contacts))
                $contacts[$alloggio] = array();

        }

        // Generazione secondo livello array contact. Username
        foreach($messages as $message) {

            $alloggio = $message->alloggio;
            $mittente = $message->mittente;
            $destinatario = $message->destinatario;

            if($mittente != $authUsername && !array_key_exists($mittente, $contacts[$alloggio]))
                $contacts[$alloggio][$mittente] = array();

            if($destinatario != $authUsername && !array_key_exists($destinatario, $contacts[$alloggio]))
                $contacts[$alloggio][$destinatario] = array();

        }

        // Generazione terzo livello array contact. Giorno. Popolazione dell'array
        foreach($messages as $message) {

            $alloggio = $message->alloggio;
            $mittente = $message->mittente;
            $destinatario = $message->destinatario;
            $messageDate = date("d F Y", strtotime($message->data_invio));

            if(array_key_exists($mittente, $contacts[$alloggio])) {
                if(!array_key_exists($messageDate, $contacts[$alloggio][$mittente]))
                    $contacts[$alloggio][$mittente][$messageDate] = array($message);
                else
                    array_push($contacts[$alloggio][$mittente][$messageDate], $message);
            }
            
            if(array_key_exists($destinatario, $contacts[$alloggio])) {
                if(!array_key_exists($messageDate, $contacts[$alloggio][$destinatario]))
                    $contacts[$alloggio][$destinatario][$messageDate] = array($message);
                else
                    array_push($contacts[$alloggio][$destinatario][$messageDate], $message);
            }
            
        }

        // echo "<pre>".print_r($contacts, true)."</pre>";

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