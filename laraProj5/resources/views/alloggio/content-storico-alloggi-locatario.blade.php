@extends('template')
<link rel="stylesheet" type="text/css" href="{{ asset('css/catalogo.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/content-home-loggato.css') }}">
@section('title', 'Storico alloggi')


@section('content')
    <main class="main-container">
        <section class="catalogo">
            <div class='parent'>
                <div class='child'>
                    <h1>I tuoi alloggi:</h1>
                </div>
            </div>
            <!-- ALLOGGI -->
        @if(@isset($alloggiLocatario))   <!-- esiste o non è null -->
            @foreach ($alloggiLocatario as $alloggio)
                <!-- Alloggio -->
                    @include('helpers.alloggio')
            @endforeach
        @else
            <div class="parent">
                <div class="child">
                    <i class="fa-solid fa-house-circle-xmark fa-2xl" style="margin: 50px"></i>
                    <h1>Non hai nessun alloggio locato da visualizzare!</h1>
                </div>
            </div>
        @endisset
        </section>
    </main>
    <!--Paginazione-->
    @isset($alloggiLocatario)
        @include('pagination.paginator', ['paginator' => $alloggiLocatario])
    @endisset
@endsection
