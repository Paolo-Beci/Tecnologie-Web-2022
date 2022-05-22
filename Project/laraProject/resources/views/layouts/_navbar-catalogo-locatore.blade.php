<ul class="menu">
    <li>
        <a class="active" href="{{ route('homepage') }}">Home</a>
    </li>
    <li>
        <!-- TO DO -->
        <button class="bottone_profilo" href="#profilo">
            <img src="{{asset('images/user_icon.png')}}" alt="User Logo" width="10%" style="vertical-align:middle;horiz-align:left">
            "Nome utente"  {{-- {{ Auth::user()->nome }} {{ Auth::user()->cognome }}  da fare join delle tabelle --}}
</button>
</li>
<li>
<button class="inserisci_annuncio" href="#insert">
<img src="{{asset('images/plus_icon.png')}}" alt="Plus Logo" width="10%" style="vertical-align:middle;horiz-align:left">
Inserisci annuncio
</button>
</li>
</ul>
