<ul class="menu">
    <li>
        <a class="active" href="<?php echo e(route('home-admin')); ?>">Home</a>
    </li>
    <li>
        <a class="" href="<?php echo e(route('inserisci-faq')); ?>" title="Inserisci Faq">Inserisci</a>
    </li>
    <li>
        <a class="" href="<?php echo e(route('modifica-faq')); ?>" title="Modifica Faq">Modifica</a>
    </li>
    <li>
        <a class="" href="<?php echo e(route('cancella-faq')); ?>" title="Cancella Faq">Cancella</a>
    </li>
    <li>
        <!-- TO DO -->
        <button class="bottone_profilo" href="#profilo">
            <img src="<?php echo e(asset('images/user_icon.png')); ?>" alt="User Logo" width="10%" style="vertical-align:middle;horiz-align:left">
            <?php echo e(Auth::user()->username); ?>

        </button>
    </li>
</ul>
<?php /**PATH C:\Users\DELL\Desktop\Università\Terzo anno\Tecnologie web\Tecnologie-Web-2022\laraProj5\resources\views/_navbar/_navbar-gestione-faq.blade.php ENDPATH**/ ?>