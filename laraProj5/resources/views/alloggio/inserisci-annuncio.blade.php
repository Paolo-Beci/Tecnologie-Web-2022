@extends('template')

@section('link')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/inserisci-annuncio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/content-home-loggato.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/gestione-alloggi.css') }}">
@endsection

@section('scripts')
@parent
<script src="{{ asset('js/inserisci-annuncio.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(function () {
        var actionUrl = "{{ route('new-annuncio.store') }}";
        var formId = 'inserisci-annuncio';
        $(":input").on('blur', function (event) {
            var formElementId = $(this).attr('id');
            doElemValidation(formElementId, actionUrl, formId);
        });
        $("#inserisci-annuncio").on('submit', function (event) {
            event.preventDefault();
            doFormValidation(actionUrl, formId);
        });

        //seleziono l'elemento della form sul quale avviene l'evento ("#idElementoNellaForm")
        $('#tipologia').on('change', function (event) {
            //Se l'opzione selezionata assume un determinato valore
            if($(this).val() === 'Posto letto'){
                //seleziono l'elemento della form specidicando il suo id ed applica il metodo per nasconderlo/meno
                $("div#angoloStudio").show();
            }
            else{
                $("div#angoloStudio").hide();
            }
        });
    });

</script>
@endsection

@section('title', 'Inserisci annuncio')

@section('content')
    <main class="main-container">
        <section class="primo-box">
            <h2>Utilizza questa form per inserire un nuovo annuncio nel Catalogo</h2>
        </section>

        {{ Form::open(array('route' => 'new-annuncio.store', 'id' => 'inserisci-annuncio','files' => true, 'class' => 'inserisci-annuncio')) }}

        <section class="parent">
                <div class="colonna">
                    <fieldset title="Inserisci le caratteristiche strutturali" class="fieldset">
                        <legend><h2>Caratteristiche strutturali:</h2></legend>
                        <!-- Tipologia -->
                        <div>
                            {{Form::label('tipologia', 'Tipologia')}}
                            {{Form::select('tipologia', $tipologie, '', ['id' => 'tipologia'])}}
                        </div>
                        <!-- Dimensione -->
                        <div class="item">
                            {{ Form::label('dimensione', 'Dimensione (mq)') }}
                            {{ Form::text('dimensione', '', ['id' => 'dimensione']) }}
                        </div>
                        <!-- Num posti letto totali -->
                        <div>
                            {{ Form::label('numPostiLettoTot', 'Num posti letto totali') }}
                            {{ Form::selectRange('numPostiLettoTot', 1, 20, ['id' => 'numPostiLettoTot']) }}
                        </div>
                        <!-- Num camere (appartemento)-->
                        <div>
                            {{ Form::label('numCamere', 'Num camere') }}
                            {{ Form::selectRange('numCamere', 1, 20, ['id' => 'numCamere']) }}
                        </div>
                        <!-- Tipologia camera (posto letto) -->
                        <div>
                            {{ Form::label('tipologiaCamera', 'Tipologia camera') }}
                            {{ Form::select('tipologiaCamera', ['S' => 'Singola', 'D' => 'Doppia'], ['id' => 'tipologiaCamera']) }}
                        </div>
                    </fieldset>

                    <fieldset title="Inserisci i vicoli di locazione sul locatario" class="fieldset">
                        <legend><h2>Vicoli di locazione sul locatario:</h2></legend>
                        <!-- Genere -->
                        <div>
                            {{ Form::label('genere', 'Genere') }}
                            {{Form::select('genere', $genere, '', ['id' => 'genere'])}}
                        </div>
                        <!-- Età minima - Età massima -->
                        <div>
                            <p class="item">Fascia di età:</p>
                            {{ Form::label('etaMin', 'Min') }}
                            {{ Form::selectRange('etaMin', 18, 100, ['id' => 'etaMin']) }}
                            {{ Form::label('etaMax', 'Max') }}
                            {{ Form::selectRange('etaMax', 18, 100, ['id' => 'etaMax']) }}
                        </div>
                        <!-- Periodo locazione -->
                        <div>
                            {{ Form::label('periodoLocazione', 'Periodo locazione (mesi):') }}
                            {{Form::select('periodoLocazione', $periodoLocazione, '', ['id' => 'periodoLocazione'])}}
                        </div>
                    </fieldset>

                    <fieldset title="Inserisci i servizi presenti nell'alloggio" class="fieldset">
                        <legend><h2>Servizi</h2></legend>
                            <!-- Bagni -->
                            <div>
                                {{ Form::selectRange('Bagno', 1, 9, ['id' => 'Bagno']) }}
                                {{ Form::label('Bagno', 'Bagno/i') }}
                            </div>
                            <!-- Cucine -->
                            <div>
                                {{ Form::selectRange('Cucina', 1, 9, ['id' => 'Cucina']) }}
                                {{ Form::label('Cucina', 'Cucina/e') }}
                            </div>
                            <!-- Lavanderia -->
                            <div>
                                {{ Form::checkbox('Lavanderia', 'Lavanderia', false, ['id' => 'Lavanderia']) }}
                                {{ Form::label('Lavanderia', 'Lavanderia') }}
                            </div>
                            <!-- Garage -->
                            <div>
                                {{ Form::checkbox('Garage', 'Garage', false, ['id' => 'Garage']) }}
                                {{ Form::label('Garage', 'Garage') }}
                            </div>

                            <!-- Giardino -->
                            <div>
                                {{ Form::checkbox('Giardino', 'Giardino', false, ['id' => 'Giardino']) }}
                                {{ Form::label('Giardino', 'Giardino') }}
                            </div>
                            <!-- Aria condizionata -->
                            <div>
                                {{ Form::checkbox('Aria condizionata', 'Aria condizionata', false, ['id' => 'AriaCondizionata']) }}
                                {{ Form::label('Aria condizionata', 'Aria condizionata') }}
                            </div>
                            <!-- Wi-fi -->
                            <div>
                                {{ Form::checkbox('Wi-fi', 'Wi-fi', false, ['id' => 'Wi-fi']) }}
                                {{ Form::label('Wi-fi', 'Wi-fi') }}
                            </div>
                            <!-- Ripostiglio -->
                            <div>
                                {{ Form::checkbox('Ripostiglio', 'Ripostiglio', false, ['id' => 'Ripostiglio']) }}
                                {{ Form::label('Ripostiglio', 'Ripostiglio') }}
                            </div>
                            <!-- Angolo studio -->
                            <div class="angoloStudio" id="angoloStudio">
                                {{ Form::checkbox('Angolo studio', 'Angolo Studio', false, ['id' => 'AngoloStudio']) }}
                                {{ Form::label('Angolo studio', 'Angolo Studio', ['id' => 'angoloStudio']) }}
                            </div>
                    </fieldset>

                </div>

                <div class="colonna2">
                    <fieldset title="Inserisci la localizzazione" class="fieldset">
                        <legend><h2>Localizzazione:</h2></legend>
                        <!-- Città -->
                        <div class="item">
                            {{ Form::label('citta', 'Città') }}
                            {{ Form::text('citta', '', ['id' => 'citta']) }}
                        </div>
                        <!-- Via -->
                        <div class="item">
                            {{ Form::label('via', 'Via') }}
                            {{ Form::text('via', '', ['id' => 'via']) }}
                        </div>
                        <!-- Num civico -->
                        <div class="item">
                            {{ Form::label('numCivico', 'Num civico') }}
                            {{ Form::text('numCivico', '', ['id' => 'numCivico']) }}
                        </div>
                        <!-- CAP -->
                        <div class="item">
                            {{ Form::label('cap', 'CAP') }}
                            {{ Form::text('cap', '', ['id' => 'cap']) }}
                        </div>
                        <!-- Interno -->
                        <div>
                            {{ Form::label('interno', 'Interno') }}
                            {{ Form::selectRange('interno', 1, 508, ['id' => 'interno']) }}
                        </div>
                        <!-- Piano -->
                        <div>
                            {{ Form::label('piano', 'Piano') }}
                            {{ Form::selectRange('piano', 0, 127, ['id' => 'piano']) }}
                        </div>
                    </fieldset>

                    <fieldset title="Inserisci i costi"  class="fieldset">
                        <legend><h2>Costi:</h2></legend>
                        <!-- Canone di affitto -->
                        <div class="item">
                            {{ Form::label('canoneAffitto', 'Canone di affitto') }}
                            {{ Form::text('canoneAffitto', '', ['id' => 'canoneAffitto']) }}
                        </div>
                        <!-- Utenze -->
                        <div class="item">
                            {{ Form::label('utenze', 'Utenze') }}
                            {{ Form::text('utenze', '', ['id' => 'utenze']) }}
                        </div>
                    </fieldset>

                        <!-- Descrizione -->
                        <fieldset title="Inserisci una desrizione" class="fieldset">
                            <legend><h2>Descrizione</h2></legend>
                            {{ Form::textarea('descrizione', '' , ['id' => 'descrizione', 'rows' => 3, 'placeholder' => 'Inserisci una descrizione...']) }}
                        </fieldset>

                        <!-- Immagine alloggio -->
                        <fieldset title="Inserisci una foto dell'alloggio" class="fieldset">
                            <legend><h2>Inserisci una foto dell'alloggio</h2></legend>
                            {{ Form::file('immagine', ['id' => 'immagine']) }}
                        </fieldset>

                </div>

        </section>

        <section class="ultimo-box">
            {{--bottone di conferma--}}
            {{ Form::submit('Conferma inserimento', ['class' => 'bottone', 'id' => 'sub_btn','onclick' => "return confirm('Sei sicuro di voler proseguire?')"]) }}

            {{--Bottone per svotare i campi--}}
            <button class="bottone" onclick="document.getElementById('inserisci-annuncio').reset()">Svuota campi</button>
        </section>

        {{ Form::close() }}
    </main>
@endsection


