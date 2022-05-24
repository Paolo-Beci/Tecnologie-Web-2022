@extends('template')

@section('content')

{{-- Sezione utente non autenticato --}}
@guest
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
                
                {{--
                <form class="login active.form" action="{{route('login')}}" method="post">
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
                --}}
                {{ Form::open(array('route' => 'login', 'class' => 'login active-form')) }}

                <h1>Login</h1>
                <fieldset class="login-fieldset">
                    <div class="username">
                        {{ Form::label('username', 'Username') }}
                        {{ Form::text('username', '', ['id' => 'username']) }}
                        <span class="underline"></span>
                        @if ($errors->first('username'))
                            <ul class="errors">
                                @foreach ($errors->get('username') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif

                    </div>
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
@endguest

{{-- Sezione locatore --}}
@can('isLocatore')
    <main id="content-home-locatore" class="content-home-locatore">
        <article>
            <p class="titolo">Dai un'occhiata agli ultimi annunci!</p>
        </article>
        <section class="immagini-alloggi">
            <div class="slideshow">

            </div>
        </section>
        <section class="gestisci-alloggi">
            <div>
                <div>
                    <p class="titolo-paragrafo1">Gestisci i tuoi alloggi</p>
                    <p>Puoi inserirne di nuovi, modificare quelli già esistenti<br>
                        e cancellare quelli che non desideri più affittare!</p>
                </div>
            </div>
            <div class="immagine-paragrafo1">
                <img src="{{asset('images/gestione_image.jpg')}}" alt="Immagine 1" width="80%" style="vertical-align:middle;horiz-align:left">
            </div>
        </section>
        <section class="scopri-servizio">
            <div class="immagine-paragrafo2">
                <img src="{{asset('images/messaging_image.jpg')}}" alt="Immagine 2" width="80%" style="vertical-align:middle;horiz-align:left">
            </div>
            <div>
                <div>
                    <p class="titolo-paragrafo2">Scopri il nostro servizio di messaggistica!</p>
                    <p class="testo-paragrafo2">Con il nostro sistema di messaggistica potrai visualizzare tutti i messaggi
                        ricevuti dai clienti interessati ai tuoi alloggi e rispondere chiarendo
                        ogni loro eventuale dubbio.</p>
                </div>
            </div>
        </section>
        @isset($faq)
            @include('helpers/faq')
        @endisset
    </main>
@endcan

{{-- Sezione --}}
@can('isLocatario')
    <main id="content-home-locatario" class="content-home-locatario">
        <article>
            <p class="titolo">Dai un'occhiata agli ultimi annunci!</p>
        </article>
        <section class="immagini-alloggi">
            <div class="slideshow">

            </div>
        </section>
        <section class="scopri-servizio">
            <div class="immagine-paragrafo2">
                <img src="{{asset('images/messaging_image.jpg')}}" alt="Immagine 1" width="80%" style="vertical-align:middle;horiz-align:left">
            </div>
            <div>
                <div>
                    <p class="titolo-paragrafo2">Scopri il nostro servizio di messaggistica!</p>
                    <p class="testo-paragrafo2">Con il nostro sistema di messaggistica potrai metterti
                        in contatto con gli inserzionisti degli alloggi che ti interessano per chiarire
                        ogni tuo dubbio.<br>
                        Inoltre potrai esprimere il tuo interesse per l'alloggio che vuoi affittare direttamente
                        dalla sua pagina dedicata!</p>
                </div>
            </div>
        </section>
        @isset($faq)
            @include('helpers/faq')
        @endisset
    </main>
@endcan

{{-- Sezione Admin --}}
@can('isAdmin')
    <main id="content-home-admin" class="content-home-admin">
        {{--sezione riassunto filtri--}}
        <section id="statistiche" class="stats-section">
            <h1 class="titolo">Statistiche</h1>
            <div class="stats-container">
                <article class="stats">
                    <a href="#1">Offerte di alloggio</a>
                    <p>100</p>
                </article>
                <article class="stats">
                    <a href="#2">Offerte di locazione</a>
                    <p>27</p>
                </article>
                <article class="stats">
                    <a href="#3">Alloggi locati</a>
                    <p>83</p>
                </article>
            </div>
            <div id="1" class="loader">
                <div class="ball"></div>
                <div class="ball"></div>
                <div class="ball"></div>
            </div>
        </section>

        {{--sezione offerte alloggio--}}
        <section id="offerte_di_alloggio" class="filter_section">
            <h2>Offerte di alloggio</h2>
            <div class="form_container">
                <div>
                    <label for="da">Da</label>
                    <input type="datetime-local" id="da">
                    <label for="a">A</label>
                    <input type="datetime-local" id="a">
                </div>
                <div>
                    <label>Tipologia di alloggio
                        <select name="type">
                            <option>Appartamento
                            <option>Posto letto
                        </select>
                    </label>
                </div>
                <div>
                    <button class="filter_button" type="submit" onclick=alert('WorkInProgress')>Filtra</button>
                </div>
                <div class="results_container">
                    <article class="result">
                        <div class="content">
                            <img class="img_result" src="{{asset('images_case/5.jpg')}}" alt="Alloggio 1">
                            <h2>Foggia, Via Roma 4, interno 2 </h2>
                        </div>
                    </article>
                    <article class="result">
                        <div class="content">
                            <img class="img_result" src="{{asset('images_case/6.jpg')}}" alt="Alloggio 1">
                            <h2>Venezia, Via Marziale 2, interno 3 </h2>
                        </div>
                    </article>
                </div>
            </div>
        </section>
        <div id="2" class="loader">
            <div class="ball"></div>
            <div class="ball"></div>
            <div class="ball"></div>
        </div>

        {{--sezione offerte locazione--}}
        <section id="offerte_di_locazione" class="filter_section">
            <h2>Offerte di locazione</h2>
            <div class="form_container">
                <div>
                    <label for="da2">Da</label>
                    <input type="datetime-local" id="da2">
                    <label for="a2">A</label>
                    <input type="datetime-local" id="a2">
                </div>
                <div>
                    <label>Tipologia di alloggio
                        <select name="type2">
                            <option>Appartamento
                            <option>Posto letto
                        </select>
                    </label>
                </div>
                <div>
                    <button class="filter_button" type="submit" onclick=alert('WorkInProgress')>Filtra</button>
                </div>
                <div class="results_container">
                    <article class="result">
                        <div class="content">
                            <img class="img_result" src="{{asset('images_case/1.jpg')}}" alt="Alloggio 1">
                            <h2>Milano, Via Giuseppe Rossi 2, interno 1 </h2>
                        </div>
                    </article>
                    <article class="result">
                        <div class="content">
                            <img class="img_result" src="{{asset('images_case/2.jpg')}}" alt="Alloggio 1">
                            <h2>Firenze, Via Dante Alighieri 18, interno 3 </h2>
                        </div>
                    </article>
                </div>
            </div>
        </section>
        <div id="3" class="loader">
            <div class="ball"></div>
            <div class="ball"></div>
            <div class="ball"></div>
        </div>

        {{--alloggi locati--}}
        <section id="alloggi_locati" class="filter_section">
            <h2>Alloggi locati</h2>
            <div class="form_container">
                <div>
                    <label for="da3">Da</label>
                    <input type="datetime-local" id="da3">
                    <label for="a3">A</label>
                    <input type="datetime-local" id="a3">
                </div>
                <div>
                    <label>Tipologia di alloggio
                        <select name="type3">
                            <option>Appartamento
                            <option>Posto letto
                        </select>
                    </label>
                </div>
                <div>
                    <button class="filter_button" type="submit" onclick=alert('WorkInProgress')>Filtra</button>
                </div>
                <div class="results_container">
                    <article class="result">
                        <div class="content">
                            <img class="img_result" src="{{asset('images_case/3.jpg')}}" alt="Alloggio 1">
                            <h2>Ancona, Via Colleverde 18, interno 4 </h2>
                        </div>
                    </article>
                    <article class="result">
                        <div class="content">
                            <img class="img_result" src="{{asset('images_case/4.jpg')}}" alt="Alloggio 1">
                            <h2>Torino, Via della Mole 10, interno 8 </h2>
                        </div>
                    </article>
                </div>
            </div>
        </section>
    </main>
@endcan

@endsection
