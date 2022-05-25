@extends('template')
<link rel="stylesheet" type="text/css" href="{{ asset('css/catalogo.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/content-home-loggato.css') }}">
@section('title', 'Catalogo')


@section('content')
    <main class="main-container">
        @can('isLocatario')
            <aside class="lateral-bar">
                @include('helpers/filtri')
            </aside>
        @endcan
        <section class="catalogo">
            <h1>Alloggi in affitto</h1>
            <article class="alloggi-buttons">
                <a href="{{route('catalogo-appartamenti')}}">
                    <button class="appartamenti-button">
                    <img class="button-img" src="{{asset('images/apartment_icon.png')}}" alt="Appartamenti">
                    APPARTAMENTI
                    </button>
                </a>
                <a href="{{route('catalogo-posti-letto')}}">
                    <button class="posti-letto-button">
                        <img class="button-img" src="{{asset('images/bed_icon.png')}}" alt="Posti letto">
                        POSTI LETTO
                    </button>
                </a>
            </article>
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
    </main>
    <!--Paginazione-->
    @include('pagination.paginator', ['paginator' => $alloggi])

@endsection
