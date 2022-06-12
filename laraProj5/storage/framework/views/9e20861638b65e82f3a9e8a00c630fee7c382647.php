<?php echo e(Form::open(array('route' => 'registrazione-dati-personali', 'class' => 'sign-up ' . $signUpClass))); ?>

    <h1>Registrazione</h1>
    <fieldset class="sign-up-fieldset">
        <div class="username">
            <?php echo e(Form::label('sign-up-username', 'Username')); ?>

            <?php echo e(Form::text('sign-up-username', '', ['id' => 'sign-up-username'])); ?>

            <span class="underline"></span>
        </div>

        <?php if($errors->first('sign-up-username')): ?>
            <ul class="errors">
                <?php $__currentLoopData = $errors->get('sign-up-username'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($message); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php endif; ?>

        <div class="password">
            <?php echo e(Form::label('sign-up-password', 'Password')); ?>

            <?php echo e(Form::password('sign-up-password', ['id' => 'sign-up-password'])); ?>

            <span class="underline"></span>
        </div>
        
        <?php if($errors->first('sign-up-password')): ?>
            <ul class="errors">
                <?php $__currentLoopData = $errors->get('sign-up-password'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($message); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php endif; ?>

        <div class="confirm-password">
            <?php echo e(Form::label('sign-up-password_confirmation', 'Conferma password')); ?>

            <?php echo e(Form::password('sign-up-password_confirmation', ['id' => 'sign-up-password_confirmation'])); ?>

            <span class="underline"></span>
        </div>

        <?php if($errors->first('sign-up-password_confirmation')): ?>
            <ul class="errors">
                <?php $__currentLoopData = $errors->get('sign-up-password_confirmation'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($message); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php endif; ?>

        <div class="role">
            <div>
                <?php echo e(Form::radio('role', 'locatore', ['id' => 'locatore'])); ?>

                <?php echo e(Form::label('locatore', 'Locatore')); ?>

            </div>
            <div>
                <?php echo e(Form::radio('role', 'locatario', false, ['id' => 'locatario'])); ?>

                <?php echo e(Form::label('locatario', 'Locatario')); ?>

            </div>
        </div>

    </fieldset>
    <div class="sign-up-extra">
        <?php echo e(Form::submit('Continua', ['class' => 'submit'])); ?>

        <span>Sei già registrato? <a data-form="toLogin">Effettua il login</a></span>
    </div>
<?php echo e(Form::close()); ?><?php /**PATH C:\Users\DELL\Desktop\Università\Terzo anno\Tecnologie web\Tecnologie-Web-2022\laraProj5\resources\views/auth/register-utente.blade.php ENDPATH**/ ?>