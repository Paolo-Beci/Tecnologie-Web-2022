<article class="alloggi">
<!-- Accesso dettagli alloggio in catalogo e storico alloggi di locatario -->
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isLocatario')): ?>
    <div class="alloggio" data-href="<?php echo e(route('dettagli-alloggio-locatario', [$alloggio->id_alloggio, $alloggio->tipologia])); ?>">
        <?php echo $__env->make('helpers/carta-alloggio-catalogo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php endif; ?>

<!-- Popup di errore se non autorizzato a visualizzare i dettagli -->
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('isLocatario')): ?>
    <div class="alloggio" id="accedi" 
    <?php if(Route::current()->getName() != 'gestione-alloggi'): ?>
        data-popup-caller
    <?php endif; ?>
    >
        <?php echo $__env->make('helpers/carta-alloggio-catalogo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php endif; ?>
</article>
<?php /**PATH C:\Users\DELL\Desktop\Università\Terzo anno\Tecnologie web\Tecnologie-Web-2022\laraProj5\resources\views/helpers/alloggio.blade.php ENDPATH**/ ?>