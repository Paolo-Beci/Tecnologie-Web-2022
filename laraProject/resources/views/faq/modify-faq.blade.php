@extends('template')

@section('css')
    <link rel="stylesheet" href="{{asset('css/gestione-faq.css')}}">
@endsection

@section('title', 'Gestione Faq')

@section('content')
<div class="div_faq">
    <section id="faq" class="faq">
        <div class="faq-container">
            @foreach ($faq as $singleFaq)
                <article class="q-a_modify-delete">
                    <div class="descr">
                        <p class="question">{!!$singleFaq->domanda!!}</p>
                        <p class="answer">{!!$singleFaq->risposta!!}</p>
                        <p class="question">{!!$singleFaq->target!!}</p>
                    </div>
                    <div class="icona">
                        <a class="click" href="{{ route('show-faq', [$singleFaq->id_faq]) }}"><img src="{{asset('images/icons_modificare.png')}}" alt="Modifica"/></a>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
</div>
@endsection