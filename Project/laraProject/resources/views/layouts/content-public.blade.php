@extends('home')

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
            <form class="login active.form" action="">
                <h1>Login</h1>
                <fieldset class="login-fieldset">
                    <div class="username">
                        <label for="login-username">Username</label>
                        <input type="text" id="login-username" name="login-username">
                        <span class="underline"></span>
                    </div>
                    <div class="password">
                        <label for="login-password">Password</label>
                        <input type="text" id="login-password" name="login-password">
                        <span class="underline"></span>
                    </div>
                </fieldset>
                <div class="login-extra">
                    <a class="forgot" href="">Password dimenticata?</a>
                    <button class="submit" type="submit">Login</button>
                    <span>Non sei un membro? <a data-form="toSignUp">Registrati</a></span>
                </div>
            </form>
            <form class="sign-up inactive-form" action="">
                <h1>Registrazione</h1>
                <fieldset class="sign-up-fieldset">
                    <div class="username">
                        <label for="sign-up-username">Username</label>
                        <input type="text" id="sign-up-username" name="sign-up-username">
                        <span class="underline"></span>
                    </div>
                    <div class="password">
                        <label for="sign-up-password">Password</label>
                        <input type="text" id="sign-up-password" name="sign-up-password">
                        <span class="underline"></span>
                    </div>
                    <div class="confirm-password">
                        <label for="confirm-password">Conferma password</label>
                        <input type="text" id="confirm-password" name="confirm-password">
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
<section id="middle" class="middle"></section>
<section id="bottom" class="bottom"></section>
@endsection