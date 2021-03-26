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
    $('body').on('click', '.video-btn', function(e){
        $(document).find('#modal-video').fadeIn(300);
        $('body').addClass('modal-open');
        $('<div class="backdrop"></div>').hide().appendTo('body').fadeIn(300);
        e.preventDefault();
    });
    $('body').on('click', '.backdrop', function(){
        $('body').removeClass('modal-open');
        $(document).find('.modal').fadeOut(300);
        $(this).fadeOut(300, function(){$(this).remove();});
        $('iframe').attr('src', $('iframe').attr('src'));
    });
    $('body').on('click', '.modal-close', function(e){
        $('body').removeClass('modal-open');
        $('.backdrop').fadeOut(300);
        $(this).parents('.modal').fadeOut(300);
        $('iframe').attr('src', $('iframe').attr('src'));
        e.preventDefault();
    });
});
$(window).on('load resize', function(){
    $('#lottie').fadeOut(300);
});
