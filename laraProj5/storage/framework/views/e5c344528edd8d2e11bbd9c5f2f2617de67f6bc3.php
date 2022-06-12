<!-- ELENCO DEI SERVIZI DISPONIBILI PER OGNI ALLOGGIO NELLA VISTA DETTAGLIO ALLOGGIO -->
<div class="box-servizio">
    <?php $flag = false ?>
    <?php $__currentLoopData = $info_generali; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servizio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($servizio->servizio=='Bagno' && $flag==false): ?>
            <p><i class="icon fa-solid fa-toilet"></i> Bagno (<?php echo e($servizio->quantita); ?>)</p>
            <?php $flag = true ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php if($flag==false): ?>
        <p class="icon-false"><i class="icon fa-solid fa-toilet fa-fade"></i> Bagno </p>
    <?php endif; ?>

    <?php $flag = false ?>
    <?php $__currentLoopData = $info_generali; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servizio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($servizio->servizio=='Cucina' && $flag==false): ?>
            <p><i class="icon fa-solid fa-kitchen-set"></i> Cucina (<?php echo e($servizio->quantita); ?>)</p>
            <?php $flag = true ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php if($flag==false): ?>
        <p class="icon-false"><i class="icon fa-solid fa-kitchen-set fa-fade"></i> Cucina </p>
    <?php endif; ?>

    <?php $flag = false ?>
    <?php $__currentLoopData = $info_generali; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servizio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($servizio->servizio=='Lavanderia' && $flag==false): ?>
            <p><i class="icon fa-solid fa-faucet"></i> Lavanderia (<?php echo e($servizio->quantita); ?>)</p>
            <?php $flag = true ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php if($flag==false): ?>
        <p class="icon-false"><i class="icon fa-solid fa-faucet fa-fade"></i> Lavanderia </p>
        <?php $flag = true ?>
    <?php endif; ?>
</div>
<div class="box-servizio">
    <?php $flag = false ?>
    <?php $__currentLoopData = $info_generali; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servizio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($servizio->servizio=='Ripostiglio' && $flag==false): ?>
            <p><i class="icon fa-solid fa-box-archive"></i> Ripostiglio (<?php echo e($servizio->quantita); ?>)</p>
            <?php $flag = true ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php if($flag==false): ?>
        <p class="icon-false"><i class="icon fa-solid fa-box-archive fa-fade"></i> Ripostiglio </p>
        <?php $flag = true ?>
    <?php endif; ?>

    <?php $flag = false ?>
    <?php $__currentLoopData = $info_generali; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servizio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($servizio->servizio=='Garage' && $flag==false): ?>
            <p><i class="icon fa-solid fa-square-parking"></i> Garage (<?php echo e($servizio->quantita); ?>)</p>
            <?php $flag = true ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php if($flag==false): ?>
        <p class="icon-false"><i class="icon fa-solid fa-square-parking fa-fade"></i> Garage </p>
        <?php $flag = true ?>
    <?php endif; ?>

    <?php $flag = false ?>
    <?php $__currentLoopData = $info_generali; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servizio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($servizio->servizio=='Giardino' && $flag==false): ?>
            <p><i class="icon fa-solid fa-tree"></i> Giardino (<?php echo e($servizio->quantita); ?>)</p>
            <?php $flag = true ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php if($flag==false): ?>
        <p class="icon-false"><i class="icon fa-solid fa-tree fa-fade"></i> Giardino </p>
        <?php $flag = true ?>
    <?php endif; ?>
</div>
<div class="box-servizio">
    <?php $flag = false ?>
    <?php $__currentLoopData = $info_generali; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servizio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($servizio->servizio=='Aria_condizionata' && $flag==false): ?>
            <p><i class="icon fa-solid fa-fan"></i> Aria Condizionata (<?php echo e($servizio->quantita); ?>)</p>
            <?php $flag = true ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php if($flag==false): ?>
        <p class="icon-false"><i class="icon fa-solid fa-fan fa-fade"></i> Aria Condizionata </p>
        <?php $flag = true ?>
    <?php endif; ?>

    <?php $flag = false ?>
    <?php $__currentLoopData = $info_generali; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servizio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($servizio->servizio=='Wi-fi' && $flag==false): ?>
            <p><i class="icon fa-solid fa-wifi"></i> WiFi (<?php echo e($servizio->quantita); ?>)</p>
            <?php $flag = true ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php if($flag==false): ?>
        <p class="icon-false"><i class="icon fa-solid fa-wifi fa-fade"></i> WiFi </p>
        <?php $flag = true ?>
    <?php endif; ?>

    <?php $flag = false ?>
    <?php $__currentLoopData = $info_generali; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servizio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($servizio->servizio=='Angolo_studio' && $flag==false): ?>
            <p><i class="icon fa-solid fa-book"></i> Angolo Studio (<?php echo e($servizio->quantita); ?>)</p>
            <?php $flag = true ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php if($flag==false): ?>
        <p class="icon-false"><i class="icon fa-solid fa-book fa-fade"></i> Angolo Studio </p>
        <?php $flag = true ?>
    <?php endif; ?>
</div>
<?php /**PATH C:\Users\DELL\Desktop\Università\Terzo anno\Tecnologie web\Tecnologie-Web-2022\laraProj5\resources\views/helpers/dettaglio-servizi.blade.php ENDPATH**/ ?>