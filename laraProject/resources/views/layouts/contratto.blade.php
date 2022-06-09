@extends('template')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/content-home-loggato.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/contratto.css')}}">
@endsection

@section('title', 'Contratto')

@section('content')
@isset($dati)

@php
    $locatore = $dati['locatore'];
    $locatario = $dati['locatario'];
    $alloggio = $dati['alloggio'];
    $interazione = $dati['interazione'];
@endphp

<section class="main-container">
    <article>
        <h1>CONTRATTO DI LOCAZIONE AD USO ABITATIVO</h1>
    </article>
    <article>
        <p>TRA</p> <br>
        <p>
            @if ($locatore->sesso == 'm')
                Il Sig. {{$locatore->nome . ' ' . $locatore->cognome}} nato
            @else
                La Sig.ra {{$locatore->nome . ' ' . $locatore->cognome}} nata
            @endif

            a {{$locatore->luogo_nascita}} il {{$locatore->data_nascita}},
            C.F. {{$locatore->codice_fiscale}}, residente a {{$locatore->citta}} di seguito

            @if ($locatore->sesso == 'm')
                denominato,
            @else
                denominata,
            @endif
            per brevità "Locatore"</p><br>

        <p>E</p> <br>
        <p>
            @if ($locatario->sesso == 'm')
                Il Sig. {{$locatario->nome . ' ' . $locatario->cognome}} nato
            @else
                La Sig.ra {{$locatario->nome . ' ' . $locatario->cognome}} nata
            @endif

            a {{$locatario->luogo_nascita}} il {{$locatario->data_nascita}},
            C.F. {{$locatario->codice_fiscale}}, residente a {{$locatario->citta}} di seguito

            @if ($locatario->sesso == 'm')
                denominato,
            @else
                denominata,
            @endif
            per brevità "Locatario"
        </p>
    </article>
    <article>
        <h1>SI CONVIENE E STIPULA QUANTO SEGUE</h1>
    </article>
    <article>
        <p>Il Locatore concede in locazione al Locatario l’immobile ad uso abitativo di sua esclusiva proprietà sito in
        {{$alloggio->citta}} in {{$alloggio->via}},
        @isset($alloggio->piano)
            piano {{$alloggio->piano}},
        @endisset
        numero {{$alloggio->num_civico}},
        censito al NCEU del Comune di {{$alloggio->citta}} al foglio 4, categoria 10, classe 3. <br>
        L’immobile viene consegnato come visto e piaciuto tra le parti all’atto della consegna del bene. (inserire
        riferimento a inventario da allegare se l’immobile è arredato) <br>
        L’immobile sarà adibito ad uso esclusivo del Locatario. <br>
            La locazione è regolata dalle seguenti concordate pattuizioni: </p><br>
    </article>
    <article>
        <h2>1. DURATA</h2>
    </article>
    <article>
        <p>La durata della locazione è stabilita in {{$alloggio->periodo_locazione}} mesi. </p>
    </article>
    <article>
        <h2>2. RECESSO DEL LOCATARIO</h2>
    </article>
    <article>
        <p>Il Locatore riconosce espressamente al Locatario la facoltà di recedere in qualsiasi momento e per
            qualsiasi motivo dal contratto anche prima della scadenza stabilita, dandone avviso al Locatore mediante
            lettera raccomandata da inviarsi con un preavviso di almeno 10 giorni dalla data in cui il recesso deve avere
            esecuzione. I giorni di preavviso saranno conteggiati a partire dalla data di invio della raccomandata A.R. </p>
    </article>
    <article>
        <h2>3. CANONE</h2>
    </article>
    <article>
        <p> Il canone mensile di locazione, escluse le spese di condominio ordinarie e di riscaldamento, viene
            consensualmente determinato tra le parti in € {{$alloggio->canone_affitto}} (xxx/00) mensili che il Locatario si obbliga a
            corrispondere entro il giorno 5 di ogni mese, mediante bonifico bancario da effettuarsi sul conto corrente con
            codice IBAN ....., in essere presso la Banca ........ intestato al Locatore.
            Sono a carico del Locatario la tassa comunale di smaltimento rifiuti nonché le utenze di luce, gas, acqua e
            telefono. </p>
    </article>
    <article>
        <h2>4. DEPOSITO CAUZIONALE</h2>
    </article>
    <article>
        <p> A garanzia delle obbligazioni tutte che assume con il contratto, il Locatario rilascia al Locatore un deposito
            cauzionale, fruttifero di interessi legali, per l’importo di €.... (XXX/00). Il deposito cauzionale come sopra
            costituito sarà restituito al termine della locazione entro 48 ore dalla riconsegna dell’immobile, previa verifica
            dello stato dell’immobile e dell'osservanza di ogni obbligazione contrattuale. </p>
    </article>
    <article>
        <h2>5. STATO LOCATIVO</h2>
    </article>
    <article>
        <p> Il Locatario dichiara di avere visitato l’immobile locato e di riceverlo in consegna con il ritiro delle chiavi e
            dichiara inoltre che l’immobile è in buono stato locativo ed idoneo all’uso convenuto.. Si impegna, altresì, a
            rispettare e far rispettare da propri familiari o domestici le norme del regolamento dello stabile, ove esistenti,
            che il Locatore si impegna a consegnare al momento della stipula del contratto. Si impegna inoltre ad
            osservare le deliberazioni dell'assemblea dei condomini formalmente comunicate dal Locatore.
            Il Locatore dichiara che l’appartamento è in regola con la normativa edilizia ed urbanistica e gli impianti sono
            conformi alla normativa vigente. Eventuali vizi dell’immobile e/o dei suoi impianti dovranno essere comunicati
            per iscritto, dal Locatario al Locatore, entro 30 (trenta) giorni dalla consegna dell’immobile, ovvero dalla
            loro scoperta ove occulti.
            L'unità immobiliare viene consegnata pulita e in ottima condizione. La stessa verrà restituita al termine della
            locazione nello stesso stato in cui è stata consegnata, salvo il normale deperimento legato all’uso e senza
            obbligo per il Locatario di tinteggiatura e di effettuazione di interventi di qualsivoglia natura a meno che i
            danni riportati non siano notevoli. </p>
    </article>
    <article>
        <h2>6. MUTAMENTO DI DESTINAZIONE E MODIFICHE</h2>
    </article>
    <article>
        <p> L’immobile è locato ad esclusivo uso di abitazione del Locatario che si obbliga a non mutarne la
            destinazione anche solo parzialmente o temporaneamente. Ogni aggiunta o modifica che non possa essere
            eliminata senza danneggiare l’immobile non potrà essere effettuata dal Locatario senza la preventiva
            autorizzazione scritta del Locatore e comunque resterà a beneficio dell’immobile senza che nulla sia dovuto
            al Locatario, neanche a titolo di rimborso spese. </p>
    </article>
    <article>
        <h2>7. RIPARAZIONI ORDINARIE E STRAORDINARIE E MANUTENZIONE</h2>
    </article>
    <article>
        <p> Le riparazioni di cui all’art. 1576 cod. civ. (Mantenimento della cosa locata in buono stato locativo) e 1609
            cod. civ. (Piccole riparazioni a carico dell’inquilino) sono a carico del Locatario.
            Se il Locatario non provvederà tempestivamente potrà provvedervi il Locatore ed il relativo costo dovrà
            essergli rimborsato entro 30 (trenta) giorni dall’avvenuta riparazione.
            Qualora l’immobile locato dovesse necessitare di riparazioni che non sono a carico del Locatario, secondo
            le norme del codice civile e della prassi locativa, questi è tenuto a darne avviso scritto al Locatore. Se si
            tratta di riparazioni urgenti il Locatario può eseguirle direttamente, salvo rimborso, purché ne dia
            contemporaneamente avviso al Locatore. </p>
    </article>
    <article>
        <h2>8. ESONERO DI RESPONSABILITA’</h2>
    </article>
    <article>
        <p> Il Locatario esonera espressamente il Locatore per ogni responsabilità per danni diretti o indiretti che
            possano derivargli dal fatto doloso o colposo di terzi , quali ad esempio i condomini dello stabile o il portiere,
            e comunque di terzi in genere, anche in caso di furto. </p>
    </article>
    <article>
        <h2>9. REGISTRAZIONE E BOLLI</h2>
    </article>
    <article>
        <p> Le spese di registrazione del presente contratto, ove previste, sono a carico delle parti al 50%. Sono a totale
            carico del Locatario i bolli del presente contratto e i bolli delle quietanze. </p>
    </article>
    <article>
        <h2>10. MODIFICHE</h2>
    </article>
    <article>
        <p> Qualunque modifica al presente contratto dovrà risultare sempre da atto scritto.
            Per quanto non espressamente previsto nel presente contratto si rinvia alla legge 09/12/1998 n. 431, alla
            legge 27/07/1978 n. 392 ed agli articoli 1571 e seguenti del codice civile. </p>
    </article>
    <article>
        <h2>11. TUTELA DATI PERSONALI</h2>
    </article>
    <article>
        <p> Il Locatore ed il Locatario, ai sensi del Decreto Legislativo 196/2003, si autorizzano reciprocamente a
            comunicare a terzi i propri dati personali in relazione ad ogni adempimento connesso col rapporto di
            locazione. </p>
    </article>
    <article>
        <h2>12. ESIGENZE DEL LOCATARIO (ARTICOLO DA COMPLETARE IN CASO DI CONTRATTO DI
            LOCAZIONE ABITATIVA DI NATURA TRANSITORIA)...</h2>
    </article>
    <article>
        <h2>13. FORO COMPETENTE</h2>
    </article>
    <article>
        <p> Per qualsiasi contestazione, le parti concordano che il Foro competente sia in via esclusiva quello di
            Potenza. </p>
    </article>

    <article>
        <p> Letto, approvato e sottoscritto <br>
        Fatto in triplice originale il, {{$interazione->data_interazione}}</p>
        <br>
        <p> Firme:</p>
        <p> IL LOCATORE</p>
        <p> IL LOCATARIO</p>
    </article>
</section>
@endisset
@endsection