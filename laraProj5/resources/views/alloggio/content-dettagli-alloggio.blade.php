@extends('template')
<link rel="stylesheet" type="text/css" href="{{ asset('css/dettagli-alloggio.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/content-home-loggato.css') }}">
@section('title', 'Dettagli alloggio')


@section('content')
@isset($info_generali)
    <main class="main-container">
        <section class="primo-box">
            <div class="image-container">
                <img class="immagine-alloggio"
                     src="{{ asset('images_case/'.$info_generali->first()->alloggio.$info_generali->first()->estensione) }}"
                     alt="Immagine">
            </div>

            <div class="testo-alloggio">
                <div class="item-desc">
                    @if($info_generali->first()->tipologia == 'Appartamento')
                        <h1>{{$info_generali->first()->tipologia}}</h1>
                    @else
                        <h1>Posto letto</h1>
                    @endif
                    <h1>{{$info_generali->first()->via}}
                        , {{$info_generali->first()->num_civico}}
                        , {{$info_generali->first()->citta}} {{$info_generali->first()->cap}}<br>
                        Piano: {{$info_generali->first()->piano}} Interno: {{$info_generali->first()->interno}}</h1>

                    @if($info_generali->first()->stato == 'libero')
                        <h2 style="color: green"> Libero -> pubblicato il: {{$info_generali->first()->data_interazione}}</h2>
                    @else
                        <h2 style="color: red"> Locato </h2>
                    @endif

                    <div class="item-desc">
                        <h2>Descrizione</h2>
                        <p>{{$info_generali->first()->descrizione}}</p>
                        <hr style="margin: 10px">
                        @if(is_null($info_generali->first()->dimensione))
                            <p>Dimensione: NON SPECIFICATO</p>
                        @else
                            <p>Dimensione: {{$info_generali->first()->dimensione}} metri quadri</p>
                        @endif

                        @if(is_null($info_generali->first()->num_posti_letto_tot))
                            <p>Numero di posti letto totali: NON SPECIFICATO</p>
                        @else
                            <p>Numero di posti letto totali: {{$info_generali->first()->num_posti_letto_tot}}</p>
                        @endif
                        @if($info_generali->first()->tipologia == 'Appartamento')
                            <p>Numero di camere: {{$info_generali->first()->num_camere}}</p>
                        @elseif($info_generali->first()->tipologia == 'Posto_letto')
                            <p>Tipologia di camera: {{$info_generali->first()->tipologia_camera}}</p>
                        @endif
                    </div>
                    <div class="item-desc">
                        <h2>Servizi</h2>
                        <div class="box-servizi">
                            @include('helpers.dettaglio-servizi')
                        </div>
                    </div>
                    <div class="item-desc">
                        <div class="box-prezzi">
                            <div class="box-prezzo">
                                <h2>Canone affitto</h2>
                                @if(is_null($info_generali->first()->canone_affitto))
                                    <h2>&#8364; 0</h2>
                                @else
                                    <h2>&#8364;{{$info_generali->first()->canone_affitto}}</h2>
                                @endif
                            </div>
                            <div class="box-prezzo">
                                <h2>Utenze</h2>
                                @if(is_null($info_generali->first()->utenze))
                                    <h2>&#8364; 0</h2>
                                @else
                                    <h2>&#8364;{{$info_generali->first()->utenze}}</h2>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="item-desc">
                        <h2>Altre informazioni</h2>
                            <p>Periodo di locazione: {{$info_generali->first()->periodo_locazione}} mesi</p>
                            @if($info_generali->first()->genere == 'm')
                                <p>Genere: Uomo</p>
                            @elseif($info_generali->first()->genere == 'f')
                                <p>Genere ammesso: Donna</p>
                            @else
                                <p>Genere ammesso: Uomo e Donna</p>
                            @endif
                            <p>Eta minima: {{$info_generali->first()->eta_minima}}</p>
                            <p>Eta massima: {{$info_generali->first()->eta_massima}}</p>
                    </div>
                </div>
            </div>
        </section>
        <hr style="margin-right: 50px; margin-left: 50px">
        <section class="secondo-box">
            <div class="contatto-alloggio">
                <h2>Contatti host</h2>
                <div class="img-contatto">
                    @if(is_null($info_generali->first()->id_foto_profilo))
                        <img src="{{ asset('images_profilo/no_image.png') }}" alt="immagine profilo" class="img-profilo">
                    @else
                        <img src="{{ asset('images_profilo/'.$info_generali->first()->id_foto_profilo.$info_generali->first()->estensione_p) }}" alt="immagine profilo" class="img-profilo">
                    @endif
                </div>
                <div class="info-contatto">
                    <p class="item-desc">{{$info_generali->first()->nome}} {{$info_generali->first()->cognome}} - {{$info_generali->first()->username}}</p>
                    <p class="item-desc"><i class="icon fa-solid fa-envelope"></i>{{$info_generali->first()->mail}}</p>
                    <p class="item-desc"><i class="icon fa-solid fa-phone"></i>{{$info_generali->first()->cellulare}}</p>
                </div>
                @if($info_generali->first()->stato != 'locato')
                    <div class="btn-contatto">
                        {{ Form::open(array('route' => 'opzionamento')) }}
                            {{ Form::hidden('contenuto', 'Ciao, ho visto la casa e sono interessato') }}
                            {{ Form::hidden('mittente', auth()->user()->id) }}
                            {{ Form::hidden('destinatario', $info_generali->first()->id) }}
                            {{ Form::hidden('alloggio', $info_generali->first()->id_alloggio) }}
                            {{ Form::button('Inizia una chat!', ['type' => 'submit', 'class' => 'filter_button']) }}
                        {{ Form::close() }}
                    </div>
                @endif
            </div>
            <div class="mappa-alloggio">
                <iframe width="600" height="500" id="gmap_canvas" loading="lazy" allowfullscreen
                        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDKrpbaW7f4DAhXkdkXw3T_f62wW2zFwtg&q=
                        {{ $info_generali->first()->via }} {{ $info_generali->first()->num_civico }} {{ $info_generali->first()->citta }}
                            " frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            </div>
        </section>
    </main>
@endisset
@endsection
