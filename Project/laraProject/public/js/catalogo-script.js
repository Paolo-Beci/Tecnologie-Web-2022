$('.appartamenti-button').on('click', function(){

    $('.appartamenti').addClass('visible');

    $('.posti-letto').removeClass('visible');

});

$('.posti-letto-button').on('click', function(){

    $('.posti-letto').addClass('visible');

    $('.appartamenti').removeClass('visible');

});