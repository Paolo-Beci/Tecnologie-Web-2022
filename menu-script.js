let menuLink = document.querySelectorAll('.menu li')

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

  function headerScroll(){

    var header = $('header');

    var scroll = $(window).scrollTop();

    if (scroll > parseFloat(header.css('height')))
        header.addClass('header-scroll header-scroll-anim');
    else if (scroll < parseFloat(header.css('height')) - 20)
        header.removeClass('header-anim header-scroll header-scroll-anim');

  }

function navLinksScroll(){

    var scrollPos = $(window).scrollTop();

    $('nav a').each(function () {

        var currLink = $(this);
        var refElement = $(currLink.attr("href"));

        if (refElement.position().top <= scrollPos + 100) {
            $('header a').removeClass("active");
            currLink.addClass("active");
        }

    });

}