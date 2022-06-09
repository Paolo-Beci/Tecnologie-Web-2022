$(function () {
    $('div.alloggio').on('click', function () {
        if(typeof $(this).data('href') !== 'undefined')
            window.location.href = $(this).data('href');
    });
});
