{{-- GESTORE DELLE NAVBAR DELL'INTERO SITO WEB SUDDIVISE IN BASE AL LIVELLO DI UTENTE LOGGATO --}}
<ul class="menu">

    {{-- Tutti gli utenti --}}
    <li>
        <a
        @if (in_array(Route::current()->getName(), ['home-guest', 'home-locatario', 'home-locatore', 'home-admin']))
            class="active"
        @endif
        @guest
            href="{{route('home-guest')}}"
        @endguest
        @auth
            href="{{route('home-' . auth()->user()->ruolo)}}"
        @endauth
        title="Home">Home</a>
    </li>

    {{-- Sezione locatore --}}
    @can('isLocatore')
       @include('_navbar/_navbar-locatore', ['profilePhoto' => $profilePhoto])
    @endcan

    {{-- Sezione locatario --}}
    @can('isLocatario')
        @include('_navbar/_navbar-locatario', ['profilePhoto' => $profilePhoto])
    @endcan

    {{-- Sezione admin --}}
    @can('isAdmin')
        @include('_navbar/_navbar-admin', ['profilePhoto' => $profilePhoto])
    @endcan

    {{-- Sezione utente non autenticato --}}
    @guest
        @include('_navbar/_navbar-guest')
    @endguest

    {{-- Logout per tutti gli utenti --}}
    @auth
        <li><a href="" title="Esci dal sito" class="highlight"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout</a></li>
        {{-- LOGOUT gestito dalla facade AUTH --}}
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    @endauth

</ul>
