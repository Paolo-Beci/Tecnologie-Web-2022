@extends('gestione-alloggi')

@section('content')

<section class="catalogo">
    <h1>I tuoi annunci:</h1>
    <!-- ALLOGGI -->
    @isset($alloggi)   <!-- esiste o non è null -->
        @foreach ($alloggi as $alloggio)
        <!-- Alloggio -->
        <article class="alloggi">
            <div class="alloggio">
                <img class="item-immagine" src="{{ asset('images_case/'.$alloggio->alloggioFoto()->first()->id_foto.".jpg") }}" alt="Immagine">
                <div>
                    <h1>{{ $alloggio->tipologia }}</h1>  <!-- Tipologia -->
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
            </div>
        </article>
        @endforeach
    @endisset
</section>

    <!--Paginazione-->
    @include('pagination.paginator', ['paginator' => $alloggi])

@endsection
