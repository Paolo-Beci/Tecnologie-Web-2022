@extends('template')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/inserisci-annuncio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/content-home-loggato.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/modifica-annuncio.css') }}">
@endsection

@section('js')
    <script>
        $(function () {
            $("#tipologia").on('change', function (event) {
            //Se l'opzione selezionata assume un determinato valore
            console.log($(this).val())
            if($(this).val() === 'Posto_letto'){
                //seleziono l'elemento della form specificando il suo id ed applica il metodo per nasconderlo/meno
                $("input.appartamento").show();
                $("label.appartamento").show();
                $("div#tipologiaCamera").show();
                $("div#numCamere").hide();
            }
            else{
                $("input.appartamento").hide();
                $("label.appartamento").hide();
                $("div#tipologiaCamera").hide();
                $("div#numCamere").show();
            }
            });
        });
    </script>
@endsection

@section('title', 'Inserisci annuncio')

@section('content')
    @isset($alloggi)
        @isset($servizi)
            @isset($servizi_disponibili)


            @foreach($alloggi as $alloggio)
                <main class="main-container">
                    <section class="primo-box">
                        <div class="img-container">
                            @if(is_null($alloggio->id_foto))
                                <img src="{{ asset('images_case/no_image.png') }}" alt="immagine profilo" class="img-annuncio">
                            @else
                                <img src="{{ asset('images_case/'.$alloggio->id_foto.$alloggio->estensione) }}" alt="immagine profilo" class="img-annuncio">
                            @endif
                        </div>

                        {{ Form::open(array('route' => 'modifica-annuncio.store', 'files' => true, 'class' => 'modifica-dati')) }}

                        {{ Form::hidden('id_alloggio', $alloggio->id_alloggio) }}
                        {{ Form::hidden('id_foto', $alloggio->id_foto) }}

                        <div class="profile-input">
                            <h1>Inserisci o modifica l'immagine dell'alloggio!</h1>
                            {{ Form::file('immagine', ['id' => 'image']) }}
                        </div>
                        @if ($errors->first('immagine'))
                            <ul class="errors">
                                @foreach ($errors->get('immagine') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </section>

                    <hr style="margin-right: 50px; margin-left: 50px">
                    <section class="parent">
                        <div class="colonna">
                            <fieldset title="Modifica le caratteristiche strutturali" class="fieldset">
                                <legend><h2>Caratteristiche strutturali:</h2></legend>
                                <!-- Tipologia -->
                                <div class="item">
                                    {{Form::label('tipologia', 'Tipologia: ', ['class' => 'label-form'])}}
                                    {{Form::select('tipologia', ['Appartamento' => 'Appartamento', 'Posto_letto' => 'Posto letto'], $alloggio->tipologia, ['id' => 'tipologia'])}}
                                    <span class="underline"></span>
                                </div>

                                <!-- Dimensione -->
                                <div class="item">
                                    {{ Form::label('dimensione', 'Dimensione (mq)', ['class' => 'label-form']) }}
                                    {{ Form::text('dimensione', $alloggio->dimensione, ['id' => 'dimensione', 'placeholder' => 'Nessuna dimensione']) }}
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
                                    {{ Form::label('numPostiLettoTot', 'Num posti letto totali', ['class' => 'label-form']) }}
                                    {{ Form::selectRange('numPostiLettoTot', 1, 20, $alloggio->num_posti_letto_tot, ['id' => 'numPostiLettoTot']) }}
                                </div>

                                <!-- Num camere (appartemento)-->
                                    <div class="item" id="numCamere">
                                        {{ Form::label('numCamere', 'Num camere', ['class' => 'label-form']) }}
                                        {{ Form::selectRange('numCamere', 1, 20, $alloggio->num_camere, ['id' => 'numCamere']) }}
                                    </div>

                                <!-- Tipologia camera (posto letto) -->
                                    <div class="appartamento" id="tipologiaCamera">
                                        {{ Form::label('tipologiaCamera', 'Tipologia camera', ['class' => 'label-form']) }}
                                        {{ Form::select('tipologiaCamera', ['S' => 'Singola', 'D' => 'Doppia'], $alloggio->tipologia_camera, ['id' => 'tipologiaCamera']) }}
                                    </div>
                            </fieldset>

                            <fieldset title="Modifica i vicoli di locazione sul locatario" class="fieldset">
                                <legend><h2>Vicoli di locazione sul locatario:</h2></legend>
                                <!-- Genere -->
                                <div class="item">
                                    {{ Form::label('genere', 'Genere', ['class' => 'label-form']) }}
                                    {{Form::select('genere', ['m' => 'm', 'f' => 'f', 'u' => 'u'], $alloggio->genere, ['id' => 'genere'])}}
                                </div>

                                <!-- Età minima - Età massima -->
                                <div>
                                    <p class="item">Fascia di età:</p>
                                    {{ Form::label('etaMin', 'Min', ['class' => 'label-form']) }}
                                    {{ Form::selectRange('etaMin', 18, 100, $alloggio->eta_minima, ['id' => 'etaMin']) }}
                                    {{ Form::label('etaMax', 'Max', ['class' => 'label-form']) }}
                                    {{ Form::selectRange('etaMax', 18, 100, $alloggio->eta_massima, ['id' => 'etaMax']) }}
                                </div>

                                <!-- Periodo locazione -->
                                <div>
                                    {{ Form::label('periodoLocazione', 'Periodo locazione (mesi):', ['class' => 'label-form']) }}
                                    {{Form::select('periodoLocazione', ['6' => 6, '9' => 9, '12' => 12], $alloggio->periodo_locazione, ['id' => 'periodoLocazione'])}}
                                </div>
                            </fieldset>

                            <fieldset title="Modifica i servizi presenti nell'alloggio" class="fieldset">
                                <legend><h2>Servizi</h2></legend>

                                @foreach ($servizi as $servizio)
                                    <div>
                                        @if ($servizio->nome_servizio == 'Bagno' || $servizio->nome_servizio == 'Cucina')
                                            {{ Form::selectRange($servizio->nome_servizio, 1, 9, $servizi_disponibili[$servizio->nome_servizio]) }}
                                            {{ Form::label($servizio->nome_servizio, $servizio->nome_servizio) }}
                                        @else
                                            @if (array_key_exists($servizio->nome_servizio, $servizi_disponibili))
                                                @if($servizio->nome_servizio == 'Angolo studio')
                                                    {{ Form::checkbox($servizio->nome_servizio, 1, true, [ 'class'=>'appartamento']) }}
                                                    {{ Form::label($servizio->nome_servizio, $servizio->nome_servizio, [ 'class'=>'appartamento'])}}
                                                @else
                                                    {{ Form::checkbox($servizio->nome_servizio, 1, true, ['id' => $servizio->nome_servizio]) }}
                                                    {{ Form::label($servizio->nome_servizio, $servizio->nome_servizio)}}
                                                @endif
                                            @else
                                                @if($servizio->nome_servizio == 'Angolo studio')
                                                    {{ Form::checkbox($servizio->nome_servizio, 1, false, ['class'=>'appartamento']) }}
                                                    {{ Form::label($servizio->nome_servizio, $servizio->nome_servizio, ['class'=>'appartamento'])}}
                                                @else
                                                    {{ Form::checkbox($servizio->nome_servizio, 1, false, ['id' => $servizio->nome_servizio]) }}
                                                    {{ Form::label($servizio->nome_servizio, $servizio->nome_servizio)}}
                                                @endif
                                            @endif
                                        @endif
                                    </div>
                                @endforeach
                            </fieldset>
                        </div>

                        <div class="colonna2">
                            <fieldset title="Modifica la localizzazione" class="fieldset">
                                <legend><h2>Localizzazione:</h2></legend>
                                <!-- Città -->
                                <div class="item">
                                    {{ Form::label('citta', 'Città', ['class' => 'label-form']) }}
                                    {{ Form::text('citta', $alloggio->citta)}}
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
                                    {{ Form::label('via', 'Via', ['class' => 'label-form']) }}
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
                                    {{ Form::label('numCivico', 'Num civico', ['class' => 'label-form']) }}
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
                                    {{ Form::label('cap', 'CAP', ['class' => 'label-form']) }}
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
                                    {{ Form::label('interno', 'Interno', ['class' => 'label-form']) }}
                                    {{ Form::selectRange('interno', 1, 508, $alloggio->interno, ['id' => 'interno']) }}
                                </div>

                                <!-- Piano -->
                                <div>
                                    {{ Form::label('piano', 'Piano', ['class' => 'label-form']) }}
                                    {{ Form::selectRange('piano', 0, 127, $alloggio->piano, ['id' => 'piano']) }}
                                </div>
                            </fieldset>

                            <fieldset title="Modifica i costi"  class="fieldset">
                                <legend><h2>Costi:</h2></legend>
                                <!-- Canone di affitto -->
                                <div class="item">
                                    {{ Form::label('canoneAffitto', 'Canone di affitto', ['class' => 'label-form']) }}
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
                                    {{ Form::label('utenze', 'Utenze', ['class' => 'label-form', 'placeholder'=>'Nessun valore']) }}
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
                                {{ Form::textarea('descrizione', $alloggio->descrizione , ['id' => 'descrizione', 'rows' => 3, 'placeholder' => 'Nessuna descrizione']) }}
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
    @endisset
@endsection


