<h1 style="margin: 10px">Filtri ricerca</h1>
<hr style="margin: 10px">
{{ Form::open(array('route' => 'catalogo-locatario', 'class' => 'filtri active-form')) }}

<h2 class="subtitle-filtri">Città</h2>
    {{ Form::label('citta', 'Città') }}
    {{ Form::text('citta', 'Ancona') }}<br>
<h2 class="subtitle-filtri">Fascia di Prezzo</h2>
    {{ Form::text('min-prezzo', '100') }}
    {{ Form::label('min-prezzo', '&#8364; Minimi') }}
    {{ Form::text('max-prezzo', '1000') }}
    {{ Form::label('max-prezzo', '&#8364; Massimi') }}
<h2 class="subtitle-filtri">Periodo locazione</h2>
    {{ Form::radio('gender', '12') }}
    {{ Form::label('12', '12 mesi') }}
    {{ Form::radio('gender', '9') }}
    {{ Form::label('9', '9 mesi') }}
    {{ Form::radio('gender', '6') }}
    {{ Form::label('6', '6 mesi') }}
<h2 class="subtitle-filtri">Superficie</h2>
    {{ Form::text('min-mq', '10') }}
    {{ Form::label('min-mq', 'Mq minimi') }}
    {{ Form::text('max-mq', '1000') }}
    {{ Form::label('max-mq', 'Mq massimi') }}
<h2 class="subtitle-filtri">Numero di camere</h2>
    {{ Form::text('num_camere', '1') }}
<h2 class="subtitle-filtri">Genere ammesso</h2>
    {{ Form::radio('female', 'Femmine') }}
    {{ Form::radio('male', 'Maschi') }}
    {{ Form::radio('all', 'Tutti', true) }}
<h2 class="subtitle-filtri">Piano</h2>
    {{ Form::selectRange('number', 0, 127) }}
<h2 class="subtitle-filtri">Num. posti letto appartamento</h2>
    {{ Form::selectRange('number', 1, 20) }}
<h2 class="subtitle-filtri">Num. posti letto camera</h2>
    {{ Form::selectRange('number', 1, 20) }}
<h2 class="subtitle-filtri">Servizi</h2>
    {{ Form::checkbox('check1', 'Bagno') }}
    {{ Form::checkbox('check2', 'Cucina') }}
    {{ Form::checkbox('check3', 'Lavanderia') }}
    {{ Form::checkbox('check4', 'Ripostiglio') }}
    {{ Form::checkbox('check5', 'Garage') }}
    {{ Form::checkbox('check6', 'Giardino') }}
<h2 class="subtitle-filtri">Tipo posto letto</h2>
    {{ Form::select('tipo', ['S' => 'Singola', 'D' => 'Doppia']) }}
<h2 style="margin: 20px"></h2>

{{ Form::submit('Filtra', ['class' => 'filter_stats_button']) }}

{!! Form::close() !!}
