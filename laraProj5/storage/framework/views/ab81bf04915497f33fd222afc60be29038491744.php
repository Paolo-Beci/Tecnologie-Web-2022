<?php
    $routeName = Route::current()->getName();
?>

<li>
    <?php if($routeName != 'home-locatore'): ?>
        <a href="<?php echo e(route('home-locatore')); ?>/#faq" title="Frequenty Asked Questions">FAQ</a>
    <?php else: ?>
        <a class="anchor" href="#faq" title="Frequenty Asked Questions">FAQ</a>
    <?php endif; ?>
</li>
<li>
    <a 
    <?php if(in_array($routeName, ['catalogo-locatore', 'catalogo-appartamenti-locatore', 'catalogo-posti-letto-locatore'])): ?>
        class="active"
    <?php endif; ?>
    href="<?php echo e(route('catalogo-locatore')); ?>" title="Vai al catalogo annunci">Catalogo</a>
</li>
<li>
    <a 
    <?php if($routeName == 'new-annuncio'): ?>
        class="active"
    <?php endif; ?>
    href="<?php echo e(route('new-annuncio')); ?>" title="Vai alla form di inserimento annuncio">Inserisci annuncio</a>
</li>
<li>
    <a 
    <?php if(in_array($routeName, ['gestione-alloggi', 'modifica-annuncio'])): ?>
        class="active"
    <?php endif; ?>
    href="<?php echo e(route('gestione-alloggi')); ?>" title="Gestione degli alloggi">Gestione alloggi</a>
</li>
<li>
    <a href="<?php echo e(route('messaggistica')); ?>" title="Messaggistica">Messaggi</a>
</li>
<li>
    <a href="<?php echo e(route('account-locatore')); ?>">
        <button class="bottone_profilo">
            <img src="<?php echo e(asset('images_profilo/' . $profilePhoto)); ?>" alt="User Logo" width="10%" style="vertical-align:middle;padding-right: 10px">
            <span><?php echo e(Auth::user()->username); ?></span>
        </button>
    </a>
</li>
<?php /**PATH C:\Users\DELL\Desktop\Università\Terzo anno\Tecnologie web\Tecnologie-Web-2022\laraProj5\resources\views/_navbar/_navbar-locatore.blade.php ENDPATH**/ ?>