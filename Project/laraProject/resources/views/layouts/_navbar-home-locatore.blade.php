<ul class="menu">
    <li>
        <a class="active" href="{{ route('homepage') }}" title="Home">Home</a>
    </li>
    <li>
        <!-- TO DO -->
        <a href="#gestioneAlloggi" title="Gestione degli alloggi">Gestione alloggi</a>
    </li>
    <li>
        <!-- TO DO -->
        <a href="#messaggi" title="Messaggistica">Messaggi</a>
    </li>
    <li>
        <a href="{{ route('catalogo-locatore') }}" title="Vai al catalogo annunci">Visualizza annunci</a>
    </li>
    <li>
        <!-- TO DO -->
        <button class="bottone_profilo" href="#profilo">
            <img src="{{asset('images/user_icon.png')}}" alt="User Logo" width="10%" style="vertical-align:middle;horiz-align:left">
            "Nome Utente"
        </button>
    </li>
</ul>
