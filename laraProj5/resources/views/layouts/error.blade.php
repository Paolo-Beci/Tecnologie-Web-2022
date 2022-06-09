@extends('template')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/error-page.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/content-home-loggato.css') }}">
@endsection

@section('title', 'Errore')

@section('content')

<section class="error-section">
    <img src="{{asset('images/error-sign.png')}}" alt="Errore">
    <p>
        Non sei autorizzato a visualizzare questa rotta!
        <br>
        Tornatene da dove sei venuto!
    </p>
</section>

@endsection