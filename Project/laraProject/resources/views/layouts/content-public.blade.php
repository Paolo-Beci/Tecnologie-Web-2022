@extends('template-home')

@section('content')
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
            <form class="login active.form" action="{{route('home-locatario')}}">
                <h1>Login</h1>
                <fieldset class="login-fieldset">
                    <div class="username">
                        <label for="login-username">Username</label>
                        <input type="text" id="login-username" name="login-username" required>
                        <span class="underline"></span>
                    </div>
                    <div class="password">
                        <label for="login-password">Password</label>
                        <input type="password" id="login-password" name="login-password" required>
                        <span class="underline"></span>
                    </div>
                </fieldset>
                <div class="login-extra">
                    <a class="forgot" href="">Password dimenticata?</a>
                    <button class="submit" type="submit">Login</button>
                    <span>Non sei un membro? <a data-form="toSignUp">Registrati</a></span>
                </div>
            </form>
            <form class="sign-up inactive-form" action="{{route('registrazione')}}">
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
            </form>
            <div class="circle-to-sign-up"></div>
            <div class="circle-to-login"></div>
        </div>
    </article>
</section>
<section id="servizi" class="services">
    @include('helpers/servizi')
</section>
<section id="chi-siamo" class="about-us">
    @include('helpers/chi-siamo')
</section>
<section id="dicono-di-noi" class="reviews">
    @include('helpers/dicono-di-noi')
</section>
@isset($faq)
    @include('helpers/faq')
@endisset
@endsection
