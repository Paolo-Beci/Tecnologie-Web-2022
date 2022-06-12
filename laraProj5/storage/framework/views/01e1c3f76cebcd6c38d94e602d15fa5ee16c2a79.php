<section id="faq" class="faq">
    <h2>Hai dubbi o difficoltà?
        <br>
        Non preoccuparti!
    </h2>
    <p>Qui di seguito puoi trovare le più frequenti domande che gli utenti ci fanno!
    </p>
    <div class="faq-container">
        <?php $__currentLoopData = $faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $singleFaq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <article class="q-a">
                <p class="question"><?php echo $singleFaq->domanda; ?></p>
                <p class="answer"><?php echo $singleFaq->risposta; ?></p>
            </article>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section><?php /**PATH C:\Users\DELL\Desktop\Università\Terzo anno\Tecnologie web\Tecnologie-Web-2022\laraProj5\resources\views/helpers/faq.blade.php ENDPATH**/ ?>