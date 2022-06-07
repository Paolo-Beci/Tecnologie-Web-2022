<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">

    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/content-public.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('css/animations.css')}}">
    <link rel="stylesheet" href="{{asset('css/gestione-alloggi.css')}}">
    @yield('link')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{asset('js/menu-script.js')}}" defer></script>
    <script src="{{asset('js/forms-script.js')}}" defer></script>
    <script src="{{asset('js/sign-up-continue.js')}}" defer></script>
    <script src="{{asset('js/reviews.js')}}" defer></script>
    <script src="{{asset('js/popup.js')}}" defer></script>
    <!-- FONTAWESOME ICONS -->
    <script src="https://kit.fontawesome.com/644d83f971.js" crossorigin="anonymous"></script>
    @yield('scripts')

    <title>FlatMate | @yield('title', 'Homepage')</title>
</head>
<body>
    <header class="header-anim">
        @if (isset(auth()->user()->ruolo))
            <a class="logo" href="{{route('home-' . auth()->user()->ruolo)}}">
        @else
            <a class="logo" href="{{route('home-guest')}}">
        @endif
            <img src="{{asset('images/FlatMate_Logo_mini.png')}}" alt="FlatMate Logo">
        </a>
        <nav>
            @include('layouts/_navbar')
        </nav>
    </header>
        @yield('content')
    <footer>
        @include('layouts/footer')
        @include('layouts/popup')
    </footer>
</body>
</html>
