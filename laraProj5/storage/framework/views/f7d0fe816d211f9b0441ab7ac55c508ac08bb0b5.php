<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/gestione-faq.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Gestione Faq'); ?>

<?php $__env->startSection('content'); ?>
    <div class="div_faq">
        <?php if(isset($faq)): ?>
            <?php echo $__env->make('helpers.faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\Università\Terzo anno\Tecnologie web\Tecnologie-Web-2022\laraProj5\resources\views/faq/gestione-faq.blade.php ENDPATH**/ ?>