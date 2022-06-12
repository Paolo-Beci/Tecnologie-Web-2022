<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/dettagli-alloggio.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/content-home-loggato.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/gestione-alloggi.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Dettagli alloggio'); ?>

<?php $__env->startSection('content'); ?>
<?php if(isset($info_generali)): ?>
    <main class="main-container">
        <section class="primo-box">
            <div class="image-container">
                <img class="immagine-alloggio"
                     src="<?php echo e(asset('images_case/'.$info_generali->first()->id_foto.$info_generali->first()->estensione)); ?>"
                     alt="Immagine">
            </div>

            <div class="testo-alloggio">
                <div class="item-desc">
                    <?php if($info_generali->first()->tipologia == 'Appartamento'): ?>
                        <h1><?php echo e($info_generali->first()->tipologia); ?></h1>
                    <?php else: ?>
                        <h1>Posto letto</h1>
                    <?php endif; ?>
                    <h1><?php echo e($info_generali->first()->via_alloggio); ?>

                        , <?php echo e($info_generali->first()->num_civico_alloggio); ?>

                        , <?php echo e($info_generali->first()->citta); ?> <?php echo e($info_generali->first()->cap_alloggio); ?><br>
                        Piano: <?php echo e($info_generali->first()->piano); ?> Interno: <?php echo e($info_generali->first()->interno); ?></h1>

                    <?php if($info_generali->first()->stato == 'libero'): ?>
                        <h2 style="color: green"> Libero -> pubblicato il: <?php echo e($info_generali->first()->data_interazione); ?></h2>
                    <?php else: ?>
                        <h2 style="color: red"> Locato </h2>
                    <?php endif; ?>

                    <div class="item-desc">
                        <h2>Descrizione</h2>
                        <p><?php echo e($info_generali->first()->descrizione); ?></p>
                        <hr style="margin: 10px">
                        <?php if(is_null($info_generali->first()->dimensione)): ?>
                            <p>Dimensione: NON SPECIFICATO</p>
                        <?php else: ?>
                            <p>Dimensione: <?php echo e($info_generali->first()->dimensione); ?> metri quadri</p>
                        <?php endif; ?>

                        <?php if(is_null($info_generali->first()->num_posti_letto_tot)): ?>
                            <p>Numero di posti letto totali: NON SPECIFICATO</p>
                        <?php else: ?>
                            <p>Numero di posti letto totali: <?php echo e($info_generali->first()->num_posti_letto_tot); ?></p>
                        <?php endif; ?>
                        <?php if($info_generali->first()->tipologia == 'Appartamento'): ?>
                            <p>Numero di camere: <?php echo e($info_generali->first()->num_camere); ?></p>
                        <?php elseif($info_generali->first()->tipologia == 'Posto_letto'): ?>
                            <p>Tipologia di camera: <?php echo e($info_generali->first()->tipologia_camera); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="item-desc">
                        <h2>Servizi</h2>
                        <div class="box-servizi">
                            <?php echo $__env->make('helpers.dettaglio-servizi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                    <div class="item-desc">
                        <div class="box-prezzi">
                            <div class="box-prezzo">
                                <h2>Canone affitto</h2>
                                <?php if(is_null($info_generali->first()->canone_affitto)): ?>
                                    <h2>&#8364; 0</h2>
                                <?php else: ?>
                                    <h2>&#8364;<?php echo e($info_generali->first()->canone_affitto); ?></h2>
                                <?php endif; ?>
                            </div>
                            <div class="box-prezzo">
                                <h2>Utenze</h2>
                                <?php if(is_null($info_generali->first()->utenze)): ?>
                                    <h2>&#8364; 0</h2>
                                <?php else: ?>
                                    <h2>&#8364;<?php echo e($info_generali->first()->utenze); ?></h2>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="item-desc">
                        <h2>Altre informazioni</h2>
                            <p>Periodo di locazione: <?php echo e($info_generali->first()->periodo_locazione); ?> mesi</p>
                            <?php if($info_generali->first()->genere == 'm'): ?>
                                <p>Genere: Uomo</p>
                            <?php elseif($info_generali->first()->genere == 'f'): ?>
                                <p>Genere ammesso: Donna</p>
                            <?php else: ?>
                                <p>Genere ammesso: Uomo e Donna</p>
                            <?php endif; ?>
                            <p>Eta minima: <?php echo e($info_generali->first()->eta_minima); ?></p>
                            <p>Eta massima: <?php echo e($info_generali->first()->eta_massima); ?></p>
                    </div>
                </div>
            </div>
        </section>
        <hr style="margin-right: 50px; margin-left: 50px">
        <section class="secondo-box">
            <div class="contatto-alloggio">
                <h2>Contatti host</h2>
                <div class="img-contatto">
                    <?php if(is_null($info_generali->first()->id_foto_profilo)): ?>
                        <img src="<?php echo e(asset('images_profilo/no_image.png')); ?>" alt="immagine profilo" class="img-profilo">
                    <?php else: ?>
                        <img src="<?php echo e(asset('images_profilo/'.$info_generali->first()->id_foto_profilo.$info_generali->first()->estensione_p)); ?>" alt="immagine profilo" class="img-profilo">
                    <?php endif; ?>
                </div>
                <div class="info-contatto">
                    <p class="item-desc"><?php echo e($info_generali->first()->nome); ?> <?php echo e($info_generali->first()->cognome); ?> - <?php echo e($info_generali->first()->username); ?></p>
                    <?php if(isset($info_generali->first()->mail)): ?>
                        <p class="item-desc"><i class="icon fa-solid fa-envelope"></i><?php echo e($info_generali->first()->mail); ?></p>
                    <?php endif; ?>
                    <?php if(isset($info_generali->first()->cellulare)): ?>
                        <p class="item-desc"><i class="icon fa-solid fa-phone"></i><?php echo e($info_generali->first()->cellulare); ?></p>
                    <?php endif; ?>
                </div>
                <?php if($info_generali->first()->stato != 'locato'): ?>
                    <div class="btn-contatto">
                        <?php echo e(Form::open(array('route' => 'opzionamento'))); ?>

                            <?php echo e(Form::hidden('contenuto', '<span>Ciao, ho visto la casa e sono interessato!</span>')); ?>

                            <?php echo e(Form::hidden('mittente', auth()->user()->id)); ?>

                            <?php echo e(Form::hidden('destinatario', $info_generali->first()->id)); ?>

                            <?php echo e(Form::hidden('alloggio', $info_generali->first()->id_alloggio)); ?>

                            <?php echo e(Form::button('Opziona!', ['type' => 'submit', 'class' => 'filter_button'])); ?>

                        <?php echo e(Form::close()); ?>

                    </div>
                <?php endif; ?>
            </div>
            <div class="mappa-alloggio">
                <iframe width="600" height="500" id="gmap_canvas" loading="lazy" allowfullscreen
                        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDKrpbaW7f4DAhXkdkXw3T_f62wW2zFwtg&q=
                        <?php echo e($info_generali->first()->via); ?> <?php echo e($info_generali->first()->num_civico); ?> <?php echo e($info_generali->first()->citta_alloggio); ?>

                            " frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            </div>
        </section>
    </main>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\Università\Terzo anno\Tecnologie web\Tecnologie-Web-2022\laraProj5\resources\views/alloggio/content-dettagli-alloggio.blade.php ENDPATH**/ ?>