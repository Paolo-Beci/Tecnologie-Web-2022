<div class="popup">

    <div class="popup-container">

        <span class="close">&times;</span>

        <div class="popup-content">

            <div data-popup-content="servizi">
                <?php echo $__env->make('helpers/servizi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div data-popup-content="dicono-di-noi">
                <?php echo $__env->make('helpers/dicono-di-noi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div data-popup-content="chi-siamo">
                <?php echo $__env->make('helpers/chi-siamo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div data-popup-content="accedi">
                <?php echo $__env->make('helpers/popup-accedi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <?php echo $__env->make('helpers/condizioni-uso', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->make('helpers/privacy', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>

    </div>

</div>
<?php /**PATH C:\Users\DELL\Desktop\Università\Terzo anno\Tecnologie web\Tecnologie-Web-2022\laraProj5\resources\views/layouts/popup.blade.php ENDPATH**/ ?>