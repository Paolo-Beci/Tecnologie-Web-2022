{{-- FILTRI DEL CATALOGO --}}
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script>
    $(function () {
        //seleziono l'elemento della form sul quale avviene l'evento ("#idElementoNellaForm")
        $('#tipologia').on('change', function (event) {
            //Se l'opzione selezionata assume un determinato valore
            if($(this).val() === 'Posto_letto'){
                $("div.postoletto").show();
                $("div.numcamere").hide();
            }
            else if($(this).val() === 'Appartamento'){
                $("div.postoletto").hide();
                $("div.numcamere").show();
            }
            else {
                $("div.postoletto").hide();
                $("div.numcamere").hide();
            }
        });

        //funzione controlli estremi prezzo
        $("#min-prezzo").on('change', function(event) {
            $("#max-prezzo").val(parseInt($(this).val()));
        });

        $("#max-prezzo").on('change', function(event) {
            if(parseInt($(this).val()) < parseInt($("#min-prezzo").val())){
                $(this).val(parseInt($("#min-prezzo").val()));
            }
        });

        //funzione controlli estremi superficie
        $("#min-mq").on('change', function(event) {
            $("#max-mq").val(parseInt($(this).val()));
        });

        $("#max-mq").on('change', function(event) {
            if(parseInt($(this).val()) < parseInt($("#min-mq").val())){
                $(this).val(parseInt($("#min-mq").val()));
            }
        });
    });
</script>

<h1 style="margin: 20px">Filtri ricerca</h1>
<hr style="margin: 10px">

{{ Form::open(array('route' => 'filtered', 'class' => 'filtri active-form', 'method' => 'get')) }}

<h2 class="subtitle-filtri">Città</h2>
    {{ Form::text('citta', $citta, ['placeholder' => 'Es: Ancona...']) }}<br>
<h2 class="subtitle-filtri">Tipologia</h2>
    {{ Form::select('tipologia', ['Appartamento' => 'Appartamento', 'Posto_letto' => 'Posto letto', 'NULL' => 'Indifferente'], $tipologia, array('id'=>'tipologia')) }}<br>
<h2 class="subtitle-filtri">Stato attuale</h2>
    {{ Form::checkbox('check[]', 'Libero') }}
    {{ Form::label('Libero', 'Libero') }}<br>
    {{ Form::checkbox('check[]', 'Locato') }}
    {{ Form::label('Locato', 'Locato') }}<br>
<h2 class="subtitle-filtri">Fascia di Prezzo</h2>
    {{ Form::number('min-prezzo', $minprezzo, array('placeholder' => 'prezzo minimo...', 'id'=>'min-prezzo', 'min'=>0)) }}
    {{ Form::label('min-prezzo', '&#8364; Minimi') }}
    {{ Form::number('max-prezzo', $maxprezzo, array('placeholder' => 'prezzo massimo...', 'id'=>'max-prezzo', 'min'=>0)) }}
    {{ Form::label('max-prezzo', '&#8364; Massimi') }}
<h2 class="subtitle-filtri">Periodo locazione</h2>
    {{ Form::radio('periodo', '12', false) }}
    {{ Form::label('12', '12 mesi') }}
    {{ Form::radio('periodo', '9', false) }}
    {{ Form::label('9', '9 mesi') }}
    {{ Form::radio('periodo', '6', false) }}
    {{ Form::label('6', '6 mesi') }}
<h2 class="subtitle-filtri">Superficie</h2>
    {{ Form::number('min-mq', $minmq, array('placeholder' => 'superficie minima...', 'id'=>'min-mq', 'min'=>0)) }}
    {{ Form::label('min-mq', 'Mq minimi') }}
    {{ Form::number('max-mq', $maxmq, array('placeholder' => 'superficie massima...', 'id'=>'max-mq', 'min'=>0)) }}
    {{ Form::label('max-mq', 'Mq massimi') }}
<h2 class="subtitle-filtri">Genere ammesso</h2>
    {{ Form::radio('gender', 'f', false) }}
    {{ Form::label('f', 'Femmine') }}<br>
    {{ Form::radio('gender', 'm', false) }}
    {{ Form::label('m', 'Maschi') }}<br>
    {{ Form::radio('gender', 'u', false) }}
    {{ Form::label('u', 'Tutti') }}<br>
<h2 class="subtitle-filtri">Piano</h2>
    {{ Form::select('number_piano', array('' => '--') + range(0,127), $piano) }}
<h2 class="subtitle-filtri">Num. posti letto totali</h2>
    {{ Form::select('number_pl_app', array('' => '--') + range(1,20)), $num_pl }}
<h2 class="subtitle-filtri">Servizi</h2>
    {{ Form::checkbox('check2[]', 'Bagno') }}
    {{ Form::label('Bagno', 'Bagno') }}<br>

    {{ Form::checkbox('check2[]', 'Cucina') }}
    {{ Form::label('Cucina', 'Cucina') }}<br>

    {{ Form::checkbox('check2[]', 'Lavanderia') }}
    {{ Form::label('Lavanderia', 'Lavanderia') }}<br>

    {{ Form::checkbox('check2[]', 'Ripostiglio') }}
    {{ Form::label('Ripostiglio', 'Ripostiglio') }}<br>

    {{ Form::checkbox('check2[]', 'Garage') }}
    {{ Form::label('Garage', 'Garage') }}<br>

    {{ Form::checkbox('check2[]', 'Giardino') }}
    {{ Form::label('Giardino', 'Giardino') }}<br>

<div class="postoletto">
    {{ Form::checkbox('check2[]', 'Angolo_studio') }}
    {{ Form::label('Angolo_studio', 'Angolo studio') }}<br>
</div>

    {{ Form::checkbox('check2[]', 'Aria_condizionata') }}
    {{ Form::label('Aria_condizionata', 'Aria condizionata') }}<br>

    {{ Form::checkbox('check2[]', 'Wi-fi') }}
    {{ Form::label('Wi-fi', 'Wi-fi') }}<br>

<div class="numcamere">
    <h2 class="subtitle-filtri">Numero di camere</h2>
    {{ Form::number('num_camere', $num_camere_tot, ['placeholder' => 'Es: 1, 2, ...'], array('id'=>'num_camere')) }}
</div>

<div class="postoletto">
    <h2 class="subtitle-filtri">Tipo posto letto</h2>
    {{ Form::select('tipo', ['Singola' => 'Singola', 'Doppia' => 'Doppia', 'NULL' => 'Indifferente'], $tipo, array('id'=>'tipo')) }}
</div>

<h2 style="margin: 20px"></h2>

{{ Form::submit('Filtra', ['class' => 'filter_stats_button', 'id'=>'bottone']) }}

{!! Form::close() !!}

