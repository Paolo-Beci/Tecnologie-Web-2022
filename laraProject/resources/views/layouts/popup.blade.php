<div class="popup">

    <div class="popup-container">

        <span class="close">&times;</span>

        <div class="popup-content">

            <div data-popup-content="servizi">
                @include('helpers/servizi')
            </div>

            <div data-popup-content="dicono-di-noi">
                @include('helpers/dicono-di-noi')
            </div>

            <div data-popup-content="chi-siamo">
                @include('helpers/chi-siamo')
            </div>

            <div data-popup-content="accedi">
                @include('helpers/popup-accedi')
            </div>

            @include('helpers/condizioni-uso')

            @include('helpers/privacy')

        </div>

    </div>

</div>
