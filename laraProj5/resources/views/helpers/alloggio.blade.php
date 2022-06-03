<article class="alloggi">
<!-- Accesso dettagli alloggio in catalogo e storico alloggi di locatario -->
@can('isLocatario')
    <div class="alloggio" data-href="{{route('dettagli-alloggio-locatario', [$alloggio->id_alloggio, $alloggio->tipologia])}}">
        @include('helpers/carta-alloggio-catalogo')
    </div>
@endcan

<!-- Accesso dettagli alloggio in gestione alloggi di locatore -->
@if(Route::current()->getName() == 'gestione-alloggi')
@can('isLocatore')
    <div class="alloggio" data-href="{{route('dettagli-alloggio-locatore', [$alloggio->id_alloggio, $alloggio->tipologia])}}">
        @include('helpers/carta-alloggio-catalogo')
    </div>
@endcan
@endif

<!-- Popup di errore se non autorizzato a visualizzare i dettagli -->
@if(Route::current()->getName() != 'gestione-alloggi')
@cannot('isLocatario')
    <div class="alloggio" id="accedi" data-popup-caller>
        @include('helpers/carta-alloggio-catalogo')
    </div>
@endcannot
@endif
</article>
