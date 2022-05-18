@extends('template-home')

@section('content')
    <main id="content-home-admin" class="content-home-admin">
        <section id="statistiche" class="stats-section">
            <p class="titolo">Statistiche</p>
            <div class="stats-container">
                <article class="stats">
                    <p>Offerte di alloggio</p>
                    <p>100</p>
                </article>
                <article class="stats">
                    <p>Offerte di locazione</p>
                    <p>27</p>
                </article>
                <article class="stats">
                    <p>Alloggi locati</p>
                    <p>83</p>
                </article>
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
            </div>
        </section>

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
            </div>
        </section>

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
            </div>
        </section>
    </main>
@endsection
