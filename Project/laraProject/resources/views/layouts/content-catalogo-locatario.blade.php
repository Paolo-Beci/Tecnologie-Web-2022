@extends('template-catalogo')

@section('content')
<section id="catalogo" class="catalogo">
    <aside class="lateral-bar">
        @include('helpers/filtri')
    </aside>
    <section class="container-inserzione">
        <h1>Alloggi in affitto</h1>

    <!-- APPARTAMENTI -->
    @isset($appartamenti)   <!-- esiste o non è null -->
    @foreach ($appartamenti as $appartamento)
        <!-- Item inserzione -->
        <article class="item-inserzione" onclick="">
            <section class="item-immagine item2"></section>
            <section class="item-descrizione" onclick="">
                <h1>{{ $appartamento->tipologia }}</h1>  <!-- Tipologia -->
                <hr>
                <h1>{{ $appartamento->via }}, {{ $appartamento->num_civico }}, Piano {{ $appartamento->piano }}, {{ $appartamento->citta }}, {{ $appartamento->cap }}</h1> <!-- Via, Num.civico, Piano, Città, CAP -->
                <h2>Dimensione: {{ $appartamento->dimensione }}mq, Periodo Locazione: {{ $appartamento->periodo_locazione }} mesi, Genere: {{ $appartamento->genere }}</h2> <!-- Dimensione, PeriodoLocazione, Genere (DA MODIFICARE) -->
                <h2 class="prezzo">Canone affitto: {{ $appartamento->canone_affitto }} &#8364; , Utenze: {{ $appartamento->utenze }} &#8364;</h2> <!-- CanoneAffitto, Utenze -->
                <h2>{{ $appartamento->descrizione }}</h2> <!-- Descrizione -->
            </section>
        </article>
    @endforeach
    @endisset()
    </section>

    <!-- POSTI LETTO -->
    @isset($posti_letto)   <!-- esiste o non è null -->
    @foreach ($posti_letto as $posto_letto)
    <!-- Item inserzione -->
        <article class="item-inserzione" onclick="">
            <section class="item-immagine item2"></section>
            <section class="item-descrizione" onclick="">
                <h1>{{ $posto_letto->tipologia }}</h1>  <!-- Tipologia -->
                <hr>
                <h1>{{ $posto_letto->via }}, {{ $posto_letto->num_civico }}, Piano {{ $posto_letto->piano }}, {{ $posto_letto->citta }}, {{ $posto_letto->cap }}</h1> <!-- Via, Num.civico, Piano, Città, CAP -->
                <h2>Dimensione: {{ $posto_letto->dimensione }}mq, Periodo Locazione: {{ $posto_letto->periodo_locazione }} mesi, Genere: {{ $posto_letto->genere }}</h2> <!-- Dimensione, PeriodoLocazione, Genere (DA MODIFICARE) -->
                <h2 class="prezzo">Canone affitto: {{ $posto_letto->canone_affitto }} &#8364; , Utenze: {{ $posto_letto->utenze }} &#8364;</h2> <!-- CanoneAffitto, Utenze -->
                <h2>{{ $posto_letto->descrizione }}</h2> <!-- Descrizione -->
            </section>
        </article>
    @endforeach
    @endisset()
    {{--
    <!--Paginazione-->
    @include('pagination.paginator', ['paginator' => $products])
--}}
</section>
@endsection
