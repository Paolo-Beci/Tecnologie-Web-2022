<li>
    @if(Route::current()->getName() != 'home-guest')
        <a href="{{route('home-guest')}}/#faq" title="Frequenty Asked Questions">FAQ</a>
    @else
        <a class="anchor" href="#faq" title="Frequenty Asked Questions">FAQ</a>
    @endif
</li>
<li>
    <a href="{{route('catalogo')}}" title="Annunci inseriti dai locatori">Catalogo</a>
</li>
<li>
    <a href="{{route('home-guest')}}" title="Effettua il login">Login</a>
</li>
