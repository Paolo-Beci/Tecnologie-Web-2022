@extends('template')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/catalogo.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/content-home-loggato.css') }}">
    <link rel="stylesheet" href="{{asset('css/gestione-alloggi.css')}}">
@endsection

@section('js')
    <script src="{{asset('js/catalogo.js')}}"></script>
@endsection

@section('title', 'Catalogo')


@section('content')
    <main class="main-container">
        {{-- I filtri possono essere utilizzati solo dall'utente di tipo 'locatario' --}}
        @can('isLocatario')
            <aside class="lateral-bar">
                @include('helpers/filtri')
            </aside>
        @endcan

        {{-- CATALOGO --}}
        <section class="catalogo">
            <h1>Alloggi in affitto</h1>

            {{-- Selezione tipologia posto letto o appartamento --}}
            <article class="alloggi-buttons">
                @can('isLocatario')
                    <a href="{{route('catalogo-appartamenti-locatario')}}">
                @endcan
                @can('isLocatore')
                    <a href="{{route('catalogo-appartamenti-locatore')}}">
                @endcan
                @guest
                    <a href="{{route('catalogo-appartamenti')}}">
                @endcan
                @can('isAdmin')
                    <a href="{{route('catalogo-appartamenti-admin')}}">
                @endcan
                    <button class="appartamenti-button">
                        <img class="button-img" src="{{asset('images/apartment_icon.png')}}" alt="Appartamenti">
                        APPARTAMENTI
                    </button>
                </a>
                @can('isLocatario')
                    <a href="{{route('catalogo-posti-letto-locatario')}}">
                @endcan
                @can('isLocatore')
                    <a href="{{route('catalogo-posti-letto-locatore')}}">
                @endcan
                @guest
                    <a href="{{route('catalogo-posti-letto')}}">
                @endcan
                @can('isAdmin')
                    <a href="{{route('catalogo-posti-letto-admin')}}">
                @endcan
                    <button class="posti-letto-button">
                        <img class="button-img" src="{{asset('images/bed_icon.png')}}" alt="Posti letto">
                        POSTI LETTO
                    </button>
                </a></a></a></a></a></a></a>
            </article>

            <!-- ALLOGGI -->
            @if($alloggi->isEmpty())
                {{-- Se non ci sono alloggi trovati come risultato dei filtri... --}}
                <div class="alloggio">
                    <i class="fa-solid fa-house-circle-xmark fa-2xl" style="margin: 50px"></i>
                    <h1>Nessun alloggio corrisponde ai criteri di ricerca!</h1>
                </div>
            @else
                @isset($alloggi)   <!-- esiste o non è null -->
                    {{-- Per ogni alloggio presente nell'array alloggi viene richiamato l'helper 'alloggio' con i dati rispettivi --}}
                    @foreach ($alloggi as $alloggio)
                        <!-- Alloggio -->
                        @include('helpers/alloggio')
                    @endforeach
                @endisset
            @endif

        </section>
    </main>

    <!--Paginazione-->
    @include('pagination.paginator', ['paginator' => $alloggi->appends($_GET)])

@endsection
