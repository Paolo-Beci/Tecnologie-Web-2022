@extends('template')
<link rel="stylesheet" type="text/css" href="{{ asset('css/content-account.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/content-home-loggato.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/gestione-alloggi.css') }}">
@section('title', 'Account')

<!-- Vista che visualizza i dati personali e li rende modificabili all'utente loggato -->
@section('content')
@isset($dati_personali)
@foreach($dati_personali as $dati)
    <main class="main-container">
        <section class="primo-box">
            <h1>Ciao {{$dati->nome}} {{$dati->cognome}} !<br> Questa è la tua area privata!</h1>
            <p style="margin-top: 10px"> Puoi visualizzare e modificare i tuoi dati personali </p>
            <div class="img-container">
                @if(is_null($dati->id_foto_profilo))
                    <img src="{{ asset('images_profilo/no_image.png') }}" alt="immagine profilo" class="img-profilo">
                @else
                    <img src="{{ asset('images_profilo/'.$dati->id_foto_profilo.$dati->estensione_p) }}" alt="immagine profilo" class="img-profilo">
                @endif
            </div>
            <div class="item">
                <h1>Inserisci o modifica l'immagine di profilo!</h1>
                {{ Form::file('immagine', ['id' => 'immagine']) }}
            </div>
        </section>
        <hr style="margin-right: 50px; margin-left: 50px">
        <!-- Differenziazione delle rotte in base al tipo di utente -->
        @can('isLocatore')
            {{ Form::open(array('route' => 'modifica-dati-locatore', 'class' => 'modifica-dati')) }}
        @endcan
        @can('isLocatario')
            {{ Form::open(array('route' => 'modifica-dati-locatario', 'class' => 'modifica-dati')) }}
        @endcan
        <section class="secondo-box">
            <fieldset class="colonna form-group">
                <!-- Username -->
                <div class="item">
                    {{ Form::label('username', 'Username attuale: ', ['class' => 'label-form']) }}
                    {{ Form::label('username', $dati->username, ['class' => 'label-form']) }}
                    {{ Form::text('username', '', ['placeholder' => 'Nuovo Username']) }}
                    <span class="underline"></span>
                </div>
                @if ($errors->first('username'))
                    <ul class="errors">
                        @foreach ($errors->get('username') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif

                <!-- Nome -->
                <div class="item">
                    {{ Form::label('name', 'Nome', ['class' => 'label-form'])}}
                    {{ Form::text('name', $dati->nome, ['placeholder' => 'Nome']) }}
                    <span class="underline"></span>
                </div>
                @if ($errors->first('name'))
                    <ul class="errors">
                        @foreach ($errors->get('name') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif

                <!-- Luogo di nascita -->
                <div class="item">
                    {{ Form::label('birthplace', 'Luogo di nascita', ['class' => 'label-form'])}}
                    {{ Form::text('birthplace', $dati->luogo_nascita, ['placeholder' => 'Luogo di nascita']) }}
                    <span class="underline"></span>
                </div>
                @if ($errors->first('birthplace'))
                    <ul class="errors">
                        @foreach ($errors->get('birthplace') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif

                <!-- Sesso -->
                <div class="item">
                    {{ Form::label('gender', 'Sesso', ['class' => 'label-form'])}}
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

                <!-- Città -->
                <div class="item">
                    {{ Form::label('city', 'Città', ['class' => 'label-form'])}}
                    {{ Form::text('city', $dati->citta, ['placeholder' => 'Città']) }}
                    <span class="underline"></span>
                </div>
                @if ($errors->first('city'))
                    <ul class="errors">
                        @foreach ($errors->get('city') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif

                <!-- Numero civico -->
                <div class="item">
                    {{ Form::label('house-number', 'Numero civico', ['class' => 'label-form'])}}
                    {{ Form::text('house-number', $dati->num_civico, ['placeholder' => 'Numero civico']) }}
                    <span class="underline"></span>
                </div>
                @if ($errors->first('house-number'))
                    <ul class="errors">
                        @foreach ($errors->get('house-number') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif

                <!-- Mail -->
                <div class="item">
                    {{ Form::label('email', 'Email', ['class' => 'label-form'])}}
                    {{ Form::text('email', $dati->mail, ['placeholder' => 'E-mail']) }}
                    <span class="underline"></span>
                </div>
                @if ($errors->first('email'))
                    <ul class="errors">
                        @foreach ($errors->get('email') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif

            </fieldset>
            <fieldset class="colonna form-group">
                <!-- Password -->
                <div class="item">
                    {{ Form::label('password', 'Password') }}
                    {{ Form::input('password', 'password', $dati->password) }}
                    <span class="underline"></span>
                </div>
                @if ($errors->first('password'))
                    <ul class="errors">
                        @foreach ($errors->get('password') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif

                <!-- Cognome -->
                <div class="item">
                    {{ Form::label('surname', 'Cognome', ['class' => 'label-form'])}}
                    {{ Form::text('surname', $dati->cognome, ['placeholder' => 'Cognome']) }}
                    <span class="underline"></span>
                </div>
                @if ($errors->first('surname'))
                    <ul class="errors">
                        @foreach ($errors->get('surname') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif

                <!-- Data di nascita -->
                <div class="item">
                    {{ Form::label('birthtime', 'Data di nascita',  ['class' => 'label-form'])}}
                    {{ Form::date('birthtime', $dati->data_nascita) }}
                    <span class="underline"></span>
                </div>
                @if ($errors->first('birthtime'))
                    <ul class="errors">
                        @foreach ($errors->get('birthtime') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif

                <!-- Codice fiscale -->
                <div class="item">
                    {{ Form::label('cf', 'Codice fiscale', ['class' => 'label-form'])}}
                    {{ Form::text('cf', $dati->codice_fiscale, ['placeholder' => 'Codice fiscale']) }}
                    <span class="underline"></span>
                </div>
                @if ($errors->first('cf'))
                    <ul class="errors">
                        @foreach ($errors->get('cf') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif

                <!-- Via -->
                <div class="item">
                    {{ Form::label('street', 'Via', ['class' => 'label-form'])}}
                    {{ Form::text('street', $dati->via, ['placeholder' => 'Via']) }}
                    <span class="underline"></span>
                </div>
                @if ($errors->first('street'))
                    <ul class="errors">
                        @foreach ($errors->get('street') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif

                <!-- CAP -->
                <div class="item">
                    {{ Form::label('cap', 'CAP', ['class' => 'label-form'])}}
                    {{ Form::text('cap', $dati->cap, ['placeholder' => 'CAP']) }}
                    <span class="underline"></span>
                </div>
                @if ($errors->first('cap'))
                    <ul class="errors">
                        @foreach ($errors->get('cap') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif

                <!-- Cellulare -->
                <div class="item">
                    {{ Form::label('telephone', 'Cellulare', ['class' => 'label-form'])}}
                    {{ Form::text('telephone', $dati->cellulare, ['placeholder' => 'Cellulare']) }}
                    <span class="underline"></span>
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
            @cannot('isAdmin')
                {{ Form::submit('Modifica', ['class' => 'filter_button', 'onclick' => "return confirm('Dati inviati!    Controlla siano corretti!')"]) }}
            @endcannot
        </section>
        {!! Form::close() !!}
    </main>
@endforeach
@endisset
@endsection
