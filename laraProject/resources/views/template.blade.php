<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('css/content-home-guest.css')}}">

    @yield('css')

    <!-- FONTAWESOME ICONS -->
    <script src="https://kit.fontawesome.com/644d83f971.js" crossorigin="anonymous"></script>
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('js/menu-script.js')}}"></script>
    <script src="{{asset('js/reviews.js')}}"></script>
    <script src="{{asset('js/popup.js')}}"></script> 

    @yield('js')

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
            @auth
                @php
                    $datiPersonali = App\Models\Resources\DatiPersonali::find(auth()->user()->dati_personali);
                    $profilePhoto = $datiPersonali->id_foto_profilo . $datiPersonali->estensione_p;
                    if($profilePhoto == '')
                        $profilePhoto = 'user_icon.png';
                @endphp
                @include('layouts/_navbar', ['profilePhoto' => $profilePhoto])
            @endauth
            @guest
                @include('layouts/_navbar')
            @endguest
        </nav>
    </header>
        @yield('content')
    <footer>
        @include('layouts/footer')
        @include('layouts/popup')
    </footer>
</body>
</html>
