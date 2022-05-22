<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>FlatMate | @yield('title', 'Catalogo')</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('css/animations.css')}}">
    <link rel="stylesheet" href="{{asset('css/catalogo.css')}}">
    <link rel="stylesheet" href="{{asset('css/content-home-loggato.css')}}">
    <link rel="stylesheet" href="{{asset('css/content-home-admin.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{asset('js/menu-script.js')}}" defer></script>
    <script src="{{asset('js/sign-up-continue.js')}}" defer></script>
</head>
<body>
    <header class="header-anim">
        <a class="logo" href="{{route('homepage')}}">
            <img src="{{asset('images/FlatMate_Logo_mini.png')}}" alt="FlatMate Logo">
        </a>
        <nav>
            @isset($user)
                @if ($user=='locatore')
                    @include('layouts/_navbar-catalogo-locatore')
                @elseif($user=='locatario')
                    @include('layouts/_navbar-catalogo-locatario')
                @else
                    @include('layouts/_navbar-catalogo-public')
                @endif
            @endisset
        </nav>
    </header>
    @yield('content')
    <footer>
        @include('layouts/footer')
    </footer>
</body>
</html>
