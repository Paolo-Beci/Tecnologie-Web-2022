<li>
    <a href="{{route('catalogo-locatario')}}" title="Vai al catalogo annunci">Catalogo</a>
</li>
<li>
    <a href="#storicoAlloggi" title="Gestione degli alloggi">Storico alloggi</a>
</li>
<li>
    <a href="#messaggi" title="Messaggistica">Messaggi</a>
</li>
<li>
    <a href="{{route('account-locatario')}}">
        <button class="bottone_profilo">
            <img src="{{asset('images/user_icon.png')}}" alt="User Logo" width="10%" style="vertical-align:middle;horiz-align:left">
            {{Auth::user()->username}}
        </button>
    </a>
</li>
