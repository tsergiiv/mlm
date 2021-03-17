$(document).ready(function () {
    setTimeout(function(){
        $('body').removeClass('pre');
        $('#lottie').fadeOut(300);
        $('.top-section').addClass('active');
    }, 800);
    $('.nav-btn').click(function () {
        $(this).toggleClass('active');
        $('body').toggleClass('overflow-h');
        $('.nav-menu').toggleClass('active');
    });
    $(window).scroll(function() {
        $('section, footer').each(function(){
            var hT = $(this).offset().top,
                hH = $(this).outerHeight(),
                wH = $(window).height(),
                wS = $(window).scrollTop();
            if (wS > (hT+hH-wH-300)){
                $(this).addClass('active');
            }
        });
        let hostelsOwl = $('#hostels-carousel');
        if($('.hostels-section').hasClass('active')) {
            hostelsOwl.find('.owl-item.active .hostels-carousel__item img').each(function(){
                let imgHeight = $(this).height();
                $(this).parent().height(imgHeight);
            });
        }
    });
});
$(window).on('load resize', function(){
    $('#lottie').fadeOut(300);
});
