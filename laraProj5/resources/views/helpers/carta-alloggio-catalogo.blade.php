<img class="item-immagine" src="{{ asset('images_case/'.$alloggio->id_foto.$alloggio->estensione) }}" alt="Immagine">
<div>
    @if($alloggio->tipologia == 'Posto_letto')
        <h1>Posto letto</h1>
    @else
        <h1>{{ $alloggio->tipologia }}</h1>  <!-- Tipologia -->
    @endif
    <hr style="margin: 10px">
    <h1>
        {{ $alloggio->via }}, {{ $alloggio->num_civico }},
        Piano {{ $alloggio->piano }}
        <br>
        {{ $alloggio->citta }}, {{ $alloggio->cap }}</h1> <!-- Via, Num.civico, Piano, Città, CAP -->
    <h2 class="info-alloggio">
        Dimensione: {{ $alloggio->dimensione }}mq,
        Periodo Locazione: {{ $alloggio->periodo_locazione }} mesi,
        Genere: {{ $alloggio->genere }}</h2> <!-- Dimensione, PeriodoLocazione, Genere (DA MODIFICARE) -->
    <h2 class="info-alloggio">
        Canone affitto: &#8364;{{ $alloggio->canone_affitto }} / mese,
        Utenze: &#8364;{{ $alloggio->utenze }} / mese</h2> <!-- CanoneAffitto, Utenze -->
    <h2 class="info-alloggio">{{ $alloggio->descrizione }}</h2> <!-- Descrizione -->
</div>
