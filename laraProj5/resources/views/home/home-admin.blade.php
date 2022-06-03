<main id="content-home-admin" class="content-home-admin">
    {{--sezione riassunto filtri--}}
    <section id="statistiche" class="stats-section">
        <h1 title="I tre dati seguenti non sono soggetti a filtraggio" class="titolo">Statistiche</h1>
        <div class="stats-container">
            <article class="stats">
                <a title="Numero di alloggi presenti sul mercato" class="indicazione" href="#1">Offerte di alloggio</a>
                <p>{{$numOffAll}}</p>
            </article>
            <article class="stats">
                <a title="Numero di alloggi a cui qualcuno è interessato" class="indicazione" href="#2">Offerte di locazione</a>
                <p>{{$numOffLoc}}</p>
            </article>
            <article class="stats">
                <a title="Numero di alloggi allocati" class="indicazione" href="#3">Alloggi locati</a>
                <p>{{$numAllAllocati}}</p>
            </article>
        </div>
        <div id="1" class="loader">
            <div class="ball"></div>
            <div class="ball"></div>
            <div class="ball"></div>
        </div>
    </section>

    {{--sezione offerte alloggio--}}
    <section id="offerte_di_alloggio" class="filter_section">
        <h2>Offerte di alloggio</h2>
        <div class="form_container">
            <div class="wrap-contact">

                {{--apertura form; bisogna capire come passare i dati della form al posto di now e posto letto--}}
                {{ Form::open(array('route' => array('getOffAllFiltered'), 'id' => 'filtri_id', 'files' => true)) }}

                {{--div per date--}}
                <div class="wrap-input">
                    {{ Form::label('da', 'Da')}}
                    {{ Form::date('da', $da, ['class' => 'input', 'id' => 'da']) }}

                    {{ Form::label('a', 'A') }}
                    {{ Form::date('a', $a, ['class' => 'input', 'id' => 'a']) }}
                </div>

                {{--div per la tipologia--}}
                <div class="wrap-input">
                    {{ Form::label('type', 'Tipologia di alloggio') }}
                    {{ Form::select('type', ['Appartamento'=>'appartamento', 'Posto_letto'=>'posto letto'], $type, ['class' => 'input', 'id' => 'type']) }}
                </div>

                {{--bottone di conferma--}}
                <div class="container-form-btn">
                    {{ Form::submit('Filtra', ['class' => 'filter_button_home']) }}
                </div>

                {{--chiusura form--}}
                {{ Form::close() }}

            </div>

            {{--<div id="id_result" class="results_container">
                @isset($offAll)
                    @foreach($offAll as $alloggio)
                        <article class="result">
                            <div class="content">
                                <img class="img_result" src="{{ asset('images_case/'.$alloggio->id_foto.$alloggio->estensione) }}" alt="Foto alloggio">
                                <h2>{{$alloggio->citta}}, {{$alloggio->via}} {{$alloggio->num_civico}}</h2>
                                <p>Tipo: {{$alloggio->tipologia}}</p>
                                <p>Locatore: {{$alloggio->username}}</p>
                                <p>Id alloggio: {{$alloggio->id_alloggio}}</p>
                                <p>Data inserimento: {{$alloggio->data_inserimento_offerta}}</p>
                            </div>
                        </article>
                    @endforeach
                @endisset
            </div>--}}
            <div id="id_result" class="results_container">
                @isset($offAll)
                    @foreach($offAll as $alloggio)
                        <article class="card">
                            <img class="card__image" src="{{ asset('images_case/'.$alloggio->id_foto.$alloggio->estensione) }}" alt="Foto alloggio">
                            <div class="card__image">
                                <h2>{{$alloggio->citta}}, {{$alloggio->via}} {{$alloggio->num_civico}}</h2>
                                <p>Tipo: {{$alloggio->tipologia}}</p>
                                <p>Locatore: {{$alloggio->username}}</p>
                                <p>Id alloggio: {{$alloggio->id_alloggio}}</p>
                                <p>Data inserimento: {{$alloggio->data_inserimento_offerta}}</p>
                            </div>
                        </article>
                    @endforeach
                @endisset
            </div>
        </div>
    </section>
    <div id="2" class="loader">
        <div class="ball"></div>
        <div class="ball"></div>
        <div class="ball"></div>
    </div>

    {{--sezione offerte locazione--}}
    <section id="offerte_di_locazione" class="filter_section">
        <h2>Offerte di locazione</h2>
        <div class="form_container">
            <div class="wrap-contact">
                {{--apertura form; bisogna capire come passare i dati della form al posto di now e posto letto.
                Temporaneamente la rotta è la stessa del primo caso; da modificare--}}
                {{ Form::open(array('route' => array('getOffLocFiltered'), 'id' => 'filtri_id', 'files' => true)) }}

                {{--div per date--}}
                <div class="wrap-input">
                    {{ Form::label('da2', 'Da')}}
                    {{ Form::date('da2', $da2, ['class' => 'input', 'id' => 'da2']) }}

                    {{ Form::label('a2', 'A') }}
                    {{ Form::date('a2', $a2, ['class' => 'input', 'id' => 'a2']) }}
                </div>

                {{--div per la tipologia--}}
                <div class="wrap-input">
                    {{ Form::label('type2', 'Tipologia di alloggio') }}
                    {{ Form::select('type2', ['Appartamento'=>'appartamento', 'Posto_letto'=>'posto letto'], $type2, ['class' => 'input', 'id' => 'type2']) }}
                </div>

                {{--bottone di conferma--}}
                <div class="container-form-btn">
                    {{ Form::submit('Filtra', ['class' => 'filter_button_home']) }}
                </div>

                {{--chiusura form--}}
                {{ Form::close() }}
            </div>
            {{--<div class="results_container">
                @isset($offLoc)
                    @foreach($offLoc as $alloggio)
                        <article class="result">
                            <div class="content">
                                <img class="img_result" src="{{ asset('images_case/'.$alloggio->id_foto.$alloggio->estensione) }}" alt="Foto alloggio">
                                <h2>{{$alloggio->citta}}, {{$alloggio->via}} {{$alloggio->num_civico}}</h2>
                                <p>Tipo: {{$alloggio->tipologia}}</p>
                                <p>Interessato: {{$alloggio->username}}</p>
                                <a class="dettagli_locatore" title="Clicca qui per informazioni sul locatore" href="#id_result">Id alloggio: {{$alloggio->id_alloggio}}</a>
                            </div>
                        </article>
                    @endforeach
                @endisset
            </div>--}}
            <div id="id_result" class="results_container">
                @isset($offLoc)
                    @foreach($offLoc as $alloggio)
                        <article class="card">
                            <img class="card__image" src="{{ asset('images_case/'.$alloggio->id_foto.$alloggio->estensione) }}" alt="Foto alloggio">
                            <div class="card__image">
                                <h2>{{$alloggio->citta}}, {{$alloggio->via}} {{$alloggio->num_civico}}</h2>
                                <p>Tipo: {{$alloggio->tipologia}}</p>
                                <p>Interessato: {{$alloggio->username}}</p>
                                <p>Data interessamento: {{$alloggio->data_invio}}</p>
                                <a class="dettagli_locatore" title="Clicca qui per informazioni sul locatore" href="#id_result">Id alloggio: {{$alloggio->id_alloggio}}</a>
                            </div>
                        </article>
                    @endforeach
                @endisset
            </div>
        </div>
    </section>
    <div id="3" class="loader">
        <div class="ball"></div>
        <div class="ball"></div>
        <div class="ball"></div>
    </div>

    {{--alloggi locati--}}
    <section id="alloggi_locati" class="filter_section">
        <h2>Alloggi locati</h2>
        <div class="form_container">
            <div class="wrap-contact">
                {{--apertura form; bisogna capire come passare i dati della form al posto di now e posto letto.
                Temporaneamente la rotta è la stessa del primo caso; da modificare--}}
                {{ Form::open(array('route' => array('getAllAlLocatiFiltered'), 'id' => 'filtri_id', 'files' => true)) }}

                {{--div per date--}}
                <div class="wrap-input">
                    {{ Form::label('da3', 'Da')}}
                    {{ Form::date('da3', $da3, ['class' => 'input', 'id' => 'da3']) }}

                    {{ Form::label('a3', 'A') }}
                    {{ Form::date('a3', $a3, ['class' => 'input', 'id' => 'a3']) }}
                </div>

                {{--div per la tipologia--}}
                <div class="wrap-input">
                    {{ Form::label('type3', 'Tipologia di alloggio') }}
                    {{ Form::select('type3', ['Appartamento'=>'appartamento', 'Posto_letto'=>'posto letto'], $type3, ['class' => 'input', 'id' => 'type3']) }}
                </div>

                {{--bottone di conferma--}}
                <div class="container-form-btn">
                    {{ Form::submit('Filtra', ['class' => 'filter_button_home']) }}
                </div>

                {{--chiusura form--}}
                {{ Form::close() }}
            </div>
            {{--<div class="results_container">
                @isset($allAllocati)
                    @foreach($allAllocati as $alloggio)
                        <article class="result">
                            <div class="content">
                                <img class="img_result" src="{{ asset('images_case/'.$alloggio->id_foto.$alloggio->estensione) }}" alt="Foto alloggio">
                                <h2>{{$alloggio->citta}}, {{$alloggio->via}} {{$alloggio->num_civico}}</h2>
                                <p>Tipo: {{$alloggio->tipologia}}</p>
                                <p>Locatario: {{$alloggio->username}}</p>
                                <a class="dettagli_locatore" title="Clicca qui per informazioni sul locatore" href="#id_result">Id alloggio: {{$alloggio->id_alloggio}}</a>
                            </div>
                        </article>
                    @endforeach
                @endisset
            </div>--}}
            <div id="id_result" class="results_container">
                @isset($allAllocati)
                    @foreach($allAllocati as $alloggio)
                        <article class="card">
                            <img class="card__image" src="{{ asset('images_case/'.$alloggio->id_foto.$alloggio->estensione) }}" alt="Foto alloggio">
                            <div class="card__image">
                                <h2>{{$alloggio->citta}}, {{$alloggio->via}} {{$alloggio->num_civico}}</h2>
                                <p>Tipo: {{$alloggio->tipologia}}</p>
                                <p>Locatario: {{$alloggio->username}}</p>
                                <p>Data interessamento: {{$alloggio->data_interazione}}</p>
                                <a class="dettagli_locatore" title="Clicca qui per informazioni sul locatore" href="#id_result">Id alloggio: {{$alloggio->id_alloggio}}</a>
                            </div>
                        </article>
                    @endforeach
                @endisset
            </div>
        </div>
    </section>
</main>
