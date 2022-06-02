<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run() {

        DB::table('dati_personali')->insert([
            ['id_dati_personali' => 1, 'id_foto_profilo' => 1, 'estensione_p' => '.jpg', 'cellulare' => 3256425968, 'via' => 'Via brecce bianche', 'citta' => 'Ancona', 'num_civico' => 4, 'cap' => 60123, 'nome' => 'Paolo', 'cognome' => 'Beci', 'data_nascita' => '2000-07-22', 'luogo_nascita' => 'Fabriano', 'sesso' => 'm', 'mail' => 'paolo.beci@gmail.com', 'codice_fiscale' => 'BCEPLA00L22D451H'],
            ['id_dati_personali' => 2, 'id_foto_profilo' => 2, 'estensione_p' => '.jpg', 'cellulare' => NULL, 'via' => 'Via brecce bianche', 'citta' => 'Ancona', 'num_civico' => 25, 'cap' => 60123, 'nome' => 'Giuseppe', 'cognome' => 'Izzi', 'data_nascita' => '2000-07-26', 'luogo_nascita' => 'Vasto', 'sesso' => 'm', 'mail' => 'izzi.g@gmail.com', 'codice_fiscale' => 'SCCPRM10D08H501W'],
            ['id_dati_personali' => 3, 'id_foto_profilo' => NULL, 'estensione_p' => NULL, 'cellulare' => 4568235971, 'via' => 'Via brecce bianche', 'citta' => 'Ancona', 'num_civico' => 23, 'cap' => 60123, 'nome' => 'Domenico', 'cognome' => 'La Porta', 'data_nascita' => '2000-05-10', 'luogo_nascita' => 'San Marco in Lamis', 'sesso' => 'm', 'mail' => 'd.laporta@gmail.com', 'codice_fiscale' => 'SCCPRM08S24H501C'],
            ['id_dati_personali' => 4, 'id_foto_profilo' => 3, 'estensione_p' => '.jpg', 'cellulare' => 3225874691, 'via' => 'Via brecce bianche', 'citta' => 'Ancona', 'num_civico' => 45, 'cap' => 60123, 'nome' => 'Emanuele', 'cognome' => 'Frisi', 'data_nascita' => '2000-11-03', 'luogo_nascita' => 'Foggia', 'sesso' => 'm', 'mail' => NULL, 'codice_fiscale' => 'FRSMNL00E11D643V'],
        ]);

        DB::table('utente')->insert([
            ['username' => 'lorelore', 'password' => Hash::make('BFbDeT62'), 'ruolo' => 'locatore', 'dati_personali' => 1],
            ['username' => 'lariolario', 'password' => Hash::make('BFbDeT62'), 'ruolo' => 'locatario', 'dati_personali' => 2],
            ['username' => 'lariolario2', 'password' => Hash::make('BFbDeT62'), 'ruolo' => 'locatario', 'dati_personali' => 3],
            ['username' => 'adminadmin', 'password' => Hash::make('BFbDeT62'), 'ruolo' => 'admin', 'dati_personali' => 4],
        ]);

        DB::table('alloggio')->insert([
            ['id_alloggio' => 1, 'descrizione' => 'Bellissimo appartamento arredato con nuovo mobilio', 'utenze' => 80, 'canone_affitto' => 500, 'periodo_locazione' => 12, 'genere' => 'u', 'eta_minima' => 18, 'eta_massima' => 35, 'dimensione' => 150, 'num_posti_letto_tot' => NULL, 'via' => 'Via della vittoria', 'citta' => 'Ancona', 'num_civico' => 43, 'cap' => 60123, 'interno' => 5, 'piano' => 1, 'data_inserimento_offerta' => now(), 'tipologia' => 'Appartamento'],
            ['id_alloggio' => 2, 'descrizione' => 'Bellissimo posto letto singolo arredato con nuovo mobilio', 'utenze' => NULL, 'canone_affitto' => 200, 'periodo_locazione' => 9, 'genere' => 'm', 'eta_minima' => 18, 'eta_massima' => 30, 'dimensione' => 30, 'num_posti_letto_tot' => 4, 'via' => 'Via Cesare Battisti', 'citta' => 'Ancona', 'num_civico' => 11, 'cap' => 60123, 'interno' => 3, 'piano' => 1, 'data_inserimento_offerta' => now(), 'tipologia' => 'Posto_letto'],
            ['id_alloggio' => 3, 'descrizione' => NULL, 'utenze' => 60, 'canone_affitto' => 250, 'periodo_locazione' => 6, 'genere' => 'f', 'eta_minima' => 18, 'eta_massima' => 30, 'dimensione' => NULL, 'num_posti_letto_tot' => 3, 'via' => 'Via Vito Volterra', 'citta' => 'Ancona', 'num_civico' => 26, 'cap' => 60123, 'interno' => NULL, 'piano' => NULL, 'data_inserimento_offerta' => now(), 'tipologia' => 'Posto_letto'],
            ['id_alloggio' => 4, 'descrizione' => 'Bellissimo appartamento arredato con nuovo mobilio', 'utenze' => 80, 'canone_affitto' => 500, 'periodo_locazione' => 12, 'genere' => 'u', 'eta_minima' => 18, 'eta_massima' => 35, 'dimensione' => 150, 'num_posti_letto_tot' => NULL, 'via' => 'Via della vittoria', 'citta' => 'Ancona', 'num_civico' => 43, 'cap' => 60123, 'interno' => 5, 'piano' => 1, 'data_inserimento_offerta' => now(), 'tipologia' => 'Appartamento'],
            ['id_alloggio' => 5, 'descrizione' => 'Bellissimo posto letto singolo arredato con nuovo mobilio', 'utenze' => NULL, 'canone_affitto' => 200, 'periodo_locazione' => 9, 'genere' => 'm', 'eta_minima' => 18, 'eta_massima' => 30, 'dimensione' => 30, 'num_posti_letto_tot' => 4, 'via' => 'Via Cesare Battisti', 'citta' => 'Ancona', 'num_civico' => 11, 'cap' => 60123, 'interno' => 3, 'piano' => 1, 'data_inserimento_offerta' => now(), 'tipologia' => 'Posto_letto'],
            ['id_alloggio' => 6, 'descrizione' => NULL, 'utenze' => 60, 'canone_affitto' => 250, 'periodo_locazione' => 6, 'genere' => 'f', 'eta_minima' => 18, 'eta_massima' => 30, 'dimensione' => NULL, 'num_posti_letto_tot' => 3, 'via' => 'Via Vito Volterra', 'citta' => 'Ancona', 'num_civico' => 26, 'cap' => 60123, 'interno' => NULL, 'piano' => NULL, 'data_inserimento_offerta' => now(), 'tipologia' => 'Posto_letto'],
        ]);

        DB::table('appartamento')->insert([
            ['id_appartamento' => 1, 'num_camere' => 5, 'alloggio' => 1],
            ['id_appartamento' => 2, 'num_camere' => 5, 'alloggio' => 4],
        ]);

        DB::table('posto_letto')->insert([
            ['id_posto_letto' => 1, 'tipologia_camera' => 'Doppia', 'alloggio' => 2],
            ['id_posto_letto' => 2, 'tipologia_camera' => 'Singola', 'alloggio' => 3],
            ['id_posto_letto' => 3, 'tipologia_camera' => 'Doppia', 'alloggio' => 5],
            ['id_posto_letto' => 4, 'tipologia_camera' => 'Singola', 'alloggio' => 6],
        ]);

        DB::table('servizio')->insert([
            ['nome_servizio' => 'Bagno'],
            ['nome_servizio' => 'Cucina'],
            ['nome_servizio' => 'Lavanderia'],
            ['nome_servizio' => 'Ripostiglio'],
            ['nome_servizio' => 'Garage'],
            ['nome_servizio' => 'Giardino'],
            ['nome_servizio' => 'AriaCondizionata'],
            ['nome_servizio' => 'WiFi'],
            ['nome_servizio' => 'AngoloStudio'],
        ]);

        DB::table('foto')->insert([
            ['estensione' => '.jpg', 'alloggio' => 1],
            ['estensione' => '.jpg', 'alloggio' => 2],
            ['estensione' => '.jpg', 'alloggio' => 3],
            ['estensione' => '.jpg', 'alloggio' => 4],
            ['estensione' => '.jpg', 'alloggio' => 5],
            ['estensione' => '.jpg', 'alloggio' => 6],
        ]);

        DB::table('faq')->insert([
            ['id_faq' => 1, 'domanda' => 'Come registrarsi?', 'risposta' => "Per registrarti puoi andare nella sezione login che trovi sulla pagina Home del sito.<br>Per raggiungerla fai click sull'icona in alto a sinistra", 'target' => 'utente non registrato'],
            ['id_faq' => 2, 'domanda' => 'Come visualizzare dettagliatamente gli annunci?', 'risposta' => "Puoi visualizzare gli annunci solo dopo esserti registrato nel nostro sito. Puoi trovare la relativa sezione nella pagina home", 'target' => 'utente non registrato'],
            ['id_faq' => 3, 'domanda' => 'Come inserire un annuncio?', 'risposta' => "Per inserire un annuncio fai click sul bottone inserisci annuncio sulla pagina della gestione alloggi", 'target' => 'locatore'],
            ['id_faq' => 4, 'domanda' => 'Come rispondere ai messaggi?', 'risposta' => "Puoi rispondere ai messaggi nella sezione privata dell'account. Verrai anche informato dell'interesse da parte dei locatari al tuo annuncio", 'target' => 'locatore'],
            ['id_faq' => 5, 'domanda' => 'Come contattare il locatore?', 'risposta' => "Nella pagina di dettaglio di ogni annuncio il locatario ha la possibilità di contattare il locatore per esprimere interesse o richiedere", 'target' => 'locatario'],
            ['id_faq' => 6, 'domanda' => 'Come modificare i dati utente?', 'risposta' => "Puoi modificare i tuoi dati nella pagina privata del sito, sezione modifica account", 'target' => 'locatario'],
        ]);

        DB::table('interazione')->insert([
            ['utente' => 1, 'alloggio' => 1, 'data_interazione' => now()],   /* data_interazione si intende come data di effettiva conclusione del contratto d'affitto? */
            ['utente' => 2, 'alloggio' => 1, 'data_interazione' => now()],
            ['utente' => 1, 'alloggio' => 2, 'data_interazione' => now()],
            ['utente' => 2, 'alloggio' => 2, 'data_interazione' => now()],
            ['utente' => 1, 'alloggio' => 3, 'data_interazione' => now()],
            ['utente' => 1, 'alloggio' => 4, 'data_interazione' => now()],
            ['utente' => 1, 'alloggio' => 5, 'data_interazione' => now()],
            ['utente' => 1, 'alloggio' => 6, 'data_interazione' => now()],
        ]);

        DB::table('disponibilita')->insert([
            ['alloggio' => 1, 'servizio' => 'Bagno', 'quantita' => 1],
            ['alloggio' => 1, 'servizio' => 'Cucina', 'quantita' => 1],
            ['alloggio' => 1, 'servizio' => 'Ripostiglio', 'quantita' => 1],
            ['alloggio' => 2, 'servizio' => 'Bagno', 'quantita' => 2],
            ['alloggio' => 2, 'servizio' => 'Cucina', 'quantita' => 1],
            ['alloggio' => 2, 'servizio' => 'Giardino', 'quantita' => 1],
            ['alloggio' => 3, 'servizio' => 'Bagno', 'quantita' => 2],
            ['alloggio' => 3, 'servizio' => 'Cucina', 'quantita' => 1],
            ['alloggio' => 3, 'servizio' => 'Garage', 'quantita' => 1],
        ]);

        DB::table('modifica')->insert([
            ['utente' => 3, 'faq' => 1, 'data_modifica' => now()],
            ['utente' => 3, 'faq' => 2, 'data_modifica' => now()],
            ['utente' => 3, 'faq' => 3, 'data_modifica' => now()],
            ['utente' => 3, 'faq' => 4, 'data_modifica' => now()],
            ['utente' => 3, 'faq' => 5, 'data_modifica' => now()],
            ['utente' => 3, 'faq' => 6, 'data_modifica' => now()],
        ]);

        DB::table('messaggio')->insert([
            ['data_invio' => now(), 'contenuto' => 'Ciao, sarei interessato', 'stato' => 1, 'mittente' => 2, 'destinatario' => 1, 'alloggio' => 1],
            ['data_invio' => now(), 'contenuto' => 'Ti tengo in considerazione', 'stato' => 1, 'mittente' => 1, 'destinatario' => 2, 'alloggio' => 1],
            ['data_invio' => now(), 'contenuto' => 'Buongiorno, sono interessato', 'stato' => 1, 'mittente' => 2, 'destinatario' => 1, 'alloggio' => 2],
            ['data_invio' => now(), 'contenuto' => 'Ti metto tra gli interessati', 'stato' => 1, 'mittente' => 1, 'destinatario' => 2, 'alloggio' => 2],
            ['data_invio' => now(), 'contenuto' => 'Perfetto, attendo aggiornamenti', 'stato' => 1, 'mittente' => 2, 'destinatario' => 1, 'alloggio' => 1],
            ['data_invio' => now(), 'contenuto' => 'Grazie mille, aspetto riscontri', 'stato' => 1, 'mittente' => 2, 'destinatario' => 1, 'alloggio' => 2],
            ['data_invio' => now(), 'contenuto' => 'Ottimo, buona giornata', 'stato' => 0, 'mittente' => 2, 'destinatario' => 1, 'alloggio' => 1],
            ['data_invio' => now(), 'contenuto' => 'Va bene, le auguro una buona giornata', 'stato' => 0, 'mittente' => 1, 'destinatario' => 2, 'alloggio' => 2],
            ['data_invio' => now(), 'contenuto' => 'Ciao, ho visto la casa e sono interessato', 'stato' => 0, 'mittente' => 2, 'destinatario' => 1, 'alloggio' => 3],
        ]);
    }

}
