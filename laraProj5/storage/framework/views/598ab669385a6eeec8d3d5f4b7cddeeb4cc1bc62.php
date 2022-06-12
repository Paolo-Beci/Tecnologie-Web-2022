<main id="content-home-locatore" class="content-home-locatore">
    <article>
        <p class="titolo">Dai un'occhiata agli ultimi annunci!</p>
    </article>
    <section class="gestisci-alloggi">
        <div>
            <div>
                <p class="titolo-paragrafo1">Gestisci i tuoi alloggi</p>
                <p class="testo-paragrafo1">Puoi inserirne di nuovi, modificare quelli già esistenti<br>
                    e cancellare quelli che non desideri più affittare!</p>
            </div>
        </div>
        <div class="immagine-paragrafo1">
            <img src="<?php echo e(asset('images/gestione_image.jpg')); ?>" alt="Immagine 1" width="80%">
        </div>
    </section>
    <section class="scopri-servizio">
        <div class="immagine-paragrafo2">
            <img src="<?php echo e(asset('images/messaging_image.jpg')); ?>" alt="Immagine 2" width="80%">
        </div>
        <div>
            <div>
                <p class="titolo-paragrafo2">Scopri il nostro servizio di messaggistica!</p>
                <p class="testo-paragrafo2">Con il nostro sistema di messaggistica potrai visualizzare tutti i messaggi
                    ricevuti dai clienti interessati ai tuoi alloggi e rispondere chiarendo
                    ogni loro eventuale dubbio.</p>
            </div>
        </div>
    </section>
    <?php if(isset($faq)): ?>
        <?php echo $__env->make('helpers.faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
</main>
<?php /**PATH C:\Users\DELL\Desktop\Università\Terzo anno\Tecnologie web\Tecnologie-Web-2022\laraProj5\resources\views/home/home-locatore.blade.php ENDPATH**/ ?>