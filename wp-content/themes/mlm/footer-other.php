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
    </script>

</body>
</html>
