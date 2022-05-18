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
        <section id="offerte_di_alloggio" class="oa_section">
            <h2>Offerte di alloggio</h2>
            <div>

            </div>
        </section>
        <section id="offerte_di_locazione" class="ol_section">
            <h2>Offerte di locazione</h2>
            <div>

            </div>
        </section>
        <section id="alloggi_locati" class="al_section">
            <h2>Alloggi locati</h2>
            <div>

            </div>
        </section>
    </main>
@endsection
