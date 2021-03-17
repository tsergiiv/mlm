$(document).ready(function (){
    let aboutOwl = $('#about-carousel');
    aboutOwl.owlCarousel({
        items: 1,
        dots: true,
        dotsData: true,
        nav: false,
        mouseDrag: false,
        margin: 40,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        autoplay: true,
        autoplayTimeout: 3000
    });
    $('.about-prev').click(function() {
        aboutOwl.trigger('prev.owl.carousel');
    });
    $('.about-next').click(function() {
        aboutOwl.trigger('next.owl.carousel');
    });
    aboutOwl.on('translate.owl.carousel', function(e){
        let carousel = e.relatedTarget;
        aboutOwl.parents('.about-section').find('.about-next > div').removeClass().addClass('slide-' + (carousel.relative(carousel.current())));
    });

    let hostelsOwl = $('#hostels-carousel');
    hostelsOwl.on('initialize.owl.carousel resized.owl.carousel changed.owl.carousel', function(e) {
        if (!e.namespace)  {
            return;
        }
        let carousel = e.relatedTarget
        if($(window).width() > 1365) {
            $('.slider-counter').html(
                '<span>Показано ' + (carousel.relative(carousel.current()) + 4) + '</span>&nbsp;из ' + carousel.items().length + ' фото'
            );
        } else if($(window).width() > 991 && $(window).width() < 1365) {
            $('.slider-counter').html(
                '<span>Показано ' + (carousel.relative(carousel.current()) + 3) + '</span>&nbsp;из ' + carousel.items().length + ' фото'
            );
        } else if($(window).width() > 767 && $(window).width() < 992) {
            $('.slider-counter').html(
                '<span>Показано ' + (carousel.relative(carousel.current()) + 1) + '</span>&nbsp;из ' + carousel.items().length + ' фото'
            );
            hostelsOwl.find('.hostels-carousel__item').attr('data-merge', 3.18);
        } else if($(window).width() > 551 && $(window).width() < 768) {
            hostelsOwl.find('.hostels-carousel__item').attr('data-merge', 2.713);
        } else if($(window).width() > 0 && $(window).width() < 552) {
            $('.slider-counter').html(
                '<span>Показано ' + (carousel.relative(carousel.current()) + 1) + '</span>&nbsp;из ' + carousel.items().length + ' фото'
            );
            hostelsOwl.find('.hostels-carousel__item').attr('data-merge', 4.6);
        }
    }).owlCarousel({
        dots: false,
        nav: false,
        mouseDrag: false,
        margin: 40,
        responsive: {
            1366: {
                items: 4,
                slideBy: 4,
            },
            992: {
                items: 3,
                slideBy: 3,
                margin: 24,
                merge: false
            },
            768: {
                items: 4,
                slideBy: 1,
                margin: 52,
                merge: true,
                mergeFit: false
            },
            552: {
                items: 4,
                slideBy: 1,
                margin: 32,
                merge: true,
                mergeFit: false
            },
            320: {
                items: 4,
                slideBy: 1,
                margin: 16,
                merge: true,
                mergeFit: false
            }
        }
    });
    $('.hostels-prev').click(function() {
        hostelsOwl.on('translate.owl.carousel', function(e){
            let carousel = e.relatedTarget;
            hostelsOwl.parents('.hostels-section').find('.owl-custom-nav').removeClass('slide-' + (carousel.relative(carousel.current()) / 4 + 1));
        }).trigger('prev.owl.carousel');
    });
    $('.hostels-next').click(function() {
        hostelsOwl.on('translated.owl.carousel', function(){
            hostelsOwl.find('.hostels-carousel__item img').each(function(){
                let imgHeight = $(this).height();
                let parentWrap = $(this).parents('.owl-item');
                if($(parentWrap).hasClass('active')) {
                    $(this).parent().height(imgHeight);
                }
            });
        });
        hostelsOwl.on('translate.owl.carousel', function(e){
            let carousel = e.relatedTarget;
            hostelsOwl.parents('.hostels-section').find('.owl-custom-nav').addClass('slide-' + (carousel.relative(carousel.current()) / 4));
        }).trigger('next.owl.carousel');
    });
    let reviewsOwl = $('#reviews-carousel');
    reviewsOwl.owlCarousel({
        items: 1,
        dots: false,
        nav: false,
        mouseDrag: false,
        margin: 40,
        animateOut: 'fadeOut'
    });
    $('.reviews-prev').click(function() {
        reviewsOwl.on('translate.owl.carousel', function(e){
            let carousel = e.relatedTarget;
            reviewsOwl.parents('.reviews-section').find('.owl-custom-nav').removeClass('slide-' + (carousel.relative(carousel.current()) + 1));
        }).trigger('prev.owl.carousel');
    });
    $('.reviews-next').click(function() {
        reviewsOwl.on('translate.owl.carousel', function(e){
            let carousel = e.relatedTarget;
            reviewsOwl.parents('.reviews-section').find('.owl-custom-nav').addClass('slide-' + (carousel.relative(carousel.current())));
        }).trigger('next.owl.carousel');
    });
    $(window).scroll(function() {
        let hostelsOwl = $('#hostels-carousel');
        if($('.hostels-section').hasClass('active')) {
            hostelsOwl.find('.owl-item.active .hostels-carousel__item img').each(function(){
                let imgHeight = $(this).height();
                $(this).parent().height(imgHeight);
            });
        }
    });
});
