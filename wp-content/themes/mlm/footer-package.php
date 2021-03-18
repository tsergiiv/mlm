    <?= get_template_part('parts/footer') ?>

    <?php wp_footer(); ?>

    <script type="text/javascript">
        let templateUrl = '<?= get_bloginfo("template_url"); ?>';
        // console.log(templateUrl);

        let url = '<?= get_bloginfo("url"); ?>';
        // console.log(url);

        jQuery(document).ready(function() {
            let url = '<?= get_option('site_url') ?>/api/business';
            let business_id = '<?= get_option('business_id') ?>';
            getPackages(url, business_id);
        });

        function processPackages(json) {
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);

            const n = parseInt(urlParams.get('package')) - 1;

            let package = json[n];

            let package_name = package['package_name'];

            // replace package info with data
            $('#package-id').val(package['package_id']);
            $('.package-name').text(package_name);
            $('.package-profit').text(package['package_profit']);
            $('.package-price').text(package['package_price']);
            $('.package-n').text(n + 1);

            // show proper image
            let package_img = package_name.toLowerCase();
            $('.packages-col__number').css('background', 'url(' + templateUrl + '/assets/img/' + package_img + '-bg.svg) 0 0 / 100% no-repeat');
        }
    </script>

    </body>
</html>
