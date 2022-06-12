<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/catalogo.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/content-home-loggato.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/gestione-alloggi.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('js/catalogo.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Catalogo'); ?>


<?php $__env->startSection('content'); ?>
    <main class="main-container">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isLocatario')): ?>
            <aside class="lateral-bar">
                <?php echo $__env->make('helpers/filtri', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </aside>
        <?php endif; ?>
        <section class="catalogo">
            <h1>Alloggi in affitto</h1>
            <article class="alloggi-buttons">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isLocatario')): ?>
                    <a href="<?php echo e(route('catalogo-appartamenti-locatario')); ?>">
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isLocatore')): ?>
                    <a href="<?php echo e(route('catalogo-appartamenti-locatore')); ?>">
                <?php endif; ?>
                <?php if(auth()->guard()->guest()): ?>
                    <a href="<?php echo e(route('catalogo-appartamenti')); ?>">
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAdmin')): ?>
                    <a href="<?php echo e(route('catalogo-appartamenti-admin')); ?>">
                <?php endif; ?>
                    <button class="appartamenti-button">
                        <img class="button-img" src="<?php echo e(asset('images/apartment_icon.png')); ?>" alt="Appartamenti">
                        APPARTAMENTI
                    </button>
                </a>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isLocatario')): ?>
                    <a href="<?php echo e(route('catalogo-posti-letto-locatario')); ?>">
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isLocatore')): ?>
                    <a href="<?php echo e(route('catalogo-posti-letto-locatore')); ?>">
                <?php endif; ?>
                <?php if(auth()->guard()->guest()): ?>
                    <a href="<?php echo e(route('catalogo-posti-letto')); ?>">
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAdmin')): ?>
                    <a href="<?php echo e(route('catalogo-posti-letto-admin')); ?>">
                <?php endif; ?>
                    <button class="posti-letto-button">
                        <img class="button-img" src="<?php echo e(asset('images/bed_icon.png')); ?>" alt="Posti letto">
                        POSTI LETTO
                    </button>
                </a></a></a></a></a></a></a>
            </article>
            <!-- ALLOGGI -->
            <?php if($alloggi->isEmpty()): ?>
                <div class="alloggio">
                    <i class="fa-solid fa-house-circle-xmark fa-2xl" style="margin: 50px"></i>
                    <h1>Nessun alloggio corrisponde ai criteri di ricerca!</h1>
                </div>
            <?php else: ?>
                <?php if(isset($alloggi)): ?>   <!-- esiste o non è null -->
                    <?php $__currentLoopData = $alloggi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alloggio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!-- Alloggio -->
                    <?php echo $__env->make('helpers/alloggio', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endif; ?>
            
        </section>
    </main>
    <!--Paginazione-->
    <?php echo $__env->make('pagination.paginator', ['paginator' => $alloggi->appends($_GET)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\Università\Terzo anno\Tecnologie web\Tecnologie-Web-2022\laraProj5\resources\views/layouts/content-catalogo.blade.php ENDPATH**/ ?>