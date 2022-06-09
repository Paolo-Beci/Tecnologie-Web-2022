@extends('template')

@section('css')
    <link rel="stylesheet" href="{{asset('css/gestione-faq.css')}}">
    <link rel="stylesheet" href="{{asset('css/content-home-admin.css')}}">
@endsection

@section('title', 'Gestione Faq')

@section('content')
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
            <div  class="wrap-input{{--rs1-wrap-input--}}">
                {{ Form::label('domanda', 'Domanda') }}
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
            <div  class="wrap-input{{--rs1-wrap-input--}}">
                {{ Form::label('risposta', 'Risposta') }}
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
            <div  class="wrap-input{{--rs1-wrap-input--}}">
                {{ Form::label('target', 'Target') }}
                {{ Form::select('target', $tg, $target, ['class' => 'input','id' => 'target']) }}
            </div>

            {{--bottone di conferma--}}
            <div class="container-form-btn">
                {{ Form::submit($azione, ['class' => 'filter_button_home', 'onclick' => "return confirm('Sei sicuro di voler proseguire?')"]) }}
            </div>

            {{--chiusura form--}}
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
