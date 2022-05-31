<!-- ELENCO DEI SERVIZI DISPONIBILI PER OGNI ALLOGGIO NELLA VISTA DETTAGLIO ALLOGGIO -->
<div class="box-servizio">
    @php $flag = false @endphp
    @foreach($info_generali as $servizio)
        @if($servizio->servizio=='Bagno' && $flag==false)
            <p><i class="icon fa-solid fa-toilet"></i> Bagno ({{$servizio->quantita}})</p>
            @php $flag = true @endphp
        @endif
    @endforeach
    @if($flag==false)
        <p class="icon-false"><i class="icon fa-solid fa-toilet fa-fade"></i> Bagno </p>
    @endif

    @php $flag = false @endphp
    @foreach($info_generali as $servizio)
        @if($servizio->servizio=='Cucina' && $flag==false)
            <p><i class="icon fa-solid fa-kitchen-set"></i> Cucina ({{$servizio->quantita}})</p>
            @php $flag = true @endphp
        @endif
    @endforeach
    @if($flag==false)
        <p class="icon-false"><i class="icon fa-solid fa-kitchen-set fa-fade"></i> Cucina </p>
    @endif

    @php $flag = false @endphp
    @foreach($info_generali as $servizio)
        @if($servizio->servizio=='Lavanderia' && $flag==false)
            <p><i class="icon fa-solid fa-faucet"></i> Lavanderia ({{$servizio->quantita}})</p>
            @php $flag = true @endphp
        @endif
    @endforeach
    @if($flag==false)
        <p class="icon-false"><i class="icon fa-solid fa-faucet fa-fade"></i> Lavanderia </p>
        @php $flag = true @endphp
    @endif
</div>
<div class="box-servizio">
    @php $flag = false @endphp
    @foreach($info_generali as $servizio)
        @if($servizio->servizio=='Ripostiglio' && $flag==false)
            <p><i class="icon fa-solid fa-box-archive"></i> Ripostiglio ({{$servizio->quantita}})</p>
            @php $flag = true @endphp
        @endif
    @endforeach
    @if($flag==false)
        <p class="icon-false"><i class="icon fa-solid fa-box-archive fa-fade"></i> Ripostiglio </p>
        @php $flag = true @endphp
    @endif

    @php $flag = false @endphp
    @foreach($info_generali as $servizio)
        @if($servizio->servizio=='Garage' && $flag==false)
            <p><i class="icon fa-solid fa-square-parking"></i> Garage ({{$servizio->quantita}})</p>
            @php $flag = true @endphp
        @endif
    @endforeach
    @if($flag==false)
        <p class="icon-false"><i class="icon fa-solid fa-square-parking fa-fade"></i> Garage </p>
        @php $flag = true @endphp
    @endif

    @php $flag = false @endphp
    @foreach($info_generali as $servizio)
        @if($servizio->servizio=='Giardino' && $flag==false)
            <p><i class="icon fa-solid fa-tree"></i> Giardino ({{$servizio->quantita}})</p>
            @php $flag = true @endphp
        @endif
    @endforeach
    @if($flag==false)
        <p class="icon-false"><i class="icon fa-solid fa-tree fa-fade"></i> Giardino </p>
        @php $flag = true @endphp
    @endif
</div>
<div class="box-servizio">
    @php $flag = false @endphp
    @foreach($info_generali as $servizio)
        @if($servizio->servizio=='AriaCondizionata' && $flag==false)
            <p><i class="icon fa-solid fa-fan"></i> Aria Condizionata ({{$servizio->quantita}})</p>
            @php $flag = true @endphp
        @endif
    @endforeach
    @if($flag==false)
        <p class="icon-false"><i class="icon fa-solid fa-fan fa-fade"></i> Aria Condizionata </p>
        @php $flag = true @endphp
    @endif

    @php $flag = false @endphp
    @foreach($info_generali as $servizio)
        @if($servizio->servizio=='WiFi' && $flag==false)
            <p><i class="icon fa-solid fa-wifi"></i> WiFi ({{$servizio->quantita}})</p>
            @php $flag = true @endphp
        @endif
    @endforeach
    @if($flag==false)
        <p class="icon-false"><i class="icon fa-solid fa-wifi fa-fade"></i> WiFi </p>
        @php $flag = true @endphp
    @endif

    @php $flag = false @endphp
    @foreach($info_generali as $servizio)
        @if($servizio->servizio=='AngoloStudio' && $flag==false)
            <p><i class="icon fa-solid fa-book"></i> Angolo Studio ({{$servizio->quantita}})</p>
            @php $flag = true @endphp
        @endif
    @endforeach
    @if($flag==false)
        <p class="icon-false"><i class="icon fa-solid fa-book fa-fade"></i> Angolo Studio </p>
        @php $flag = true @endphp
    @endif
</div>
