<?php if(isset($alloggio->id_foto)): ?>
    <img class="item-immagine" src="<?php echo e(asset('images_case/'.$alloggio->id_foto.$alloggio->estensione)); ?>" alt="Immagine">
<?php else: ?>
    <img class="item-immagine" src="<?php echo e(asset('images/icons_casa.png')); ?>" alt="Immagine">
<?php endif; ?>

<div>
    <?php if($alloggio->tipologia == 'Posto_letto'): ?>
        <h1>Posto letto</h1>
    <?php else: ?>
        <h1><?php echo e($alloggio->tipologia); ?></h1>  <!-- Tipologia -->
    <?php endif; ?>
    <hr style="margin: 10px">
    <h1>
        <?php echo e($alloggio->via); ?>, <?php echo e($alloggio->num_civico); ?>,
        Piano <?php echo e($alloggio->piano); ?>

        <br>
        <?php echo e($alloggio->citta); ?>, <?php echo e($alloggio->cap); ?></h1> <!-- Via, Num.civico, Piano, Città, CAP -->
    <h2 class="info-alloggio">
        Dimensione: <?php echo e($alloggio->dimensione); ?>mq,
        Periodo Locazione: <?php echo e($alloggio->periodo_locazione); ?> mesi,
        Genere: <?php echo e($alloggio->genere); ?></h2> <!-- Dimensione, PeriodoLocazione, Genere (DA MODIFICARE) -->
    <h2 class="info-alloggio">
        Canone affitto: &#8364;<?php echo e($alloggio->canone_affitto); ?> / mese,
        Utenze: &#8364;<?php echo e($alloggio->utenze); ?> / mese</h2> <!-- CanoneAffitto, Utenze -->
    <h2 class="info-alloggio"><?php echo e($alloggio->descrizione); ?></h2> <!-- Descrizione -->
    <div class="info-alloggio">
        <?php if($alloggio->stato == 'libero'): ?>
            <h2 style="color: green"> Libero </h2>
        <?php else: ?>
            <h2 style="color: red"> Locato </h2>
        <?php endif; ?>
    </div>
</div>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isLocatore')): ?>
<?php if(Route::current()->getName() == 'gestione-alloggi'): ?>
<div>
    <div class="icona-catalogo">
        <a href="<?php echo e(route('modifica-annuncio', [$alloggio->id_alloggio, $alloggio->tipologia])); ?>"><img class="click" src="<?php echo e(asset('images/icons_modificare.png')); ?>" alt="Modifica"/></a>
    </div>
    <div class="icona-catalogo">
        <a href="<?php echo e(route('cancella-alloggio.store', [$alloggio->id_alloggio])); ?>" onclick="return confirm('Sei sicuro di voler proseguire?')"><img class="click"  src="<?php echo e(asset('images/icons_cestino.png')); ?>" alt="Elimina"/></a>
    </div>
</div>
<?php endif; ?>
<?php endif; ?>
<?php /**PATH C:\Users\DELL\Desktop\Università\Terzo anno\Tecnologie web\Tecnologie-Web-2022\laraProj5\resources\views/helpers/carta-alloggio-catalogo.blade.php ENDPATH**/ ?>