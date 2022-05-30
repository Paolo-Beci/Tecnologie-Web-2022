<!DOCTYPE html>
<html>
<head>
    <title>Registrazione</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/sign-up-continue.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{asset('js/sign-up-continue.js')}}" defer></script>
</head>
<body>
    {{ Form::open(array('route' => 'registrazione', 'class' => 'sign-up')) }}
        <div class="sign-up-step active active-anim" data-step="0">
            <h1>Dati personali</h1>
            <fieldset class="form-group">

                <div class="underline">
                    {{ Form::text('name', '', ['placeholder' => 'Nome']) }}
                </div>

                @if ($errors->first('name'))
                    <ul class="errors">
                        @foreach ($errors->get('name') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif

                <div class="underline">
                    {{ Form::text('surname', '', ['placeholder' => 'Cognome']) }}
                </div>

                @if ($errors->first('surname'))
                    <ul class="errors">
                        @foreach ($errors->get('surname') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif

                <div class="underline">
                    {{ Form::text('birthplace', '', ['placeholder' => 'Luogo di nascita']) }}
                </div>

                @if ($errors->first('birthplace'))
                    <ul class="errors">
                        @foreach ($errors->get('birthplace') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif

                <div class="underline">
                    {{ Form::date('birthtime', '', ['placeholder' => 'Data di nascita']) }}
                </div>

                @if ($errors->first('birthtime'))
                    <ul class="errors">
                        @foreach ($errors->get('birthtime') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif

                <div class="gender">
                    <div>
                        {{ Form::radio('gender', 'm', ['id' => 'male']) }}
                        {{ Form::label('male', 'Uomo') }}
                    </div>
                    <div>
                        {{ Form::radio('gender', 'f', false, ['id' => 'female']) }}
                        {{ Form::label('female', 'Donna') }}
                    </div>
                </div>
                <div class="underline">
                    {{ Form::text('cf', '', ['placeholder' => 'Codice fiscale']) }}
                </div>

                @if ($errors->first('cf'))
                    <ul class="errors">
                        @foreach ($errors->get('cf') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif

            </fieldset>
            <div class="buttons">
                <button type="button" data-next>Prossimo step</button>
            </div>
        </div>
        <div class="sign-up-step" data-step="1">
            <h1>Indirizzo di residenza</h1>
            <fieldset class="form-group">
                <div class="underline">
                    {{ Form::text('city', '', ['placeholder' => 'Città']) }}
                </div>
                
                @if ($errors->first('city'))
                    <ul class="errors">
                        @foreach ($errors->get('city') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif

                <div class="underline">
                    {{ Form::text('street', '', ['placeholder' => 'Via']) }}
                </div>
                
                @if ($errors->first('street'))
                    <ul class="errors">
                        @foreach ($errors->get('street') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif

                <div class="underline">
                    {{ Form::text('house-number', '', ['placeholder' => 'Numero civico']) }}
                </div>

                @if ($errors->first('house-number'))
                    <ul class="errors">
                        @foreach ($errors->get('house-number') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif

                <div class="underline">
                    {{ Form::text('cap', '', ['placeholder' => 'CAP']) }}
                </div>

                @if ($errors->first('cap'))
                    <ul class="errors">
                        @foreach ($errors->get('cap') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif

            </fieldset>
            <div class="buttons">
                <button type="button" data-previous>Step precedente</button>
                <button type="button" data-next>Prossimo step</button>
            </div>
        </div>
        <div class="sign-up-step" data-step="2">
            <h1>Informazioni opzionali</h1>
            <fieldset class="form-group">
                <div class="underline">
                    {{ Form::text('email', '', ['placeholder' => 'E-mail']) }}
                </div>
                <div class="underline">
                    {{ Form::text('telephone', '', ['placeholder' => 'Cellulare']) }}
                </div>

                @if ($errors->first('telephone'))
                    <ul class="errors">
                        @foreach ($errors->get('telephone') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif

            </fieldset>
            <div class="buttons">
                <button type="button" data-previous>Step precedente</button>
                {{ Form::submit('Registrati') }}
            </div>
        </div>
    {{ Form::close() }}
</body>
</html>
