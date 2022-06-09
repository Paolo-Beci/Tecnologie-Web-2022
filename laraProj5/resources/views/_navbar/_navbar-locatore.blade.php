@php
    $routeName = Route::current()->getName();
@endphp

<li>
    @if($routeName != 'home-locatore')
        <a href="{{route('home-locatore')}}/#faq" title="Frequenty Asked Questions">FAQ</a>
    @else
        <a class="anchor" href="#faq" title="Frequenty Asked Questions">FAQ</a>
    @endif
</li>
<li>
    <a 
    @if (in_array($routeName, ['catalogo-locatore', 'catalogo-appartamenti-locatore', 'catalogo-posti-letto-locatore']))
        class="active"
    @endif
    href="{{route('catalogo-locatore')}}" title="Vai al catalogo annunci">Catalogo</a>
</li>
<li>
    <a 
    @if ($routeName == 'new-annuncio')
        class="active"
    @endif
    href="{{route('new-annuncio')}}" title="Vai alla form di inserimento annuncio">Inserisci annuncio</a>
</li>
<li>
    <a 
    @if (in_array($routeName, ['gestione-alloggi', 'modifica-annuncio']))
        class="active"
    @endif
    href="{{route('gestione-alloggi')}}" title="Gestione degli alloggi">Gestione alloggi</a>
</li>
<li>
    <a href="{{route('messaggistica')}}" title="Messaggistica">Messaggi</a>
</li>
<li>
    <a href="{{route('account-locatore')}}">
        <button class="bottone_profilo">
            <img src="{{asset('images_profilo/' . $profilePhoto)}}" alt="User Logo" width="10%" style="vertical-align:middle;padding-right: 10px">
            <span>{{Auth::user()->username}}</span>
        </button>
    </a>
</li>
