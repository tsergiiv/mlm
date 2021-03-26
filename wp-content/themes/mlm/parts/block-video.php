<?php
	$posts = get_posts(array(
	    'post_type' => 'work',
	));

	foreach ($posts as $post) {
	    setup_postdata($post);

	    ?>

		<div class="section-title border-bot-default">
			<div class="container">
				<h2 class="bebas-bold"><?= the_field('title') ?></h2>
				<div class="video-section__lenght flex ml-auto">
                    <?= the_field('video_duration') ?>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="video-section__description">
                <?= the_field('text') ?>
			</div>
			<div class="video-section__all ml-auto">
				<div class="video-section__frame ml-auto">
					<img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/videocover.jpg">
				</div>
				<div class="video-btn">
					<div class="video-btn__icon"></div>
				</div>
			</div>
		</div>

		<?php
	}

	wp_reset_postdata();
?>

<?php
	$posts = get_posts(array(
	    'post_type' => 'common',
	));

	foreach ($posts as $post) {
	    setup_postdata($post);

	    ?>

		<div class="section-botrow border-top-default flex">
			<div class="container">
				<a href="<?= the_field('about_link') ?>" target="_blank" class="link-arrow arrow-dark flex ml-auto">
					<span><?= the_field('about_text') ?></span>
					<img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/link-arrow.svg">
				</a>
			</div>
		</div>

	    <?php
	}

	wp_reset_postdata();
?>
