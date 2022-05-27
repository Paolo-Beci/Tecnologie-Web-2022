<article class="alloggi">
    <div class="alloggio" data-href="{{route('dettagli-alloggio', [$alloggioLocatore->id_alloggio])}}">
        <img class="item-immagine" src="{{ asset('images_case/'.$alloggioLocatore->id_foto.$alloggioLocatore->estensione) }}" alt="Immagine">
        <div>
            <h1>{{ $alloggioLocatore->tipologia }}</h1>  <!-- Tipologia -->
            <hr style="margin: 10px">
            <h1>
                {{ $alloggioLocatore->via }}, {{ $alloggioLocatore->num_civico }},
                Piano {{ $alloggioLocatore->piano }}
                <br>
                {{ $alloggioLocatore->citta }}, {{ $alloggioLocatore->cap }}</h1> <!-- Via, Num.civico, Piano, Città, CAP -->
            <h2 class="info-alloggio">
                Dimensione: {{ $alloggioLocatore->dimensione }}mq,
                Periodo Locazione: {{ $alloggioLocatore->periodo_locazione }} mesi,
                Genere: {{ $alloggioLocatore->genere }}</h2> <!-- Dimensione, PeriodoLocazione, Genere (DA MODIFICARE) -->
            <h2 class="info-alloggio">
                Canone affitto: &#8364;{{ $alloggioLocatore->canone_affitto }} / mese,
                Utenze: &#8364;{{ $alloggioLocatore->utenze }} / mese</h2> <!-- CanoneAffitto, Utenze -->
            <h2 class="info-alloggio">{{ $alloggioLocatore->descrizione }}</h2> <!-- Descrizione -->
        </div>
    </div>
</article>
