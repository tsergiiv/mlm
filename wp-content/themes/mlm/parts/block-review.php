<div class="reviews-carousel__item flex">
    <div class="reviews-section__left">
        <div class="reviews-left__title flex">
            <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/quotes.png">
            <div class="bebas-normal">
                Инвестор
            </div>
        </div>
        <div class="reviews-left__description">
            <?= the_field('quote') ?>
        </div>
        <div class="reviews-left__cols flex">
            <?php if (get_field('linkedin')): ?>
                <a target="_blank" href="<?= the_field('linkedin') ?>" class="reviews-left__col flex">
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
            <?php endif; ?>
            <?php if (get_field('facebook')): ?>
                <a target="_blank" href="<?= the_field('facebook') ?>" class="reviews-left__col flex">
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
            <?php endif; ?>
        </div>
    </div>
    <div class="reviews-section__right ml-auto">
        <div class="reviews-right__img">
            <img alt="Иван Ольховский" src="<?= the_field('photo') ?>">
            <div class="reviews-right__name bebas-bold"><?= the_field('full_name') ?></div>
        </div>
    </div>
</div>