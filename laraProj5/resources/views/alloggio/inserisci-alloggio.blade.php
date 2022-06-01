@extends('template')
<link rel="stylesheet" type="text/css" href="{{ asset('css/inserisci-alloggio.css') }}">
@section('title', 'Inserisci annuncio')

@section('content')
    <main class="main-container">
        {{ Form::open(array('route' => 'inserimento_alloggio', 'class' => 'insert', 'files' => true)) }}
        <section class="primo-box">
            <h1> Form di inserimento dell'annuncio</h1>
            {!! csrf_field() !!}
            <div class="tipologia">
                <div>
                    {{ Form::radio('tipologia', 'appartamento', ['id' => 'appartamento']) }}
                    {{ Form::label('appartamento', 'Appartamento') }}
                </div>
                <div>
                    {{ Form::radio('tipologia', 'posto_letto', false, ['id' => 'posto_letto']) }}
                    {{ Form::label('posto_letto', 'Posto letto') }}
                </div>
            </div>

            <div class="caricamento-immagine">
                {{Form::file('image')}}
            </div>

        </section>
        <section class="secondo-box">

        </section>
        {{ Form::close() }}
    </main>
@endsection
