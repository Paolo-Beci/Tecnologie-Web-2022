<?php

namespace App\Models;

use App\Models\Resources\Alloggio;
use App\Models\Resources\DatiPersonali;
use App\Models\Resources\Disponibilita;
use App\Models\Resources\Faq;
use App\Models\Resources\Foto;
use App\Models\Resources\Interazione;
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

    //metodo per ritornare un array contenente le città nelle quali si trovano tutti gli alloggi (senza doppioni)
    public function getCity() {
        $citta = Alloggio::select('citta')->distinct()->get();
        $lista_citta = array();
        $n = 0;
        foreach ($citta as $city) {
            $lista_citta[$n] = $city->citta;
            $n++;
        }
        return $lista_citta;
    }

    //metodo per il filtraggio
    public function getAlloggiFiltered($tipologia, $stato, $periodo, $genere, $piano, $num_posti_letto, $citta,
                                       $sup_min, $sup_max, $prezzo_min, $prezzo_max, $servizi, $num_camere_app, $tip_camera)
    {

        //caso indifferente
        if ($tipologia == 'NULL') {
            //prima effettua un filtraggio sulla tabella alloggi (senza join con disponibilità)
            $risultato = DB::table('alloggio')
                ->leftJoin('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
                ->whereIn('citta', $citta)
                ->whereIn('stato', $stato)
                ->whereIn('periodo_locazione', $periodo)
                ->whereIn('genere', $genere)
                ->whereIn('piano', $piano)
                ->whereIn('num_posti_letto_tot', $num_posti_letto)
                ->where('dimensione', '<', $sup_max)
                ->where('dimensione', '>', $sup_min)
                ->where('canone_affitto', '<', $prezzo_max)
                ->where('canone_affitto', '>', $prezzo_min);

            //se non sono stati spuntati servizi, ritorna gli alloggi precedentemente filtrati
            if ($servizi == []) {
                return $risultato
                    ->paginate(3);
            }
            //altrimenti fa un join con disponibilità e va a vedere quali alloggi hanno i servizi selezionati
            return $risultato
                ->leftJoin('disponibilita', 'alloggio.id_alloggio', '=', 'disponibilita.alloggio')
                ->whereIn('servizio', $servizi)
                /*select e distinct servono per avere in maniera univoca gli alloggi
                con tutti gli attributi che servono nelle viste*/
                ->select('alloggio.id_alloggio', 'alloggio.descrizione', 'alloggio.utenze',
                    'alloggio.canone_affitto', 'alloggio.periodo_locazione', 'alloggio.genere',
                    'alloggio.eta_minima', 'alloggio.eta_massima', 'alloggio.dimensione',
                    'alloggio.num_posti_letto_tot', 'alloggio.via', 'alloggio.citta',
                    'alloggio.num_civico', 'alloggio.cap', 'alloggio.interno',
                    'alloggio.piano', 'alloggio.data_inserimento_offerta',
                    'alloggio.tipologia', 'alloggio.stato', 'foto.id_foto',
                    'foto.estensione')
                ->distinct()
                ->paginate(3);
        }

        //caso appartamento (analogo al precedente)
        elseif ($tipologia == 'Appartamento') {
            $risultato = DB::table('alloggio')
                ->leftJoin('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
                ->leftJoin('appartamento', 'alloggio.id_alloggio', '=', 'appartamento.alloggio')
                ->where('tipologia', $tipologia)
                ->whereIn('citta', $citta)
                ->whereIn('stato', $stato)
                ->whereIn('periodo_locazione', $periodo)
                ->whereIn('genere', $genere)
                ->whereIn('piano', $piano)
                ->whereIn('num_posti_letto_tot', $num_posti_letto)
                ->where('dimensione', '<', $sup_max)
                ->where('dimensione', '>', $sup_min)
                ->where('canone_affitto', '<', $prezzo_max)
                ->where('canone_affitto', '>', $prezzo_min)
                ->whereIn('num_camere', $num_camere_app);

            if ($servizi == []) {
                return $risultato
                    ->paginate(3);
            }
            return $risultato
                ->leftJoin('disponibilita', 'alloggio.id_alloggio', '=', 'disponibilita.alloggio')
                ->whereIn('servizio', $servizi)
                ->select('alloggio.id_alloggio', 'alloggio.descrizione', 'alloggio.utenze',
                    'alloggio.canone_affitto', 'alloggio.periodo_locazione', 'alloggio.genere',
                    'alloggio.eta_minima', 'alloggio.eta_massima', 'alloggio.dimensione',
                    'alloggio.num_posti_letto_tot', 'alloggio.via', 'alloggio.citta',
                    'alloggio.num_civico', 'alloggio.cap', 'alloggio.interno',
                    'alloggio.piano', 'alloggio.data_inserimento_offerta',
                    'alloggio.tipologia', 'alloggio.stato', 'foto.id_foto',
                    'foto.estensione', 'appartamento.num_camere')
                ->distinct()
                ->paginate(3);
        }

        //caso posto letto (analogo al precedente)
        elseif ($tipologia == 'Posto_letto') {
            $risultato = DB::table('alloggio')
                ->leftJoin('foto', 'alloggio.id_alloggio', '=', 'foto.alloggio')
                ->leftJoin('posto_letto', 'alloggio.id_alloggio', '=', 'posto_letto.alloggio')
                ->where('tipologia', $tipologia)
                ->whereIn('citta', $citta)
                ->whereIn('stato', $stato)
                ->whereIn('periodo_locazione', $periodo)
                ->whereIn('genere', $genere)
                ->whereIn('piano', $piano)
                ->whereIn('num_posti_letto_tot', $num_posti_letto)
                ->where('dimensione', '<', $sup_max)
                ->where('dimensione', '>', $sup_min)
                ->where('canone_affitto', '<', $prezzo_max)
                ->where('canone_affitto', '>', $prezzo_min)
                ->whereIn('tipologia_camera', $tip_camera);

            if ($servizi == []) {
                return $risultato
                    ->paginate(3);
            }
            return $risultato
                ->leftJoin('disponibilita', 'alloggio.id_alloggio', '=', 'disponibilita.alloggio')
                ->whereIn('servizio', $servizi)
                ->select('alloggio.id_alloggio', 'alloggio.descrizione', 'alloggio.utenze',
                    'alloggio.canone_affitto', 'alloggio.periodo_locazione', 'alloggio.genere',
                    'alloggio.eta_minima', 'alloggio.eta_massima', 'alloggio.dimensione',
                    'alloggio.num_posti_letto_tot', 'alloggio.via', 'alloggio.citta',
                    'alloggio.num_civico', 'alloggio.cap', 'alloggio.interno',
                    'alloggio.piano', 'alloggio.data_inserimento_offerta',
                    'alloggio.tipologia', 'alloggio.stato', 'foto.id_foto',
                    'foto.estensione', 'posto_letto.tipologia_camera')
                ->distinct()
                ->paginate(3);
        }

    }

    public function getDatiContratto($locatore, $locatario, $alloggio) {

        $dati = array();

        $dati['locatore'] = User::leftJoin('dati_personali', 'utente.dati_personali', '=', 'dati_personali.id_dati_personali')
            ->where('utente.id', $locatore)
            ->get()[0];

        $dati['locatario'] = User::leftJoin('dati_personali', 'utente.dati_personali', '=', 'dati_personali.id_dati_personali')
            ->where('utente.id', $locatario)
            ->get()[0];

        $dati['alloggio'] = Alloggio::find($alloggio);

        $dati['interazione'] = Interazione::where('utente', $locatario)
                                          ->where('alloggio', $alloggio)
                                          ->get()[0];

        // echo "<pre>" . print_r($dati, true) . "</pre>"; 

        return $dati;

    }

}
