{{-- GESTISCE L'AUTORIZZAZIONE DELLA VISUALIZZAZIONE DEI DETTAGLI DELL'ALLOGGIO IN BASE ALL'UTENTE --}}
<article class="alloggi">
    <!-- Accesso dettagli alloggio in catalogo e storico alloggi di Locatario -->
    @can('isLocatario')
        <div class="alloggio" data-href="{{route('dettagli-alloggio-locatario', [$alloggio->id_alloggio, $alloggio->tipologia])}}">
            @include('helpers/carta-alloggio-catalogo')
        </div>
    @endcan

    <!-- Popup di errore NON autorizzato a visualizzare i dettagli dell'alloggio -->
    @cannot('isLocatario')
        <div class="alloggio" id="accedi"
            @if (Route::current()->getName() != 'gestione-alloggi')
                data-popup-caller  <!-- Che roba è? -->
            @endif
                @include('helpers/carta-alloggio-catalogo')
        </div>
    @endcannot
</article>
