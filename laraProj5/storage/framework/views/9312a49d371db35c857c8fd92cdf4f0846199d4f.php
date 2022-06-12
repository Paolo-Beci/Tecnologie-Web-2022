<ul class="menu">

    
    <li>
        <a 
        <?php if(in_array(Route::current()->getName(), ['home-guest', 'home-locatario', 'home-locatore', 'home-admin'])): ?>
            class="active" 
        <?php endif; ?>
        <?php if(auth()->guard()->guest()): ?>
            href="<?php echo e(route('home-guest')); ?>"
        <?php endif; ?>
        <?php if(auth()->guard()->check()): ?>
            href="<?php echo e(route('home-' . auth()->user()->ruolo)); ?>"
        <?php endif; ?>
        title="Home">Home</a>
    </li>

    

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isLocatore')): ?>
       <?php echo $__env->make('_navbar/_navbar-locatore', ['profilePhoto' => $profilePhoto], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isLocatario')): ?>
        <?php echo $__env->make('_navbar/_navbar-locatario', ['profilePhoto' => $profilePhoto], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAdmin')): ?>
        <?php echo $__env->make('_navbar/_navbar-admin', ['profilePhoto' => $profilePhoto], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    

    <?php if(auth()->guard()->guest()): ?>
        <?php echo $__env->make('_navbar/_navbar-guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    

    <?php if(auth()->guard()->check()): ?>
        <li><a href="" title="Esci dal sito" class="highlight"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout</a></li>
        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
            <?php echo e(csrf_field()); ?>

        </form>
    <?php endif; ?>

</ul>
<?php /**PATH C:\Users\DELL\Desktop\Università\Terzo anno\Tecnologie web\Tecnologie-Web-2022\laraProj5\resources\views/layouts/_navbar.blade.php ENDPATH**/ ?>