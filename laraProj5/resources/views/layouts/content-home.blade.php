@extends('template')
<link rel="stylesheet" type="text/css" href="{{ asset('css/content-home-admin.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/content-home-loggato.css') }}">
@section('title', 'Home')

@section('content')

    {{-- Sezione utente non autenticato --}}
    @guest
        @include('layouts/home/home-guest')
    @endguest

    {{-- Sezione locatore --}}
    @can('isLocatore')
        @include('layouts/home/home-locatore')
    @endcan

    {{-- Sezione --}}
    @can('isLocatario')
        @include('layouts/home/home-locatario')
    @endcan

    {{-- Sezione Admin --}}
    @can('isAdmin')
        @include('layouts/home/home-admin')
    @endcan

@endsection
