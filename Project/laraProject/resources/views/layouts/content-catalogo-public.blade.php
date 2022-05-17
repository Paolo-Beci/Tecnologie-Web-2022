@extends('template-catalogo')

@section('content')
<section id="catalogo" class="catalogo">

    <section class="container-inserzione">
        <h1>Alloggi in affitto</h1>
    <section class="section-bottoni-tipologia">
        <button class="select-button-appartamenti">
            <img src="{{asset('images/apartment_icon.png')}}" alt="Apartment Logo" width="10%" style="vertical-align:middle;horiz-align:left;margin-right: 30px">
            APPARTAMENTI
        </button>
        <button class="select-button-posti-letto">
            <img src="{{asset('images/bed_icon.png')}}" alt="Bed Logo" width="10%" style="vertical-align:middle;horiz-align:left;margin-right: 30px">
            POSTI LETTO
        </button>
    </section>
    @isset($appartamenti)   <!-- esiste o non è null -->
    @foreach ($appartamenti as $appartamento)
        <!-- Item inserzione -->
        <article class="item-inserzione" onclick="">
            <section class="item-immagine item2"></section>
            <section class="item-descrizione" onclick="">
                <h1>{{ $appartamento->tipologia }}</h1>  <!-- Tipologia -->
                <hr>
                <h1>{{ $appartamento->via }}, {{ $appartamento->num_civico }}, Piano {{ $appartamento->piano }}, {{ $appartamento->citta }}, {{ $appartamento->CAP }}</h1> <!-- Via, Num.civico, Piano, Città, CAP -->
                <h2>Dimensione: {{ $appartamento->dimensione }}mq, Periodo Locazione: {{ $appartamento->periodo_locaziome }} mesi, Genere: {{ $appartamento->genere }}</h2> <!-- Dimensione, PeriodoLocazione, Genere (DA MODIFICARE) -->
                <h2 class="prezzo">Canone affitto: {{ $appartamento->canone_affitto }} &#8364; , Utenze: {{ $appartamento->utenze }} &#8364;</h2> <!-- CanoneAffitto, Utenze -->
                <h2>{{ $appartamento->descrizione }}</h2> <!-- Descrizione -->
            </section>
        </article>
    @endforeach
    @endisset()
    </section>
    {{--
    <!--Paginazione-->
    @include('pagination.paginator', ['paginator' => $products])
--}}
</section>
@endsection
