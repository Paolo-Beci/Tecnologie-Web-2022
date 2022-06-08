@extends('template')

@section('css')
    <link rel="stylesheet" href="{{asset('css/content-home-guest.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/content-home-admin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/content-home-loggato.css') }}">
    <link rel="stylesheet" href="{{asset('css/animations.css')}}">
@endsection

@section('js')
    <script src="{{asset('js/forms-script.js')}}" defer></script>
@endsection

@section('title', 'Home')

@section('content')

    {{-- Sezione utente non autenticato --}}
    @guest
        @include('home/home-guest')
    @endguest

    {{-- Sezione locatore --}}
    @can('isLocatore')
        @include('home/home-locatore')
    @endcan

    {{-- Sezione --}}
    @can('isLocatario')
        @include('home/home-locatario')
    @endcan

    {{-- Sezione Admin --}}
    @can('isAdmin')
        @include('home/home-admin')
    @endcan

@endsection
