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
    var header = $('header'),
        scroll = $(window).scrollTop();
  
    if (scroll >= 200)
        header.addClass('header-scroll');
    else
        header.removeClass('header-scroll');
  });