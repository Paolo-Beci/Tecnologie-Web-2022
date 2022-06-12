<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/catalogo.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/content-home-loggato.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Storico alloggi'); ?>

<?php $__env->startSection('content'); ?>
    <main class="main-container">
        <section class="catalogo">
            <div class='parent'>
                <div class='child'>
                    <h1>I tuoi alloggi:</h1>
                </div>
            </div>
        <!-- ALLOGGI -->
        <?php if($alloggiLocatario->isEmpty()): ?>
            <div class="parent">
                <div class="child">
                    <i class="fa-solid fa-house-circle-xmark fa-2xl" style="margin: 50px"></i>
                    <h1>Non hai nessun alloggio locato da visualizzare!</h1>
                </div>
            </div>
        <?php else: ?>
            <?php $__currentLoopData = $alloggiLocatario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alloggio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- Alloggio -->
                    <?php echo $__env->make('helpers.alloggio', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        </section>
    </main>
    <!--Paginazione-->
    <?php if(isset($alloggiLocatario)): ?>
        <?php echo $__env->make('pagination.paginator', ['paginator' => $alloggiLocatario], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\Università\Terzo anno\Tecnologie web\Tecnologie-Web-2022\laraProj5\resources\views/alloggio/content-storico-alloggi-locatario.blade.php ENDPATH**/ ?>