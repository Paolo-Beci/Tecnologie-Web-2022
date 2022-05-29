<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>FlatMate | Gestione Faq</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('css/gestione-faq.css')}}">
</head>
<body>
<header class="header-anim">
    <a class="logo" href={{ route('gestione-faq') }}>
        <img src="{{asset('images/FlatMate_Logo_mini.png')}}" alt="FlatMate Logo">
    </a>
    <nav>
        <ul class="menu">
            <li>
                <!-- TO DO -->
                <button class="bottone_profilo" href="#profilo">
                    <img src="{{asset('images/user_icon.png')}}" alt="User Logo" width="10%" style="vertical-align:middle;horiz-align:left">
                    {{Auth::user()->username}}
                </button>
            </li>
        </ul>
    </nav>
</header>
<div class="div_faq">
    <section id="faq" class="faq">
        <h2>
            Operazione andata a buon fine!
        </h2>
        <p>Puoi tornare alla pagina di gestione Faq cliccando sul logo in alto a sinistra!
        </p>
    </section>
</div>
<footer>
    @include('layouts.footer')
</footer>
</body>
</html>