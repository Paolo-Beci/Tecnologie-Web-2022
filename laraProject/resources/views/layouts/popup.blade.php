{{-- GESTIONE POPUP --}}
<div class="popup">

    <div class="popup-container">

        <span class="close">&times;</span>

        <div class="popup-content">

            {{-- Popup SERVIZI - richiamabile dal footer --}}
            <div data-popup-content="servizi">
                @include('helpers/servizi')
            </div>

            {{-- Popup DICONO DI NOI - richiamabile dal footer --}}
            <div data-popup-content="dicono-di-noi">
                @include('helpers/dicono-di-noi')
            </div>

            {{-- Popup CHI SIAMO - richiamabile dal footer --}}
            <div data-popup-content="chi-siamo">
                @include('helpers/chi-siamo')
            </div>

            {{-- Popup ACCESSO - richiamabile dal catalogo, comunica all'utente che non è autorizzato a visualizzare i dettagli dell'alloggio --}}
            <div data-popup-content="accedi">
                @include('helpers/popup-accedi')
            </div>

            {{-- Popup CONDIZIONI D'USO - richiamabile dal footer --}}
            @include('helpers/condizioni-uso')

            {{-- Popup PRIVACY POLICY - richiamabile dal footer --}}
            @include('helpers/privacy')

        </div>

    </div>

</div>
