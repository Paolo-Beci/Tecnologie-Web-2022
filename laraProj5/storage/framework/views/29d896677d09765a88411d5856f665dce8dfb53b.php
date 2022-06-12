<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/inserisci-annuncio.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/content-home-loggato.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/gestione-alloggi.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

    <script src="<?php echo e(asset('js/inserisci-annuncio.js')); ?>"></script>

    <script>
        $(function () {
            var actionUrl = "<?php echo e(route('new-annuncio.store')); ?>";
            var formId = 'inserisci-annuncio';
            $(":input").on('blur', function (event) {
                var formElementId = $(this).attr('id');
                doElemValidation(formElementId, actionUrl, formId);
            });
            $("#inserisci-annuncio").on('submit', function (event) {
                event.preventDefault();
                doFormValidation(actionUrl, formId);
            });

            //seleziono l'elemento della form sul quale avviene l'evento ("#idElementoNellaForm")
            $("#tipologia").on('change', function (event) {
                //Se l'opzione selezionata assume un determinato valore
                if($(this).val() === 'Posto_letto'){
                    //seleziono l'elemento della form specificando il suo id ed applica il metodo per nasconderlo/meno
                    $("div.appartamento").show();
                    $("div#numCamere").hide();
                }
                else{
                    $("div.appartamento").hide();
                    $("div#numCamere").show();
                }
            });
        });

    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Inserisci annuncio'); ?>

<?php $__env->startSection('content'); ?>
    <main class="main-container">
        <section class="primo-box">
            <h2>Utilizza questa form per inserire un nuovo annuncio nel Catalogo</h2>
        </section>

        <?php echo e(Form::open(array('route' => 'new-annuncio.store', 'id' => 'inserisci-annuncio','files' => true, 'class' => 'inserisci-annuncio'))); ?>


        <section class="parent">
                <div class="colonna">
                    <fieldset title="Inserisci le caratteristiche strutturali" class="fieldset">
                        <legend><h2>Caratteristiche strutturali:</h2></legend>
                        <!-- Tipologia -->
                        <div>
                            <?php echo e(Form::label('tipologia', 'Tipologia')); ?>

                            <?php echo e(Form::select('tipologia', ['Appartamento' => 'Appartamento', 'Posto_letto' => 'Posto letto'], '', ['id' => 'tipologia'])); ?>

                        </div>
                        <!-- Dimensione -->
                        <div class="item" id="dimensione">
                            <?php echo e(Form::label('dimensione', 'Dimensione (mq)')); ?>

                            <?php echo e(Form::text('dimensione', '', ['id' => 'dimensione'])); ?>

                        </div>
                        <!-- Num posti letto totali -->
                        <div>
                            <?php echo e(Form::label('numPostiLettoTot', 'Num posti letto totali')); ?>

                            <?php echo e(Form::selectRange('numPostiLettoTot', 1, 20, ['id' => 'numPostiLettoTot'])); ?>

                        </div>
                        <!-- Num camere (appartemento)-->
                        <div id="numCamere">
                            <?php echo e(Form::label('numCamere', 'Num camere')); ?>

                            <?php echo e(Form::selectRange('numCamere', 1, 20, ['id' => 'numCamere'])); ?>

                        </div>
                        <!-- Tipologia camera (posto letto) -->
                        <div class="appartamento">
                            <?php echo e(Form::label('tipologiaCamera', 'Tipologia camera')); ?>

                            <?php echo e(Form::select('tipologiaCamera', ['Singola' => 'Singola', 'Doppia' => 'Doppia'], ['id' => 'tipologiaCamera'])); ?>

                        </div>
                    </fieldset>

                    <fieldset title="Inserisci i vicoli di locazione sul locatario" class="fieldset">
                        <legend><h2>Vicoli di locazione sul locatario:</h2></legend>
                        <!-- Genere -->
                        <div>
                            <?php echo e(Form::label('genere', 'Genere')); ?>

                            <?php echo e(Form::select('genere', ['m' => 'm', 'f' => 'f', 'u' => 'u'], '', ['id' => 'genere'])); ?>

                        </div>
                        <!-- Età minima - Età massima -->
                        <div>
                            <p class="item">Fascia di età:</p>
                            <?php echo e(Form::label('etaMin', 'Min')); ?>

                            <?php echo e(Form::selectRange('etaMin', 18, 100, ['id' => 'etaMin'])); ?>

                            <?php echo e(Form::label('etaMax', 'Max')); ?>

                            <?php echo e(Form::selectRange('etaMax', 18, 100, ['id' => 'etaMax'])); ?>

                        </div>
                        <!-- Periodo locazione -->
                        <div>
                            <?php echo e(Form::label('periodoLocazione', 'Periodo locazione (mesi):')); ?>

                            <?php echo e(Form::select('periodoLocazione', ['6' => 6, '9' => 9, '12' => 12], '', ['id' => 'periodoLocazione'])); ?>

                        </div>
                    </fieldset>

                    <fieldset title="Inserisci i servizi presenti nell'alloggio" class="fieldset">
                        <legend><h2>Servizi</h2></legend>
                            <!-- Bagni -->
                            <div>
                                <?php echo e(Form::selectRange('Bagno', 1, 9, ['id' => 'Bagno'])); ?>

                                <?php echo e(Form::label('Bagno', 'Bagno/i')); ?>

                            </div>
                            <!-- Cucine -->
                            <div>
                                <?php echo e(Form::selectRange('Cucina', 1, 9, ['id' => 'Cucina'])); ?>

                                <?php echo e(Form::label('Cucina', 'Cucina/e')); ?>

                            </div>
                            <!-- Lavanderia -->
                            <div>
                                <?php echo e(Form::checkbox('Lavanderia', 1, false, ['id' => 'Lavanderia'])); ?>

                                <?php echo e(Form::label('Lavanderia', 'Lavanderia')); ?>

                            </div>
                            <!-- Garage -->
                            <div>
                                <?php echo e(Form::checkbox('Garage', 1, false, ['id' => 'Garage'])); ?>

                                <?php echo e(Form::label('Garage', 'Garage')); ?>

                            </div>

                            <!-- Giardino -->
                            <div>
                                <?php echo e(Form::checkbox('Giardino', 1, false, ['id' => 'Giardino'])); ?>

                                <?php echo e(Form::label('Giardino', 'Giardino')); ?>

                            </div>
                            <!-- Aria condizionata -->
                            <div>
                                <?php echo e(Form::checkbox('Aria condizionata', 1, false, ['id' => 'AriaCondizionata'])); ?>

                                <?php echo e(Form::label('Aria condizionata', 'Aria condizionata')); ?>

                            </div>
                            <!-- Wi-fi -->
                            <div>
                                <?php echo e(Form::checkbox('Wi-fi', 1, false, ['id' => 'Wi-fi'])); ?>

                                <?php echo e(Form::label('Wi-fi', 'Wi-fi')); ?>

                            </div>
                            <!-- Ripostiglio -->
                            <div>
                                <?php echo e(Form::checkbox('Ripostiglio', 1, false, ['id' => 'Ripostiglio'])); ?>

                                <?php echo e(Form::label('Ripostiglio', 'Ripostiglio')); ?>

                            </div>
                            <!-- Angolo studio -->
                            <div class="appartamento">
                                <?php echo e(Form::checkbox('Angolo studio', 1, false, ['id' => 'AngoloStudio'])); ?>

                                <?php echo e(Form::label('Angolo studio', 'Angolo Studio', ['id' => 'angoloStudio'])); ?>

                            </div>
                    </fieldset>

                </div>

                <div class="colonna2">
                    <fieldset title="Inserisci la localizzazione" class="fieldset">
                        <legend><h2>Localizzazione:</h2></legend>
                        <!-- Città -->
                        <div class="item">
                            <?php echo e(Form::label('citta', 'Città')); ?>

                            <?php echo e(Form::text('citta', '', ['id' => 'citta'])); ?>

                        </div>
                        <!-- Via -->
                        <div class="item">
                            <?php echo e(Form::label('via', 'Via')); ?>

                            <?php echo e(Form::text('via', '', ['id' => 'via'])); ?>

                        </div>
                        <!-- Num civico -->
                        <div class="item">
                            <?php echo e(Form::label('numCivico', 'Num civico')); ?>

                            <?php echo e(Form::text('numCivico', '', ['id' => 'numCivico'])); ?>

                        </div>
                        <!-- CAP -->
                        <div class="item">
                            <?php echo e(Form::label('cap', 'CAP')); ?>

                            <?php echo e(Form::text('cap', '', ['id' => 'cap'])); ?>

                        </div>
                        <!-- Interno -->
                        <div>
                            <?php echo e(Form::label('interno', 'Interno')); ?>

                            <?php echo e(Form::selectRange('interno', 1, 508, ['id' => 'interno'])); ?>

                        </div>
                        <!-- Piano -->
                        <div>
                            <?php echo e(Form::label('piano', 'Piano')); ?>

                            <?php echo e(Form::selectRange('piano', 0, 127, ['id' => 'piano'])); ?>

                        </div>
                    </fieldset>

                    <fieldset title="Inserisci i costi"  class="fieldset">
                        <legend><h2>Costi:</h2></legend>
                        <!-- Canone di affitto -->
                        <div class="item">
                            <?php echo e(Form::label('canoneAffitto', 'Canone di affitto')); ?>

                            <?php echo e(Form::text('canoneAffitto', '', ['id' => 'canoneAffitto'])); ?>

                        </div>
                        <!-- Utenze -->
                        <div class="item">
                            <?php echo e(Form::label('utenze', 'Utenze')); ?>

                            <?php echo e(Form::text('utenze', '', ['id' => 'utenze'])); ?>

                        </div>
                    </fieldset>

                    <!-- Descrizione -->
                    <fieldset title="Inserisci una desrizione" class="fieldset">
                        <legend><h2>Descrizione</h2></legend>
                        <?php echo e(Form::textarea('descrizione', '' , ['id' => 'descrizione', 'rows' => 3, 'placeholder' => 'Inserisci una descrizione...'])); ?>

                    </fieldset>

                    <!-- Immagine alloggio -->
                    <fieldset title="Inserisci una foto dell'alloggio" class="fieldset">
                        <legend><h2>Inserisci una foto dell'alloggio</h2></legend>
                        <?php echo e(Form::file('immagine', ['id' => 'immagine'])); ?>

                    </fieldset>

                </div>

        </section>

        <section class="ultimo-box">
            
            <?php echo e(Form::submit('Conferma inserimento', ['class' => 'bottone', 'id' => 'sub_btn','onclick' => "return confirm('Sei sicuro di voler proseguire?')"])); ?>


            
            <button class="bottone" onclick="document.getElementById('inserisci-annuncio').reset()">Svuota campi</button>
        </section>

        <?php echo e(Form::close()); ?>

    </main>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\Università\Terzo anno\Tecnologie web\Tecnologie-Web-2022\laraProj5\resources\views/alloggio/inserisci-annuncio.blade.php ENDPATH**/ ?>