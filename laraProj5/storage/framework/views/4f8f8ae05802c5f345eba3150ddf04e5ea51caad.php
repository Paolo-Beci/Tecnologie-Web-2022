<?php
    $routeName = Route::current()->getName();
?>

<li>
    <?php if($routeName != 'home-locatario'): ?>
        <a href="<?php echo e(route('home-locatario')); ?>/#faq" title="Frequenty Asked Questions">FAQ</a>
    <?php else: ?>
        <a class="anchor" href="#faq" title="Frequenty Asked Questions">FAQ</a>
    <?php endif; ?>
</li>
<li>
    <a 
    <?php if(in_array($routeName, ['catalogo-locatario', 'catalogo-appartamenti-locatario', 'catalogo-posti-letto-locatario'])): ?>
        class="active"
    <?php endif; ?>
    href="<?php echo e(route('catalogo-locatario')); ?>" title="Vai al catalogo annunci">Catalogo</a>
</li>
<li>
    <a 
    <?php if($routeName == 'storico-alloggi'): ?>
        class="active"
    <?php endif; ?>
    href="<?php echo e(route('storico-alloggi')); ?>" title="Storico degli alloggi">Storico alloggi</a>
</li>
<li>
    <a href="<?php echo e(route('messaggistica')); ?>" title="Messaggistica">Messaggi</a>
</li>
<li>
    <a href="<?php echo e(route('account-locatario')); ?>">
        <button class="bottone_profilo">
            <img src="<?php echo e(asset('images_profilo/' . $profilePhoto)); ?>" alt="User Logo" width="10%" style="vertical-align:middle;padding-right: 10px">
            <span><?php echo e(Auth::user()->username); ?></span>
        </button>
    </a>
</li>
<?php /**PATH C:\Users\DELL\Desktop\Università\Terzo anno\Tecnologie web\Tecnologie-Web-2022\laraProj5\resources\views/_navbar/_navbar-locatario.blade.php ENDPATH**/ ?>