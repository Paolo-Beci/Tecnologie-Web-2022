@extends('template')
<link rel="stylesheet" type="text/css" href="{{ asset('css/content-account.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/content-home-loggato.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/gestione-alloggi.css') }}">
@section('title', 'Account')


@section('content')
    @isset($dati_personali)
    @foreach($dati_personali as $dati)
            <main class="main-container">
                <section class="primo-box">
                    <h1>Ciao {{$dati->nome}} {{$dati->cognome}} !<br> Questa è la tua area privata!</h1>
                    <p style="margin-top: 10px"> Puoi visualizzare e modificare i tuoi dati personali </p>
                    <div class="img-container">
{{--                        TO DO con vere immagini --}}
                        <img src="{{asset('images_profilo/no_image.png')}}" alt="immagine profilo" class="img-profilo">
                    </div>
                </section>
                <hr style="margin-right: 50px; margin-left: 50px">
                {{ Form::open(array('route' => 'modifica-dati', 'class' => 'modifica-dati')) }}
                <section class="secondo-box">
                    <fieldset class="colonna form-group">
                        <div class="underline">
                            {{ Form::text('name', $dati->nome, ['placeholder' => 'Nome']) }}
                        </div>

                        @if ($errors->first('name'))
                            <ul class="errors">
                                @foreach ($errors->get('name') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <div class="underline">
                            {{ Form::text('birthplace', $dati->luogo_nascita, ['placeholder' => 'Luogo di nascita']) }}
                        </div>

                        @if ($errors->first('birthplace'))
                            <ul class="errors">
                                @foreach ($errors->get('birthplace') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <div class="gender">
                            @if($dati->sesso == 'm')
                                <div>
                                    {{ Form::radio('gender', 'm', ['id' => 'male']) }}
                                    {{ Form::label('male', 'Uomo') }}
                                </div>
                                <div>
                                    {{ Form::radio('gender', 'f', false, ['id' => 'female']) }}
                                    {{ Form::label('female', 'Donna') }}
                                </div>
                            @else
                                <div>
                                    {{ Form::radio('gender', 'm', false, ['id' => 'male']) }}
                                    {{ Form::label('male', 'Uomo') }}
                                </div>
                                <div>
                                    {{ Form::radio('gender', 'f', ['id' => 'female']) }}
                                    {{ Form::label('female', 'Donna') }}
                                </div>
                            @endif
                        </div>

                        <div class="underline">
                            {{ Form::text('city', $dati->citta, ['placeholder' => 'Città']) }}
                        </div>

                        @if ($errors->first('city'))
                            <ul class="errors">
                                @foreach ($errors->get('city') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <div class="underline">
                            {{ Form::text('house-number', $dati->num_civico, ['placeholder' => 'Numero civico']) }}
                        </div>

                        @if ($errors->first('house-number'))
                            <ul class="errors">
                                @foreach ($errors->get('house-number') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <div class="underline">
                            {{ Form::text('email', $dati->mail, ['placeholder' => 'E-mail']) }}
                        </div>

                    </fieldset>
                    <fieldset class="colonna form-group">
                        <div class="underline">
                            {{ Form::text('surname', $dati->cognome, ['placeholder' => 'Cognome']) }}
                        </div>

                        @if ($errors->first('surname'))
                            <ul class="errors">
                                @foreach ($errors->get('surname') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <div class="underline">
                            {{ Form::date('birthtime', $dati->data_nascita, ['placeholder' => 'Data di nascita']) }}    {{-- non funzionaaaaah --}}
                        </div>

                        @if ($errors->first('birthtime'))
                            <ul class="errors">
                                @foreach ($errors->get('birthtime') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <div class="underline">
                            {{ Form::text('cf', $dati->codice_fiscale, ['placeholder' => 'Codice fiscale']) }}
                        </div>

                        @if ($errors->first('cf'))
                            <ul class="errors">
                                @foreach ($errors->get('cf') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <div class="underline">
                            {{ Form::text('street', $dati->via, ['placeholder' => 'Via']) }}
                        </div>

                        @if ($errors->first('street'))
                            <ul class="errors">
                                @foreach ($errors->get('street') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <div class="underline">
                            {{ Form::text('cap', $dati->cap, ['placeholder' => 'CAP']) }}
                        </div>

                        @if ($errors->first('cap'))
                            <ul class="errors">
                                @foreach ($errors->get('cap') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <div class="underline">
                            {{ Form::text('telephone', $dati->cellulare, ['placeholder' => 'Cellulare']) }}
                        </div>

                        @if ($errors->first('telephone'))
                            <ul class="errors">
                                @foreach ($errors->get('telephone') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif

                    </fieldset>
                </section>
                <section class="terzo-box">
                    {{ Form::submit('Modifica', ['class' => 'filter_button']) }}
                </section>
                {!! Form::close() !!}
            </main>
    @endforeach
    @endisset

@endsection
