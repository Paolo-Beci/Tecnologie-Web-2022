@extends('template')

@section('link')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/inserisci-annuncio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/content-home-loggato.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/gestione-alloggi.css') }}">
@endsection

@section('title', 'Inserisci annuncio')

@section('content')
    <main class="main-container">

        {{ Form::open(array('route' => 'modifica-annuncio', 'id' => 'inserisci-annuncio','files' => true, 'class' => 'inserisci-annuncio')) }}

        <section class="primo-box">
            <h2>Utilizza questa form per modificare l' annuncio selezionato</h2>
            <div class="img-container">
                @foreach($servizi as $servizio)
                    <h1>{{$servizio->servizio}}</h1>
                @endforeach

                {{--Da modificare
                @if(is_null($alloggio->id_foto))
                    <img src="{{ asset('images_profilo/no_image.png') }}" alt="immagine profilo" class="img-profilo">
                @else
                    <img src="{{ asset('images_profilo/'.$alloggio->id_foto.$alloggio->estensione) }}" alt="immagine profilo" class="img-profilo">
                @endif
                --}}
            </div>
        </section>

{{--
        <section class="parent">
                <div class="colonna">
                    <fieldset title="Inserisci le caratteristiche strutturali" class="fieldset">
                        <legend><h2>Caratteristiche strutturali:</h2></legend>
                        <!-- Tipologia -->
                        <div>
                            {{Form::label('tipologia', 'Tipologia')}}
                            {{Form::select('tipologia', $alloggio->tipologia, ['id' => 'tipologia'])}}
                        </div>
                        <!-- Dimensione -->
                        <div class="item">
                            {{ Form::label('dimensione', 'Dimensione (mq)') }}
                            {{ Form::text('dimensione', $alloggio->dimensione, ['id' => 'dimensione']) }}
                        </div>
                        <!-- Num posti letto totali -->
                        <div>
                            {{ Form::label('numPostiLettoTot', 'Num posti letto totali') }}
                            {{ Form::selectRange('number', 1, 20, $alloggio->num_posti_letto_tot, ['id' => 'numPostiLettoTot']) }}
                        </div>
                        <!-- Num camere (appartemento)-->
                        <div>
                            {{ Form::label('numCamere', 'Num camere') }}
                            {{ Form::selectRange('number', 1, 20, ['id' => 'numCamere']) }}
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
                            {{ Form::selectRange('number', 18, 100, ['id' => 'etaMin']) }}
                            {{ Form::label('etaMax', 'Max') }}
                            {{ Form::selectRange('number', 18, 100, ['id' => 'etaMax']) }}
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
                                {{ Form::selectRange('number', 1, 9, ['id' => 'bagno']) }}
                                {{ Form::label('bagno', 'Bagno/i') }}
                            </div>
                            <!-- Cucine -->
                            <div>
                                {{ Form::selectRange('number', 1, 9, ['id' => 'cucina']) }}
                                {{ Form::label('cucina', 'Cucina/e') }}
                            </div>
                            <!-- Locale ricreativo -->
                            <div>
                                {{ Form::checkbox('localeRicreativo', 'Locale ricreativo', false, ['id' => 'localeRicreativo']) }}
                                {{ Form::label('localeRicreativo', 'Locale ricreativo') }}
                            </div>
                            <!-- Lavanderia -->
                            <div>
                                {{ Form::checkbox('lavanderia', 'Lavanderia', false, ['id' => 'lavanderia']) }}
                                {{ Form::label('lavanderia', 'Lavanderia') }}
                            </div>
                            <!-- Garage -->
                            <div>
                                {{ Form::checkbox('garage', 'Garage', false, ['id' => 'garage']) }}
                                {{ Form::label('garage', 'Garage') }}
                            </div>

                            <!-- Giardino -->
                            <div>
                                {{ Form::checkbox('giardino', 'Giardino', false, ['id' => 'giardino']) }}
                                {{ Form::label('giardino', 'Giardino') }}
                            </div>
                            <!-- Aria condizionata -->
                            <div>
                                {{ Form::checkbox('ariaCondizionata', 'Aria condizionata', false, ['id' => 'ariaCondizionata']) }}
                                {{ Form::label('ariaCondizionata', 'Aria condizionata') }}
                            </div>
                            <!-- Wi-fi -->
                            <div>
                                {{ Form::checkbox('wi-fi', 'Wi-fi', false, ['id' => 'wi-fi']) }}
                                {{ Form::label('wi-fi', 'Wi-fi') }}
                            </div>
                            <!-- Ripostiglio -->
                            <div>
                                {{ Form::checkbox('ripostiglio', 'Ripostiglio', false, ['id' => 'ripostiglio']) }}
                                {{ Form::label('ripostiglio', 'Ripostiglio') }}
                            </div>
                            <!-- Angolo studio -->
                            <div>
                                {{ Form::checkbox('angoloStudio', 'Angolo Studio', false, ['id' => 'angoloStudio']) }}
                                {{ Form::label('angoloStudio', 'Angolo Studio') }}
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
                            {{ Form::selectRange('number', 1, 508, ['id' => 'interno']) }}
                        </div>
                        <!-- Piano -->
                        <div>
                            {{ Form::label('piano', 'Piano') }}
                            {{ Form::selectRange('number', 0, 127, ['id' => 'piano']) }}
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
                            {{ Form::textarea('descrizione', 'Inserisci una descrizione...' , ['id' => 'descrizione', 'rows' => 3]) }}
                        </fieldset>

                        <!-- Immagine alloggio -->
                        <fieldset title="Inserisci una foto dell'alloggio" class="fieldset">
                            <legend><h2>Inserisci/Modifica la foto dell'alloggio</h2></legend>
                            {{ Form::file('immagine', ['id' => 'immagine']) }}
                        </fieldset>

                </div>

        </section>
    --}}
        <section class="ultimo-box">
            {{--Bottone per annullare l'inerimento--}}
            <a class="anchor" href="{{route('gestione-alloggi')}}">
                <button class="bottone">Annulla inserimento</button>
            </a>
            {{--bottone di conferma--}}
            {{ Form::submit('Conferma inserimento', ['class' => 'bottone', 'id' => 'sub_btn','onclick' => "return confirm('Sei sicuro di voler proseguire?')"]) }}

            {{--Bottone per svotare i campi--}}
            <a href="{{route('gestione-alloggi')}}">
                <button class="bottone">Svuota campi</button>
            </a>
        </section>

        {{ Form::close() }}
    </main>

@endsection


