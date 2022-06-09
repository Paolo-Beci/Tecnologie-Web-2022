<article class="alloggi">
<!-- Accesso dettagli alloggio in catalogo e storico alloggi di locatario -->
@can('isLocatario')
    <div class="alloggio" data-href="{{route('dettagli-alloggio-locatario', [$alloggio->id_alloggio, $alloggio->tipologia])}}">
        @include('helpers/carta-alloggio-catalogo')
    </div>
@endcan

<!-- Popup di errore se non autorizzato a visualizzare i dettagli -->
@cannot('isLocatario')
    <div class="alloggio" id="accedi" 
    @if (Route::current()->getName() != 'gestione-alloggi')
        data-popup-caller
    @endif
    >
        @include('helpers/carta-alloggio-catalogo')
    </div>
@endcannot
</article>
