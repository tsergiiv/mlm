<?php
$posts = get_posts(array(
    'post_type' => 'about',
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
		<div id="about-carousel" class="owl-carousel">
			<div class="about-carousel__item flex" data-dot="<button>2019</button>">
				<div class="about-item__img first-map">
					<img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/map.png">
				</div>
			</div>
			<div class="about-carousel__item flex" data-dot="<button>2020</button>">
				<div class="about-item__img">
					<img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/map.png">
					<img class="map-sm" alt="" src="<?php bloginfo('template_url'); ?>/assets/img/map-1.png">
					<div class="countries">
						<div class="country ukraine-1"></div>
					</div>
				</div>
			</div>
			<div class="about-carousel__item flex" data-dot="<button>2021</button>">
				<div class="about-item__img">
					<img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/map.png">
					<img class="map-sm" alt="" src="<?php bloginfo('template_url'); ?>/assets/img/map-2.png">
					<div class="countries">
						<div class="country ukraine-1 c-static"></div>
						<div class="country ukraine-2"></div>
						<div class="country ukraine-3"></div>
					</div>
				</div>
			</div>
			<div class="about-carousel__item flex" data-dot="<button>2022</button>">
				<div class="about-item__img">
					<img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/map.png">
					<img class="map-sm" alt="" src="<?php bloginfo('template_url'); ?>/assets/img/map-3.png">
					<div class="countries">
						<div class="country ukraine-1 c-static"></div>
						<div class="country ukraine-2 c-static"></div>
						<div class="country ukraine-3 c-static"></div>
						<div class="country europe-1"></div>
						<div class="country europe-2"></div>
						<div class="country europe-3"></div>
						<div class="country europe-4"></div>
						<div class="country europe-5"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="about-item__description">
			<div class="about-item__text">
                <?= the_field('text') ?>
			</div>
			<div class="about-item__cols flex">
				<div class="about-item__col">
					<span class="bebas-bold"><?= the_field('first_block_number') ?></span>
                    <?= the_field('first_block_text') ?>
				</div>
				<div class="about-item__col">
					<span class="bebas-bold"><?= the_field('second_block_number') ?></span>
                    <?= the_field('second_block_text') ?>
				</div>
				<div class="col-divider"></div>
				<div class="about-item__col">
					<span class="bebas-bold"><?= the_field('third_block_number') ?></span>
                    <?= the_field('third_block_text') ?>
				</div>
				<div class="about-item__col">
					<span class="bebas-bold"><?= the_field('fourth_block_number') ?></span>
                    <?= the_field('fourth_block_text') ?>
				</div>
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
				<div class="owl-custom-nav flex">
					<div class="about-prev flex"><img alt="prev" src="<?php bloginfo('template_url'); ?>/assets/img/slider-arrow.svg"></div>
					<div class="about-next flex">
						<div>
							<img alt="next" src="<?php bloginfo('template_url'); ?>/assets/img/slider-arrow.svg">
							<div class="btn-corner corner-1"></div>
							<div class="btn-corner corner-2"></div>
							<div class="btn-corner corner-3"></div>
							<div class="btn-corner corner-4"></div>
						</div>
					</div>
				</div>
				<a href="<?= the_field('about_link') ?>" target="_blank" class="link-arrow arrow-dark flex">
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
