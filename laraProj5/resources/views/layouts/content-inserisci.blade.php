<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">

        @section('link')
            <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="{{asset('css/style.css')}}">
            <link rel="stylesheet" href="{{asset('css/header.css')}}">
            <link rel="stylesheet" href="{{asset('css/footer.css')}}">
        @show

        @section('scripts')
        @show

        <title>FlatMate | @yield('title', 'Gestione alloggi')</title>
    </head>
    <body id="bodylocatore">
        <div id="wrapper">
            <div id="menu">
                @include('_navbar._navbar-locatore')
            </div>

            <!-- end #menu -->
            <div id="page">
                <div id="page-bgtop">
                    <div id="page-bgbtm">
                        @yield('content')
                        <div style="clear: both;">&nbsp;</div>
                    </div>
                </div>
            </div>

            <footer>
                @include('layouts.footer')
            </footer>
        </div>
    </body>
