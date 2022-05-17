@extends('template-catalogo')

@section('content')
<section id="catalogo" class="catalogo">
    <aside class="lateral-bar">
        @include('helpers/filtri')
    </aside>
    {{--
    <section class="container-inserzione">
            <h1>Alloggi in affitto</h1>
            <!-- Item inserzione -->
            <script>
                function onClickInserzione() {
                    window.open('{{route('dettagli-annuncio')}}'); <!-- PROVA SCRIPT DA COLLEGARE A CATALOGO-SCRIPT.JS -->
                }
            </script>
            <article class="item-inserzione" onclick="onClickInserzione()" >
                <section class="item-immagine item1"></section>
                <section class="item-descrizione">
                    <h1>Appartamento</h1>  <!-- Tipologia -->
                    <h1>----------------------------------------------</h1>
                    <h1>Via della Vittoria, 43, Piano 2, Ancona, 60123</h1> <!-- Via, Num.civico, Piano, Città, CAP -->
                    <h2>Dimensione: 150mq, Periodo Locazione: 12 mesi, Genere: Tutti</h2> <!-- Dimensione, PeriodoLocazione, Genere -->
                    <h2 class="prezzo">Canone affitto: 500 &#8364; , Utenze: 80 &#8364;</h2> <!-- CanoneAffitto, Utenze -->
                    <h2>Bellissimo appartamento arredato con nuovo mobilio</h2> <!-- Descrizione -->
                </section>
            </article>
            <!-- Item inserzione -->
            <article class="item-inserzione" onclick="">
                <section class="item-immagine item2"></section>
                <section class="item-descrizione">
                    <h1>Posto letto</h1>  <!-- Tipologia -->
                    <h1>----------------------------------------------</h1>
                    <h1>Via Cesare Battisti, 11, Piano 1, Ancona, 60123</h1> <!-- Via, Num.civico, Piano, Città, CAP -->
                    <h2>Dimensione: 150mq, Periodo Locazione: 9 mesi, Genere: Maschi</h2> <!-- Dimensione, PeriodoLocazione, Genere -->
                    <h2 class="prezzo">Canone affitto: 200 &#8364; , Utenze: 0 &#8364;</h2> <!-- CanoneAffitto, Utenze -->
                    <h2>Bellissimo posto letto singolo arredato con nuovo mobilio</h2> <!-- Descrizione -->
                </section>
            </article>
            <!-- Item inserzione -->
            <article class="item-inserzione" onclick="">
                <section class="item-immagine item3"></section>
                <section class="item-descrizione">
                    <h1>Posto letto</h1>  <!-- Tipologia -->
                    <h1>----------------------------------------------</h1>
                    <h1>Via Vito Volterra, 26, , Ancona, 60123</h1> <!-- Via, Num.civico, Piano, Città, CAP -->
                    <h2>Dimensione: 150mq, Periodo Locazione: 6 mesi, Genere: Femmine</h2> <!-- Dimensione, PeriodoLocazione, Genere -->
                    <h2 class="prezzo">Canone affitto: 250 &#8364; , Utenze: 60 &#8364;</h2> <!-- CanoneAffitto, Utenze -->
                    <h2></h2> <!-- Descrizione -->
                </section>
            </article>
    </section>
    --}}
    <section class="container-inserzione">
    @isset($appartamenti)   <!-- esiste o non è null -->
    @foreach ($appartamenti as $appartamento)
        <!-- Item inserzione -->
        <article class="item-inserzione" onclick="">
            <section class="item-immagine">@include('helpers/immagine-inserzione')</section>
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
