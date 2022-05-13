var menuLink = document.querySelectorAll('.menu li')

menuLink.forEach((menuLi) => {
    
    menuLi.addEventListener("click", (e) => {
        if(!menuLi.classList.contains('active')){
            menuLink.forEach((li) => {
                li.querySelector('a').classList.remove('active')
            })
            menuLi.querySelector('a').classList.add('active')
        }
    });
});

$(window).scroll(function(){

    headerScroll();

    navLinksScroll();

});

var lastScroll = 0;

function headerScroll(){

    let header = $('header');

    let scroll = $(window).scrollTop();

    if (lastScroll < scroll && scroll > parseFloat(header.css('height')) + 20)
        header.addClass('header-scroll header-scroll-anim');
    
    if (lastScroll > scroll && scroll < (parseFloat(header.css('height')) + 50))
        header.removeClass('header-anim header-scroll header-scroll-anim');

    lastScroll = scroll;

}

function navLinksScroll(){

    let scrollPos = $(window).scrollTop();

    $('.menu a').each(function () {

        let currLink = $(this);
        let refElement = $(currLink.attr("href"));

        if (refElement.position().top <= scrollPos + 100 &&
            refElement.position().top + refElement.height() > scrollPos + 100) {
            if(!currLink.hasClass('active')){
                $('.menu a').removeClass('active change-color-anim');
                currLink.addClass('active change-color-anim');
            }
        }

    });

}