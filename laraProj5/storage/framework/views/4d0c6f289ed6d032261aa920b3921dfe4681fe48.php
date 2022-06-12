<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/catalogo.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/content-home-loggato.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Gestione alloggi'); ?>

<?php $__env->startSection('content'); ?>
    <main class="main-container">
        <section class="catalogo">
            <h1 class="">I tuoi alloggi:</h1>
            <!-- ALLOGGI -->
            <?php if(isset($alloggiLocatore)): ?>   <!-- esiste o non è null -->
                <?php $__currentLoopData = $alloggiLocatore; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alloggio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- Alloggio -->
                <?php echo $__env->make('helpers.alloggio', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </section>
    </main>
    <!--Paginazione-->
    <?php echo $__env->make('pagination.paginator', ['paginator' => $alloggiLocatore], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\Università\Terzo anno\Tecnologie web\Tecnologie-Web-2022\laraProj5\resources\views/alloggio/content-gestione-alloggi-locatore.blade.php ENDPATH**/ ?>