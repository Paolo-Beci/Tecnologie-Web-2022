<?php echo e(Form::open(array('route' => 'login', 'class' => 'login ' . $loginClass))); ?>

    <h1>Login</h1>
    <fieldset class="login-fieldset">
        <div class="username">
            <?php echo e(Form::label('username', 'Username')); ?>

            <?php echo e(Form::text('username', '', ['id' => 'username'])); ?>

            <span class="underline"></span>
        </div>
        <?php if($errors->first('username')): ?>
            <ul class="errors">
                <?php $__currentLoopData = $errors->get('username'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($message); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php endif; ?>
        <div class="password">
            <?php echo e(Form::label('password', 'Password')); ?>

            <?php echo e(Form::password('password', ['id' => 'password'])); ?>

            <span class="underline"></span>
        </div>
        <?php if($errors->first('password')): ?>
            <ul class="errors">
                <?php $__currentLoopData = $errors->get('password'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($message); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php endif; ?>
    </fieldset>
    <div class="login-extra">
        <?php echo e(Form::submit('Login', ['class' => 'submit'])); ?>

        <span>Non sei un membro? <a data-form="toSignUp">Registrati</a></span>
    </div>
<?php echo e(Form::close()); ?><?php /**PATH C:\Users\DELL\Desktop\Università\Terzo anno\Tecnologie web\Tecnologie-Web-2022\laraProj5\resources\views/auth/login-utente.blade.php ENDPATH**/ ?>