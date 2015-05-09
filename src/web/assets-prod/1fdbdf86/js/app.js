$(document).ready(function () {
    
    /* smooth scrolling for scroll to top */
    $('.scroll-top').click(function () {
        $('body,html').animate({scrollTop: 0}, 1000);
    })

    /* highlight the top nav as scrolling occurs */
    $('body').scrollspy({target: '#navbar'})

    window.onresize = function () {
        $("canvas").width($(window).width());
    };

    $(document).bind('touchmove', function () {
        $("canvas").css(
            "-webkit-transform",
            "translatey(-" + $(window).scrollTop() + "px)");
    });

    $(document).bind('touchend', function () {
        $("canvas").css(
            "-webkit-transform",
            "translatey(-" + $(window).scrollTop() + "px)");
    });
});
