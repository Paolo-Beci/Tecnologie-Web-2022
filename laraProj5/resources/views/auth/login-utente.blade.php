{{ Form::open(array('route' => 'login', 'class' => 'login ' . $loginClass)) }}
    <h1>Login</h1>
    <fieldset class="login-fieldset">
        <div class="username">
            {{ Form::label('username', 'Username') }}
            {{ Form::text('username', '', ['id' => 'username']) }}
            <span class="underline"></span>
        </div>
        @if ($errors->first('username'))
            <ul class="errors">
                @foreach ($errors->get('username') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
        <div class="password">
            {{ Form::label('password', 'Password') }}
            {{ Form::password('password', ['id' => 'password']) }}
            <span class="underline"></span>
        </div>
        @if ($errors->first('password'))
            <ul class="errors">
                @foreach ($errors->get('password') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </fieldset>
    <div class="login-extra">
        {{ Form::submit('Login', ['class' => 'submit']) }}
        <span>Non sei un membro? <a data-form="toSignUp">Registrati</a></span>
    </div>
{{ Form::close() }}