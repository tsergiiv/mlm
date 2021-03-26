<?php
$posts = get_posts(array(
    'numberposts' => -1,
    'post_type'   => 'hotel',
));

foreach ($posts as $post) {
    setup_postdata($post);

    ?>

	<div class="hostels-carousel__item flex">
		<div class="hostels-item__img">
			<img alt="" src="<?= the_field('image') ?>">
		</div>
		<div class="hostels-item__title bebas-normal">
            <?= the_field('caption') ?>
		</div>
	</div>

	<?php
}

wp_reset_postdata();
?>