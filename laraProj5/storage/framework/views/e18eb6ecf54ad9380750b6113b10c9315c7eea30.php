<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="UTF-8">
    <title>Flatmate | Messagistica</title>
    <link rel="shortcut icon" href="<?php echo e(asset('images/favicon.ico')); ?>" type="image/x-icon">
    <link rel="icon" href="<?php echo e(asset('images/favicon.ico')); ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/messaging.css')); ?>">
    <script src="<?php echo e(asset('js/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/messaggistica.js')); ?>" defer></script>
    <script>
        $(function(){

            $("input[type=image]").on('click', function (event) {

                let route = "<?php echo e(route('send-message')); ?>";

                event.preventDefault();

                let form = $(this).parent();

                sendMessage(route, form);

            });

            $(".assign-form input[type=submit]").on('click', function (event) {

                let route = "<?php echo e(route('assegnamento')); ?>";

                event.preventDefault();

                let form = $(this).parent();

                sendMessage(route, form);

            });

        });
    </script>
</head>
<body>

    <section class="body-content">

        <article class="left-content">

            <?php

                if($usersPhoto[$authUser->id] == '')
                    $usersPhoto[$authUser->id] = 'no_image.png';

            ?>

            <div class="messaging-menu">
                <a href="<?php echo e(route('account-' . auth()->user()->ruolo)); ?>"><img src="<?php echo e(asset('images_profilo/' . $usersPhoto[$authUser->id])); ?>" alt="User"></a>
                <a href="<?php echo e(route('home-' . $authUser->ruolo)); ?>"><img src="<?php echo e(asset('images/icons_casa.png')); ?>" alt="Home"></a>
            </div>

            <div class="contacts">

                <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contacts_alloggio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php $__currentLoopData = $contacts_alloggio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php
                            $contact_username = array_search($contact, $contacts_alloggio);
                            $contact_id = $usernameIdUsers[$contact_username];

                            if($usersPhoto[$contact_id] == '')
                                $usersPhoto[$contact_id] = 'no_image.png';

                            $last_day_contact = $contact[array_key_first($contact)];
                            $last_message = $last_day_contact[array_key_first($last_day_contact)];
                        ?>

                        <div class="contact" data-contact="<?php echo e(array_search($contact, $contacts_alloggio)); ?>"
                                            data-alloggio="<?php echo e(array_search($contacts_alloggio, $contacts)); ?>">
                            <img src="<?php echo e(asset('images_profilo/' . $usersPhoto[$contact_id])); ?>" alt="Immagine di profilo">
                            <div class="preview">
                                <div class="preview-top">
                                    
                                    <span><?php echo e($contact_username); ?></span>
                                    <?php
                                        $alloggio = $alloggi->find(array_search($contacts_alloggio, $contacts));
                                        $alloggio_desc = $alloggio->citta . ', ' . $alloggio->via . ' ' .  $alloggio->num_civico;
                                        $alloggio_desc = substr($alloggio_desc, 0, 20) . '...';
                                    ?>

                                    <span class="alloggio-desc"><?php echo e($alloggio_desc); ?></span>
                                    <span class="datetime">
                                        <?php echo e(date('H:i', strtotime($last_message->data_invio))); ?>

                                    </span>
                                </div>
                                <div class="last-message"><?php echo strlen($last_message->contenuto) > 40 ?
                                        substr($last_message->contenuto, 0, 40) . '...' : $last_message->contenuto; ?></div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

        </article>

        <article class="right-content">
            <div class="chat-home" data-chat-contact="0">
                <img src="<?php echo e(asset('images/FlatMate_Logo.png')); ?>" alt="FlatMate Logo">
                <hr class="divider">
                <p class="description">
                    Benvenuto nella sezione di messaggistica di Flatmate.
                    <br>
                    Da qui puoi messagguare liberamente con gli altri utenti del portale!
                </p>
            </div>

        <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contacts_alloggio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php $__currentLoopData = $contacts_alloggio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php
                    $contact_username = array_search($contact, $contacts_alloggio);
                    $contact_alloggio = array_search($contacts_alloggio, $contacts);
                ?>

                <div class="chat" data-chat-contact="<?php echo e($contact_username); ?>" data-chat-alloggio="<?php echo e($contact_alloggio); ?>">

                    <div class="chat-top-bar">
                        <div>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isLocatore')): ?>
                                <a href="<?php echo e(route('show-locatario', [$usernameIdUsers[$contact_username]])); ?>">
                                    <img src="" alt="User">
                                    <span><?php echo e(array_search($contact, $contacts_alloggio)); ?></span>
                                </a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isLocatario')): ?>
                                <a>
                                    <img src="" alt="User">
                                    <span><?php echo e(array_search($contact, $contacts_alloggio)); ?></span>
                                </a>
                            <?php endif; ?>
                        </div>

                        <?php
                            $alloggio = $alloggi->find(array_search($contacts_alloggio, $contacts));
                        ?>

                        <?php if($authUser->ruolo == 'locatario'): ?>
                            <a href="<?php echo e(route('dettagli-alloggio-locatario', [$alloggio->id_alloggio, $alloggio->tipologia])); ?>">
                        <?php else: ?>
                            <a href="<?php echo e(route('gestione-alloggi')); ?>">
                        <?php endif; ?>
                            <span><?php echo e(str_replace('_', ' ', $alloggio->tipologia)); ?> situato in <?php echo e($alloggio->via . ' ' .  $alloggio->num_civico . ', '
                                . $alloggio->citta . ' ' . $alloggio->cap); ?>

                            </span>
                        </a>
                    </div>

                    <div class="chat-content">

                        <?php $__currentLoopData = array_reverse($contact); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day_contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="day-chat">

                                <div class="date"><?php echo e(array_search($day_contact, $contact)); ?></div>

                                <?php
                                    $day_contact = array_reverse($day_contact);
                                ?>

                                <?php while(!empty($day_contact)): ?>

                                    <?php if(current($day_contact)->mittente == $authUser->username): ?>

                                        <div class="sent-container">

                                            <?php $__currentLoopData = $day_contact; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <?php if($message->mittente == $authUser->username): ?>
                                                    <div class="sent">
                                                        <span class="chat-text"><?php echo $message->contenuto; ?></span>
                                                        <div class="chat-extra">
                                                            <span class="time"><?php echo e(date('H:i', strtotime($message->data_invio))); ?></span>
                                                        </div>
                                                    </div>
                                                    <?php
                                                        $key = array_search($message, $day_contact);
                                                        unset($day_contact[$key]);
                                                    ?>
                                                <?php else: ?>
                                                    <?php break; ?>
                                                <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </div>
                                    <?php else: ?>

                                        <div class="received-container">

                                            <?php $__currentLoopData = $day_contact; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <?php if($message->mittente != $authUser->username): ?>

                                                    <div class="received">
                                                        <span class="chat-text">
                                                            <?php echo $message->contenuto; ?>

                                                            <?php if($message->contenuto == '<span>Ti è stato assegnato questo alloggio!</span>'): ?>

                                                            <?php echo e(Form::open(array('route' => 'contratto'))); ?>

                                                                <?php echo e(Form::hidden('locatore', $usernameIdUsers[$contact_username])); ?>

                                                                <?php echo e(Form::hidden('locatario', $authUser->id)); ?>

                                                                <?php echo e(Form::hidden('alloggio', $contact_alloggio)); ?>

                                                                <button type="submit" class="contract-button">Visualizza Contratto</button>
                                                            <?php echo e(Form::close()); ?>


                                                            <?php endif; ?>
                                                        </span>
                                                        <div class="chat-extra">
                                                            <span class="time"><?php echo e(date('H:i', strtotime($message->data_invio))); ?></span>
                                                        </div>
                                                    </div>
                                                    <?php
                                                        $key = array_search($message, $day_contact);
                                                        unset($day_contact[$key]);
                                                    ?>

                                                <?php else: ?>
                                                    <?php break; ?>
                                                <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php endif; ?>

                                <?php endwhile; ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                    <div class="chat-bottom-bar">

                        <?php if($authUser->ruolo == 'locatore' && $alloggio->stato == 'libero'): ?>
                            <?php echo e(Form::open(array('route' => 'assegnamento', 'class' => 'assign-form'))); ?>

                                <?php echo e(Form::hidden('contenuto', '<span>Ti è stato assegnato questo alloggio!</span>')); ?>

                                <?php echo e(Form::hidden('mittente', $authUser->id)); ?>

                                <?php echo e(Form::hidden('destinatario', $usernameIdUsers[$contact_username])); ?>

                                <?php echo e(Form::hidden('alloggio', $contact_alloggio)); ?>

                                <?php echo e(Form::submit('Assegna', ['id' => 'assign-submit'])); ?>

                            <?php echo e(Form::close()); ?>

                        <?php endif; ?>

                        <?php echo e(Form::open(array('route' => 'send-message', 'class' => 'send-message'))); ?>

                            <?php echo e(Form::text('contenuto', '', ['placeholder' => 'Scrivi un messaggio'])); ?>

                            <?php echo e(Form::hidden('mittente', $authUser->id)); ?>

                            <?php echo e(Form::hidden('destinatario', $usernameIdUsers[$contact_username])); ?>

                            <?php echo e(Form::hidden('alloggio', $contact_alloggio)); ?>

                            <input type="image" src="<?php echo e(asset('images/send-button.png')); ?>" alt="Invia messaggio">
                        <?php echo e(Form::close()); ?>


                    </div>

                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </article>
    </section>
</body>
</html>
<?php /**PATH C:\Users\DELL\Desktop\Università\Terzo anno\Tecnologie web\Tecnologie-Web-2022\laraProj5\resources\views/messaging.blade.php ENDPATH**/ ?>