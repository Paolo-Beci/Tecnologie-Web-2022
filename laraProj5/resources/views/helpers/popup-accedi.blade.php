<link rel="stylesheet" type="text/css" href="{{ asset('css/gestione-alloggi.css') }}">

@can('isGuest')
<h1>Accedi o Registrati!</h1>
    <p style="margin: 10px">Per accedere ai dettagli degli annunci devi effettuare il login o registrarti!</p>
<div class="button">
    <a href="{{route('home-guest')}}">
        <button class="filter_button"> Torna alla home</button>
    </a>
</div>
@endcan

@can('isLocatore')
    <h1>Non puoi visualizzare i dettagli!</h1>
    <p style="margin: 10px">Per accedere ai dettagli dell'alloggio devi essere un locatario!</p>
    <div class="button">
        <a href="{{route('home-guest')}}">
            <button class="filter_button"> Torna alla home</button>
        </a>
    </div>
@endcan

@can('isAdmin')
    <h1>Non puoi visualizzare i dettagli!</h1>
    <p style="margin: 10px">Per accedere ai dettagli dell'alloggio devi essere un locatario!</p>
    <div class="button">
        <a href="{{route('home-guest')}}">
            <button class="filter_button"> Torna alla home</button>
        </a>
    </div>
@endcan
