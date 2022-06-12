<script src="<?php echo e(asset('js/jquery-3.6.0.min.js')); ?>"></script>
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

        //funzione controlli estremi superficie e prezzo
        $("#min-prezzo").on('change', function(event) {
            $("#max-prezzo").val(parseInt($(this).val()));
        });

        $("#max-prezzo").on('change', function(event) {
            if(parseInt($(this).val()) < parseInt($("#min-prezzo").val())){
                $(this).val(parseInt($("#min-prezzo").val()));
            }
        });

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
<?php echo e(Form::open(array('route' => 'filtered', 'class' => 'filtri active-form', 'method' => 'get'))); ?>


<h2 class="subtitle-filtri">Città</h2>
    <?php echo e(Form::text('citta', $citta, ['placeholder' => 'Es: Ancona...'])); ?><br>
<h2 class="subtitle-filtri">Tipologia</h2>
    <?php echo e(Form::select('tipologia', ['Appartamento' => 'Appartamento', 'Posto_letto' => 'Posto letto', 'NULL' => 'Indifferente'], $tipologia, array('id'=>'tipologia'))); ?><br>
<h2 class="subtitle-filtri">Stato attuale</h2>
    <?php echo e(Form::checkbox('check[]', 'Libero')); ?>

    <?php echo e(Form::label('Libero', 'Libero')); ?><br>
    <?php echo e(Form::checkbox('check[]', 'Locato')); ?>

    <?php echo e(Form::label('Locato', 'Locato')); ?><br>
<h2 class="subtitle-filtri">Fascia di Prezzo</h2>
    <?php echo e(Form::number('min-prezzo', $minprezzo, array('placeholder' => 'prezzo minimo...', 'id'=>'min-prezzo', 'min'=>0))); ?>

    <?php echo e(Form::label('min-prezzo', '&#8364; Minimi')); ?>

    <?php echo e(Form::number('max-prezzo', $maxprezzo, array('placeholder' => 'prezzo massimo...', 'id'=>'max-prezzo', 'min'=>0))); ?>

    <?php echo e(Form::label('max-prezzo', '&#8364; Massimi')); ?>

<h2 class="subtitle-filtri">Periodo locazione</h2>
    <?php echo e(Form::radio('periodo', '12', false)); ?>

    <?php echo e(Form::label('12', '12 mesi')); ?>

    <?php echo e(Form::radio('periodo', '9', false)); ?>

    <?php echo e(Form::label('9', '9 mesi')); ?>

    <?php echo e(Form::radio('periodo', '6', false)); ?>

    <?php echo e(Form::label('6', '6 mesi')); ?>

<h2 class="subtitle-filtri">Superficie</h2>
    <?php echo e(Form::number('min-mq', $minmq, array('placeholder' => 'superficie minima...', 'id'=>'min-mq', 'min'=>0))); ?>

    <?php echo e(Form::label('min-mq', 'Mq minimi')); ?>

    <?php echo e(Form::number('max-mq', $maxmq, array('placeholder' => 'superficie massima...', 'id'=>'max-mq', 'min'=>0))); ?>

    <?php echo e(Form::label('max-mq', 'Mq massimi')); ?>

<h2 class="subtitle-filtri">Genere ammesso</h2>
    <?php echo e(Form::radio('gender', 'f', false)); ?>

    <?php echo e(Form::label('f', 'Femmine')); ?><br>
    <?php echo e(Form::radio('gender', 'm', false)); ?>

    <?php echo e(Form::label('m', 'Maschi')); ?><br>
    <?php echo e(Form::radio('gender', 'u', false)); ?>

    <?php echo e(Form::label('u', 'Tutti')); ?><br>
<h2 class="subtitle-filtri">Piano</h2>
    <?php echo e(Form::select('number_piano', array('' => '--') + range(0,127), $piano)); ?>

<h2 class="subtitle-filtri">Num. posti letto totali</h2>
    <?php echo e(Form::select('number_pl_app', array('' => '--') + range(1,20)), $num_pl); ?>

<h2 class="subtitle-filtri">Servizi</h2>
    <?php echo e(Form::checkbox('check2[]', 'Bagno')); ?>

    <?php echo e(Form::label('Bagno', 'Bagno')); ?><br>

    <?php echo e(Form::checkbox('check2[]', 'Cucina')); ?>

    <?php echo e(Form::label('Cucina', 'Cucina')); ?><br>

    <?php echo e(Form::checkbox('check2[]', 'Lavanderia')); ?>

    <?php echo e(Form::label('Lavanderia', 'Lavanderia')); ?><br>

    <?php echo e(Form::checkbox('check2[]', 'Ripostiglio')); ?>

    <?php echo e(Form::label('Ripostiglio', 'Ripostiglio')); ?><br>

    <?php echo e(Form::checkbox('check2[]', 'Garage')); ?>

    <?php echo e(Form::label('Garage', 'Garage')); ?><br>

    <?php echo e(Form::checkbox('check2[]', 'Giardino')); ?>

    <?php echo e(Form::label('Giardino', 'Giardino')); ?><br>

<div class="postoletto">
    <?php echo e(Form::checkbox('check2[]', 'Angolo_studio')); ?>

    <?php echo e(Form::label('Angolo_studio', 'Angolo studio')); ?><br>
</div>

    <?php echo e(Form::checkbox('check2[]', 'Aria_condizionata')); ?>

    <?php echo e(Form::label('Aria_condizionata', 'Aria condizionata')); ?><br>

    <?php echo e(Form::checkbox('check2[]', 'Wi-fi')); ?>

    <?php echo e(Form::label('Wi-fi', 'Wi-fi')); ?><br>

<div class="numcamere">
    <h2 class="subtitle-filtri">Numero di camere</h2>
    <?php echo e(Form::number('num_camere', $num_camere_tot, ['placeholder' => 'Es: 1, 2, ...'], array('id'=>'num_camere'))); ?>

</div>

<div class="postoletto">
    <h2 class="subtitle-filtri">Tipo posto letto</h2>
    <?php echo e(Form::select('tipo', ['Singola' => 'Singola', 'Doppia' => 'Doppia', 'NULL' => 'Indifferente'], $tipo, array('id'=>'tipo'))); ?>

</div>

<h2 style="margin: 20px"></h2>

<?php echo e(Form::submit('Filtra', ['class' => 'filter_stats_button', 'id'=>'bottone'])); ?>


<?php echo Form::close(); ?>


<?php /**PATH C:\Users\DELL\Desktop\Università\Terzo anno\Tecnologie web\Tecnologie-Web-2022\laraProj5\resources\views/helpers/filtri.blade.php ENDPATH**/ ?>