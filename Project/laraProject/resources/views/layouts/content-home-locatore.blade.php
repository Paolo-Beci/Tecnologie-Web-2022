@extends('template-home')

@section('content')
<section id="content-home-locatore" class="content-home-locatore">
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
            <img class="immagine" src="{{asset('images_case/imm1.jpg')}}" alt="Immagine 1" width="100%" style="vertical-align:middle;horiz-align:left">
        </div>
    </section>
    <section class="scopri-servizio">
        <div class="immagine-paragrafo2">
            <img class="immagine" src="{{asset('images_case/imm2.jpg')}}" alt="Immagine 1" width="80%" style="vertical-align:middle;horiz-align:left">
        </div>
        <div>
            <div>
                <p class="titolo-paragrafo2">Scopri il nostro servizio di messaggistica!</p>
                <p class="testo-paragrafo2">Con il nostro sistema di messaggistica potrai visualizzare tutti i messaggi<br>
                    ricevuti dai clienti interessati ai tuoi alloggi e rispondere chiarendo<br>
                    ogni loro eventuale dubbio.</p>
            </div>
        </div>
    </section>

   {{-- @include('helpers/faq') --}}

</section>
@endsection
