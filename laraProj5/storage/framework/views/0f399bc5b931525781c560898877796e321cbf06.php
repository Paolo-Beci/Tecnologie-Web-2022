<?php
    $routeName = Route::current()->getName();
?>

<?php if(!in_array(Route::current()->getPrefix(), ['admin/gestione-faq', 'admin/gestione-faq/modifica-faq'])): ?>
    <li>
        <a
        <?php if(in_array($routeName, ['catalogo-admin', 'catalogo-appartamenti-admin', 'catalogo-posti-letto-admin'])): ?>
            class="active"
        <?php endif; ?>
        href="<?php echo e(route('catalogo-admin')); ?>" title="Vai al catalogo annunci">Catalogo</a>
    </li>
    <li>
        <a 
        <?php if($routeName == 'home-admin'): ?>
            href="#statistiche"
        <?php else: ?>
            href="<?php echo e(route('home-admin')); ?>#statistiche"
        <?php endif; ?>
        title="Statistiche">Statistiche</a>
    </li>
    <?php if($routeName == 'home-admin'): ?>
        <li>
            <a href="<?php echo e(route('home-admin')); ?>" title="Resetta filtri">Resetta filtri</a>
        </li>
    <?php endif; ?>
    <li>
        <a href="<?php echo e(route('gestione-faq')); ?>" title="Gestione Faq">Gestione Faq</a>
    </li>
<?php else: ?>
    <li>
        <a
        <?php if($routeName == 'inserisci-faq'): ?>
            class="active"
        <?php endif; ?>
        href="<?php echo e(route('inserisci-faq')); ?>" title="Inserisci Faq">Inserisci</a>
    </li>
    <li>
        <a
        <?php if($routeName == 'modifica-faq'): ?>
            class="active"
        <?php endif; ?>
        href="<?php echo e(route('modifica-faq')); ?>" title="Modifica Faq">Modifica</a>
    </li>
    <li>
        <a
        <?php if($routeName == 'cancella-faq'): ?>
            class="active"
        <?php endif; ?>
        href="<?php echo e(route('cancella-faq')); ?>" title="Cancella Faq">Cancella</a>
    </li>
<?php endif; ?>
<li>
    <a href="<?php echo e(route('account-admin')); ?>">
        <button class="bottone_profilo">
            <img src="<?php echo e(asset('images_profilo/' . $profilePhoto)); ?>" alt="User Logo" width="10%" style="vertical-align:middle;padding-right: 10px">
            <span><?php echo e(Auth::user()->username); ?></span>
        </button>
    </a>
</li>

<?php /**PATH C:\Users\DELL\Desktop\Università\Terzo anno\Tecnologie web\Tecnologie-Web-2022\laraProj5\resources\views/_navbar/_navbar-admin.blade.php ENDPATH**/ ?>