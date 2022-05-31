<main id="content-home-admin" class="content-home-admin">
    {{--sezione riassunto filtri--}}
    <section id="statistiche" class="stats-section">
        <h1 class="titolo">Statistiche</h1>
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
                {{ Form::open(array('route' => array('getStats', 'posto letto', now(), now()), 'id' => 'filtri_id', 'files' => true)) }}

                {{--div per date--}}
                <div class="wrap-input">
                    {{ Form::label('da', 'Da')}}
                    {{ Form::date('da', now(), ['class' => 'input', 'id' => 'da']) }}

                    {{ Form::label('a', 'A') }}
                    {{ Form::date('a', now(), ['class' => 'input', 'id' => 'a']) }}
                </div>

                {{--div per la tipologia--}}
                <div class="wrap-input">
                    {{ Form::label('type', 'Tipologia di alloggio') }}
                    {{ Form::select('type', ['appartamento'=>'appartamento', 'posto letto'=>'posto letto'], '', ['class' => 'input', 'id' => 'type']) }}
                </div>

                {{--bottone di conferma--}}
                <div class="container-form-btn">
                    {{ Form::submit('Filtra', ['class' => 'filter_button_home']) }}
                </div>

                {{--chiusura form--}}
                {{ Form::close() }}
            </div>

            {{--sezione javascript--}}
            <script>

                const getDaValue = () =>{
                    let da_value = document.getElementById("da").value;
                    return da_value
                }
                const getAValue = () =>{
                    let a_value = document.getElementById("a").value;
                    return a_value
                }
                const getTipologiaValue = () =>{
                    let tipologia_value = document.getElementById("type_id").value;
                    return tipologia_value
                }

            </script>

            <div id="id_result" class="results_container">
                @isset($offAll)
                    @foreach($offAll as $alloggio)
                        <article class="result">
                            <div class="content">
                                <img class="img_result" src="{{ asset('images_case/'.$alloggio->id_foto.$alloggio->estensione) }}" alt="Foto alloggio">
                                <h2>{{$alloggio->citta}}, {{$alloggio->via}} {{$alloggio->num_civico}}</h2>
                                <p>Locatore: {{$alloggio->username}}</p>
                                <p>Id alloggio: {{$alloggio->id_alloggio}}</p>
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
                {{ Form::open(array('route' => array('getStats', 'posto letto', now(), now()), 'id' => 'filtri_id2', 'files' => true)) }}

                {{--div per date--}}
                <div class="wrap-input">
                    {{ Form::label('da2', 'Da')}}
                    {{ Form::date('da2', now(), ['class' => 'input', 'id' => 'da2']) }}

                    {{ Form::label('a2', 'A') }}
                    {{ Form::date('a2', now(), ['class' => 'input', 'id' => 'a2']) }}
                </div>

                {{--div per la tipologia--}}
                <div class="wrap-input">
                    {{ Form::label('type2', 'Tipologia di alloggio') }}
                    {{ Form::select('type2', ['appartamento'=>'appartamento', 'posto letto'=>'posto letto'], '', ['class' => 'input', 'id' => 'type2']) }}
                </div>

                {{--bottone di conferma--}}
                <div class="container-form-btn">
                    {{ Form::submit('Filtra', ['class' => 'filter_button_home']) }}
                </div>

                {{--chiusura form--}}
                {{ Form::close() }}
            </div>
            <div class="results_container">
                @isset($offLoc)
                    @foreach($offLoc as $alloggio)
                        <article class="result">
                            <div class="content">
                                <img class="img_result" src="{{ asset('images_case/'.$alloggio->id_foto.$alloggio->estensione) }}" alt="Foto alloggio">
                                <h2>{{$alloggio->citta}}, {{$alloggio->via}} {{$alloggio->num_civico}}</h2>
                                <p>Interessato: {{$alloggio->username}}</p>
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
                {{ Form::open(array('route' => array('getStats', 'posto letto', now(), now()), 'id' => 'filtri_id3', 'files' => true)) }}

                {{--div per date--}}
                <div class="wrap-input">
                    {{ Form::label('da3', 'Da')}}
                    {{ Form::date('da3', now(), ['class' => 'input', 'id' => 'da3']) }}

                    {{ Form::label('a3', 'A') }}
                    {{ Form::date('a3', now(), ['class' => 'input', 'id' => 'a3']) }}
                </div>

                {{--div per la tipologia--}}
                <div class="wrap-input">
                    {{ Form::label('type3', 'Tipologia di alloggio') }}
                    {{ Form::select('type3', ['appartamento'=>'appartamento', 'posto letto'=>'posto letto'], '', ['class' => 'input', 'id' => 'type3']) }}
                </div>

                {{--bottone di conferma--}}
                <div class="container-form-btn">
                    {{ Form::submit('Filtra', ['class' => 'filter_button_home']) }}
                </div>

                {{--chiusura form--}}
                {{ Form::close() }}
            </div>
            <div class="results_container">
                @isset($allAllocati)
                    @foreach($allAllocati as $alloggio)
                        <article class="result">
                            <div class="content">
                                <img class="img_result" src="{{ asset('images_case/'.$alloggio->id_foto.$alloggio->estensione) }}" alt="Foto alloggio">
                                <h2>{{$alloggio->citta}}, {{$alloggio->via}} {{$alloggio->num_civico}}</h2>
                                <p>Locatario: {{$alloggio->username}}</p>
                                <a class="dettagli_locatore" title="Clicca qui per informazioni sul locatore" href="#id_result">Id alloggio: {{$alloggio->id_alloggio}}</a>
                            </div>
                        </article>
                    @endforeach
                @endisset
            </div>
        </div>
    </section>
</main>
