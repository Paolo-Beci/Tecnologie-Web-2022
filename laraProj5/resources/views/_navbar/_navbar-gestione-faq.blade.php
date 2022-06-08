<ul class="menu">
    <li>
        <a class="active" href="{{ route('home-admin') }}">Home</a>
    </li>
    <li>
        <a class="" href="{{ route('inserisci-faq') }}" title="Inserisci Faq">Inserisci</a>
    </li>
    <li>
        <a class="" href="{{ route('modifica-faq') }}" title="Modifica Faq">Modifica</a>
    </li>
    <li>
        <a class="" href="{{ route('cancella-faq') }}" title="Cancella Faq">Cancella</a>
    </li>
    <li>
        <!-- TO DO -->
        <button class="bottone_profilo" href="#profilo">
            <img src="{{asset('images/user_icon.png')}}" alt="User Logo" width="10%" style="vertical-align:middle;padding-right: 10px">
            {{Auth::user()->username}}
        </button>
    </li>
</ul>
