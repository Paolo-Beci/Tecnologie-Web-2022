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
            
            @include('auth/login-utente')

            @include('auth/register-utente')

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