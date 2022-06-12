<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="UTF-8" http-equiv="refresh" content="5;URL=<?php echo e(route('gestione-faq')); ?>">
    <title>FlatMate | Gestione Faq</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/header.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/footer.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/gestione-faq.css')); ?>">
</head>
<body>
<header class="header-anim">
    <a class="logo" href=<?php echo e(route('gestione-faq')); ?>>
        <img src="<?php echo e(asset('images/FlatMate_Logo_mini.png')); ?>" alt="FlatMate Logo">
    </a>
    <nav>
        <ul class="menu">
            <li>
                <!-- TO DO -->
                <button class="bottone_profilo" href="#profilo">
                    <img src="<?php echo e(asset('images/user_icon.png')); ?>" alt="User Logo" width="10%" style="vertical-align:middle;horiz-align:left">
                    <?php echo e(Auth::user()->username); ?>

                </button>
            </li>
        </ul>
    </nav>
</header>
<div class="div_faq">
    <section id="faq" class="faq">
        <h2>
            Operazione andata a buon fine!
        </h2>
        <p>Attendi cinque secondi per tornare alla schermata di gestione delle faq!
        </p>
    </section>
</div>
<div class="loader"></div>
<footer>
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</footer>
</body>
</html>
<?php /**PATH C:\Users\DELL\Desktop\Università\Terzo anno\Tecnologie web\Tecnologie-Web-2022\laraProj5\resources\views/faq/confirm.blade.php ENDPATH**/ ?>