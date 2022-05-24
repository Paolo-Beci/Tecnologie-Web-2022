<ul class="menu">
    {{-- Tutti gli utenti --}}
    <li>
        <a class="anchor active" href="#home" title="Home">Home</a>
    </li>
    <li>
        <a class="anchor" href="#faq" title="Frequenty Asked Questions">FAQ</a>
    </li>
    {{-- Sezione locatore --}}
    @can('isLocatore')
        <li>
            <a href="#" title="Gestione degli alloggi">Gestione alloggi</a>
        </li>
        <li>
            <a href="#messaggi" title="Messaggistica">Messaggi</a>
        </li>
        <li>
            <a href="#" title="Vai al catalogo annunci">Visualizza annunci</a>
        </li>
    @endcan
    {{-- Sezione locatario --}}
    @can('isLocatario')
    <li>
        <a href="#storicoAlloggi" title="Gestione degli alloggi">Storico alloggi</a>
    </li>
    <li>
        <a href="#messaggi" title="Messaggistica">Messaggi</a>
    </li>
    <li>
        <a href="#" title="Vai al catalogo annunci">Visualizza annunci</a>
    </li>
    <li>
        <button class="bottone_profilo" href="#profilo">
            <img src="{{asset('images/user_icon.png')}}" alt="User Logo" width="10%" style="vertical-align:middle;horiz-align:left">
            "Nome Utente"
        </button>
    </li>
    @endcan
    {{-- Sezione admin --}}
    @can('isAdmin')
    <li>
        <!-- TO DO -->
        <a href="#statistiche" title="Statistiche">Statistiche</a>
    </li>
    <li>
        <a href="#" title="Gestione Faq">Gestione Faq</a>
    </li>
    <li>
        <a href="#" title="Vai al catalogo annunci">Visualizza annunci</a>
    </li>
    <li>
        <!-- TO DO -->
        <button class="bottone_profilo" href="#profilo">
            <img src="{{asset('images/user_icon.png')}}" alt="User Logo" width="10%" style="vertical-align:middle;horiz-align:left">
            "Nome Utente"
        </button>
    </li>
    @endcan
    {{-- Sezione utente non autenticato --}}
    @guest
        <li>
            <a href="{{route('catalogo')}}" title="Annunci inseriti dai locatori">Catalogo</a>
        </li>
        <li>
            <a href="{{route('home-guest')}}" title="Effettua il login">Login</a>
        </li>
    @endguest
    @auth
        <li><a href="" title="Esci dal sito" class="highlight" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    @endauth
</ul>