@extends('template')

@section('link')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/inserisci-annuncio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/content-home-loggato.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/gestione-alloggi.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/content-account.css') }}">
@endsection

@section('title', 'Inserisci annuncio')

@section('content')
    @isset($alloggi)
        @isset($servizi)


            @foreach($alloggi as $alloggio)
                <main class="main-container">
                    <section class="primo-box">
                        <div class="img-container">
                            @if(is_null($alloggio->id_foto))
                                <img src="{{ asset('images_case/no_image.png') }}" alt="immagine profilo" class="img-profilo">
                            @else
                                <img src="{{ asset('images_case/'.$alloggio->id_foto.$alloggio->estensione) }}" alt="immagine profilo" class="img-profilo">
                            @endif
                        </div>

                        {{ Form::open(array('route' => 'modifica-dati-locatore', 'files' => true, 'class' => 'modifica-dati')) }}

                        {{Form::hidden('id_alloggio', $hidden) }}
                        {{Form::hidden('id_posto_letto', $hidden) }}

                        <div class="profile-input">
                            <h1>Inserisci o modifica l'immagine dell'alloggio!</h1>
                            {{ Form::file('image', ['id' => 'image']) }}
                        </div>
                    </section>

                    <hr style="margin-right: 50px; margin-left: 50px">
                    <section class="parent">
                        <div class="colonna">
                            <fieldset title="Modifica le caratteristiche strutturali" class="fieldset">
                                <legend><h2>Caratteristiche strutturali:</h2></legend>
                                <!-- Tipologia -->
                                <div class="item">
                                    {{Form::label('tipologia', 'Tipologia: ', ['class' => 'label-form'])}}
                                    {{Form::select('tipologia', ['A' => 'Appartamento', 'P' => 'Posto letto'], $alloggio->tipologia, ['id' => 'tipologia'])}}
                                    <span class="underline"></span>
                                </div>
                                @if ($errors->first('tipologia'))
                                    <ul class="errors">
                                        @foreach ($errors->get('tipologia') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif

                                <!-- Dimensione -->
                                <div class="item">
                                    {{ Form::label('dimensione', 'Dimensione (mq)', ['class' => 'label-form']) }}
                                    {{ Form::text('dimensione', $alloggio->dimensione, ['id' => 'dimensione']) }}
                                </div>
                                @if ($errors->first('dimensione'))
                                    <ul class="errors">
                                        @foreach ($errors->get('dimensione') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif

                                <!-- Num posti letto totali -->
                                <div class="item">
                                    {{ Form::label('numPostiLettoTot', 'Num posti letto totali') }}
                                    {{ Form::selectRange('numPostiLettoTot', 1, 20, $alloggio->num_posti_letto_tot, ['id' => 'numPostiLettoTot']) }}
                                </div>

                                @if($alloggio->tipologia == 'Appartamento')
                                <!-- Num camere (appartemento)-->
                                    <div class="item">
                                        {{ Form::label('numCamere', 'Num camere') }}
                                        {{ Form::selectRange('numCamere', 1, 20, $alloggio->numCamere, ['id' => 'numCamere']) }}
                                    </div>
                                @endif

                                @if($alloggio->tipologia == 'Posto_letto')
                                <!-- Tipologia camera (posto letto) -->
                                    <div class=item">
                                        {{ Form::label('tipologiaCamera', 'Tipologia camera') }}
                                        {{ Form::select('tipologiaCamera', ['S' => 'Singola', 'D' => 'Doppia'], $alloggio->tipologia_camera, ['id' => 'tipologiaCamera']) }}
                                    </div>
                                @endif
                            </fieldset>

                            <fieldset title="Modifica i vicoli di locazione sul locatario" class="fieldset">
                                <legend><h2>Vicoli di locazione sul locatario:</h2></legend>
                                <!-- Genere -->
                                <div class="item">
                                    {{ Form::label('genere', 'Genere') }}
                                    {{Form::select('genere', ['m' => 'm', 'f' => 'f', 'u' => 'u'], $alloggio->sesso, ['id' => 'genere'])}}
                                </div>

                                <!-- Età minima - Età massima -->
                                <div>
                                    <p class="item">Fascia di età:</p>
                                    {{ Form::label('etaMin', 'Min') }}
                                    {{ Form::selectRange('etaMin', 18, 100, $alloggio->eta_minima, ['id' => 'etaMin']) }}
                                    {{ Form::label('etaMax', 'Max') }}
                                    {{ Form::selectRange('etaMax', 18, 100, $alloggio->eta_massima, ['id' => 'etaMax']) }}
                                </div>

                                <!-- Periodo locazione -->
                                <div>
                                    {{ Form::label('periodoLocazione', 'Periodo locazione (mesi):') }}
                                    {{Form::select('periodoLocazione', ['6' => 6, '9' => 9, '12' => 12], $alloggio->periodo_locazione, ['id' => 'periodoLocazione'])}}
                                </div>

                            </fieldset>

                            <fieldset title="Modifica i servizi presenti nell'alloggio" class="fieldset">
                                <legend><h2>Servizi</h2></legend>
                                @foreach($servizi as $servizio)
                                    @if($servizio->servizio == 'Bagno')
                                        <div>
                                            {{ Form::selectRange('Bagno', 1, 9, $servizio->quantita, ['id' => 'Bagno']) }}
                                            {{ Form::label('Bagno', 'Bagno/i') }}
                                        </div>
                                    @elseif($servizio->servizio == 'Cucina')
                                        <div>
                                            {{ Form::selectRange('Cucina', 1, 9, $servizio->quantita, ['id' => 'Cucina']) }}
                                            {{ Form::label('Cucina', 'Cucina/e') }}
                                        </div>
                                    @else
                                        @if($servizio->servizio == 'Lavanderia')
                                            <div>
                                                {{ Form::checkbox('Lavanderia', 1, $servizio->quantita, ['id' => 'Lavanderia']) }}
                                                {{ Form::label('Lavanderia', 'Lavanderia') }}
                                            </div>
                                        @else
                                            <div>
                                                {{ Form::checkbox('Lavanderia', 1, 1, ['id' => 'Lavanderia']) }}
                                                {{ Form::label('Lavanderia', 'Lavanderia') }}
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            </fieldset>
                        </div>

                        <div class="colonna2">
                            <fieldset title="Modifica la localizzazione" class="fieldset">
                                <legend><h2>Localizzazione:</h2></legend>
                                <!-- Città -->
                                <div class="item">
                                    {{ Form::label('citta', 'Città') }}
                                    {{ Form::text('citta', $alloggio->citta, ['id' => 'citta']) }}
                                </div>
                                @if ($errors->first('citta'))
                                    <ul class="errors">
                                        @foreach ($errors->get('citta') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif

                                <!-- Via -->
                                <div class="item">
                                    {{ Form::label('via', 'Via') }}
                                    {{ Form::text('via', $alloggio->via, ['id' => 'via']) }}
                                </div>
                                @if ($errors->first('via'))
                                    <ul class="errors">
                                        @foreach ($errors->get('via') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif

                                <!-- Num civico -->
                                <div class="item">
                                    {{ Form::label('numCivico', 'Num civico') }}
                                    {{ Form::text('numCivico', $alloggio->num_civico, ['id' => 'numCivico']) }}
                                </div>
                                @if ($errors->first('numCivico'))
                                    <ul class="errors">
                                        @foreach ($errors->get('numCivico') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif

                                <!-- CAP -->
                                <div class="item">
                                    {{ Form::label('cap', 'CAP') }}
                                    {{ Form::text('cap', $alloggio->cap, ['id' => 'cap']) }}
                                </div>
                                @if ($errors->first('cap'))
                                    <ul class="errors">
                                        @foreach ($errors->get('cap') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif

                                <!-- Interno -->
                                <div>
                                    {{ Form::label('interno', 'Interno') }}
                                    {{ Form::selectRange('interno', 1, 508, $alloggio->interno, ['id' => 'interno']) }}
                                </div>
                                @if ($errors->first('interno'))
                                    <ul class="errors">
                                        @foreach ($errors->get('interno') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif

                                <!-- Piano -->
                                <div>
                                    {{ Form::label('piano', 'Piano') }}
                                    {{ Form::selectRange('piano', 0, 127, $alloggio->piano, ['id' => 'piano']) }}
                                </div>
                                @if ($errors->first('piano'))
                                    <ul class="errors">
                                        @foreach ($errors->get('piano') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </fieldset>

                            <fieldset title="Modifica i costi"  class="fieldset">
                                <legend><h2>Costi:</h2></legend>
                                <!-- Canone di affitto -->
                                <div class="item">
                                    {{ Form::label('canoneAffitto', 'Canone di affitto') }}
                                    {{ Form::text('canoneAffitto', $alloggio->canone_affitto, ['id' => 'canoneAffitto']) }}
                                </div>
                                @if ($errors->first('canoneAffitto'))
                                    <ul class="errors">
                                        @foreach ($errors->get('canoneAffitto') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                <!-- Utenze -->
                                <div class="item">
                                    {{ Form::label('utenze', 'Utenze') }}
                                    {{ Form::text('utenze', $alloggio->utenze, ['id' => 'utenze']) }}
                                </div>
                                @if ($errors->first('utenze'))
                                    <ul class="errors">
                                        @foreach ($errors->get('utenze') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </fieldset>

                            <!-- Descrizione -->
                            <fieldset title="Inserisci una desrizione" class="fieldset">
                                <legend><h2>Descrizione</h2></legend>
                                {{ Form::textarea('descrizione', $alloggio->descrizione , ['id' => 'descrizione', 'rows' => 3]) }}
                                @if ($errors->first('descrizione'))
                                    <ul class="errors">
                                        @foreach ($errors->get('descrizione') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </fieldset>
                        </div>
                    </section>

        <section class="ultimo-box">
            {{--bottone di conferma--}}
            {{ Form::submit('Conferma modifica', ['class' => 'bottone', 'id' => 'sub_btn','onclick' => "return confirm('Sei sicuro di voler proseguire?')"]) }}
        </section>

        {{ Form::close() }}
    </main>
            @endforeach
        @endisset
    @endisset
@endsection


