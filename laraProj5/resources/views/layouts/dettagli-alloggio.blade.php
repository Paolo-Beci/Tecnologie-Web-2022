@extends('template')
<link rel="stylesheet" type="text/css" href="{{ asset('css/dettagli-alloggio.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/content-home-loggato.css') }}">
@section('title', 'Dettagli alloggio')


@section('content')
@isset($alloggio)
@foreach($alloggio as $dettaglioalloggio)
    <main class="main-container">
        <section class="primo-box">
            <div class="image-container">
                @isset($foto)
                @foreach($foto as $singolafoto)
                    <img class="immagine-alloggio" src="{{ asset('images_case/'.$singolafoto->id_foto.$singolafoto->estensione) }}" alt="Immagine">
                @endforeach
                @endisset
            </div>
            <div class="testo-alloggio">
                <div class="item-desc">
                    @isset($dettaglioalloggio)
                        <h1>{{$dettaglioalloggio->tipologia}}  {{$dettaglioalloggio->via}},  {{$dettaglioalloggio->num_civico}}, {{$dettaglioalloggio->citta}} {{$dettaglioalloggio->cap}}<br> Piano: {{$dettaglioalloggio->piano}} Interno: {{$dettaglioalloggio->interno}}</h1>
                    @endisset
                </div>
                <div class="item-desc">
                    <h2>Descrizione</h2>
                    @isset($dettaglioalloggio)
                        <p>{{$dettaglioalloggio->descrizione}}</p>
                        <hr style="margin: 10px">
                        @if(is_null($dettaglioalloggio->dimensione))
                            <p>Dimensione: NON SPECIFICATO</p>
                        @else
                            <p>Dimensione: {{$dettaglioalloggio->dimensione}} metri quadri</p>
                        @endif

                        @if(is_null($dettaglioalloggio->num_posti_letto_tot))
                            <p>Numero di posti letto totali: NON SPECIFICATO</p>
                        @else
                            <p>Numero di posti letto totali: {{$dettaglioalloggio->num_posti_letto_tot}}</p>
                        @endif
                    @endisset
                </div>
                <div class="item-desc">
                    <h2>Servizi</h2>
                    <div class="box-servizi">
                        @include('helpers/dettaglio-servizi')
                    </div>
                </div>
                <div class="item-desc">
                    <div class="box-prezzi">
                        <div class="box-prezzo">
                            <h2>Canone affitto</h2>
                            @isset($dettaglioalloggio)
                                @if(is_null($dettaglioalloggio->canone_affitto))
                                    <h2>&#8364; 0</h2>
                                @else
                                    <h2>&#8364;{{$dettaglioalloggio->canone_affitto}}</h2>
                                @endif
                            @endisset
                        </div>
                        <div class="box-prezzo">
                            <h2>Utenze</h2>
                            @isset($dettaglioalloggio)
                                @if(is_null($dettaglioalloggio->utenze))
                                    <h2>&#8364; 0</h2>
                                @else
                                    <h2>&#8364;{{$dettaglioalloggio->utenze}}</h2>
                                @endif
                            @endisset
                        </div>
                    </div>
                </div>
                <div class="item-desc">
                    <h2>Altre informazioni</h2>
                    @isset($dettaglioalloggio)
                        <p>Periodo di locazione: {{$dettaglioalloggio->periodo_locazione}} mesi</p>
                        @if($dettaglioalloggio->genere == 'm')
                            <p>Genere: Uomo</p>
                        @elseif($dettaglioalloggio->genere == 'f')
                            <p>Genere ammesso: Donna</p>
                        @else
                            <p>Genere ammesso: Uomo e Donna</p>
                        @endif
                        <p>Eta minima: {{$dettaglioalloggio->eta_minima}}</p>
                        <p>Eta massima: {{$dettaglioalloggio->eta_massima}}</p>
                    @endisset
                </div>
            </div>
        </section>
        <hr style="margin-right: 50px; margin-left: 50px">
        <section class="secondo-box">
            <div class="contatto-alloggio">
                <h2>Contatti host</h2>
                <div class="img-contatto">
                    <p>Immagine</p>
                </div>
                <div class="info-contatto">
                    <p class="item-desc">Nome - Cognome - username</p>
                    <p class="item-desc fa-solid fa-envelope">Mail</p><br>
                    <p class="item-desc fa-solid fa-phone">Telefono</p>
                </div>
                <button class="filter_button" type="submit" onclick=alert('Inviato!')>Comunicagli il tuo interesse!</button>
            </div>
            <div class="mappa-alloggio">
                <iframe width="600" height="500" id="gmap_canvas" loading="lazy" allowfullscreen
                        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDKrpbaW7f4DAhXkdkXw3T_f62wW2zFwtg&q=
                            {{ $dettaglioalloggio->via }} {{ $dettaglioalloggio->num_civico }} {{ $dettaglioalloggio->citta }}
                            "frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            </div>
        </section>
    </main>
@endforeach
@endisset

@endsection
