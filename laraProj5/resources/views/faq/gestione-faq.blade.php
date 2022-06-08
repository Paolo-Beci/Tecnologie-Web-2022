@extends('template')

@section('css')
    <link rel="stylesheet" href="{{asset('css/gestione-faq.css')}}">
@endsection

@section('title', 'Gestione Faq')

@section('content')
    <div class="div_faq">
        @isset($faq)
            @include('helpers.faq')
        @endisset
    </div>
@endsection
