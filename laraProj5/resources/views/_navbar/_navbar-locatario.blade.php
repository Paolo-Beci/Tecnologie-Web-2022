<li>
    @if(Route::current()->getName() != 'home-locatario')
        <a href="{{route('home-locatario')}}/#faq" title="Frequenty Asked Questions">FAQ</a>
    @else
        <a class="anchor" href="#faq" title="Frequenty Asked Questions">FAQ</a>
    @endif
</li>
<li>
    <a href="{{route('catalogo-locatario')}}" title="Vai al catalogo annunci">Catalogo</a>
</li>
<li>
    <a href="{{route('storico-alloggi')}}" title="Storico degli alloggi">Storico alloggi</a>
</li>
<li>
    <a href="{{route('messaggistica')}}" title="Messaggistica">Messaggi</a>
</li>
<li>
    <a href="{{route('account-locatario')}}">
        <button class="bottone_profilo">
            <img src="{{asset('images/user_icon.png')}}" alt="User Logo" width="10%" style="vertical-align:middle;padding-right: 10px">
            {{Auth::user()->username}}
        </button>
    </a>
</li>
