<?= get_header(); ?>

        <div class="container">
            <div class="package-title">
                <h1><span class="package-name">Silver</span> пакет</h1>
                <div class="package-description">
                    Гарантированная доходность. Возможность заработать 10% (12%, 15%, 17%) годовых. Недвижимость как
                    надежный актив. Лучше, чем депозиты и ценные бумаги. Вы пассивно получает доход от аренды
                </div>
                <form method="post" action="<?= get_option('site_url') ?>/checkout">
                    <input type="text" id="package-id" name="package-id" value="" hidden>
                    <input type="text" name="business-id" value="<?= get_option('business_id') ?>" hidden>
                    <input type="submit" class="btn-default btn-blue" value="Инвестировать">
                </form>
            </div>
            <div class="package-info">
                <div class="packages-col__info">
                    <div class="packages-info__name">
                        <span class="package-name">Silver</span>
                    </div>
                    <div class="packages-info__nums">
                        <span class="bebas-normal">$<span class="package-price">1500</span></span>
                        Цена пакета
                    </div>
                    <div class="packages-info__nums">
                        <span class="bebas-normal package-profit">25%</span>
                        Пасивный доход в год
                    </div>
                    <div class="packages-col__number">
                        <span class="package-n">1</span>
                    </div>
                </div>
                <div class="package-bg">
                    <img alt="Silver" class="package-img" src="<?php bloginfo('template_url'); ?>/assets/img/silver-bg.svg">
                </div>
            </div>
        </div>
    </section>
    <!-- INVEST SECTION END -->
    <section class="about-section" data-section-name="about-section">
        <div class="section-title border-bot-default">
            <div class="container">
                <h2 class="bebas-bold">О пакете</h2>
            </div>
        </div>
        <div class="container">
            <div class="package-about-bg">
                <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/package-villa.png">
            </div>
            <div class="about-item__description">
                <div class="about-item__text">
                    Мы занимаемся инвестированием в Киевские отели и управлением ими.
                    Мы тщательно анализируем объект перед тем, как вложить в него деньги и предложить вам инвестирование
                    в него.
                    Мы проверяем информацию о доходах и расходах хостела, степень его востребованности, качество
                    оказываемых услуг.
                </div>
                <div class="about-item__cols flex">
                    <div class="about-item__col">
                        <span class="bebas-bold">6</span>
                        Хостелов в Украине
                    </div>
                    <div class="about-item__col">
                        <span class="bebas-bold">12</span>
                        Хостелов в Европе
                    </div>
                    <div class="col-divider"></div>
                    <div class="about-item__col">
                        <span class="bebas-bold">11 178</span>
                        Пользоваталей на платформе
                    </div>
                    <div class="about-item__col">
                        <span class="bebas-bold">100+</span>
                        Сотрудников в штате
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
                <a href="<?php bloginfo('template_url'); ?>/assets/#" target="_blank" class="link-arrow arrow-dark flex">
                    <span>Подробнее о компании</span>
                    <span>О компании</span>
                    <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/link-arrow.svg">
                </a>
            </div>
        </div>
    </section>
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
            </div>
        </div>
        <div class="section-botrow border-top-default flex">
            <div class="container">
                <div class="owl-custom-nav dark-nav flex">
                    <div class="hostels-prev flex">
                        <svg width="13" height="6" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.76389 5.44784L12.4306 3.13685C12.4769 3.09341 12.5 3.04134 12.5 2.98053C12.5 2.92403 12.4769 2.87416 12.4306 2.8308L9.76386 0.552427C9.6897 0.495996 9.60875 0.485121 9.52077 0.5198C9.43282 0.554548 9.38884 0.617454 9.38884 0.708587V2.16676L0.721977 2.16676C0.657204 2.16676 0.603934 2.18625 0.562317 2.22536C0.520797 2.26441 0.5 2.31426 0.5 2.37509V3.62491C0.5 3.68576 0.520797 3.7357 0.562317 3.77455C0.603959 3.81356 0.657204 3.83321 0.721977 3.83321L9.38884 3.83321V5.29139C9.38884 5.37817 9.43284 5.44103 9.52077 5.48004C9.60885 5.51492 9.6898 5.50402 9.76389 5.44784Z"
                                  fill="#fff"></path>
                        </svg>
                    </div>
                    <div class="hostels-next flex">
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
                <div class="slider-counter"></div>
            </div>
        </div>
    </section>
    <!-- HOSTELS SECTION END -->
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
                <a href="<?php bloginfo('template_url'); ?>/assets/#" target="_blank" class="link-arrow flex">
                    <span>Подробнее о компании</span> <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/link-arrow.svg">
                </a>
            </div>
        </div>
    </section>
    <!-- REVIEWS SECTION END -->

<?= get_footer('package'); ?>
