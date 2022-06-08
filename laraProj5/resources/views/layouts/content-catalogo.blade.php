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
        @can('isLocatario')
            <aside class="lateral-bar">
                @include('helpers/filtri')
            </aside>
        @endcan
        <section class="catalogo">
            <h1>Alloggi in affitto</h1>
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
                <div class="alloggio">
                    <i class="fa-solid fa-house-circle-xmark fa-2xl" style="margin: 50px"></i>
                    <h1>Nessun alloggio corrisponde ai criteri di ricerca!</h1>
                </div>
            @else
                @isset($alloggi)   <!-- esiste o non è null -->
                    @foreach ($alloggi as $alloggio)
                    <!-- Alloggio -->
                    @include('helpers/alloggio')
                    @endforeach
                @endisset
            @endif
            {{--@isset($_POST['periodo'], $_POST['gender'],
            $_POST['number_piano'], $_POST['citta'], $_POST['min-mq'],
            $_POST['max-mq'], $_POST['min-prezzo'], $_POST['max-prezzo'])
                @isset($_POST['check'])
                @foreach($_POST['check'] as $a)
                <p>Check {{ $a }}</p>
                @endforeach
                @endisset
                <p>Periodo {{ $_POST['periodo']  }}</p>
                <p>Gender {{ $_POST['gender'] }}</p>
                <p>Piano {{ $_POST['number_piano'] }}</p>
                <p> Città {{ $_POST['citta'] }}</p>
                <p>Sup min{{ $_POST['min-mq'] }}</p>
                <p>Sup max{{ $_POST['max-mq'] }}</p>
                <p>Prezzo min{{ $_POST['min-prezzo'] }}</p>
                <p>Prezzo max{{ $_POST['max-prezzo'] }}</p>
            @endisset--}}
        </section>
    </main>
    <!--Paginazione-->
    @include('pagination.paginator', ['paginator' => $alloggi])

@endsection
