<!-- ELENCO DEI SERVIZI DISPONIBILI PER OGNI ALLOGGIO NELLA VISTA DETTAGLIO ALLOGGIO -->
<div class="box-servizio">
    {{-- BAGNO --}}
    @php $flag = false @endphp    {{-- La flag impedisce di ripetere l'inserimento di un servizio della view visto che abbiamo più entità 'alloggio' --}}
    @foreach($info_generali as $alloggio)
        @if($alloggio->servizio=='Bagno' && $flag==false)
            <p><i class="icon fa-solid fa-toilet"></i> Bagno ({{$alloggio->quantita}})</p>
            @php $flag = true @endphp  {{-- servizio presente e caricato --}}
        @endif
    @endforeach
    @if($flag==false)    {{-- servizio non presente --}}
        <p class="icon-false"><i class="icon fa-solid fa-toilet fa-fade"></i> Bagno </p>
    @endif

    {{-- CUCINA --}}
    @php $flag = false @endphp
    @foreach($info_generali as $alloggio)
        @if($alloggio->servizio=='Cucina' && $flag==false)
            <p><i class="icon fa-solid fa-kitchen-set"></i> Cucina ({{$alloggio->quantita}})</p>
            @php $flag = true @endphp
        @endif
    @endforeach
    @if($flag==false)
        <p class="icon-false"><i class="icon fa-solid fa-kitchen-set fa-fade"></i> Cucina </p>
    @endif

    {{-- LAVANDERIA --}}
    @php $flag = false @endphp
    @foreach($info_generali as $alloggio)
        @if($alloggio->servizio=='Lavanderia' && $flag==false)
            <p><i class="icon fa-solid fa-faucet"></i> Lavanderia ({{$alloggio->quantita}})</p>
            @php $flag = true @endphp
        @endif
    @endforeach
    @if($flag==false)
        <p class="icon-false"><i class="icon fa-solid fa-faucet fa-fade"></i> Lavanderia </p>
        @php $flag = true @endphp
    @endif
</div>
<div class="box-servizio">
    {{-- RIPOSTIGLIO --}}
    @php $flag = false @endphp
    @foreach($info_generali as $alloggio)
        @if($alloggio->servizio=='Ripostiglio' && $flag==false)
            <p><i class="icon fa-solid fa-box-archive"></i> Ripostiglio ({{$alloggio->quantita}})</p>
            @php $flag = true @endphp
        @endif
    @endforeach
    @if($flag==false)
        <p class="icon-false"><i class="icon fa-solid fa-box-archive fa-fade"></i> Ripostiglio </p>
        @php $flag = true @endphp
    @endif

    {{-- GARAGE --}}
    @php $flag = false @endphp
    @foreach($info_generali as $alloggio)
        @if($alloggio->servizio=='Garage' && $flag==false)
            <p><i class="icon fa-solid fa-square-parking"></i> Garage ({{$alloggio->quantita}})</p>
            @php $flag = true @endphp
        @endif
    @endforeach
    @if($flag==false)
        <p class="icon-false"><i class="icon fa-solid fa-square-parking fa-fade"></i> Garage </p>
        @php $flag = true @endphp
    @endif

    {{-- GIARDINO --}}
    @php $flag = false @endphp
    @foreach($info_generali as $alloggio)
        @if($alloggio->servizio=='Giardino' && $flag==false)
            <p><i class="icon fa-solid fa-tree"></i> Giardino ({{$alloggio->quantita}})</p>
            @php $flag = true @endphp
        @endif
    @endforeach
    @if($flag==false)
        <p class="icon-false"><i class="icon fa-solid fa-tree fa-fade"></i> Giardino </p>
        @php $flag = true @endphp
    @endif
</div>
<div class="box-servizio">
    {{-- ARIA CONDIZIONATA --}}
    @php $flag = false @endphp
    @foreach($info_generali as $alloggio)
        @if($alloggio->servizio=='Aria_condizionata' && $flag==false)
            <p><i class="icon fa-solid fa-fan"></i> Aria Condizionata ({{$alloggio->quantita}})</p>
            @php $flag = true @endphp
        @endif
    @endforeach
    @if($flag==false)
        <p class="icon-false"><i class="icon fa-solid fa-fan fa-fade"></i> Aria Condizionata </p>
        @php $flag = true @endphp
    @endif

    {{-- WI-FI --}}
    @php $flag = false @endphp
    @foreach($info_generali as $alloggio)
        @if($alloggio->servizio=='Wi-fi' && $flag==false)
            <p><i class="icon fa-solid fa-wifi"></i> WiFi ({{$alloggio->quantita}})</p>
            @php $flag = true @endphp
        @endif
    @endforeach
    @if($flag==false)
        <p class="icon-false"><i class="icon fa-solid fa-wifi fa-fade"></i> WiFi </p>
        @php $flag = true @endphp
    @endif

    {{-- ANGOLO STUDIO --}}
    @php $flag = false @endphp
    @foreach($info_generali as $alloggio)
        @if($alloggio->servizio=='Angolo_studio' && $flag==false)
            <p><i class="icon fa-solid fa-book"></i> Angolo Studio ({{$alloggio->quantita}})</p>
            @php $flag = true @endphp
        @endif
    @endforeach
    @if($flag==false)
        <p class="icon-false"><i class="icon fa-solid fa-book fa-fade"></i> Angolo Studio </p>
        @php $flag = true @endphp
    @endif
</div>
