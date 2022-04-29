$("form input").on("focus", function(){
    $(this).prev().addClass("focus");
    $(this).next().addClass("expand");
    $(".sign-up").addClass("test")
});

$("form input").on("blur", function(){
    if(this.value == "") {
        $(this).prev().removeClass("focus");
        $(this).next().removeClass("expand");
    }
});

$(".forms span a").click(function(){
    if($(this).data("form") == "toSignUp") {
        $(".circle-to-login").removeClass("circle-anim-down");
        $(".circle-to-sign-up").addClass("circle-anim-up");
        setTimeout(() => {fromLoginToSignUp()}, 500);
    } else {
        $(".circle-to-sign-up").removeClass("circle-anim-up");
        $(".circle-to-login").addClass("circle-anim-down");
        setTimeout(() => {fromSignUpToLogin()}, 500);
    }
})

function fromLoginToSignUp(){
    $(".login").removeClass("active-form");
    $(".login").addClass("inactive-form");
    $(".sign-up").removeClass("inactive-form");
    $(".sign-up").addClass("active-form");
}

function fromSignUpToLogin(){
    $(".sign-up").removeClass("active-form");
    $(".sign-up").addClass("inactive-form");
    $(".login").removeClass("inactive-form");
    $(".login").addClass("active-form");
}