$(function () {
    $('div.alloggio').on('click', function () {
        window.location.href = $(this).data('href');
    });
});
