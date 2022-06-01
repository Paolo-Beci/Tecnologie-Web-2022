@extends('template')
<link rel="stylesheet" type="text/css" href="{{ asset('css/catalogo.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/content-home-loggato.css') }}">
@section('title', 'Gestione alloggi')


@section('content')
    <main class="main-container">
        <section class="catalogo">
            <div class='parent'>
                <div class='child'>
                    <h1>I tuoi alloggi:</h1>
                </div>
                <div class='child'>
                    <a href="{{route('')}}">
                    <button class="filter_button" type="submit" onclick=alert('WorkInProgress')>Inserisci annuncio</button>
                    </a>
                </div>
            </div>
            <!-- ALLOGGI -->
            @isset($alloggiLocatore)   <!-- esiste o non è null -->
                @foreach ($alloggiLocatore as $alloggioLocatore)
                <!-- Alloggio -->
                @include('helpers.alloggio-locatore')
                @endforeach
            @endisset
        </section>
    </main>
    <!--Paginazione-->
    @include('pagination.paginator', ['paginator' => $alloggiLocatore])
@endsection
