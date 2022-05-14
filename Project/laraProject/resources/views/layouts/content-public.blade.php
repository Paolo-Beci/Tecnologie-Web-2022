@extends('template')

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
                        <input type="text" id="login-username" name="login-username" required>
                        <span class="underline"></span>
                    </div>
                    <div class="password">
                        <label for="login-password">Password</label>
                        <input type="text" id="login-password" name="login-password" required>
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
                        <input type="text" id="sign-up-password" name="sign-up-password" required>
                        <span class="underline"></span>
                    </div>
                    <div class="confirm-password">
                        <label for="confirm-password">Conferma password</label>
                        <input type="text" id="confirm-password" name="confirm-password"required>
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

    <h2>Un servizio eccezionale!</h2>
    <p>Il nostro servizio clienti risponde 24 ore su 24, e ricorda,
        <br>
        puoi sempre contattare l'inserzionista dell'appartamento che ti interessa!
    </p>
    <div class="service-container">
        <article class="service"></article>
        <article class="service"></article>
        <article class="service"></article>
        <article class="service"></article>
    </div>
</section>
<section id="chi-siamo" class="about-us">
    <h2>Cosa facciamo e chi siamo?</h2>
    <p>Siamo una società immobiliare fondata ad Ancona nel 2022 che intende
        <br>
        fornire un servizio innovativo agli studenti di tutta Italia!
    </p>
    <div class="info-container">
        <article class="info"></article>
        <article class="info"></article>
        <article class="info"></article>
        <article class="info"></article>
    </div>
</section>
<section id="faq" class="faq">

</section>
@endsection