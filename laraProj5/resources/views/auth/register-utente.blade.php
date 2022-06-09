{{ Form::open(array('route' => 'registrazione-dati-personali', 'class' => 'sign-up ' . $signUpClass)) }}
    <h1>Registrazione</h1>
    <fieldset class="sign-up-fieldset">
        <div class="username">
            {{ Form::label('sign-up-username', 'Username') }}
            {{ Form::text('sign-up-username', '', ['id' => 'sign-up-username']) }}
            <span class="underline"></span>
        </div>

        @if ($errors->first('sign-up-username'))
            <ul class="errors">
                @foreach ($errors->get('sign-up-username') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif

        <div class="password">
            {{ Form::label('sign-up-password', 'Password') }}
            {{ Form::password('sign-up-password', ['id' => 'sign-up-password']) }}
            <span class="underline"></span>
        </div>
        
        @if ($errors->first('sign-up-password'))
            <ul class="errors">
                @foreach ($errors->get('sign-up-password') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif

        <div class="confirm-password">
            {{ Form::label('sign-up-password_confirmation', 'Conferma password') }}
            {{ Form::password('sign-up-password_confirmation', ['id' => 'sign-up-password_confirmation']) }}
            <span class="underline"></span>
        </div>

        @if ($errors->first('sign-up-password_confirmation'))
            <ul class="errors">
                @foreach ($errors->get('sign-up-password_confirmation') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif

        <div class="role">
            <div>
                {{ Form::radio('role', 'locatore', ['id' => 'locatore']) }}
                {{ Form::label('locatore', 'Locatore') }}
            </div>
            <div>
                {{ Form::radio('role', 'locatario', false, ['id' => 'locatario']) }}
                {{ Form::label('locatario', 'Locatario') }}
            </div>
        </div>

    </fieldset>
    <div class="sign-up-extra">
        {{ Form::submit('Continua', ['class' => 'submit']) }}
        <span>Sei già registrato? <a data-form="toLogin">Effettua il login</a></span>
    </div>
{{ Form::close() }}