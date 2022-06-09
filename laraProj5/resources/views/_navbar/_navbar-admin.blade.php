@php
    $routeName = Route::current()->getName();
@endphp

@if(!in_array(Route::current()->getPrefix(), ['admin/gestione-faq', 'admin/gestione-faq/modifica-faq']))
    <li>
        <a
        @if (in_array($routeName, ['catalogo-admin', 'catalogo-appartamenti-admin', 'catalogo-posti-letto-admin']))
            class="active"
        @endif
        href="{{route('catalogo-admin')}}" title="Vai al catalogo annunci">Catalogo</a>
    </li>
    <li>
        <a 
        @if ($routeName == 'home-admin')
            href="#statistiche"
        @else
            href="{{route('home-admin')}}#statistiche"
        @endif
        title="Statistiche">Statistiche</a>
    </li>
    @if ($routeName == 'home-admin')
        <li>
            <a href="{{route('home-admin')}}" title="Resetta filtri">Resetta filtri</a>
        </li>
    @endif
    <li>
        <a href="{{route('gestione-faq')}}" title="Gestione Faq">Gestione Faq</a>
    </li>
@else
    <li>
        <a
        @if ($routeName == 'inserisci-faq')
            class="active"
        @endif
        href="{{ route('inserisci-faq') }}" title="Inserisci Faq">Inserisci</a>
    </li>
    <li>
        <a
        @if ($routeName == 'modifica-faq')
            class="active"
        @endif
        href="{{ route('modifica-faq') }}" title="Modifica Faq">Modifica</a>
    </li>
    <li>
        <a
        @if ($routeName == 'cancella-faq')
            class="active"
        @endif
        href="{{ route('cancella-faq') }}" title="Cancella Faq">Cancella</a>
    </li>
@endif
<li>
    <a href="{{route('account-admin')}}">
        <button class="bottone_profilo">
            <img src="{{asset('images_profilo/' . $profilePhoto)}}" alt="User Logo" width="10%" style="vertical-align:middle;padding-right: 10px">
            <span>{{Auth::user()->username}}</span>
        </button>
    </a>
</li>

