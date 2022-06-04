<li>
    @if(Route::current()->getName() != 'home-locatore')
        <a class="anchor" href="{{route('home-locatore')}}/#faq" title="Frequenty Asked Questions">FAQ</a>
    @else
        <a class="anchor" href="#faq" title="Frequenty Asked Questions">FAQ</a>
    @endif
</li>
<li>
    <a href="{{route('catalogo-locatore')}}" title="Vai al catalogo annunci">Catalogo</a>
</li>
<li>
    <a class="" href="{{route('new-annuncio')}}" title="Vai alla form di inserimento annuncio">Inserisci annuncio</a>
</li>
<li>
    <a href="{{route('gestione-alloggi')}}" title="Gestione degli alloggi">Gestione alloggi</a>
</li>
<li>
    <a href="{{route('messaggistica')}}" title="Messaggistica">Messaggi</a>
</li>
<li>
    <a href="{{route('account-locatore')}}">
        <button class="bottone_profilo">
            <img src="{{asset('images/user_icon.png')}}" alt="User Logo" width="10%" style="vertical-align:middle;horiz-align:left">
            {{Auth::user()->username}}
        </button>
    </a>
</li>
