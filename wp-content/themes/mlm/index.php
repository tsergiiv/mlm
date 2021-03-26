<?php get_header(); ?>

        <div class="top-section__wrapper">

            <?php
            $posts = get_posts(array(
                'post_type' => 'index_top',
            ));

            foreach ($posts as $post) {
                setup_postdata($post);

                ?>

	            <div class="container">
		            <div class="top-title">
                        <?= the_field('title') ?>
			            <span><?= the_field('subtitle') ?></span>
			            <a href="<?= get_bloginfo("url"); ?>/packages" class="btn-default btn-blue">
				            <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/work.svg">
				            <span><?= the_field('button_text') ?></span>
			            </a>
		            </div>
	            </div>
	            <div class="top-steps flex border-top-default w-100">
		            <div class="container">
			            <ul>
				            <li>
					            <span class="bebas-bold">01</span>
                                <?= the_field('first_step_text') ?>
				            </li>
				            <li class="top-steps__arrow"><img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/arrow.svg"></li>
				            <li>
					            <span class="bebas-bold">02</span>
                                <?= the_field('second_step_text') ?>
				            </li>
				            <li class="top-steps__arrow"><img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/arrow.svg"></li>
				            <li>
					            <span class="bebas-bold">03</span>
                                <?= the_field('third_step_text') ?>
				            </li>
				            <li class="top-steps__arrow"><img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/arrow.svg"></li>
				            <li>
					            <span class="bebas-bold">04</span>
                                <?= the_field('fourth_step_text') ?>
				            </li>
			            </ul>
		            </div>
	            </div>
	            <div class="top-bg">
		            <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/villa.png">
	            </div>

                <?php
            }

            wp_reset_postdata();
            ?>
        </div>
    </section>
    <!-- TOP SECTION END -->
    <!-- ABOUT SECTION -->
    <section class="about-section" data-section-name="about-section">
        <?= get_template_part('parts/block-about'); ?>
    </section>
    <!-- ABOUT SECTION END -->
    <!-- HOSTELS SECTION -->
    <section class="hostels-section" data-section-name="hostels-section">
        <div class="section-title border-bot-default">
            <div class="container">
                <h2 class="bebas-bold">Наши отели</h2>
                <span class="ml-auto flex">UNEED Friendly Hostel</span>
            </div>
        </div>
        <div class="container">
            <div id="hostels-carousel" class="owl-carousel">
                <?= get_template_part('parts/block-hotels'); ?>
            </div>
        </div>
        <div class="section-botrow border-top-default flex">
            <div class="container">
                <div class="owl-custom-nav dark-nav flex">
                    <div class="hostels-prev flex">
                        <svg width="13" height="6" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.76389 5.44784L12.4306 3.13685C12.4769 3.09341 12.5 3.04134 12.5 2.98053C12.5 2.92403 12.4769 2.87416 12.4306 2.8308L9.76386 0.552427C9.6897 0.495996 9.60875 0.485121 9.52077 0.5198C9.43282 0.554548 9.38884 0.617454 9.38884 0.708587V2.16676L0.721977 2.16676C0.657204 2.16676 0.603934 2.18625 0.562317 2.22536C0.520797 2.26441 0.5 2.31426 0.5 2.37509V3.62491C0.5 3.68576 0.520797 3.7357 0.562317 3.77455C0.603959 3.81356 0.657204 3.83321 0.721977 3.83321L9.38884 3.83321V5.29139C9.38884 5.37817 9.43284 5.44103 9.52077 5.48004C9.60885 5.51492 9.6898 5.50402 9.76389 5.44784Z"
                                  fill="#fff"/>
                        </svg>
                    </div>
                    <div class="hostels-next flex">
                        <svg width="13" height="6" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.76389 5.44784L12.4306 3.13685C12.4769 3.09341 12.5 3.04134 12.5 2.98053C12.5 2.92403 12.4769 2.87416 12.4306 2.8308L9.76386 0.552427C9.6897 0.495996 9.60875 0.485121 9.52077 0.5198C9.43282 0.554548 9.38884 0.617454 9.38884 0.708587V2.16676L0.721977 2.16676C0.657204 2.16676 0.603934 2.18625 0.562317 2.22536C0.520797 2.26441 0.5 2.31426 0.5 2.37509V3.62491C0.5 3.68576 0.520797 3.7357 0.562317 3.77455C0.603959 3.81356 0.657204 3.83321 0.721977 3.83321L9.38884 3.83321V5.29139C9.38884 5.37817 9.43284 5.44103 9.52077 5.48004C9.60885 5.51492 9.6898 5.50402 9.76389 5.44784Z"
                                  fill="#fff"/>
                        </svg>
                        <div class="btn-corner corner-1"></div>
                        <div class="btn-corner corner-2"></div>
                        <div class="btn-corner corner-3"></div>
                        <div class="btn-corner corner-4"></div>
                    </div>
                </div>
                <div class="slider-counter"></div>
            </div>
        </div>
    </section>
    <!-- HOSTELS SECTION END -->
    <!-- INVEST SECTION -->
    <section class="invest-section" data-section-name="invest-section">
		<?= get_template_part('parts/block-invest'); ?>
    </section>
    <!-- INVEST SECTION END -->
    <!-- LEADER SECTION -->
    <section class="leader-section" data-section-name="leader-section">
		<?= get_template_part('parts/block-inspirer'); ?>
    </section>
    <!-- LEADER SECTION END -->
    <!-- VIDEO SECTION -->
    <section class="video-section" data-section-name="video-section">
        <?= get_template_part('parts/block-video'); ?>
    </section>
    <!-- VIDEO SECTION END -->
    <!-- PACKAGES SECTION -->
    <section class="packages-section" data-section-name="packages-section">
        <div class="section-title border-bot-default">
            <div class="container">
                <h2 class="bebas-bold">Инвестиционные пакеты</h2>
            </div>
        </div>
        <div class="container">
            <div class="packages-section__cols w-100 flex">
                <div class="packages-section__col">
                    <div class="phone">
                        <span>Номер для консультации</span>
                        <?php
                        $posts = get_posts(array(
                            'post_type'   => 'contacts',
                        ));

                        foreach ($posts as $post) {
                            setup_postdata($post);

                            ?>

		                    <a href="tel:<?= the_field('phone') ?>" class="bebas-bold"><?= the_field('phone') ?></a>

                            <?php
                        }

                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-botrow border-top-default flex">
            <div class="container">
                <div class="video-btn video-btn__blue">
                    <div class="video-btn__icon"></div>
                    <span>Смотреть видео про нас</span>
                </div>
                <a href="<?= get_option("site_url"); ?>/#" target="_blank" class="link-arrow flex">
                    <span>Подробнее о компании</span>
                    <span>О компании</span>
                    <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/link-arrow.svg">
                </a>
            </div>
        </div>
    </section>
    <!-- PACKAGES SECTION END -->
    <!-- REVIEWS SECTION -->
    <section class="reviews-section" data-section-name="reviews-section">
        <div class="section-title border-top-default border-bot-default">
            <div class="container">
                <h2 class="bebas-bold">Отзывы инвесторов</h2>
            </div>
        </div>
        <div class="container">
            <div id="reviews-carousel" class="owl-carousel">
                <?php
                $posts = get_posts(array(
                    'numberposts' => -1,
                    'post_type'   => 'review',
                ));

                foreach ($posts as $post) {
                    setup_postdata($post);
					get_template_part('parts/block-review');
                }

                wp_reset_postdata();
                ?>
            </div>
        </div>
        <div class="section-botrow border-top-default flex">
            <div class="container">
                <div class="owl-custom-nav dark-nav flex">
                    <div class="reviews-prev flex">
                        <svg width="13" height="6" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.76389 5.44784L12.4306 3.13685C12.4769 3.09341 12.5 3.04134 12.5 2.98053C12.5 2.92403 12.4769 2.87416 12.4306 2.8308L9.76386 0.552427C9.6897 0.495996 9.60875 0.485121 9.52077 0.5198C9.43282 0.554548 9.38884 0.617454 9.38884 0.708587V2.16676L0.721977 2.16676C0.657204 2.16676 0.603934 2.18625 0.562317 2.22536C0.520797 2.26441 0.5 2.31426 0.5 2.37509V3.62491C0.5 3.68576 0.520797 3.7357 0.562317 3.77455C0.603959 3.81356 0.657204 3.83321 0.721977 3.83321L9.38884 3.83321V5.29139C9.38884 5.37817 9.43284 5.44103 9.52077 5.48004C9.60885 5.51492 9.6898 5.50402 9.76389 5.44784Z"
                                  fill="#fff"></path>
                        </svg>
                    </div>
                    <div class="reviews-next flex">
                        <svg width="13" height="6" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.76389 5.44784L12.4306 3.13685C12.4769 3.09341 12.5 3.04134 12.5 2.98053C12.5 2.92403 12.4769 2.87416 12.4306 2.8308L9.76386 0.552427C9.6897 0.495996 9.60875 0.485121 9.52077 0.5198C9.43282 0.554548 9.38884 0.617454 9.38884 0.708587V2.16676L0.721977 2.16676C0.657204 2.16676 0.603934 2.18625 0.562317 2.22536C0.520797 2.26441 0.5 2.31426 0.5 2.37509V3.62491C0.5 3.68576 0.520797 3.7357 0.562317 3.77455C0.603959 3.81356 0.657204 3.83321 0.721977 3.83321L9.38884 3.83321V5.29139C9.38884 5.37817 9.43284 5.44103 9.52077 5.48004C9.60885 5.51492 9.6898 5.50402 9.76389 5.44784Z"
                                  fill="#fff"></path>
                        </svg>
                        <div class="btn-corner corner-1"></div>
                        <div class="btn-corner corner-2"></div>
                        <div class="btn-corner corner-3"></div>
                        <div class="btn-corner corner-4"></div>
                    </div>
                </div>
                <a href="<?= get_option("site_url"); ?>/#" target="_blank" class="link-arrow flex">
                    <span>Подробнее о компании</span>
                    <span>О компании</span>
                    <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/link-arrow.svg">
                </a>
            </div>
        </div>
    </section>
    <!-- REVIEWS SECTION END -->
    <!-- LAST SECTION -->
    <section class="last-section" data-section-name="last-section">
        <div class="last-section__wrapper">
            <div class="section-title border-bot-default">
            </div>
            <div class="container">
                <?php
                $posts = get_posts(array(
                    'post_type' => 'index_bottom',
                ));

                foreach ($posts as $post) {
                    setup_postdata($post);

                    ?>

	                <div class="last-section__title bebas-bold">
		                <?= the_field('title') ?>
	                </div>
	                <div class="last-section__description">
                        <?= the_field('text') ?>
	                </div>
	                <a href="<?= the_field('button_link') ?>" class="btn-default btn-blue">
		                <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/profile.svg">
		                <span><?= the_field('button_text') ?></span>
	                </a>

                    <?php
                }

                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>

<?php get_footer('other'); ?>