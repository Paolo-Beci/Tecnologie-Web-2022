$('.contact').on('click', function(){

    let contact = $(this).data('contact');

    let alloggio = $(this).data('alloggio');

    $("[data-chat-contact]").each(function(){
            $(this).css('display', 'none');
    })

    $("[data-chat-contact='" + contact + "'][data-chat-alloggio='" + alloggio + "']").css('display', 'block');

})