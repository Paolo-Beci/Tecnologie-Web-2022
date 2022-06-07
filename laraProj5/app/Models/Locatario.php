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
            ->leftJoin('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
            ->paginate(3);
    }

    //metodo per tornare un'array di alloggi in base alla tipologia
    public function getAlloggioByTip($tipologia){
        return DB::table('alloggio')
            ->where('tipologia', $tipologia)
            ->leftJoin('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
            ->paginate(3);
    }

    //funzione che torna l'istanza dell'alloggio considerato insieme alle sue foto e alle info del locatore
    public function getAlloggio($idAlloggio, $tipologia){
        if($tipologia == 'Appartamento'){
            return DB::table('alloggio')
                ->where('id_alloggio', $idAlloggio)
                ->leftJoin('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
                ->leftJoin('interazione', 'alloggio.id_alloggio', '=', 'interazione.alloggio')
                ->leftJoin('disponibilita', 'alloggio.id_alloggio', '=', 'disponibilita.alloggio')
                ->leftJoin('utente', 'interazione.utente', '=', 'utente.id')
                ->where('ruolo','=', 'locatore')
                ->leftJoin('dati_personali', 'utente.dati_personali', '=', 'dati_personali.id_dati_personali')
                ->leftJoin('appartamento', 'alloggio.id_alloggio', '=', 'appartamento.alloggio')
                ->get();
        }
        else{
            return DB::table('alloggio')
                ->where('id_alloggio', $idAlloggio)
                ->leftJoin('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
                ->leftJoin('interazione', 'alloggio.id_alloggio', '=', 'interazione.alloggio')
                ->leftJoin('disponibilita', 'alloggio.id_alloggio', '=', 'disponibilita.alloggio')
                ->leftJoin('utente', 'interazione.utente', '=', 'utente.id')
                ->where('ruolo', '=', 'locatore')
                ->leftJoin('dati_personali', 'utente.dati_personali', '=', 'dati_personali.id_dati_personali')
                ->leftJoin('posto_letto', 'alloggio.id_alloggio', '=', 'posto_letto.alloggio')
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
            ->leftJoin('interazione', 'alloggio.id_alloggio', '=', 'interazione.alloggio')
            ->leftJoin('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
            ->where('utente', $locatario)
            ->orderBy('data_interazione', 'DESC')
            ->paginate(3);
    }

    // metodo per tornare i dati di un locatario
    public function getDatiLocatario(){
        $locatario = auth()->user()->getAuthIdentifier();

        return DB::table('utente')
            ->where('id', $locatario)
            ->leftJoin('dati_personali', 'utente.dati_personali', '=', 'dati_personali.id_dati_personali')
            ->get();
    }

    //funzioni di filtro (una funzione per ogni parametro)
    public function getAlloggiByCity($citta) {
        return DB::table('alloggio')
            ->leftJoin('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
            ->where('citta', $citta)
            ->paginate(3);
    }

    public function getAlloggiByStato($stato) {
        return DB::table('foto')
            ->join('alloggio', 'foto.alloggio', '=', 'alloggio.id_alloggio')
            ->whereIn('stato', $stato)
            ->paginate(3);
    }

    public function getAlloggiByFasciaPrezzo($prezzo_min = 0, $prezzo_max = 999999) {
        return DB::table('alloggio')
            ->leftJoin('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
            ->where('canone_affitto', '<', $prezzo_max)
            ->where('canone_affitto', '>', $prezzo_min)
            ->get();
    }

    public function getAlloggiByPeriodoLocazione($periodo) {
        return DB::table('alloggio')
            ->leftJoin('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
            ->where('periodo_locazione', $periodo)
            ->get();
    }

    public function getAlloggiByFasciaSup($sup_min = 0, $sup_max = 999999) {
        return DB::table('alloggio')
            ->leftJoin('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
            ->where('dimensione', '<', $sup_max)
            ->where('dimensione', '>', $sup_min)
            ->get();
    }

    public function getAlloggiByNumCamere($num_camere) {
        return DB::table('alloggio')
            ->leftJoin('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
            ->leftJoin('appartamento', 'foto.alloggio', '=', 'appartamento.alloggio')
            ->where('num_camere', $num_camere)
            ->get();
    }

    public function getAlloggiByGenere($genere) {
        return DB::table('alloggio')
            ->leftJoin('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
            ->where('genere', $genere)
            ->get();
    }

    public function getAlloggiByPiano($piano) {
        return DB::table('alloggio')
            ->leftJoin('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
            ->where('piano', $piano)
            ->get();
    }

    public function getAlloggiByNumPostiLettoApp($num_posti_letto_app) {
        return DB::table('alloggio')
            ->leftJoin('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
            ->where('num_posti_letto_tot', $num_posti_letto_app)
            ->where('tipologia', 'Appartamento')
            ->get();
    }

    public function getAlloggiByNumPostiLettoCamere($num_posti_letto_camere) {
        return DB::table('alloggio')
            ->leftJoin('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
            ->where('num_posti_letto_tot', $num_posti_letto_camere)
            ->where('tipologia', 'Posto_letto')
            ->get();
    }

    public function getAlloggiByTipoPostoLetto($tipo) {
        return DB::table('alloggio')
            ->leftJoin('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
            ->leftJoin('posto_letto', 'foto.alloggio', '=', 'posto_letto.alloggio')
            ->where('tipologia_camera', $tipo)
            ->get();
    }

    public function getAlloggiFiltered($stato, $periodo,  $genere, $piano, $citta,
                                       $sup_min, $sup_max, $prezzo_min, $prezzo_max) {

        return DB::table('alloggio')
            ->leftJoin('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
            ->where('citta', $citta)
            ->whereIn('stato', $stato)
            ->whereIn('periodo_locazione', $periodo)
            ->whereIn('genere', $genere)
            ->whereIn('piano', $piano)
            ->where('dimensione', '<', $sup_max)
            ->where('dimensione', '>', $sup_min)
            ->where('canone_affitto', '<', $prezzo_max)
            ->where('canone_affitto', '>', $prezzo_min)
            ->paginate(3);
    }

}
