<section id="home" class="home">
    <article class="title title-anim">
        <span>Benvenuto su</span>
        <img src="{{asset('images/FlatMate_Titolo.png')}}" alt="">
        <span>Cercare alloggi per studenti
            <br>
            non è mai stato così facile!</span>
    </article>
    <article class="forms forms-anim" id="login">
        <div class="container">
            {{ Form::open(array('route' => 'login', 'class' => 'login active-form')) }}

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
                    @if ($errors->first('password'))
                        <ul class="errors">
                            @foreach ($errors->get('password') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </fieldset>
            <div class="login-extra">
                <a class="forgot" href="">Password dimenticata?</a>
                {{ Form::submit('Login', ['class' => 'submit']) }}
                <span>Non sei un membro? <a data-form="toSignUp">Registrati</a></span>
            </div>

            {{ Form::close() }}

            {{-- <form class="sign-up inactive-form" action="{{route('registrazione')}}">
                <h1>Registrazione</h1>
                <fieldset class="sign-up-fieldset">
                    <div class="username">
                        <label for="sign-up-username">Username</label>
                        <input type="text" id="sign-up-username" name="sign-up-username" required>
                        <span class="underline"></span>
                    </div>
                    <div class="password">
                        <label for="sign-up-password">Password</label>
                        <input type="password" id="sign-up-password" name="sign-up-password" required>
                        <span class="underline"></span>
                    </div>
                    <div class="confirm-password">
                        <label for="confirm-password">Conferma password</label>
                        <input type="password" id="confirm-password" name="confirm-password"required>
                        <span class="underline"></span>
                    </div>
                </fieldset>
                <div class="sign-up-extra">
                    <button class="submit" type="submit">Continua</button>
                    <span>Sei già registrato? <a data-form="toLogin">Effettua il login</a></span>
                </div>
            </form> --}}
            {{ Form::open(array('route' => 'registrazione', 'class' => 'sign-up inactive-form')) }}
                <h1>Registrazione</h1>
                <fieldset class="sign-up-fieldset">
                    <div class="username">
                        {{ Form::label('sign-up-username', 'Username') }}
                        {{ Form::text('username', '', ['id' => 'sign-up-username']) }}
                        <span class="underline"></span>
                    </div>
                    <div class="password">
                        {{ Form::label('sign-up-username', 'Password') }}
                        {{ Form::password('sign-up-password', ['id' => 'sign-up-password']) }}
                        <span class="underline"></span>
                    </div>
                    <div class="confirm-password">
                        {{ Form::label('confirm-password', 'Conferma password') }}
                        {{ Form::password('confirm-password', ['id' => 'confirm-password']) }}
                        <span class="underline"></span>
                    </div>
                </fieldset>
                <div class="sign-up-extra">
                    {{ Form::submit('Continua', ['class' => 'submit']) }}
                    <span>Sei già registrato? <a data-form="toLogin">Effettua il login</a></span>
                </div>
            {{ Form::close() }}
            <div class="circle-to-sign-up"></div>
            <div class="circle-to-login"></div>
        </div>
    </article>
</section>
<section id="servizi" class="services">
    @include('helpers.servizi')
</section>
<section id="chi-siamo" class="about-us">
    @include('helpers.chi-siamo')
</section>
<section id="dicono-di-noi" class="reviews">
    @include('helpers.dicono-di-noi')
</section>
@isset($faq)
    @include('helpers.faq')
@endisset

