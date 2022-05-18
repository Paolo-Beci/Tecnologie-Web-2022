@extends('template-catalogo')

@section('content')

<section class="catalogo">
    <h1>Alloggi in affitto</h1>
    <article class="alloggi-buttons">
        <button class="appartamenti-button">
            <img class="button-img" src="{{asset('images/apartment_icon.png')}}" alt="Appartamenti">
            APPARTAMENTI
        </button>

        <button class="posti-letto-button">
            <img class="button-img" src="{{asset('images/bed_icon.png')}}" alt="Posti letto">
            POSTI LETTO
        </button>
    </article>
    <!-- APPARTAMENTI -->
    @isset($appartamenti)   <!-- esiste o non è null -->
        @foreach ($appartamenti as $appartamento)
        <!-- Appartamento -->
        <article class="appartamenti visible">
            <div class="appartamento">
                <div class="item-immagine" >
                    {{--inserimento di un immagine--}}
                    <img class="item-immagine" src="{{ asset('images_case/'.$appartamento->alloggioFoto()->first()->id_foto.".jpg") }}"  width="100%" alt="Immagine">
                </div>
                <div>
                    <h1>{{ $appartamento->tipologia }}</h1>  <!-- Tipologia -->
                    <hr>
                    <h1>
                        {{ $appartamento->via }}, {{ $appartamento->num_civico }},
                        Piano {{ $appartamento->piano }}
                        <br>
                        {{ $appartamento->citta }}, {{ $appartamento->cap }}</h1> <!-- Via, Num.civico, Piano, Città, CAP -->
                    <h2 class="info">
                        Dimensione: {{ $appartamento->dimensione }}mq,
                        Periodo Locazione: {{ $appartamento->periodo_locazione }} mesi,
                        Genere: {{ $appartamento->genere }}</h2> <!-- Dimensione, PeriodoLocazione, Genere (DA MODIFICARE) -->
                    <h2 class="info">
                        Canone affitto: &#8364;{{ $appartamento->canone_affitto }},
                        Utenze: &#8364;{{ $appartamento->utenze }}</h2> <!-- CanoneAffitto, Utenze -->
                    <h2 class="info">{{ $appartamento->descrizione }}</h2> <!-- Descrizione -->
                </div>
            </div>
        </article>
        @endforeach
    @endisset


    <!-- POSTI LETTO -->
    @isset($posti_letto)   <!-- esiste o non è null -->
        @foreach ($posti_letto as $posto_letto)
        <!-- Posto letto -->
            <article class="posti-letto">
                <div class="posto-letto">
                    <div>
                        {{--inserimento di un immagine--}}
                        <img class="item-immagine" src="{{ asset('images_case/'.$posto_letto->alloggioFoto()->first()->id_foto.".jpg") }}"  width="100%" alt="Immagine">
                    </div>
                    <div>
                        <h1>{{ $posto_letto->tipologia }}</h1>  <!-- Tipologia -->
                        <hr>
                        <h1>
                            {{ $posto_letto->via }}, {{ $posto_letto->num_civico }},
                            Piano {{ $posto_letto->piano }},
                            <br>
                            {{ $posto_letto->citta }}, {{ $posto_letto->cap }}</h1> <!-- Via, Num.civico, Piano, Città, CAP -->
                        <h2 class="info">
                            Dimensione: {{ $posto_letto->dimensione }}mq,
                            Periodo Locazione: {{ $posto_letto->periodo_locazione }} mesi, Genere: {{ $posto_letto->genere }}</h2> <!-- Dimensione, PeriodoLocazione, Genere (DA MODIFICARE) -->
                        <h2 class="info">Canone affitto: &#8364;{{ $posto_letto->canone_affitto }},
                            &#8364;Utenze: {{ $posto_letto->utenze }}</h2> <!-- CanoneAffitto, Utenze -->
                        <h2 class="info">{{ $posto_letto->descrizione }}</h2> <!-- Descrizione -->
                    </div>
                </div>
            </article>
        @endforeach
    @endisset
</section>
{{--
    <!--Paginazione-->
    @include('pagination.paginator', ['paginator' => $products])
    --}}
@endsection
