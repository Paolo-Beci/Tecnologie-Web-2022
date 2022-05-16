<<<<<<< HEAD
@extends('template-home')
=======
@extends('template-catalogo')
>>>>>>> fcf3e26e015ff6dd1b6abc066f822b992dffa9fb

@section('content')
<section id="catalogo" class="catalogo">
    <aside class="lateral-bar">
        @include('helpers/filtri')
    </aside>
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
    <!-- DA USARE UNA VOLTA IMPLEMENTATO IL DB -->
{{--
    @isset($alloggio)   <!-- esiste o non è null -->
    @foreach ($alloggio as $alloggio)
        <!-- Item inserzione -->
            <section class="item-immagine">@include('helpers/immagine-inserzione')</section>
            <section class="item-descrizione" onclick="">
                <h1>{{ $alloggio->tipologia }}</h1>  <!-- Tipologia -->
                <h1>----------------------------------------------</h1>
                <h1>{{ $alloggio->via }}, {{ $alloggio->num_civico }}, Piano {{ $alloggio->piano }}, {{ $alloggio->citta }}, {{ $alloggio->CAP }}</h1> <!-- Via, Num.civico, Piano, Città, CAP -->
                <h2>Dimensione: {{ $alloggio->dimensione }}mq, Periodo Locazione: {{ $alloggio->periodo_locaziome }} mesi, Genere: {{ $alloggio->genere }}</h2> <!-- Dimensione, PeriodoLocazione, Genere (DA MODIFICARE) -->
                <h2 class="prezzo">Canone affitto: {{ $alloggio->canone_affitto }} &#8364; , Utenze: {{ $alloggio->utenze }} &#8364;</h2> <!-- CanoneAffitto, Utenze -->
                <h2>{{ $alloggio->descrizione }}</h2> <!-- Descrizione -->
            </section>
    @endforeach

    <!--Paginazione-->
    @include('pagination.paginator', ['paginator' => $products])

    @endisset()
--}}
</section>
@endsection
