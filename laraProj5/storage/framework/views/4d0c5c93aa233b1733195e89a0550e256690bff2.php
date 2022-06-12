<?php
    $routeName = Route::current()->getName();
?>

<li>
    <?php if($routeName != 'home-guest'): ?>
        <a href="<?php echo e(route('home-guest')); ?>/#faq" title="Frequenty Asked Questions">FAQ</a>
    <?php else: ?>
        <a class="anchor" href="#faq" title="Frequenty Asked Questions">FAQ</a>
    <?php endif; ?>
</li>
<li>
    <a 
        <?php if(in_array($routeName, ['catalogo', 'catalogo-appartamenti', 'catalogo-posti-letto'])): ?>
            class="active"
        <?php endif; ?>
    href="<?php echo e(route('catalogo')); ?>" title="Annunci inseriti dai locatori">Catalogo</a>
</li>
<li>
    <a href="<?php echo e(route('home-guest')); ?>" title="Effettua il login">Login</a>
</li>
<?php /**PATH C:\Users\DELL\Desktop\Università\Terzo anno\Tecnologie web\Tecnologie-Web-2022\laraProj5\resources\views/_navbar/_navbar-guest.blade.php ENDPATH**/ ?>