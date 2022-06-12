<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="<?php echo e(asset('images/favicon.ico')); ?>" type="image/x-icon">
    <link rel="icon" href="<?php echo e(asset('images/favicon.ico')); ?>" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/header.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/footer.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/content-home-guest.css')); ?>">

    <?php echo $__env->yieldContent('css'); ?>

    <!-- FONTAWESOME ICONS -->
    <script src="https://kit.fontawesome.com/644d83f971.js" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('js/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/menu-script.js')); ?>"></script>
    <script src="<?php echo e(asset('js/reviews.js')); ?>"></script>
    <script src="<?php echo e(asset('js/popup.js')); ?>"></script> 

    <?php echo $__env->yieldContent('js'); ?>

    <title>FlatMate | <?php echo $__env->yieldContent('title', 'Homepage'); ?></title>

</head>
<body>
    <header class="header-anim">
        <?php if(isset(auth()->user()->ruolo)): ?>
            <a class="logo" href="<?php echo e(route('home-' . auth()->user()->ruolo)); ?>">
        <?php else: ?>
            <a class="logo" href="<?php echo e(route('home-guest')); ?>">
        <?php endif; ?>
            <img src="<?php echo e(asset('images/FlatMate_Logo_mini.png')); ?>" alt="FlatMate Logo">
        </a>
        <nav>
            <?php if(auth()->guard()->check()): ?>
                <?php
                    $datiPersonali = App\Models\Resources\DatiPersonali::find(auth()->user()->dati_personali);
                    $profilePhoto = $datiPersonali->id_foto_profilo . $datiPersonali->estensione_p;
                    if($profilePhoto == '')
                        $profilePhoto = 'user_icon.png';
                ?>
                <?php echo $__env->make('layouts/_navbar', ['profilePhoto' => $profilePhoto], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <?php if(auth()->guard()->guest()): ?>
                <?php echo $__env->make('layouts/_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </nav>
    </header>
        <?php echo $__env->yieldContent('content'); ?>
    <footer>
        <?php echo $__env->make('layouts/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('layouts/popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </footer>
</body>
</html>
<?php /**PATH C:\Users\DELL\Desktop\Università\Terzo anno\Tecnologie web\Tecnologie-Web-2022\laraProj5\resources\views/template.blade.php ENDPATH**/ ?>