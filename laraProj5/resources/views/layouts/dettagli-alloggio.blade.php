@extends('template')
<link rel="stylesheet" type="text/css" href="{{ asset('css/dettagli-alloggio.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/content-home-loggato.css') }}">
@section('title', 'Dettagli alloggio')


@section('content')
    <main class="main-container">
        <section class="primo-box">
            <div class="image-container">
                <img class="immagine-alloggio" src="{{asset('images_case/1.jpg')}}" alt="Immagine alloggio"">
                {{--<img class="immagine-alloggio" src="{{ asset('images_case/'.$foto->id_foto.$foto->estensione) }}" alt="Immagine"> --}}
            </div>
            <div class="testo-alloggio">
                <div class="item-testo">
                    <h1>Descrizione</h1>
{{--                    {!!$alloggio->descrizione!!}--}}
                </div>
                <div class="item-testo">
                    <h1>Servizi</h1>
                    @foreach($servizi as  $servizio)
                        <p><i class="icon fa-solid fa-toilet-portable"></i> Bagno ({{$servizio->quantita}})</p>
                        @if($servizio->servizio!='Bagno')
                            <p><i class="icon-false fa-solid fa-toilet-portable fa-fade"></i> Bagno </p>
                        @endif
                        <p><i class="icon fa-solid fa-kitchen-set"></i> Cucina ({{$servizio->quantita}})</p>
                        @if($servizio->servizio!='Cucina')
                            <p><i class="icon-false fa-solid fa-kitchen-set fa-fade"></i> Cucina </p>
                        @endif
                        <p><i class="icon fa-solid fa-faucet"></i> Lavanderia ({{$servizio->quantita}})</p>
                        @if($servizio->servizio!='Lavanderia')
                            <p><i class="icon-false fa-solid fa-faucet fa-fade"></i> Lavanderia </p>
                        @endif
                        <p><i class="icon fa-solid fa-box-archive"></i> Ripostiglio ({{$servizio->quantita}})</p>
                        @if($servizio->servizio!='Ripostiglio')
                            <p><i class="icon-false fa-solid fa-box-archive fa-fade"></i> Ripostiglio </p>
                        @endif
                        <p><i class="icon fa-solid fa-square-parking"></i> Garage ({{$servizio->quantita}})</p>
                        @if($servizio->servizio!='Garage')
                            <p><i class="icon-false fa-solid fa-square-parking fa-fade"></i> Garage </p>
                        @endif
                        <p><i class="icon fa-solid fa-tree"></i> Giardino ({{$servizio->quantita}})</p>
                        @if($servizio->servizio!='Giardino')
                            <p><i class="icon-false fa-solid fa-tree fa-fade"></i> Giardino </p>
                        @endif
                        <p><i class="icon fa-solid fa-fan"></i> Aria Condizionata ({{$servizio->quantita}})</p>
                        @if($servizio->servizio!='AriaCondizionata')
                            <p><i class="icon-false fa-solid fa-fan fa-fade"></i> Aria Condizionata </p>
                        @endif
                        <p><i class="icon fa-solid fa-wifi"></i> WiFi ({{$servizio->quantita}})</p>
                        @if($servizio->servizio!='WiFi')
                            <p><i class="icon-false fa-solid fa-wifi fa-fade"></i> WiFi </p>
                        @endif
                        <p><i class="icon fa-solid fa-book"></i> Angolo Studio ({{$servizio->quantita}})</p>
                        @if($servizio->servizio!='AngoloStudio')
                            <p><i class="icon-false fa-solid fa-book fa-fade"></i> Angolo Studio </p>
                        @endif
                    @endforeach
                </div>
                <div class="item-testo">
                    <h1>Canone affitto</h1>
{{--                    {!!$alloggio->canone_affitto!!}--}}
                    <h1>Utenze</h1>
{{--                    {!!$alloggio->utenze!!}--}}
                </div>
                <div class="item-testo">
                    <h1>Periodo</h1>
{{--                    {!!$alloggio->periodo_locazione!!}--}}
                </div>
            </div>
        </section>
        <section class="secondo-box">
            <div class="contatto-alloggio">
                Contatto alloggio
            </div>
            <div class="mappa-alloggio">
                Dove si trova
                {{--<iframe width="600" height="500" id="gmap_canvas" loading="lazy" allowfullscreen
                        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDKrpbaW7f4DAhXkdkXw3T_f62wW2zFwtg&q=
                            {{ $alloggio->first()->via }} {{ $alloggio->first()->num_civico }} {{ $alloggio->first()->citta }}
                            "frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>--}}
            </div>
        </section>
    </main>
@endsection
