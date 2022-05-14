<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>FlatMate | @yield('title', 'Case in affitto')</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/animations.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('css/catalogo.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../resources/js/menu-script.js" defer></script>
    <script src="../resources/js/forms-script.js" defer></script>
</head>
<body>
    <header class="header-anim">
        <a class="logo" href="index.html">
            <img src="{{asset('images/FlatMate_Logo_mini.png')}}" alt="FlatMate Logo">
        </a>
        <nav>
            @include('layouts/nav-catalogo')
        </nav>
    </header>
        @yield('content')
    <footer>
        @include('layouts/footer')
    </footer>
</body>
</html>

