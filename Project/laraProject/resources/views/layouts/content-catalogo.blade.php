@extends('template')

@section('content')
<section id="catalogo" class="catalogo">
    <aside class="lateral-bar">
        @include('helpers/filtri')
    </aside>
    <section class="container-inserzione">
            <h1>Case in affitto</h1>
            <!-- Item inserzione -->
            <article class="item-inserzione" onclick="">
                @include('helpers/immagine-inserzione')
                <section class="item-descrizione">
                    <h1>Appartamento/Posto Letto (genere)</h1>
                    <h1>Via, Città, Num.Civico</h1>
                    <h2>Dimensione, Periodo Locazione, Utenze</h2>
                    <h2>Canone affitto: 200 &#8364;</h2>
                </section>
            </article>
            <!-- Item inserzione -->
            <article class="item-inserzione" onclick="">
                <section class="item-immagine item2"></section>
                <section class="item-descrizione">
                    <h1>Appartamento/Posto Letto (genere)</h1>
                    <h1>Via, Città, Num.Civico</h1>
                    <h2>Dimensione, Periodo Locazione, Utenze</h2>
                    <h2>Canone affitto: 200 &#8364;</h2>
                </section>
            </article>
            <!-- Item inserzione -->
            <article class="item-inserzione" onclick="">
                <section class="item-immagine item3"></section>
                <section class="item-descrizione">
                    <h1>Appartamento/Posto Letto (genere)</h1>
                    <h1>Via, Città, Num.Civico</h1>
                    <h2>Dimensione, Periodo Locazione, Utenze</h2>
                    <h2>Canone affitto: 200 &#8364;</h2>
                </section>
            </article>
            <!-- Item inserzione -->
            <article class="item-inserzione" onclick="">
                <section class="item-immagine item6"></section>
                <section class="item-descrizione">
                    <h1>Appartamento/Posto Letto (genere)</h1>
                    <h1>Via, Città, Num.Civico</h1>
                    <h2>Dimensione, Periodo Locazione, Utenze</h2>
                    <h2>Canone affitto: 200 &#8364;</h2>
                </section>
            </article>
    </section>
    <!-- DA FARE UNA VOLTA IMPLEMENTATO IL DB -->
        @isset($alloggio)   <!-- esiste o non è null -->
        @foreach ($alloggio as $alloggio)
            <!-- Item inserzione -->
                <article class="item-inserzione" onclick="">
                    <div class="item-immagine item1"></div>
                    <div class="item-info">
                        <h1>Appartamento/Posto Letto (genere) {{ $alloggio ->genere }}</h1>
                        <h1>Via, Città, Num.Civico {{ $alloggio ->Via }}</h1>
                        <h2>Dimensione, Periodo Locazione, Utenze</h2>
                        <h2>Canone affitto: 200 &#8364;</h2>
                    </div>
                </article>
        @endforeach

        <!--Paginazione-->
        @include('pagination.paginator', ['paginator' => $products])

        @endisset()
</section>
@endsection
