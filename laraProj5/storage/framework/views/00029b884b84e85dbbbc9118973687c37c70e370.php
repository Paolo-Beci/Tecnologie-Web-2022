<?php if(auth()->guard()->guest()): ?>
<h1>Accedi o Registrati!</h1>
    <p style="margin: 10px">Per accedere ai dettagli degli annunci devi effettuare il login o registrarti!</p>
<div class="button">
    <a href="<?php echo e(route('home-guest')); ?>">
        <button class="filter_button"> Torna alla home</button>
    </a>
</div>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isLocatore')): ?>
    <h1>Non puoi visualizzare i dettagli!</h1>
    <p style="margin: 10px">Per accedere ai dettagli dell'alloggio devi essere un locatario!</p>
    <div class="button">
        <a href="<?php echo e(route('home-locatore')); ?>">
            <button class="filter_button"> Torna alla home</button>
        </a>
    </div>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAdmin')): ?>
    <h1>Non puoi visualizzare i dettagli!</h1>
    <p style="margin: 10px">Per accedere ai dettagli dell'alloggio devi essere un locatario!</p>
    <div class="button">
        <a href="<?php echo e(route('home-admin')); ?>">
            <button class="filter_button"> Torna alla home</button>
        </a>
    </div>
<?php endif; ?>
<?php /**PATH C:\Users\DELL\Desktop\Università\Terzo anno\Tecnologie web\Tecnologie-Web-2022\laraProj5\resources\views/helpers/popup-accedi.blade.php ENDPATH**/ ?>