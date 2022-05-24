<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>FlatMate | Gestione Faq</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    {{--<link rel="stylesheet" href="{{asset('css/animations.css')}}">--}}
    {{--<link rel="stylesheet" href="{{asset('css/catalogo.css')}}">--}}
    {{--<link rel="stylesheet" href="{{asset('css/content-home-loggato.css')}}">--}}
    <link rel="stylesheet" href="{{asset('css/gestione-faq.css')}}">
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{asset('js/menu-script.js')}}" defer></script>
    <script src="{{asset('js/sign-up-continue.js')}}" defer></script>--}}
</head>
<body>
<header class="header-anim">
    <a class="logo" href={{ route('gestione-faq') }}>
        <img src="{{asset('images/FlatMate_Logo_mini.png')}}" alt="FlatMate Logo">
    </a>
    {{--<nav>
        @include('_navbar/_navbar-gestione-faq')
    </nav>--}}
</header>
<div class="div_faq">
    {{--@isset($faq)
        @include('helpers/faq')
    @endisset--}}
    <h1>INSERT FAQ WORK IN PROGRESS</h1>
</div>
<footer>
    @include('layouts.footer')
</footer>
</body>
</html>
