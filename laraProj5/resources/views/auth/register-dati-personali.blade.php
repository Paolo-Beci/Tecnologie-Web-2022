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
    {{-- {{ Form::open(array('route' => 'home-guest', 'class' => 'sign-up')) }}
        <div class="sign-up-step active active-anim" data-step="0">
            <h1>Dati personali</h1>
            <fieldset class="form-group">
                <img class="profile" src="{{asset('images/profile-default.png')}}" alt="Foto profilo default">
                <input type="file" name="profile">
                <div class="underline">
                    <input type="text" placeholder="Nome">
                </div>
                <div class="underline">
                    <input type="text" placeholder="Cognome">
                </div>
                <div class="underline">
                    <input type="text" placeholder="Luogo di nascita">
                </div>
                <div class="underline">
                    <input type="datetime-local" placeholder="Data di nascita">
                </div>
                <div class="gender">
                    <div>
                        <input type="radio" name="gender" id="male">
                        <label for="male">Uomo</label>
                    </div>
                    <div>
                        <input type="radio" name="gender" id="female">
                        <label for="female">Donna</label>
                    </div>
                </div>
                <div class="underline">
                    <input type="text" placeholder="Codice fiscale">
                </div>
            </fieldset>
            <div class="buttons">
                <button type="button" data-next>Prossimo step</button>
            </div>
        </div>
        <div class="sign-up-step" data-step="1">
            <h1>Indirizzo di residenza</h1>
            <fieldset class="form-group">
                <div class="underline">
                    <input type="text" placeholder="Città">
                </div>
                <div class="underline">
                    <input type="text" placeholder="Via">
                </div>
                <div class="underline">
                    <input type="text" placeholder="Numero civico">
                </div>
                <div class="underline">
                    <input type="text" placeholder="CAP">
                </div>
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
                    <input type="email" placeholder="E-mail">
                </div>
                <div class="underline">
                    <input type="text" placeholder="Cellulare">
                </div>
            </fieldset>
            <div class="buttons">
                <button type="button" data-previous>Step precedente</button>
                <button type="submit">Registrati</button>
            </div>
        </div>
    {{ Form::close() }} --}}
    {{ Form::open(array('route' => 'home-guest', 'class' => 'sign-up')) }}
        <div class="sign-up-step active active-anim" data-step="0">
            <h1>Dati personali</h1>
            <fieldset class="form-group">
                <img class="profile" src="{{asset('images/profile-default.png')}}" alt="Foto profilo default">
                {{Form::file('profile')}}
                <div class="underline">
                    {{ Form::text('name', '', ['placeholder' => 'Nome']) }}
                </div>
                <div class="underline">
                    {{ Form::text('surname', '', ['placeholder' => 'Cognome']) }}
                </div>
                <div class="underline">
                    {{ Form::text('birthplace', '', ['placeholder' => 'Luogo di nascita']) }}
                </div>
                <div class="underline">
                    {{ Form::date('birthtime', '', ['placeholder' => 'Data di nascita']) }}
                </div>
                <div class="gender">
                    <div>
                        {{ Form::radio('gender', '', ['id' => 'male']) }}
                        {{ Form::label('male', 'Uomo') }}
                    </div>
                    <div>
                        {{ Form::radio('gender', '', ['id' => 'female']) }}
                        {{ Form::label('female', 'Donna') }}
                    </div>
                </div>
                <div class="underline">
                    {{ Form::text('CF', '', ['placeholder' => 'Codice fiscale']) }}
                </div>
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
                <div class="underline">
                    {{ Form::text('street', '', ['placeholder' => 'Via']) }}
                </div>
                <div class="underline">
                    {{ Form::text('housenumber', '', ['placeholder' => 'Numero civico']) }}
                </div>
                <div class="underline">
                    {{ Form::text('CAP', '', ['placeholder' => 'CAP']) }}
                </div>
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
            </fieldset>
            <div class="buttons">
                <button type="button" data-previous>Step precedente</button>
                {{ Form::submit('Registrati') }}
            </div>
        </div>
    {{ Form::close() }}
</body>
</html>
