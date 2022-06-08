<main id="content-home-locatario" class="content-home-locatario">
    <article>
        <p class="titolo">Dai un'occhiata agli ultimi annunci!</p>
    </article>
    <section class="scopri-servizio">
        <div class="immagine-paragrafo2">
            <img src="{{asset('images/messaging_image.jpg')}}" alt="Immagine 1" width="80%">
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
        @include('helpers.faq')
    @endisset
</main>

