<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/content-account.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/content-home-loggato.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/gestione-alloggi.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Account'); ?>

<!-- Vista che visualizza i dati personali e li rende modificabili all'utente loggato -->
<?php $__env->startSection('content'); ?>
<?php if(isset($dati_personali)): ?>
<?php $__currentLoopData = $dati_personali; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dati): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <main class="main-container">
        <section class="primo-box">
            <?php if(Route::current()->getName() != 'show-locatario'): ?>
                <h1>Ciao <?php echo e($dati->nome); ?> <?php echo e($dati->cognome); ?> !<br> Questa è la tua area privata!</h1>
                <p style="margin-top: 10px"> Puoi visualizzare e modificare i tuoi dati personali </p>
            <?php else: ?>
                <h1><?php echo e($dati->nome); ?> <?php echo e($dati->cognome); ?></h1>
            <?php endif; ?>
            <div class="img-container">
                <?php if(is_null($dati->id_foto_profilo)): ?>
                    <img src="<?php echo e(asset('images_profilo/no_image.png')); ?>" alt="immagine profilo" class="img-profilo">
                <?php else: ?>
                    <img src="<?php echo e(asset('images_profilo/'.$dati->id_foto_profilo.$dati->estensione_p)); ?>" alt="immagine profilo" class="img-profilo">
                <?php endif; ?>
            </div>

            <!-- Differenziazione delle rotte in base al tipo di utente -->
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isLocatore')): ?>
                <?php echo e(Form::open(array('route' => 'modifica-dati-locatore', 'files' => true, 'class' => 'modifica-dati'))); ?>

            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isLocatario')): ?>
                <?php echo e(Form::open(array('route' => 'modifica-dati-locatario', 'files' => true, 'class' => 'modifica-dati'))); ?>

            <?php endif; ?>

            <?php if(Route::current()->getName() != 'show-locatario'): ?>
                <div class="profile-input">
                    <h1>Inserisci o modifica l'immagine di profilo!</h1>
                    <?php echo e(Form::file('image', ['id' => 'image'])); ?>

                </div>
            <?php endif; ?>
        </section>
        <hr style="margin-right: 50px; margin-left: 50px">

        <section class="secondo-box">
            <fieldset class="colonna form-group">
                <!-- Username -->
                <?php if(Route::current()->getName() != 'show-locatario'): ?>
                    <div class="item">
                        <?php echo e(Form::label('username', 'Username attuale: ', ['class' => 'label-form'])); ?>

                        <?php echo e(Form::label('username', $dati->username, ['class' => 'label-form'])); ?>

                        <?php echo e(Form::text('username', '', ['placeholder' => 'Nuovo Username'])); ?>

                        <span class="underline"></span>
                    </div>
                    <?php if($errors->first('username')): ?>
                        <ul class="errors">
                            <?php $__currentLoopData = $errors->get('username'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($message); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>
                <?php else: ?>
                    <?php echo e(Form::label('username', 'Username ', ['class' => 'label-form'])); ?>

                    <?php echo e(Form::label('username', $dati->username, ['class' => 'label-form'])); ?>

                <?php endif; ?>

                <!-- Nome -->
                <div class="item">
                    <?php echo e(Form::label('name', 'Nome', ['class' => 'label-form'])); ?>

                    <?php echo e(Form::text('name', $dati->nome, ['placeholder' => 'Nome'])); ?>

                    <span class="underline"></span>
                </div>
                <?php if($errors->first('name')): ?>
                    <ul class="errors">
                        <?php $__currentLoopData = $errors->get('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($message); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>

                <!-- Luogo di nascita -->
                <div class="item">
                    <?php echo e(Form::label('birthplace', 'Luogo di nascita', ['class' => 'label-form'])); ?>

                    <?php echo e(Form::text('birthplace', $dati->luogo_nascita, ['placeholder' => 'Luogo di nascita'])); ?>

                    <span class="underline"></span>
                </div>
                <?php if($errors->first('birthplace')): ?>
                    <ul class="errors">
                        <?php $__currentLoopData = $errors->get('birthplace'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($message); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>

                <!-- Sesso -->
                <?php if(Route::current()->getName() != 'show-locatario'): ?>
                    <div class="item">
                        <?php echo e(Form::label('gender', 'Sesso', ['class' => 'label-form'])); ?>

                        <?php if($dati->sesso == 'm'): ?>
                            <div>
                                <?php echo e(Form::radio('gender', 'm', ['id' => 'male'])); ?>

                                <?php echo e(Form::label('male', 'Uomo')); ?>

                            </div>
                            <div>
                                <?php echo e(Form::radio('gender', 'f', false, ['id' => 'female'])); ?>

                                <?php echo e(Form::label('female', 'Donna')); ?>

                            </div>
                        <?php else: ?>
                            <div>
                                <?php echo e(Form::radio('gender', 'm', false, ['id' => 'male'])); ?>

                                <?php echo e(Form::label('male', 'Uomo')); ?>

                            </div>
                            <div>
                                <?php echo e(Form::radio('gender', 'f', ['id' => 'female'])); ?>

                                <?php echo e(Form::label('female', 'Donna')); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <div class="item">
                        <?php if($dati->sesso == 'm'): ?>
                            <?php echo e(Form::label('gender', 'Sesso', ['class' => 'label-form'])); ?>

                            <?php echo e(Form::text('gender', 'Uomo')); ?>

                        <?php else: ?>
                            <?php echo e(Form::label('gender', 'Sesso', ['class' => 'label-form'])); ?>

                            <?php echo e(Form::text('gender', 'Donna')); ?>

                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <!-- Città -->
                <div class="item">
                    <?php echo e(Form::label('city', 'Città', ['class' => 'label-form'])); ?>

                    <?php echo e(Form::text('city', $dati->citta, ['placeholder' => 'Città'])); ?>

                    <span class="underline"></span>
                </div>
                <?php if($errors->first('city')): ?>
                    <ul class="errors">
                        <?php $__currentLoopData = $errors->get('city'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($message); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>

                <!-- Numero civico -->
                <div class="item">
                    <?php echo e(Form::label('house-number', 'Numero civico', ['class' => 'label-form'])); ?>

                    <?php echo e(Form::text('house-number', $dati->num_civico, ['placeholder' => 'Numero civico'])); ?>

                    <span class="underline"></span>
                </div>
                <?php if($errors->first('house-number')): ?>
                    <ul class="errors">
                        <?php $__currentLoopData = $errors->get('house-number'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($message); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>

                <!-- Mail -->
                <div class="item">
                    <?php echo e(Form::label('email', 'Email', ['class' => 'label-form'])); ?>

                    <?php echo e(Form::text('email', $dati->mail, ['placeholder' => 'E-mail'])); ?>

                    <span class="underline"></span>
                </div>
                <?php if($errors->first('email')): ?>
                    <ul class="errors">
                        <?php $__currentLoopData = $errors->get('email'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($message); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>

            </fieldset>
            <fieldset class="colonna form-group">
                <!-- Password -->
                <?php if(Route::current()->getName() != 'show-locatario'): ?>
                    <div class="item">
                        <?php echo e(Form::label('password', 'Password')); ?>

                        <?php echo e(Form::input('password', 'password', $dati->password)); ?>

                        <span class="underline"></span>
                    </div>
                    <?php if($errors->first('password')): ?>
                        <ul class="errors">
                            <?php $__currentLoopData = $errors->get('password'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($message); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>
                <?php endif; ?>

                <!-- Cognome -->
                <div class="item">
                    <?php echo e(Form::label('surname', 'Cognome', ['class' => 'label-form'])); ?>

                    <?php echo e(Form::text('surname', $dati->cognome, ['placeholder' => 'Cognome'])); ?>

                    <span class="underline"></span>
                </div>
                <?php if($errors->first('surname')): ?>
                    <ul class="errors">
                        <?php $__currentLoopData = $errors->get('surname'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($message); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>

                <!-- Data di nascita -->
                <div class="item">
                    <?php echo e(Form::label('birthtime', 'Data di nascita',  ['class' => 'label-form'])); ?>

                    <?php echo e(Form::date('birthtime', $dati->data_nascita)); ?>

                    <span class="underline"></span>
                </div>
                <?php if($errors->first('birthtime')): ?>
                    <ul class="errors">
                        <?php $__currentLoopData = $errors->get('birthtime'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($message); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>

                <!-- Codice fiscale -->
                <div class="item">
                    <?php echo e(Form::label('cf', 'Codice fiscale', ['class' => 'label-form'])); ?>

                    <?php echo e(Form::text('cf', $dati->codice_fiscale, ['placeholder' => 'Codice fiscale'])); ?>

                    <span class="underline"></span>
                </div>
                <?php if($errors->first('cf')): ?>
                    <ul class="errors">
                        <?php $__currentLoopData = $errors->get('cf'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($message); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>

                <!-- Via -->
                <div class="item">
                    <?php echo e(Form::label('street', 'Via', ['class' => 'label-form'])); ?>

                    <?php echo e(Form::text('street', $dati->via, ['placeholder' => 'Via'])); ?>

                    <span class="underline"></span>
                </div>
                <?php if($errors->first('street')): ?>
                    <ul class="errors">
                        <?php $__currentLoopData = $errors->get('street'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($message); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>

                <!-- CAP -->
                <div class="item">
                    <?php echo e(Form::label('cap', 'CAP', ['class' => 'label-form'])); ?>

                    <?php echo e(Form::text('cap', $dati->cap, ['placeholder' => 'CAP'])); ?>

                    <span class="underline"></span>
                </div>
                <?php if($errors->first('cap')): ?>
                    <ul class="errors">
                        <?php $__currentLoopData = $errors->get('cap'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($message); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>

                <!-- Cellulare -->
                <div class="item">
                    <?php echo e(Form::label('telephone', 'Cellulare', ['class' => 'label-form'])); ?>

                    <?php echo e(Form::text('telephone', $dati->cellulare, ['placeholder' => 'Cellulare'])); ?>

                    <span class="underline"></span>
                </div>
                <?php if($errors->first('telephone')): ?>
                    <ul class="errors">
                        <?php $__currentLoopData = $errors->get('telephone'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($message); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>

            </fieldset>
        </section>
        <section class="terzo-box">
            <?php if(Route::current()->getName() != 'show-locatario'): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('isAdmin')): ?>
                    <?php echo e(Form::submit('Modifica', ['class' => 'filter_button'])); ?>

                <?php endif; ?>
            <?php endif; ?>
        </section>
        <?php echo Form::close(); ?>

    </main>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\Università\Terzo anno\Tecnologie web\Tecnologie-Web-2022\laraProj5\resources\views/layouts/content-account.blade.php ENDPATH**/ ?>