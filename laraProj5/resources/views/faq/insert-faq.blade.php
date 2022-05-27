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
    <link rel="stylesheet" href="{{asset('css/content-home-admin.css')}}">
</head>
<body>
<header class="header-anim">
    <a class="logo" href={{ route('gestione-faq') }}>
        <img src="{{asset('images/FlatMate_Logo_mini.png')}}" alt="FlatMate Logo">
    </a>
    <nav>
        <ul class="menu">
            <li>
                <a class="" href="{{ route($rotta_navbar) }}">{{$navbar}}</a>
            </li>
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
<div class="static">
    <h1>{{$azione}}</h1>
    <p>{{$descrizione}}</p>

    <div class="container-contact">
        <div class="wrap-contact">

            {{--apertura form--}}
            {{ Form::open(array('route' => $rotta, 'id' => 'addfaq', 'files' => true)) }}

            {{--form hidden per l'id, non si vedrà, solo per modifica faq--}}
            @isset($hidden)
                {{ Form::hidden('id_faq', $hidden) }}
            @endisset

            {{--div per la domanda--}}
            <div  class="wrap-input  {{--rs1-wrap-input--}}">
                {{ Form::label('domanda', 'Domanda', ['class' => 'label-input']) }}
                {{ Form::textarea('domanda', $domanda, ['class' => 'input', 'id' => 'domanda', 'rows' => 3]) }}
                @if ($errors->first('domanda'))
                    <ul class="errors">
                        @foreach ($errors->get('domanda') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>

            {{--div per la risposta--}}
            <div  class="wrap-input  {{--rs1-wrap-input--}}">
                {{ Form::label('risposta', 'Risposta', ['class' => 'label-input']) }}
                {{ Form::textarea('risposta', $risposta, ['class' => 'input', 'id' => 'risposta', 'rows' => 3]) }}
                @if ($errors->first('risposta'))
                    <ul class="errors">
                        @foreach ($errors->get('risposta') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>

            {{--div per la categoria--}}
            <div  class="wrap-input  {{--rs1-wrap-input--}}">
                {{ Form::label('target', 'Target', ['class' => 'label-input']) }}
                {{ Form::select('target', $tg, $target, ['class' => 'input','id' => 'target']) }}
            </div>

            {{--bottone di conferma--}}
            <div class="container-form-btn">
                {{ Form::submit($azione, ['class' => 'filter_button']) }}
            </div>

            {{--chiusura form--}}
            {{ Form::close() }}
        </div>
    </div>
</div>
<footer>
    @include('layouts.footer')
</footer>
</body>
</html>
