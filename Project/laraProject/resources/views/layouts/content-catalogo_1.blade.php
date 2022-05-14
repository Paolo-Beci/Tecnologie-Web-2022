@extends('home')

@section('content')
<section id="catalogo" class="catalogo">
    <section class="lateral-bar">
        <h1>Filtri ricerca</h1>
        <h2>Città</h2>
        <h2>Fascia di prezzo</h2>
        <h2>Tipologia</h2>
        <h2>Caratteristiche dell'alloggio</h2>
        <h2>Periodo di locazione</h2>
    </section>
    <section class="container-inserzione">
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
</section>
@endsection
