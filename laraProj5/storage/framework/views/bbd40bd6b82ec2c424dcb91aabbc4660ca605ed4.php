<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/gestione-faq.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Gestione Faq'); ?>

<?php $__env->startSection('content'); ?>
<div class="div_faq">
    <section id="faq" class="faq">
        <div class="faq-container">
            <?php $__currentLoopData = $faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $singleFaq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="q-a_modify-delete">
                    <div class="descr">
                        <p class="question"><?php echo $singleFaq->domanda; ?></p>
                        <p class="answer"><?php echo $singleFaq->risposta; ?></p>
                        <p class="question"><?php echo $singleFaq->target; ?></p>
                    </div>
                    <div class="icona">
                        <a class="click" href="<?php echo e(route('show-faq', [$singleFaq->id_faq])); ?>"><img src="<?php echo e(asset('images/icons_modificare.png')); ?>" alt="Modifica"/></a>
                    </div>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\Università\Terzo anno\Tecnologie web\Tecnologie-Web-2022\laraProj5\resources\views/faq/modify-faq.blade.php ENDPATH**/ ?>