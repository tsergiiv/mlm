<script>
    $(document).ready(function() {
        let url = '<?= get_option('site_url') ?>/api/landing/auth';

        $.ajax({
            url: url,
            dataType: 'json',
            type: 'post',
            success: function( data ){
                console.log(data);
                if (data['auth']) {
                    let container = '.account-logged';

                    // place data
                    $(container + ' .name').text(data['first_name'] + " " + data['last_name']);
                    $(container + ' .status').text(data['status']);

                    let avatar = data['avatar'] ? data['avatar'] : '/landing-assets/img/default-avatar.png';

                    $(container + ' #avatar').attr('src', avatar);

                    // hide buttons, show avatar
                    $(container).removeClass('d-none');
                    $('.account-empty').addClass('d-none');
                }
            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.log( errorThrown );
            }
        });
    });
</script>