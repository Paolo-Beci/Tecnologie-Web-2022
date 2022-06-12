<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/catalogo.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/content-home-loggato.css')); ?>">
<?php $__env->startSection('title', 'Gestione alloggi'); ?>


<?php $__env->startSection('content'); ?>
    <main class="main-container">
        <section class="catalogo">
            <div class='parent'>
                <div class='child'>
                    <h1>I tuoi alloggi:</h1>
                </div>
                <div class='child'>
                    <button class="filter_button" type="submit" onclick=alert('WorkInProgress')>Inserisci annuncio</button>
                </div>
            </div>
            <!-- ALLOGGI -->
            <?php if(isset($alloggiLocatore)): ?>   <!-- esiste o non è null -->
                <?php $__currentLoopData = $alloggiLocatore; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alloggioLocatore): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- Alloggio -->
                <?php echo $__env->make('helpers/alloggio-locatore', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </section>
    </main>
    <!--Paginazione-->
    <?php echo $__env->make('pagination.paginator', ['paginator' => $alloggiLocatore], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\Università\Terzo anno\Tecnologie web\Tecnologie-Web-2022\laraProj5\resources\views/layouts/content-gestione-alloggi-locatore.blade.php ENDPATH**/ ?>