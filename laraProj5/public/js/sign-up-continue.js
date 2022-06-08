$(function () {
    $('input').on('focus', function(){
        $(this).parent().addClass("underline-active");
    });

    $('input').on('blur', function(){
        if(this.value == "") {
            $(this).parent().removeClass("underline-active");
        }
    });

    var step = $('.active').data('step');

    $('button').on('click', function(){
        if(this.hasAttribute('data-next'))
            step++;
        else if(this.hasAttribute('data-previous'))
            step--;

        $('.sign-up-step').each(function(){
            let formStep = $(this).data('step');
            if(formStep == step){
                $(this).addClass('active');
                setTimeout(() => {$(this).addClass('active-anim')}, 0);
                
            }
            else
                $(this).removeClass('active active-anim');
        });
            
    });
});