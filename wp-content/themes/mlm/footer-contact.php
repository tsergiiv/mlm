    <?= get_template_part('parts/footer') ?>

    <?php wp_footer(); ?>

    <script>
        $(document).ready(function () {
            let body = $('body');
            body.on('click', '.dropdown-control', function () {
                if ($(this).hasClass('active')) {
                    $(this).removeClass('active');
                } else {
                    $('.dropdown-control').removeClass('active');
                    $(this).addClass('active');
                }
            });
            body.on('click', '.modal-close, .modal-backdrop', function () {
                $(body).removeClass('overflow-h');
                $('.modal').fadeOut(300);
            });
            body.on('click', '#contact-dropdown label', function () {
                let pickUser = $.trim($(this).children('.message-author').text());
                $('.select-default > span').html(pickUser);
                if ($(this).hasClass('other-theme')) {
                    $(this).parents().find('.form-other').removeClass('d-none');
                } else {
                    $(this).parents().find('.form-other').addClass('d-none');
                }
            }); 

            $('.modal-close').click(function () {
               location.reload();
            });

            $(document).on('click', function (e) {
                if (!$(e.target).is('.dropdown-control, .dropdown-control *')) {
                    $('.dropdown-control').removeClass('active');
                }
            });
        });
    </script>

    </body>
</html>
