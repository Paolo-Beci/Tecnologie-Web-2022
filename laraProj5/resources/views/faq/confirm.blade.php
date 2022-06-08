@extends('template')

@section('css')
    <meta charset="UTF-8" http-equiv="refresh" content="3;URL={{ route('gestione-faq') }}">
    <link rel="stylesheet" href="{{asset('css/gestione-faq.css')}}">
@endsection

@section('title', 'Gestione Faq')

@section('content')
<div class="div_faq">
    <section id="faq" class="faq">
        <h2>
            Operazione andata a buon fine!
        </h2>
        <p>Attendi pochi secondi per tornare alla schermata di gestione delle faq!
        </p>
    </section>
</div>
<div class="loader"></div>
@endsection