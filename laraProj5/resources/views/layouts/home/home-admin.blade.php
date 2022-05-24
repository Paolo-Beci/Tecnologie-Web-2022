<main id="content-home-admin" class="content-home-admin">
    {{--sezione riassunto filtri--}}
    <section id="statistiche" class="stats-section">
        <h1 class="titolo">Statistiche</h1>
        <div class="stats-container">
            <article class="stats">
                <a href="#1">Offerte di alloggio</a>
                <p>100</p>
            </article>
            <article class="stats">
                <a href="#2">Offerte di locazione</a>
                <p>27</p>
            </article>
            <article class="stats">
                <a href="#3">Alloggi locati</a>
                <p>83</p>
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
            <div>
                <label for="da">Da</label>
                <input type="datetime-local" id="da">
                <label for="a">A</label>
                <input type="datetime-local" id="a">
            </div>
            <div>
                <label>Tipologia di alloggio
                    <select name="type">
                        <option>Appartamento
                        <option>Posto letto
                    </select>
                </label>
            </div>
            <div>
                <button class="filter_button" type="submit" onclick=alert('WorkInProgress')>Filtra</button>
            </div>
            <div class="results_container">
                <article class="result">
                    <div class="content">
                        <img class="img_result" src="{{asset('images_case/5.jpg')}}" alt="Alloggio 1">
                        <h2>Foggia, Via Roma 4, interno 2 </h2>
                    </div>
                </article>
                <article class="result">
                    <div class="content">
                        <img class="img_result" src="{{asset('images_case/6.jpg')}}" alt="Alloggio 1">
                        <h2>Venezia, Via Marziale 2, interno 3 </h2>
                    </div>
                </article>
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
            <div>
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
            </div>
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
            <div>
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
            </div>
            <div class="results_container">
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
            </div>
        </div>
    </section>
</main>
