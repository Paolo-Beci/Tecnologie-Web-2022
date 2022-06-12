<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="<?php echo e(asset('images/favicon.ico')); ?>" type="image/x-icon">
    <link rel="icon" href="<?php echo e(asset('images/favicon.ico')); ?>" type="image/x-icon">
    <title>FlatMate | Registrazione dati Personali</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/sign-up-continue.css')); ?>">
    <script src="<?php echo e(asset('js/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/sign-up-continue.js')); ?>" defer></script>
</head>
<body class="container">
    <div class="bottone-home">
        <a href="<?php echo e(route('home-guest')); ?>">
            <img src="<?php echo e(asset('images/icons_casa.png')); ?>" alt="logo">
        </a>
    </div>
    <?php echo e(Form::open(array('route' => 'registrazione', 'class' => 'sign-up'))); ?>

        <div class="sign-up-step active active-anim form" data-step="0">
            <h1>Dati personali</h1>
            <fieldset class="form-group">

                <div class="underline">
                    <?php echo e(Form::text('name', '', ['placeholder' => 'Nome'])); ?>

                </div>

                <?php if($errors->first('name')): ?>
                    <ul class="errors">
                        <?php $__currentLoopData = $errors->get('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($message); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>

                <div class="underline">
                    <?php echo e(Form::text('surname', '', ['placeholder' => 'Cognome'])); ?>

                </div>

                <?php if($errors->first('surname')): ?>
                    <ul class="errors">
                        <?php $__currentLoopData = $errors->get('surname'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($message); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>

                <div class="underline">
                    <?php echo e(Form::text('birthplace', '', ['placeholder' => 'Luogo di nascita'])); ?>

                </div>

                <?php if($errors->first('birthplace')): ?>
                    <ul class="errors">
                        <?php $__currentLoopData = $errors->get('birthplace'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($message); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>

                <div class="underline">
                    <?php echo e(Form::date('birthtime', '', ['placeholder' => 'Data di nascita'])); ?>

                </div>

                <?php if($errors->first('birthtime')): ?>
                    <ul class="errors">
                        <?php $__currentLoopData = $errors->get('birthtime'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($message); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>

                <div class="gender">
                    <div>
                        <?php echo e(Form::radio('gender', 'm', ['id' => 'male'])); ?>

                        <?php echo e(Form::label('male', 'Uomo')); ?>

                    </div>
                    <div>
                        <?php echo e(Form::radio('gender', 'f', false, ['id' => 'female'])); ?>

                        <?php echo e(Form::label('female', 'Donna')); ?>

                    </div>
                </div>
                <div class="underline">
                    <?php echo e(Form::text('cf', '', ['placeholder' => 'Codice fiscale'])); ?>

                </div>

                <?php if($errors->first('cf')): ?>
                    <ul class="errors">
                        <?php $__currentLoopData = $errors->get('cf'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($message); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>

            </fieldset>
            <div class="buttons">
                <button type="button" data-next>Prossimo step</button>
            </div>
        </div>
        <div class="sign-up-step" data-step="1">
            <h1>Indirizzo di residenza</h1>
            <fieldset class="form-group">
                <div class="underline">
                    <?php echo e(Form::text('city', '', ['placeholder' => 'Città'])); ?>

                </div>

                <?php if($errors->first('city')): ?>
                    <ul class="errors">
                        <?php $__currentLoopData = $errors->get('city'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($message); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>

                <div class="underline">
                    <?php echo e(Form::text('street', '', ['placeholder' => 'Via'])); ?>

                </div>

                <?php if($errors->first('street')): ?>
                    <ul class="errors">
                        <?php $__currentLoopData = $errors->get('street'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($message); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>

                <div class="underline">
                    <?php echo e(Form::text('house-number', '', ['placeholder' => 'Numero civico'])); ?>

                </div>

                <?php if($errors->first('house-number')): ?>
                    <ul class="errors">
                        <?php $__currentLoopData = $errors->get('house-number'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($message); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>

                <div class="underline">
                    <?php echo e(Form::text('cap', '', ['placeholder' => 'CAP'])); ?>

                </div>

                <?php if($errors->first('cap')): ?>
                    <ul class="errors">
                        <?php $__currentLoopData = $errors->get('cap'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($message); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>

            </fieldset>
            <div class="buttons">
                <button type="button" data-previous>Step precedente</button>
                <button type="button" data-next>Prossimo step</button>
            </div>
        </div>
        <div class="sign-up-step" data-step="2">
            <h1>Informazioni opzionali</h1>
            <fieldset class="form-group">
                <div class="underline">
                    <?php echo e(Form::text('email', '', ['placeholder' => 'E-mail'])); ?>

                </div>
                <?php if($errors->first('email')): ?>
                    <ul class="errors">
                        <?php $__currentLoopData = $errors->get('email'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($message); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>

                <div class="underline">
                    <?php echo e(Form::text('telephone', '', ['placeholder' => 'Cellulare'])); ?>

                </div>
                <?php if($errors->first('telephone')): ?>
                    <ul class="errors">
                        <?php $__currentLoopData = $errors->get('telephone'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($message); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>

            </fieldset>
            <div class="buttons">
                <button type="button" data-previous>Step precedente</button>
                <?php echo e(Form::submit('Registrati')); ?>

            </div>
        </div>
    <?php echo e(Form::close()); ?>

</body>
</html>
<?php /**PATH C:\Users\DELL\Desktop\Università\Terzo anno\Tecnologie web\Tecnologie-Web-2022\laraProj5\resources\views/auth/register-dati-personali.blade.php ENDPATH**/ ?>