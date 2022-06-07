<h1 style="margin: 20px">Filtri ricerca</h1>
<hr style="margin: 10px">
{{ Form::open(array('route' => 'filtered', 'class' => 'filtri active-form')) }}

<h2 class="subtitle-filtri">Città</h2>
    {{ Form::text('citta', $citta) }}<br>
<h2 class="subtitle-filtri">Stato attuale</h2>
    {{ Form::checkbox('check[]', 'Libero') }}
    {{ Form::label('Libero', 'Libero') }}<br>
    {{ Form::checkbox('check[]', 'Opzionato') }}
    {{ Form::label('Opzionato', 'Opzionato') }}<br>
    {{ Form::checkbox('check[]', 'Locato') }}
    {{ Form::label('Locato', 'Locato') }}<br>
<h2 class="subtitle-filtri">Fascia di Prezzo</h2>
    {{ Form::text('min-prezzo', $minprezzo, array('placeholder' => 'prezzo minimo...')) }}
    {{ Form::label('min-prezzo', '&#8364; Minimi') }}
    {{ Form::text('max-prezzo', $maxprezzo, array('placeholder' => 'prezzo massimo...')) }}
    {{ Form::label('max-prezzo', '&#8364; Massimi') }}
<h2 class="subtitle-filtri">Periodo locazione</h2>
    {{ Form::radio('periodo', '12', false) }}
    {{ Form::label('12', '12 mesi') }}
    {{ Form::radio('periodo', '9', false) }}
    {{ Form::label('9', '9 mesi') }}
    {{ Form::radio('periodo', '6', false) }}
    {{ Form::label('6', '6 mesi') }}
<h2 class="subtitle-filtri">Superficie</h2>
    {{ Form::text('min-mq', $minmq, array('placeholder' => 'superficie minima...')) }}
    {{ Form::label('min-mq', 'Mq minimi') }}
    {{ Form::text('max-mq', $maxmq, array('placeholder' => 'superficie massima...')) }}
    {{ Form::label('max-mq', 'Mq massimi') }}
<h2 class="subtitle-filtri">Numero di camere</h2>
    {{ Form::text('num_camere', '1') }}
<h2 class="subtitle-filtri">Genere ammesso</h2>
    {{ Form::radio('gender', 'f', false) }}
    {{ Form::label('f', 'Femmine') }}<br>
    {{ Form::radio('gender', 'm', false) }}
    {{ Form::label('m', 'Maschi') }}<br>
    {{ Form::radio('gender', 'u', false) }}
    {{ Form::label('u', 'Tutti') }}<br>
<h2 class="subtitle-filtri">Piano</h2>
    {{ Form::select('number_piano', array('' => $piano) + range(0,127)) }}
<h2 class="subtitle-filtri">Num. posti letto appartamento</h2>
    {{ Form::select('number_pl_app', array('' => '--') + range(1,20)), array('class' => 'select_range_catalogo') }}
<h2 class="subtitle-filtri">Num. posti letto camera</h2>
    {{ Form::select('number_pl_cam', array('' => '--') + range(1,20)), array('class' => 'select_range_catalogo') }}
<h2 class="subtitle-filtri">Servizi</h2>
    {{ Form::checkbox('check1', 'Bagno') }}
    {{ Form::label('Bagno', 'Bagno') }}<br>
    {{ Form::checkbox('check2', 'Cucina') }}
    {{ Form::label('Cucina', 'Cucina') }}<br>
    {{ Form::checkbox('check3', 'Lavanderia') }}
    {{ Form::label('Lavanderia', 'Lavanderia') }}<br>
    {{ Form::checkbox('check4', 'Ripostiglio') }}
    {{ Form::label('Ripostiglio', 'Ripostiglio') }}<br>
    {{ Form::checkbox('check5', 'Garage') }}
    {{ Form::label('Garage', 'Garage') }}<br>
    {{ Form::checkbox('check6', 'Giardino') }}
    {{ Form::label('Giardino', 'Giardino') }}<br>
<h2 class="subtitle-filtri">Tipo posto letto</h2>
    {{ Form::select('tipo', ['S' => 'Singola', 'D' => 'Doppia', 'NULL' => 'Indifferente'], 'NULL') }}
<h2 style="margin: 20px"></h2>

{{ Form::submit('Filtra', ['class' => 'filter_stats_button']) }}

{!! Form::close() !!}
