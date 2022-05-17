$('.select-button-appartamenti').on('click', function(){

    $('.item-inserzione').each(function(){
        if(this.hasAttribute('data-appartamento'))
            $(this).addClass('visible');
        else
            $(this).removeClass('visible');
    });

});

$('.select-button-posti-letto').on('click', function(){

    $('.item-inserzione').each(function(){
        if(this.hasAttribute('data-posto-letto'))
            $(this).addClass('visible');
        else
            $(this).removeClass('visible');
    });

});