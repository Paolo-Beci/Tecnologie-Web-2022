<section id="home" class="home">
    <article class="title title-anim">
        <span>Benvenuto su</span>
        <img src="<?php echo e(asset('images/FlatMate_Titolo.png')); ?>" alt="">
        <span>Cercare alloggi per studenti
            <br>
            non è mai stato così facile!</span>
    </article>
    <article class="forms forms-anim" id="login">
        <div class="container">
            
            <?php
                $loginClass = '';
                $signUpClass = '';

                $errorUsernameSignUp = $errors->first('sign-up-username');
                $errorPasswordSignUp = $errors->first('sign-up-password');

                if($errorUsernameSignUp == '' && $errorPasswordSignUp == '') {
                    $loginClass = 'active-form';
                    $signUpClass = 'inactive-form';
                } else {
                    $loginClass = 'inactive-form';
                    $signUpClass = 'active-form';
                }
            ?>

            <?php echo $__env->make('auth/login-utente', ['loginClass' => $loginClass], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->make('auth/register-utente', ['signUpClass' => $signUpClass], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="circle-to-sign-up"></div>
            <div class="circle-to-login"></div>
        </div>
    </article>
</section>
<section id="servizi" class="services">
    <?php echo $__env->make('helpers.servizi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</section>
<section id="chi-siamo" class="about-us">
    <?php echo $__env->make('helpers.chi-siamo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</section>
<section id="dicono-di-noi" class="reviews">
    <?php echo $__env->make('helpers.dicono-di-noi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</section>
<?php if(isset($faq)): ?>
    <?php echo $__env->make('helpers.faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH C:\Users\DELL\Desktop\Università\Terzo anno\Tecnologie web\Tecnologie-Web-2022\laraProj5\resources\views/home/home-guest.blade.php ENDPATH**/ ?>