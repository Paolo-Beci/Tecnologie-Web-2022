<main id="content-home-admin" class="content-home-admin">
    {{--sezione riassunto filtri--}}
    <section id="statistiche" class="stats-section">
        <h1 class="titolo">Statistiche</h1>
        <div class="stats-container">
            <article class="stats">
                <a class="indicazione" href="#1">Offerte di alloggio</a>
                <p>{{$numOffAll}}</p>
            </article>
            <article class="stats">
                <a class="indicazione" href="#2">Offerte di locazione</a>
                <p>27</p>
            </article>
            <article class="stats">
                <a class="indicazione" href="#3">Alloggi locati</a>
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

            {{--<div>
                <label for="da">Da</label>
                <input type="datetime-local" step="1" id="da">
                <label for="a">A</label>
                <input type="datetime-local" step="1" id="a">
            </div>
            <div>
                <label>Tipologia di alloggio
                    <select name="type" id="type_id">
                        <option>Appartamento
                        <option>Posto letto
                    </select>
                </label>
            </div>
            <div>
                <button class="filter_button" type="submit" onclick={{!!route('conferma')}}>Filtra</button>
            </div>--}}

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
                                <img class="img_result" src="{{asset('images_case/5.jpg')}}" alt="Alloggio 1">
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
            {{--<div>
                <label for="da2">Da</label>
                <input type="datetime-local" id="da2">
                <label for="a2">A</label>
                <input type="datetime-local" id="a2">
            </div>
            <div>
                <label>Tipologia di alloggio
                    <select name="type2">
                        <option>Appartamento
                        <option>Posto letto
                    </select>
                </label>
            </div>
            <div>
                <button class="filter_button" type="submit" onclick=alert('WorkInProgress')>Filtra</button>
            </div>--}}
            <div class="results_container">
                <article class="result">
                    <div class="content">
                        <img class="img_result" src="{{asset('images_case/1.jpg')}}" alt="Alloggio 1">
                        <h2>Milano, Via Giuseppe Rossi 2, interno 1 </h2>
                    </div>
                </article>
                <article class="result">
                    <div class="content">
                        <img class="img_result" src="{{asset('images_case/2.jpg')}}" alt="Alloggio 1">
                        <h2>Firenze, Via Dante Alighieri 18, interno 3 </h2>
                    </div>
                </article>
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
            {{--<div>
                <label for="da3">Da</label>
                <input type="datetime-local" id="da3">
                <label for="a3">A</label>
                <input type="datetime-local" id="a3">
            </div>
            <div>
                <label>Tipologia di alloggio
                    <select name="type3">
                        <option>Appartamento
                        <option>Posto letto
                    </select>
                </label>
            </div>
            <div>
                <button class="filter_button" type="submit" onclick=alert('WorkInProgress')>Filtra</button>
            </div>--}}
            {{--<div class="results_container">
                <article class="result">
                    <div class="content">
                        <img class="img_result" src="{{asset('images_case/3.jpg')}}" alt="Alloggio 1">
                        <h2>Ancona, Via Colleverde 18, interno 4 </h2>
                    </div>
                </article>
                <article class="result">
                    <div class="content">
                        <img class="img_result" src="{{asset('images_case/4.jpg')}}" alt="Alloggio 1">
                        <h2>Torino, Via della Mole 10, interno 8 </h2>
                    </div>
                </article>
            </div>--}}
            <div class="results_container">
                @isset($allAllocati)
                    @foreach($allAllocati as $alloggio)
                        <article class="result">
                            <div class="content">
                                <img class="img_result" src="{{asset('images_case/5.jpg')}}" alt="Alloggio 1">
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
