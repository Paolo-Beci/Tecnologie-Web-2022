@extends('template')
<link rel="stylesheet" type="text/css" href="{{ asset('css/catalogo.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/content-home-loggato.css') }}">
<script src="{{asset('js/catalogo.js')}}" defer></script>
@section('title', 'Catalogo')


@section('content')
    <main class="main-container">
        @can('isLocatario')
            <aside class="lateral-bar">
                @include('helpers/filtri')
            </aside>
        @endcan
        <section class="catalogo">
            <h1>Alloggi in affitto</h1>
            <article class="alloggi-buttons">
                @can('isLocatario')
                    <a href="{{route('catalogo-appartamenti-locatario')}}">
                @endcan
                @can('isLocatore')
                    <a href="{{route('catalogo-appartamenti-locatore')}}">
                @endcan
                @guest
                    <a href="{{route('catalogo-appartamenti')}}">
                @endcan
                @can('isAdmin')
                    <a href="{{route('catalogo-appartamenti-admin')}}">
                @endcan
                    <button class="appartamenti-button">
                        <img class="button-img" src="{{asset('images/apartment_icon.png')}}" alt="Appartamenti">
                        APPARTAMENTI
                    </button>
                </a>
                @can('isLocatario')
                    <a href="{{route('catalogo-posti-letto-locatario')}}">
                @endcan
                @can('isLocatore')
                    <a href="{{route('catalogo-posti-letto-locatore')}}">
                 @endcan
                @guest
                    <a href="{{route('catalogo-posti-letto')}}">
                @endcan
                @can('isAdmin')
                    <a href="{{route('catalogo-posti-letto-admin')}}">
                @endcan
                    <button class="posti-letto-button">
                        <img class="button-img" src="{{asset('images/bed_icon.png')}}" alt="Posti letto">
                        POSTI LETTO
                    </button>
                </a></a></a></a></a></a></a>
            </article>
            <!-- ALLOGGI -->
            @isset($alloggi)   <!-- esiste o non è null -->
                @foreach ($alloggi as $alloggio)
                <!-- Alloggio -->
                @include('helpers/alloggio')
                @endforeach
            @endisset
        </section>
    </main>
    <!--Paginazione-->
    @include('pagination.paginator', ['paginator' => $alloggi])

@endsection
