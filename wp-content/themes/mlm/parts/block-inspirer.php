<?php
	$posts = get_posts(array(
	    'post_type'   => 'inspirer',
	));

	foreach ($posts as $post) {
	    setup_postdata($post);

	    ?>

		<div class="section-title border-bot-default">
			<div class="container">
				<h2 class="bebas-bold"><?= the_field('title') ?></h2>
			</div>
		</div>
		<div class="container">
			<div class="leader-section__left">
				<div class="leader-left__img">
					<img alt="<?= the_field('full_name') ?>" src="<?= the_field('photo') ?>">
					<div class="leader-left__name bebas-bold">
                        <?= the_field('full_name') ?>
					</div>
				</div>
			</div>
			<div class="leader-section__right ml-auto">
				<div class="leader-right__title flex">
					<img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/quotes.png">
					<div class="bebas-normal">
                        <?= the_field('quote_title') ?>
					</div>
				</div>
				<div class="leader-right__description">
                    <?= the_field('quote') ?>
				</div>
				<div class="leader-right__cols flex">
					<a target="_blank" href="<?= the_field('linkedin') ?>" class="leader-right__col flex">
						<img alt="Linkedin" src="<?php bloginfo('template_url'); ?>/assets/img/linkedin.png">
						<div class="link-arrow flex w-100">
							<span>Linkedin</span>
							<svg width="40" height="40" viewBox="0 0 40 40" fill="none"
							     xmlns="http://www.w3.org/2000/svg">
								<circle cx="20" cy="20" r="20" fill="#fff"/>
								<path d="M14.9843 26.0062L23.946 17.0444L24.0933 23.6959L25.8702 23.7352L25.6557 14.0503L15.9707 13.8357L16.0101 15.6126L22.6615 15.76L13.6998 24.7217L14.9843 26.0062Z"
								      fill="#353F4B"/>
							</svg>
						</div>
					</a>
					<a target="_blank" href="<?= the_field('facebook') ?>" class="leader-right__col flex">
						<img alt="Facebook" src="<?php bloginfo('template_url'); ?>/assets/img/facebook.png">
						<div class="link-arrow flex w-100">
							<span>Facebook</span>
							<svg width="40" height="40" viewBox="0 0 40 40" fill="none"
							     xmlns="http://www.w3.org/2000/svg">
								<circle cx="20" cy="20" r="20" fill="#fff"/>
								<path d="M14.9843 26.0062L23.946 17.0444L24.0933 23.6959L25.8702 23.7352L25.6557 14.0503L15.9707 13.8357L16.0101 15.6126L22.6615 15.76L13.6998 24.7217L14.9843 26.0062Z"
								      fill="#353F4B"/>
							</svg>
						</div>
					</a>
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

		<div class="section-botrow border-top-default border-bot-default flex">
			<div class="container">
				<div class="video-btn video-btn__blue">
					<div class="video-btn__icon"></div>
					<span><?= the_field('video_text') ?></span>
				</div>
				<a href="<?= the_field('about_link') ?>" target="_blank" class="link-arrow flex">
					<span><?= the_field('about_text') ?></span>
					<span>О компании</span>
					<img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/link-arrow.svg">
				</a>
			</div>
		</div>

	    <?php
	}

	wp_reset_postdata();
?>
