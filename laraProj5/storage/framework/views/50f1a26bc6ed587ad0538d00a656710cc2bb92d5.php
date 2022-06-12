<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/gestione-faq.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/content-home-admin.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Gestione Faq'); ?>

<?php $__env->startSection('content'); ?>
<div class="static">
    <h1><?php echo e($azione); ?></h1>
    <p><?php echo e($descrizione); ?></p>

    <div class="container-contact">
        <div class="wrap-contact">

            
            <?php echo e(Form::open(array('route' => $rotta, 'id' => 'addfaq', 'files' => true))); ?>


            
            <?php if(isset($hidden)): ?>
                <?php echo e(Form::hidden('id_faq', $hidden)); ?>

            <?php endif; ?>

            
            <div  class="wrap-input">
                <?php echo e(Form::label('domanda', 'Domanda')); ?>

                <?php echo e(Form::textarea('domanda', $domanda, ['class' => 'input', 'id' => 'domanda', 'rows' => 3])); ?>

                <?php if($errors->first('domanda')): ?>
                    <ul class="errors">
                        <?php $__currentLoopData = $errors->get('domanda'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($message); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>
            </div>

            
            <div  class="wrap-input">
                <?php echo e(Form::label('risposta', 'Risposta')); ?>

                <?php echo e(Form::textarea('risposta', $risposta, ['class' => 'input', 'id' => 'risposta', 'rows' => 3])); ?>

                <?php if($errors->first('risposta')): ?>
                    <ul class="errors">
                        <?php $__currentLoopData = $errors->get('risposta'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($message); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>
            </div>

            
            <div  class="wrap-input">
                <?php echo e(Form::label('target', 'Target')); ?>

                <?php echo e(Form::select('target', $tg, $target, ['class' => 'input','id' => 'target'])); ?>

            </div>

            
            <div class="container-form-btn">
                <?php echo e(Form::submit($azione, ['class' => 'filter_button_home', 'onclick' => "return confirm('Sei sicuro di voler proseguire?')"])); ?>

            </div>

            
            <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\Università\Terzo anno\Tecnologie web\Tecnologie-Web-2022\laraProj5\resources\views/faq/insert-faq.blade.php ENDPATH**/ ?>