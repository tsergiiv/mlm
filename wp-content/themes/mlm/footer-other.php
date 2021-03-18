	<?= get_template_part('parts/footer') ?>

    <?php wp_footer(); ?>

	<script type="text/javascript">
        jQuery(document).ready(function() {
            let url = '<?= get_option('site_url') ?>/api/business';
            let business_id = '<?= get_option('business_id') ?>';
            getPackages(url, business_id);
        });
    </script>

    <?= get_template_part('parts/avatar') ?>

</body>
</html>
