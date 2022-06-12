<article class="alloggi">
    <div class="alloggio" data-href="<?php echo e(route('dettagli-alloggio', [$alloggioLocatore->id_alloggio])); ?>">
        <img class="item-immagine" src="<?php echo e(asset('images_case/'.$alloggioLocatore->id_foto.$alloggioLocatore->estensione)); ?>" alt="Immagine">
        <div>
            <h1><?php echo e($alloggioLocatore->tipologia); ?></h1>  <!-- Tipologia -->
            <hr style="margin: 10px">
            <h1>
                <?php echo e($alloggioLocatore->via); ?>, <?php echo e($alloggioLocatore->num_civico); ?>,
                Piano <?php echo e($alloggioLocatore->piano); ?>

                <br>
                <?php echo e($alloggioLocatore->citta); ?>, <?php echo e($alloggioLocatore->cap); ?></h1> <!-- Via, Num.civico, Piano, Città, CAP -->
            <h2 class="info-alloggio">
                Dimensione: <?php echo e($alloggioLocatore->dimensione); ?>mq,
                Periodo Locazione: <?php echo e($alloggioLocatore->periodo_locazione); ?> mesi,
                Genere: <?php echo e($alloggioLocatore->genere); ?></h2> <!-- Dimensione, PeriodoLocazione, Genere (DA MODIFICARE) -->
            <h2 class="info-alloggio">
                Canone affitto: &#8364;<?php echo e($alloggioLocatore->canone_affitto); ?> / mese,
                Utenze: &#8364;<?php echo e($alloggioLocatore->utenze); ?> / mese</h2> <!-- CanoneAffitto, Utenze -->
            <h2 class="info-alloggio"><?php echo e($alloggioLocatore->descrizione); ?></h2> <!-- Descrizione -->
        </div>
    </div>
</article>
<?php /**PATH C:\Users\DELL\Desktop\Università\Terzo anno\Tecnologie web\Tecnologie-Web-2022\laraProj5\resources\views/helpers/alloggio-locatore.blade.php ENDPATH**/ ?>