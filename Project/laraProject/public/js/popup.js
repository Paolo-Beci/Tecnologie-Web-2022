$('.popup-caller').on('click', function(){

    $('.popup').css('display', 'block');

    let id = $(this).attr('id');

    $("[data-popup-content='" + id + "']").css('display', 'block');

})

$('.close').on('click', function(){

    $('[data-popup-content]').css('display', 'none');

    $('.popup').css('display', 'none');

})
