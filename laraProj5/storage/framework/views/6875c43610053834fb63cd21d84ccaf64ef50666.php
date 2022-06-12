<?php if($paginator->lastPage() != 1): ?>
<div id="pagination" class="pagination">
    <?php echo e($paginator->firstItem()); ?> - <?php echo e($paginator->lastItem()); ?> di <?php echo e($paginator->total()); ?> ---

    <!-- Link alla prima pagina -->
    <?php if(!$paginator->onFirstPage()): ?>
        <a id="bottone" href="<?php echo e($paginator->url(1)); ?>">Inizio</a> |
    <?php else: ?>
        Inizio |
    <?php endif; ?>

    <!-- Link alla pagina precedente -->
    <?php if($paginator->currentPage() != 1): ?>
        <a id="bottone" href="<?php echo e($paginator->previousPageUrl()); ?>">&lt; Precedente</a> |
    <?php else: ?>
        &lt; Precedente |
    <?php endif; ?>

    <!-- Link alla pagina successiva -->
    <?php if($paginator->hasMorePages()): ?>
        <a id="bottone" href="<?php echo e($paginator->nextPageUrl()); ?>">Successivo &gt;</a> |
    <?php else: ?>
        Successivo &gt; |
    <?php endif; ?>

    <!-- Link all'ultima pagina -->
    <?php if($paginator->hasMorePages()): ?>
        <a id="bottone" href="<?php echo e($paginator->url($paginator->lastPage())); ?>">Fine</a>
    <?php else: ?>
        Fine
    <?php endif; ?>
</div>
<?php endif; ?>
<?php /**PATH C:\Users\DELL\Desktop\Università\Terzo anno\Tecnologie web\Tecnologie-Web-2022\laraProj5\resources\views/pagination/paginator.blade.php ENDPATH**/ ?>