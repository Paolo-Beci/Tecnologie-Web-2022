<article class="alloggi">
@can('isLocatario')
    <div class="alloggio" data-href="{{route('dettagli-alloggio', [$alloggio->id_alloggio, $alloggio->tipologia])}}">
        @include('helpers/carta-alloggio-catalogo')
    </div>
@endcan

@if(Route::current()->getName() == 'gestione-alloggi')
@can('isLocatore')
    <div class="alloggio" data-href="{{route('dettagli-alloggio-locatore', [$alloggio->id_alloggio, $alloggio->tipologia])}}">
        @include('helpers/carta-alloggio-catalogo')
    </div>
@endcan
@endif

@if(Route::current()->getName() != 'gestione-alloggi')
@cannot('isLocatario')
    <div class="alloggio" id="accedi" data-popup-caller>
        @include('helpers/carta-alloggio-catalogo')
    </div>
@endcannot
@endif
</article>
