<main id="content-home-admin" class="content-home-admin">
    
    <section id="statistiche" class="stats-section">
        <h1 title="I tre dati seguenti non sono soggetti a filtraggio" class="titolo">Statistiche</h1>
        <div class="stats-container">
            <article class="stats">
                <a title="Numero di alloggi presenti sul mercato" class="indicazione" href="#1">Offerte di alloggio</a>
                <p><?php echo e($numOffAll); ?></p>
            </article>
            <article class="stats">
                <a title="Numero di alloggi a cui qualcuno è interessato" class="indicazione" href="#2">Offerte di locazione</a>
                <p><?php echo e($numOffLoc); ?></p>
            </article>
            <article class="stats">
                <a title="Numero di alloggi allocati" class="indicazione" href="#3">Alloggi locati</a>
                <p><?php echo e($numAllAllocati); ?></p>
            </article>
        </div>
    </section>

    
    <section id="offerte_di_alloggio" class="filter_section">
        <h2>Offerte di alloggio</h2>
        <div class="form_container">
            <div class="wrap-contact">

                
                <?php echo e(Form::open(array('route' => array('getOffAllFiltered'), 'id' => 'filtri_id', 'files' => true))); ?>


                
                <div class="wrap-input">
                    <?php echo e(Form::label('da', 'Da')); ?>

                    <?php echo e(Form::date('da', $da, ['class' => 'input', 'id' => 'da', 'max'=>'2099-12-31'])); ?>


                    <?php echo e(Form::label('a', 'A')); ?>

                    <?php echo e(Form::date('a', $a, ['class' => 'input', 'id' => 'a', 'max'=>'2099-12-31'])); ?>

                </div>

                
                <div class="wrap-input">
                    <?php echo e(Form::label('type', 'Tipologia di alloggio')); ?>

                    <?php echo e(Form::select('type', ['Indefinito'=>'Indefinito', 'Appartamento'=>'appartamento', 'Posto_letto'=>'posto letto'], $type, ['class' => 'input', 'id' => 'type'])); ?>

                </div>

                
                <div class="container-form-btn">
                    <?php echo e(Form::submit('Filtra', ['class' => 'filter_button_home'])); ?>

                </div>

                
                <?php echo e(Form::close()); ?>


            </div>

            
            <div id="id_result" class="results_container">
                <?php if(isset($offAll)): ?>
                    <?php $__currentLoopData = $offAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alloggio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <article class="card">
                            <?php if(is_null($alloggio->id_foto)): ?>
                                <img class="card__image" src="<?php echo e(asset('images/icons_casa.png')); ?>" alt="Foto alloggio">
                            <?php else: ?>
                                <img class="card__image" src="<?php echo e(asset('images_case/'.$alloggio->id_foto.$alloggio->estensione)); ?>" alt="Foto alloggio">
                            <?php endif; ?>
                            <div class="card__image">
                                <h2><?php echo e($alloggio->citta); ?>, <?php echo e($alloggio->via); ?> <?php echo e($alloggio->num_civico); ?></h2>
                                <p>Tipo: <?php echo e($alloggio->tipologia); ?></p>
                                <p>Locatore: <?php echo e($alloggio->username); ?></p>
                                <p>Id alloggio: <?php echo e($alloggio->id_alloggio); ?></p>
                                <p>Data inserimento: <?php echo e($alloggio->data_inserimento_offerta); ?></p>
                            </div>
                        </article>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    
    <section id="offerte_di_locazione" class="filter_section">
        <h2>Offerte di locazione</h2>
        <div class="form_container">
            <div class="wrap-contact">
                
                <?php echo e(Form::open(array('route' => array('getOffLocFiltered'), 'id' => 'filtri_id', 'files' => true))); ?>


                
                <div class="wrap-input">
                    <?php echo e(Form::label('da2', 'Da')); ?>

                    <?php echo e(Form::date('da2', $da2, ['class' => 'input', 'id' => 'da2', 'max'=>'2099-12-31'])); ?>


                    <?php echo e(Form::label('a2', 'A')); ?>

                    <?php echo e(Form::date('a2', $a2, ['class' => 'input', 'id' => 'a2', 'max'=>'2099-12-31'])); ?>

                </div>

                
                <div class="wrap-input">
                    <?php echo e(Form::label('type2', 'Tipologia di alloggio')); ?>

                    <?php echo e(Form::select('type2', ['Indefinito'=>'Indefinito', 'Appartamento'=>'appartamento', 'Posto_letto'=>'posto letto'], $type2, ['class' => 'input', 'id' => 'type2'])); ?>

                </div>

                
                <div class="container-form-btn">
                    <?php echo e(Form::submit('Filtra', ['class' => 'filter_button_home'])); ?>

                </div>

                
                <?php echo e(Form::close()); ?>

            </div>

            
            <div id="id_result" class="results_container">
                <?php if(isset($offLoc)): ?>
                    <?php $__currentLoopData = $offLoc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alloggio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <article class="card">
                            <?php if(is_null($alloggio->id_foto)): ?>
                                <img class="card__image" src="<?php echo e(asset('images/icons_casa.png')); ?>" alt="Foto alloggio">
                            <?php else: ?>
                                <img class="card__image" src="<?php echo e(asset('images_case/'.$alloggio->id_foto.$alloggio->estensione)); ?>" alt="Foto alloggio">
                            <?php endif; ?>
                            <div class="card__image">
                                <h2><?php echo e($alloggio->citta); ?>, <?php echo e($alloggio->via); ?> <?php echo e($alloggio->num_civico); ?></h2>
                                <p>Tipo: <?php echo e($alloggio->tipologia); ?></p>
                                <p>Interessato: <?php echo e($alloggio->username); ?></p>
                                <p>Data interessamento: <?php echo e($alloggio->data_invio); ?></p>
                                <a class="dettagli_locatore" title="Clicca qui per informazioni sul locatore" href="#id_result">Id alloggio: <?php echo e($alloggio->id_alloggio); ?></a>
                            </div>
                        </article>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    
    <section id="alloggi_locati" class="filter_section">
        <h2>Alloggi locati</h2>
        <div class="form_container">
            <div class="wrap-contact">
                
                <?php echo e(Form::open(array('route' => array('getAllAlLocatiFiltered'), 'id' => 'filtri_id', 'files' => true))); ?>


                
                <div class="wrap-input">
                    <?php echo e(Form::label('da3', 'Da')); ?>

                    <?php echo e(Form::date('da3', $da3, ['class' => 'input', 'id' => 'da3', 'max'=>'2099-12-31'])); ?>


                    <?php echo e(Form::label('a3', 'A')); ?>

                    <?php echo e(Form::date('a3', $a3, ['class' => 'input', 'id' => 'a3', 'max'=>'2099-12-31'])); ?>

                </div>

                
                <div class="wrap-input">
                    <?php echo e(Form::label('type3', 'Tipologia di alloggio')); ?>

                    <?php echo e(Form::select('type3', ['Indefinito'=>'Indefinito', 'Appartamento'=>'appartamento', 'Posto_letto'=>'posto letto'], $type3, ['class' => 'input', 'id' => 'type3'])); ?>

                </div>

                
                <div class="container-form-btn">
                    <?php echo e(Form::submit('Filtra', ['class' => 'filter_button_home'])); ?>

                </div>

                
                <?php echo e(Form::close()); ?>

            </div>

            
            <div id="id_result" class="results_container">
                <?php if(isset($allAllocati)): ?>
                    <?php $__currentLoopData = $allAllocati; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alloggio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <article class="card">
                            <?php if(is_null($alloggio->id_foto)): ?>
                                <img class="card__image" src="<?php echo e(asset('images/icons_casa.png')); ?>" alt="Foto alloggio">
                            <?php else: ?>
                                <img class="card__image" src="<?php echo e(asset('images_case/'.$alloggio->id_foto.$alloggio->estensione)); ?>" alt="Foto alloggio">
                            <?php endif; ?>
                            <div class="card__image">
                                <h2><?php echo e($alloggio->citta); ?>, <?php echo e($alloggio->via); ?> <?php echo e($alloggio->num_civico); ?></h2>
                                <p>Tipo: <?php echo e($alloggio->tipologia); ?></p>
                                <p>Locatario: <?php echo e($alloggio->username); ?></p>
                                <p>Data interessamento: <?php echo e($alloggio->data_interazione); ?></p>
                                <a class="dettagli_locatore" title="Clicca qui per informazioni sul locatore" href="#id_result">Id alloggio: <?php echo e($alloggio->id_alloggio); ?></a>
                            </div>
                        </article>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>
<?php /**PATH C:\Users\DELL\Desktop\Università\Terzo anno\Tecnologie web\Tecnologie-Web-2022\laraProj5\resources\views/home/home-admin.blade.php ENDPATH**/ ?>