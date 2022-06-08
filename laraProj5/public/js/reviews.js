$(function () {
    $('.review').on('click', function(){

        let step = $(this).data('review')

        $('.right-review').each(function(){

            let reviewStep = $(this).data('review');

            if(reviewStep == step)
                $(this).addClass('active-review');
            else
                $(this).removeClass('active-review');
        });
            
    });
});