{{-- POPUP DI ERRORE CHE SI SCATENA NEL CATALOGO QUANDO UN UTENTE NON AUTORIZZATO TENTA DI ACEDERE AI DETTAGLI DELL'ALLOGGIO --}}

{{-- UTENTE NON REGISTRATO --}}
@guest
<h1>Accedi o Registrati!</h1>
    <p style="margin: 10px">Per accedere ai dettagli degli annunci devi effettuare il login o registrarti!</p>
<div class="button">
    <a href="{{route('home-guest')}}">  {{-- REDIRECT ALLA HOME RISPETTIVA --}}
        <button class="filter_button"> Torna alla home</button>
    </a>
</div>
@endguest

{{-- LOCATORE --}}
@can('isLocatore')
    <h1>Non puoi visualizzare i dettagli!</h1>
    <p style="margin: 10px">Per accedere ai dettagli dell'alloggio devi essere un locatario!</p>
    <div class="button">
        <a href="{{route('home-locatore')}}">  {{-- REDIRECT ALLA HOME RISPETTIVA --}}
            <button class="filter_button"> Torna alla home</button>
        </a>
    </div>
@endcan

{{-- ADMIN --}}
@can('isAdmin')
    <h1>Non puoi visualizzare i dettagli!</h1>
    <p style="margin: 10px">Per accedere ai dettagli dell'alloggio devi essere un locatario!</p>
    <div class="button">
        <a href="{{route('home-admin')}}">  {{-- REDIRECT ALLA HOME RISPETTIVA --}}
            <button class="filter_button"> Torna alla home</button>
        </a>
    </div>
@endcan
