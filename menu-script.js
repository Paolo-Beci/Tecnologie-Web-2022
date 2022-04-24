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