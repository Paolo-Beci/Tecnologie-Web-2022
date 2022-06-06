<script src="{{asset('js/redirect.js')}}" defer></script>

<ul class="menu">

    {{-- Tutti gli utenti --}}

    <li>
        <a class="active" href="{{route('home-guest')}}" title="Home">Home</a>
    </li>

    {{-- Sezione locatore --}}

    @can('isLocatore')
       @include('_navbar/_navbar-locatore')
    @endcan

    {{-- Sezione locatario --}}

    @can('isLocatario')
        @include('_navbar/_navbar-locatario')
    @endcan

    {{-- Sezione admin --}}

    @can('isAdmin')
        @include('_navbar/_navbar-admin')
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
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    @endauth

</ul>
