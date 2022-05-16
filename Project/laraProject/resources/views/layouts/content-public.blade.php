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
            <form class="login active.form" action="{{route('home-locatore')}}">
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
<section id="dicono-di-noi" class="reviews">
    <h2>Cosa dicono di noi?</h2>
    <div class="reviews-container">
        <article class="left-review">
            
            <button class="review" data-review="1">
                Mario Rossi
                <span class="rating">4.5/5 ★</span>
            </button>
            <button class="review" data-review="2">
                Luigi Bianchi
                <span class="rating">4.3/5 ★</span>
            </button>
            <button class="review" data-review="3">
                Andrea Grandine
                <span class="rating">4/5 ★</span>
            </button>
        </article>
        <article class="right-review active-review" data-review="1">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi 
            ut aliquip ex ea commodo consequat.
        </article>
        <article class="right-review" data-review="2">
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum 
            dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, 
            sunt in culpa qui officia deserunt mollit anim id est laborum.
        </article>
        <article class="right-review" data-review="3">
            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium 
            doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore 
            veritatis et quasi architecto beatae vitae dicta sunt explicabo.
        </article>
    </div>
</section>
@isset($faq)
    <section id="faq" class="faq">
        <h2>Hai dubbi o difficoltà?
            <br>
            Non preoccuparti!
        </h2>
        <p>Qui di seguito puoi trovare le più frequenti domande che gli utenti ci fanno!
        </p>
        <div class="faq-container">
            @foreach ($faq as $singleFaq)
                <article class="q-a">
                    <p class="question">{!!$singleFaq->domanda!!}</p>
                    <p class="answer">{!!$singleFaq->risposta!!}</p>
                </article>  
            @endforeach
        </div>
    </section>
@endisset
@endsection
