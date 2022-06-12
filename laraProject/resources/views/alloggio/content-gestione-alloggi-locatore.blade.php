@extends('template')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/catalogo.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/content-home-loggato.css') }}">
@endsection

@section('title', 'Gestione alloggi')

@section('content')
    <main class="main-container">
        <section class="catalogo">
            <h1 class="">I tuoi alloggi:</h1>
            <!-- ALLOGGI -->
            @isset($alloggiLocatore)   <!-- esiste o non è null -->
                @foreach ($alloggiLocatore as $alloggio)
                <!-- Alloggio -->
                @include('helpers.alloggio') <!-- ad ogni alloggio associo la sua carta descrittiva, che se cliccabile mi mostra il pop-up che non mi fa approfondire -->
                @endforeach
            @endisset
        </section>
    </main>
    <!--Paginazione-->
    @include('pagination.paginator', ['paginator' => $alloggiLocatore])
@endsection
