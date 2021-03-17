$(window).on('load resize', function(){
    if($(window).width() > 1365) {
        setTimeout(function(){
            $('body').removeClass('pre');
            $('#lottie').fadeOut(300);
            $('.top-section').addClass('active');
        }, 800);
        $(function() {
            $.scrollify({
                section : 'section',
                offset: 2,
                updateHash: true,
                interstitialSection: 'footer, .last-section',
                standardScrollElements: '.legacies .top-section',
                before: function () {
                    $.scrollify.current().addClass('active');
                },
                after: function () {
                    $.scrollify.current().addClass('active');
                }
            });
            $('.down-btn').click(function(){
                $.scrollify.move("#leader-section");
            });
        });
    } else {
        $.scrollify.disable({updateHash: false, setHeights: false});
    }
});
