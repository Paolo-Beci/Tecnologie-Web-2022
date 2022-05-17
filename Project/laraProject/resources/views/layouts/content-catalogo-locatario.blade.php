@extends('template-catalogo')

@section('content')
<main id="catalogo" class="catalogo">
    <aside class="lateral-bar">
        @include('helpers/filtri')
    </aside>
    <section class="container-inserzione">
        <h1>Alloggi in affitto</h1>
        <div class="section-bottoni-tipologia">
            <button class="select-button-appartamenti">
                <img src="{{asset('images/apartment_icon.png')}}" alt="Apartment Logo" width="10%" style="vertical-align:middle;horiz-align:left;margin-right: 30px">
                APPARTAMENTI
            </button>
            <button class="select-button-posti-letto">
                <img src="{{asset('images/bed_icon.png')}}" alt="Bed Logo" width="10%" style="vertical-align:middle;horiz-align:left;margin-right: 30px">
                POSTI LETTO
            </button>
        </div>

        <!-- APPARTAMENTI -->
    @isset($appartamenti)   <!-- esiste o non è null -->
    @foreach ($appartamenti as $appartamento)
        <!-- Item inserzione -->
            <div class="item-inserzione visible" onclick="" data-appartamento>
                <div class="item-immagine item2"></div>
                <div class="item-descrizione" onclick="">
                    <h1>{{ $appartamento->tipologia }}</h1>  <!-- Tipologia -->
                    <hr>
                    <h1>{{ $appartamento->via }}, {{ $appartamento->num_civico }}, Piano {{ $appartamento->piano }}, {{ $appartamento->citta }}, {{ $appartamento->cap }}</h1> <!-- Via, Num.civico, Piano, Città, CAP -->
                    <h2>Dimensione: {{ $appartamento->dimensione }}mq, Periodo Locazione: {{ $appartamento->periodo_locazione }} mesi, Genere: {{ $appartamento->genere }}</h2> <!-- Dimensione, PeriodoLocazione, Genere (DA MODIFICARE) -->
                    <h2 class="prezzo">Canone affitto: {{ $appartamento->canone_affitto }} &#8364; , Utenze: {{ $appartamento->utenze }} &#8364;</h2> <!-- CanoneAffitto, Utenze -->
                    <h2>{{ $appartamento->descrizione }}</h2> <!-- Descrizione -->
                </div>
            </div>
    @endforeach
    @endisset()

    <!-- POSTI LETTO -->
    @isset($posti_letto)   <!-- esiste o non è null -->
    @foreach ($posti_letto as $posto_letto)
        <!-- Item inserzione -->
            <div class="item-inserzione" onclick="" data-posto-letto>
                <div class="item-immagine item2"></div>
                <div class="item-descrizione" onclick="">
                    <h1>{{ $posto_letto->tipologia }}</h1>  <!-- Tipologia -->
                    <hr>
                    <h1>{{ $posto_letto->via }}, {{ $posto_letto->num_civico }}, Piano {{ $posto_letto->piano }}, {{ $posto_letto->citta }}, {{ $posto_letto->cap }}</h1> <!-- Via, Num.civico, Piano, Città, CAP -->
                    <h2>Dimensione: {{ $posto_letto->dimensione }}mq, Periodo Locazione: {{ $posto_letto->periodo_locazione }} mesi, Genere: {{ $posto_letto->genere }}</h2> <!-- Dimensione, PeriodoLocazione, Genere (DA MODIFICARE) -->
                    <h2 class="prezzo">Canone affitto: {{ $posto_letto->canone_affitto }} &#8364; , Utenze: {{ $posto_letto->utenze }} &#8364;</h2> <!-- CanoneAffitto, Utenze -->
                    <h2>{{ $posto_letto->descrizione }}</h2> <!-- Descrizione -->
                </div>
            </div>
        @endforeach
        @endisset()
    </section>
</main>
    {{--
    <!--Paginazione-->
    @include('pagination.paginator', ['paginator' => $products])
    --}}
@endsection
