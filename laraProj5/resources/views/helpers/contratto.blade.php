@isset($dati)
<div class="main-container">
    <div class="titolo">
        <h1>CONTRATTO DI LOCAZIONE AD USO ABITATIVO</h1>
    </div>
    <div class="testo">
        <p>TRA</p> <br>
        <p>Il Sig./La Sig.ra $dati->nomeLocatore nato/a a $dati->luogoNascitaLocatore il $dati->dataNascitaLocatore .
        C.F. $dati->CFLocatore , residente a $dati->cittaLocatore di seguito denominato/a, per brevità "Locatore"</p><br>

        <p>E</p> <br>
        <p>Il Sig./La Sig.ra $dati->nomeLocatario nato/a a $dati->luogoNascitaLocatario il $dati->dataNascitaLocatario .
            C.F. $dati->CFLocatario , residente a $dati->cittaLocatario di seguito denominato/a, per brevità "Locatario"</p>
    </div>
    <div class="titolo">
        <h1>SI CONVIENE E STIPULA QUANTO SEGUE</h1>
    </div>
    <div class="testo">
        <p>Il Locatore concede in locazione al Conduttore l’immobile ad uso abitativo di sua esclusiva proprietà sito in
        $dati->cittaAlloggio in Via $dati->viaAlloggio , piano  $dati->pianoAlloggio , numero $dati->numeroAlloggio ,
        censito al NCEU del Comune di $dati->cittaAlloggio al foglio 4, categoria 10, classe 3. <br>
        L’immobile viene consegnato come visto e piaciuto tra le parti all’atto della consegna del bene. (inserire
        riferimento a inventario da allegare se l’immobile è arredato) <br>
        L’immobile sarà adibito ad uso esclusivo del Conduttore. <br>
            La locazione è regolata dalle seguenti concordate pattuizioni: </p><br>
    </div>
    <div class="sottotitolo">
        <h2>1. DURATA</h2>
    </div>
    <div class="testo">
        <p>La durata della locazione è stabilita in $dati->periodoLocazioneAlloggio mesi. </p>
    </div>
    <div class="sottotitolo">
        <h2>2. RECESSO DEL CONDUTTORE</h2>
    </div>
    <div class="testo">
        <p>Il Locatore riconosce espressamente al Conduttore la facoltà di recedere in qualsiasi momento e per
            qualsiasi motivo dal contratto anche prima della scadenza stabilita, dandone avviso al Locatore mediante
            lettera raccomandata da inviarsi con un preavviso di almeno 10 giorni dalla data in cui il recesso deve avere
            esecuzione. I giorni di preavviso saranno conteggiati a partire dalla data di invio della raccomandata A.R. </p>
    </div>
    <div class="sottotitolo">
        <h2>3. CANONE</h2>
    </div>
    <div class="testo">
        <p> Il canone mensile di locazione, escluse le spese di condominio ordinarie e di riscaldamento, viene
            consensualmente determinato tra le parti in € $dati->canoneAlloggio (xxx/00) mensili che il Conduttore si obbliga a
            corrispondere entro il giorno 5 di ogni mese, mediante bonifico bancario da effettuarsi sul conto corrente con
            codice IBAN ....., in essere presso la Banca ........ intestato al Locatore.
            Sono a carico del Conduttore la tassa comunale di smaltimento rifiuti nonché le utenze di luce, gas, acqua e
            telefono. </p>
    </div>
    <div class="sottotitolo">
        <h2>4. DEPOSITO CAUZIONALE</h2>
    </div>
    <div class="testo">
        <p> A garanzia delle obbligazioni tutte che assume con il contratto, il Conduttore rilascia al Locatore un deposito
            cauzionale, fruttifero di interessi legali, per l’importo di €.... (XXX/00). Il deposito cauzionale come sopra
            costituito sarà restituito al termine della locazione entro 48 ore dalla riconsegna dell’immobile, previa verifica
            dello stato dell’immobile e dell'osservanza di ogni obbligazione contrattuale. </p>
    </div>
    <div class="sottotitolo">
        <h2>5. STATO LOCATIVO</h2>
    </div>
    <div class="testo">
        <p> Il Conduttore dichiara di avere visitato l’immobile locato e di riceverlo in consegna con il ritiro delle chiavi e
            dichiara inoltre che l’immobile è in buono stato locativo ed idoneo all’uso convenuto.. Si impegna, altresì, a
            rispettare e far rispettare da propri familiari o domestici le norme del regolamento dello stabile, ove esistenti,
            che il Locatore si impegna a consegnare al momento della stipula del contratto. Si impegna inoltre ad
            osservare le deliberazioni dell'assemblea dei condomini formalmente comunicate dal Locatore.
            Il Locatore dichiara che l’appartamento è in regola con la normativa edilizia ed urbanistica e gli impianti sono
            conformi alla normativa vigente. Eventuali vizi dell’immobile e/o dei suoi impianti dovranno essere comunicati
            per iscritto, dal Conduttore al Locatore, entro 30 (trenta) giorni dalla consegna dell’immobile, ovvero dalla
            loro scoperta ove occulti.
            L'unità immobiliare viene consegnata pulita e in ottima condizione. La stessa verrà restituita al termine della
            locazione nello stesso stato in cui è stata consegnata, salvo il normale deperimento legato all’uso e senza
            obbligo per il Conduttore di tinteggiatura e di effettuazione di interventi di qualsivoglia natura a meno che i
            danni riportati non siano notevoli. </p>
    </div>
    <div class="sottotitolo">
        <h2>6. MUTAMENTO DI DESTINAZIONE E MODIFICHE</h2>
    </div>
    <div class="testo">
        <p> L’immobile è locato ad esclusivo uso di abitazione del Conduttore che si obbliga a non mutarne la
            destinazione anche solo parzialmente o temporaneamente. Ogni aggiunta o modifica che non possa essere
            eliminata senza danneggiare l’immobile non potrà essere effettuata dal Conduttore senza la preventiva
            autorizzazione scritta del Locatore e comunque resterà a beneficio dell’immobile senza che nulla sia dovuto
            al Conduttore, neanche a titolo di rimborso spese. </p>
    </div>
    <div class="sottotitolo">
        <h2>7. RIPARAZIONI ORDINARIE E STRAORDINARIE E MANUTENZIONE</h2>
    </div>
    <div class="testo">
        <p> Le riparazioni di cui all’art. 1576 cod. civ. (Mantenimento della cosa locata in buono stato locativo) e 1609
            cod. civ. (Piccole riparazioni a carico dell’inquilino) sono a carico del Conduttore.
            Se il Conduttore non provvederà tempestivamente potrà provvedervi il Locatore ed il relativo costo dovrà
            essergli rimborsato entro 30 (trenta) giorni dall’avvenuta riparazione.
            Qualora l’immobile locato dovesse necessitare di riparazioni che non sono a carico del Conduttore, secondo
            le norme del codice civile e della prassi locativa, questi è tenuto a darne avviso scritto al Locatore. Se si
            tratta di riparazioni urgenti il Conduttore può eseguirle direttamente, salvo rimborso, purché ne dia
            contemporaneamente avviso al Locatore. </p>
    </div>
    <div class="sottotitolo">
        <h2>8. ESONERO DI RESPONSABILITA’</h2>
    </div>
    <div class="testo">
        <p> Il Conduttore esonera espressamente il Locatore per ogni responsabilità per danni diretti o indiretti che
            possano derivargli dal fatto doloso o colposo di terzi , quali ad esempio i condomini dello stabile o il portiere,
            e comunque di terzi in genere, anche in caso di furto. </p>
    </div>
    <div class="sottotitolo">
        <h2>9. REGISTRAZIONE E BOLLI</h2>
    </div>
    <div class="testo">
        <p> Le spese di registrazione del presente contratto, ove previste, sono a carico delle parti al 50%. Sono a totale
            carico del Conduttore i bolli del presente contratto e i bolli delle quietanze. </p>
    </div>
    <div class="sottotitolo">
        <h2>10. MODIFICHE</h2>
    </div>
    <div class="testo">
        <p> Qualunque modifica al presente contratto dovrà risultare sempre da atto scritto.
            Per quanto non espressamente previsto nel presente contratto si rinvia alla legge 09/12/1998 n. 431, alla
            legge 27/07/1978 n. 392 ed agli articoli 1571 e seguenti del codice civile. </p>
    </div>
    <div class="sottotitolo">
        <h2>11. TUTELA DATI PERSONALI</h2>
    </div>
    <div class="testo">
        <p> Il Locatore ed il Conduttore, ai sensi del Decreto Legislativo 196/2003, si autorizzano reciprocamente a
            comunicare a terzi i propri dati personali in relazione ad ogni adempimento connesso col rapporto di
            locazione. </p>
    </div>
    <div class="sottotitolo">
        <h2>12. ESIGENZE DEL CONDUTTORE (ARTICOLO DA COMPLETARE IN CASO DI CONTRATTO DI
            LOCAZIONE ABITATIVA DI NATURA TRANSITORIA)...</h2>
    </div>
    <div class="sottotitolo">
        <h2>13. FORO COMPETENTE</h2>
    </div>
    <div class="testo">
        <p> Per qualsiasi contestazione, le parti concordano che il Foro competente sia in via esclusiva quello di
            Potenza. </p>
    </div>

    <div class="dataFirma">
        <p> Letto, approvato e sottoscritto <br>
        Fatto in triplice originale il, </p>{{now()}}

        <p> Firme:</p>
        <p> IL LOCATORE</p>
        <p> IL CONDUTTORE</p>
    </div>
</div>
@endisset
