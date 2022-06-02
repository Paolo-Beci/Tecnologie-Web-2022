@extends('layouts.content-inserisci')

@section('title', 'Inserisci annuncio')

@section('scripts')

    @parent
    <script src="{{ asset('js/functions.js') }}" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        $(function () {
            var actionUrl = "{{ route('newproduct.store') }}";
            var formId = 'addannuncio';
            $(":input").on('blur', function (event) {
                var formElementId = $(this).attr('id');
                doElemValidation(formElementId, actionUrl, formId);
            });
            $("#addannuncio").on('submit', function (event) {
                event.preventDefault();
                doFormValidation(actionUrl, formId);
            });
        });
    </script>

@endsection

@section('content')
    <div class="static">
        <h3>Inserisci annuncio</h3>
        <p>Utilizza questa form per inserire un nuovo annuncio nel Catalogo</p>

        <div class="container-contact">
            <div class="wrap-contact">
                {{ Form::open(array('route' => 'new-annuncio.store', 'id' => 'inserisci-annuncio','files' => true, 'class' => 'inserisci-annuncio')) }}

                <h1>Caratteristiche strutturali:</h1>
                <!-- Tipologia -->
                <div class="wrap-input  rs1-wrap-input">
                    <h2>Tipologia</h2>
                    {{ Form::label('tipo1', 'Appartemento') }}
                    {{ Form::radio('tipo1', 'Appartmaneto', ['id' => 'tipo1']) }}
                    {{ Form::label('tipo2', 'Posto letto') }}
                    {{ Form::radio('tipo2', 'Posto letto', ['id' => 'tipo2']) }}
                </div>
                <!-- Dimensione -->
                <div  class="wrap-input  rs1-wrap-input">
                    {{ Form::label('dimensione', 'Dimensione (mq)') }}
                    {{ Form::text('dimensione', '', ['id' => 'dimensione']) }}
                </div>
                <!-- Num posti letto totali -->
                <div  class="wrap-input  rs1-wrap-input">
                    {{ Form::label('numPostiLettoTot', 'Num posti letto totali') }}
                    {{ Form::selectRange('number', 1, 20) }}
                </div>
                <!-- Num camere (appartemento)-->
                <div  class="wrap-input  rs1-wrap-input">
                    {{ Form::label('numCamere', 'Num camere') }}
                    {{ Form::selectRange('number', 1, 20) }}
                </div>
                <!-- Tipologia camera (posto letto) -->
                <div  class="wrap-input  rs1-wrap-input">
                    {{ Form::label('tipologiaCamera', 'Tipologia camera') }}
                    {{ Form::select('tipologiaCamera', ['S' => 'Singola', 'D' => 'Doppia']) }}
                </div>

                <h1>Localizzazione:</h1>
                <!-- Città -->
                <div class="wrap-input  rs1-wrap-input">
                    {{ Form::label('citta', 'Città') }}
                    {{ Form::text('citta', '', ['id' => 'citta']) }}
                </div>
                <!-- Via -->
                <div  class="wrap-input  rs1-wrap-input">
                    {{ Form::label('via', 'Via') }}
                    {{ Form::text('via', '', ['id' => 'via']) }}
                </div>
                <!-- Num civico -->
                <div class="wrap-input  rs1-wrap-input">
                    {{ Form::label('numCivico', 'Num civico') }}
                    {{ Form::text('numCivico', '', ['id' => 'numCivico']) }}
                </div>
                <!-- CAP -->
                <div class="wrap-input  rs1-wrap-input">
                    {{ Form::label('cap', 'CAP') }}
                    {{ Form::text('cap', '', ['id' => 'cap']) }}
                </div>
                <!-- Interno -->
                <div  class="wrap-input  rs1-wrap-input">
                    {{ Form::label('interno', 'Interno') }}
                    {{ Form::selectRange('number', 1, 508) }}
                </div>
                <!-- Piano -->
                <div  class="wrap-input  rs1-wrap-input">
                    {{ Form::label('piano', 'Piano') }}
                    {{ Form::selectRange('number', 1, 127) }}
                </div>

                <h1>Vicoli di locazione sul locatario:</h1>
                <!-- Genere -->
                <div class="wrap-input  rs1-wrap-input">
                    <h2>Tipologia</h2>
                    {{ Form::label('male', 'Maschio') }}
                    {{ Form::radio('male', 'M', ['id' => 'male']) }}
                    {{ Form::label('female', 'Femmina') }}
                    {{ Form::radio('female', 'F', ['id' => 'female']) }}
                    {{ Form::label('unisex', 'Unisex') }}
                    {{ Form::radio('unisex', 'U', ['id' => 'unisex']) }}
                </div>
                <!-- Età minima - Età massima -->
                <div  class="wrap-input  rs1-wrap-input">
                    <h2>Fascia di età</h2>
                    {{ Form::label('etaMin', '&#8364; Minima') }}
                    {{ Form::selectRange('number', 18, 100) }}
                    {{ Form::label('etaMin', '&#8364; Massima') }}
                    {{ Form::selectRange('number', 18, 100) }}
                </div>
                <!-- Periodo locazione -->
                <div  class="wrap-input  rs1-wrap-input">
                    <h2>Periodo locazione</h2>
                    {{ Form::label('12', '12 mesi') }}
                    {{ Form::radio('12', '12') }}
                    {{ Form::label('9', '9 mesi') }}
                    {{ Form::radio('9', '9') }}
                    {{ Form::label('6', '6 mesi') }}
                    {{ Form::radio('6', '6') }}
                </div>

                <h1>Vicoli di locazione sul locatario:</h1>
                <!-- Canone di affitto -->
                <div  class="wrap-input  rs1-wrap-input">
                    {{ Form::label('canoneAffitto', 'Canone di affitto') }}
                    {{ Form::text('canoneAffitto', '', ['id' => 'canoneAffitto']) }}
                </div>
                <!-- Utenze -->
                <div  class="wrap-input  rs1-wrap-input">
                    {{ Form::label('utenze', 'Utenze') }}
                    {{ Form::text('utenze', '', ['id' => 'utenze']) }}
                </div>

                <h1>Servizi:</h1>
                <!-- Bagni -->
                <div  class="wrap-input  rs1-wrap-input">
                    {{ Form::label('bagni', 'Bagni') }}
                    {{ Form::selectRange('number', 1, 10) }}
                </div>
                <!-- Cucine -->
                <div  class="wrap-input  rs1-wrap-input">
                    {{ Form::label('cucine', 'Cucine') }}
                    {{ Form::selectRange('number', 1, 5) }}
                </div>
                <!-- Locale ricreativo -->
                <div  class="wrap-input  rs1-wrap-input">
                    {{ Form::label('localeRicreativo', 'Locale ricreativo') }}
                    {{ Form::checkbox('localeRicreativo', 'Locale ricreativo') }}
                </div>
                <!-- Lavanderia -->
                <div  class="wrap-input  rs1-wrap-input">
                    {{ Form::label('lavanderia', 'Lavanderia') }}
                    {{ Form::checkbox('lavanderia', 'Lavanderia') }}
                </div>
                <!-- Garage -->
                <div  class="wrap-input  rs1-wrap-input">
                    {{ Form::label('garage', 'Garage') }}
                    {{ Form::checkbox('garage', 'Garage') }}
                </div>
                <!-- Giardino -->
                <div  class="wrap-input  rs1-wrap-input">
                    {{ Form::label('giardino', 'Giardino') }}
                    {{ Form::checkbox('giardino', 'Giardino') }}
                </div>
                <!-- Aria condizionata -->
                <div  class="wrap-input  rs1-wrap-input">
                    {{ Form::label('ariaCondizionata', 'Aria condizionata') }}
                    {{ Form::checkbox('ariaCondizionata', 'Aria condizionata') }}
                </div>
                <!-- Wi-fi -->
                <div  class="wrap-input  rs1-wrap-input">
                    {{ Form::label('wi-fi', 'Wi-fi') }}
                    {{ Form::checkbox('wi-fi', 'Wi-fi') }}
                </div>
                <!-- Ripostiglio -->
                <div  class="wrap-input  rs1-wrap-input">
                    {{ Form::label('ripostiglio', 'Ripostiglio') }}
                    {{ Form::checkbox('ripostiglio', 'Ripostiglio') }}
                </div>
                <!-- Angolo studio -->
                <div  class="wrap-input  rs1-wrap-input">
                    {{ Form::label('angoloStudio', 'Angolo Studio') }}
                    {{ Form::checkbox('angoloStudio', 'Angolo Studio') }}
                </div>

                <!-- Descrizione -->
                <div  class="wrap-input  rs1-wrap-input">
                    {{ Form::label('descrizione', 'Descrizione') }}
                    {{ Form::textarea('descrizione', 'Inserisci una descrizione...' , ['id' => 'descrizione', 'rows' => 3]) }}
                </div>

                <!-- Immagine alloggio -->
                <div  class="wrap-input  rs1-wrap-input">
                    <h2>Inserisci una foto dell'alloggio</h2>
                    {{ Form::label('immagine', 'Immagine Alloggio') }}
                    {{ Form::file('immagine', ['id' => 'immagine']) }}
                </div>

                {{--bottone di conferma--}}
                <div class="container-form-btn">
                    {{ Form::submit($azione, ['class' => 'filter_button_home', 'onclick' => "return confirm('Sei sicuro di voler proseguire?')"]) }}
                </div>

                {{ Form::close() }}

            </div>

        </div>

    </div>
@endsection


