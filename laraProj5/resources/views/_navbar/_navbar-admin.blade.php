{{-- {{Route::current()->getPrefix()}} --}}

@if(!in_array(Route::current()->getPrefix(), ['admin/gestione-faq', 'admin/gestione-faq/modifica-faq']))
    <li>
        <a href="{{route('catalogo-admin')}}" title="Vai al catalogo annunci">Catalogo</a>
    </li>
    <li>
        <!-- TO DO -->
        <a href="#statistiche" title="Statistiche">Statistiche</a>
    </li>
    <li>
        <a href="{{route('home-admin')}}" title="Resetta filtri">Resetta filtri</a>
    </li>
    <li>
        <a href="{{route('gestione-faq')}}" title="Gestione Faq">Gestione Faq</a>
    </li>
@else
    <li>
        <a class="" href="{{ route('inserisci-faq') }}" title="Inserisci Faq">Inserisci</a>
    </li>
    <li>
        <a class="" href="{{ route('modifica-faq') }}" title="Modifica Faq">Modifica</a>
    </li>
    <li>
        <a class="" href="{{ route('cancella-faq') }}" title="Cancella Faq">Cancella</a>
    </li>
@endif
<li>
    <a href="{{route('account-admin')}}">
        <button class="bottone_profilo">
            <img src="{{asset('images/user_icon.png')}}" alt="User Logo" width="10%" style="vertical-align:middle;padding-right: 10px">
            {{Auth::user()->username}}
        </button>
    </a>
</li>

