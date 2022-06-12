<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/dettagli-alloggio.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/content-home-loggato.css')); ?>">
<?php $__env->startSection('title', 'Dettagli alloggio'); ?>


<?php $__env->startSection('content'); ?>
    
    <?php if(isset($info_generali)): ?>
        <?php if($info_generali->first()->tipologia == 'Appartamento'): ?>
            <h1>Ciaooooooo</h1>
            <div><?php echo e($info_generali->first()->num_camere); ?></div>
        <?php endif; ?>

        <?php if($info_generali->first()->tipologia != 'Appartamento'): ?>
            <div><?php echo e($info_generali->first()->angolo_studio); ?></div>
            <h1>Aoooooooo</h1>
        <?php endif; ?>
    <?php endif; ?>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\Università\Terzo anno\Tecnologie web\Tecnologie-Web-2022\laraProj5\resources\views/layouts/dettagli-alloggio.blade.php ENDPATH**/ ?>