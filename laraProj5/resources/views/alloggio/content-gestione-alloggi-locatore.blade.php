@extends('template')
<link rel="stylesheet" type="text/css" href="{{ asset('css/catalogo.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/content-home-loggato.css') }}">
@section('title', 'Gestione alloggi')


@section('content')
    <main class="main-container">
        <section class="catalogo">
            <h1 class="">I tuoi alloggi:</h1>
            <!-- ALLOGGI -->
            @isset($alloggiLocatore)   <!-- esiste o non è null -->
                @foreach ($alloggiLocatore as $alloggio)
                <!-- Alloggio -->
                @include('helpers.alloggio')
                @endforeach
            @endisset
        </section>
    </main>
    <!--Paginazione-->
    @include('pagination.paginator', ['paginator' => $alloggiLocatore])
@endsection
