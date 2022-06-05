<?php

namespace App\Models;

use App\Models\Resources\Alloggio;
use App\Models\Resources\DatiPersonali;
use App\Models\Resources\Disponibilita;
use App\Models\Resources\Faq;
use App\Models\Resources\Foto;
use App\Models\Resources\User;
use Illuminate\Support\Facades\DB;

class Locatario {

    //metodo per tornare un' array di faq in base a un target dato
    public function getFaqByTarget($target){
        return Faq::where('target', $target)->get();
    }

    //metodo che torna gli alloggi insieme alle info sulle foto
    public function getAlloggi(){
        return DB::table('alloggio')
            ->join('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
            ->paginate(3);
    }

    //metodo per tornare un'array di alloggi in base alla tipologia
    public function getAlloggioByTip($tipologia){
        return DB::table('alloggio')
            ->where('tipologia', $tipologia)
            ->join('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
            ->paginate(3);
    }

    //funzione che torna l'istanza dell'alloggio considerato insieme alle sue foto e alle info del locatore
    public function getAlloggio($idAlloggio, $tipologia){
        if($tipologia == 'Appartamento'){
            return DB::table('alloggio')
                ->where('id_alloggio', $idAlloggio)
                ->join('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
                ->join('interazione', 'alloggio.id_alloggio', '=', 'interazione.alloggio')
                ->join('disponibilita', 'alloggio.id_alloggio', '=', 'disponibilita.alloggio')
                ->join('utente', 'interazione.utente', '=', 'utente.id')
                ->where('ruolo','=', 'locatore')
                ->join('dati_personali', 'utente.dati_personali', '=', 'dati_personali.id_dati_personali')
                ->join('appartamento', 'alloggio.id_alloggio', '=', 'appartamento.alloggio')
                ->get();
        }
        else{
            return DB::table('alloggio')
                ->where('id_alloggio', $idAlloggio)
                ->join('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
                ->join('interazione', 'alloggio.id_alloggio', '=', 'interazione.alloggio')
                ->join('disponibilita', 'alloggio.id_alloggio', '=', 'disponibilita.alloggio')
                ->join('utente', 'interazione.utente', '=', 'utente.id')
                ->where('ruolo', '=', 'locatore')
                ->join('dati_personali', 'utente.dati_personali', '=', 'dati_personali.id_dati_personali')
                ->join('posto_letto', 'alloggio.id_alloggio', '=', 'posto_letto.alloggio')
                ->get();
        }
    }

    //non serve
    public function getFotoAlloggio($id_alloggio)
    {
        return Foto::where('alloggio', $id_alloggio)->get();
    }

    //non serve
    public function getServiziAlloggio($id_alloggio)
    {
        return Disponibilita::where('alloggio', $id_alloggio)->get();
    }

    //metodo per tornare un' array di alloggi locati da un locatario
    public function getStoricoAlloggiByLocatario(){
        $locatario = auth()->user()->getAuthIdentifier();

        // ordinarlo per la data di locazione

        return DB::table('alloggio')   // TO DO
            ->join('interazione', 'alloggio.id_alloggio', '=', 'interazione.alloggio')
            ->join('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
            ->where('utente', $locatario)
            ->orderBy('data_interazione', 'DESC')
            ->paginate(3);
    }

    // metodo per tornare i dati di un locatario
    public function getDatiLocatario(){
        $locatario = auth()->user()->getAuthIdentifier();

        return DB::table('utente')
            ->where('id', $locatario)
            ->join('dati_personali', 'utente.dati_personali', '=', 'dati_personali.id_dati_personali')
            ->get();
    }

    //funzioni di filtro (una funzione per ogni parametro)
    public function getAlloggiByCity($citta) {

    }

    public function getAlloggiByFasciaPrezzo($prezzo_min = 0, $prezzo_max = 999999) {

    }

    public function getAlloggiByPeriodoLocazione($periodo) {

    }

    public function getAlloggiByFasciaSup($sup_min = 0, $sup_max = 999999) {

    }

    public function getAlloggiByNumCamere($num_camere) {

    }

    public function getAlloggiByGenere($genere) {

    }

    public function getAlloggiByPiano($piano) {

    }

    public function getAlloggiByNumPostiLettoApp($num_posti_letto_app) {

    }

    public function getAlloggiByNumPostiLettoCamere($num_posti_letto_camere) {

    }

    public function getAlloggiByTipoPostoLetto($tipo) {

    }

    //funzione per filtrare gli alloggi con tutti i parametri di filtro in input
    public function getAlloggiFiltered(/*lista di parametri*/) {

    }

}
