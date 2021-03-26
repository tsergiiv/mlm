    <footer class="border-top-default">
        <div class="footer-toprow">
            <div class="container">
                <div class="left-col flex">
                    <div class="logo">
                        <img alt="UNEED PARTNERS GROUP" src="<?php bloginfo('template_url'); ?>/assets/img/logo.svg">
                    </div>
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
                <div class="right-col w-100 flex">
                    <ul class="nav-list">
                        <li>
                            <a href="<?= get_bloginfo("url"); ?>/#">Пакеты</a>
                        </li>
                        <li>
                            <a href="<?= get_bloginfo("url"); ?>/#">Про компанию</a>
                        </li>
                        <li>
                            <a href="<?= get_bloginfo("url"); ?>/#">Контакты</a>
                        </li>
                        <li>
                            <a href="#">Блог</a>
                        </li>
                    </ul>
                    <div class="phone">
                        <span>Номер для консультации</span>
                        <a href="tel:380939412123" class="bebas-bold">380939412123</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-botrow border-top-default">
            <div class="container">
                <div class="left-col flex">
                    <ul>
                        <li>
                            <a href="<?= get_bloginfo("url"); ?>/privacy">
                                Privacy Policy
                            </a>
                        </li>
                        <li>
                            <a href="<?= get_bloginfo("url"); ?>/#">
                                Cookies Policy
                            </a>
                        </li>
                        <li>
                            <a href="<?= get_bloginfo("url"); ?>/#">
                                Terms and Conditions
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="right-col w-100 flex">
                    <ul>
                        <li>
                            <a href="#" class="link-default">Instagram</a>
                        </li>
                        <li>
                            <a href="#" class="link-default">Linkedin</a>
                        </li>
                        <li>
                            <a href="#" class="link-default">Facebook</a>
                        </li>
                    </ul>
                    <div class="credit-cards">
                        <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/visa.svg">
                        <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/mastercard.svg">
                    </div>
                </div>
            </div>
        </div>
    </footer>
</main>

<div id="lottie"></div>

<div id="modal-video" class="modal">
    <a href="#" class="button-close modal-close">
        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.3002 0.709971C12.9102 0.319971 12.2802 0.319971 11.8902 0.709971L7.00022 5.58997L2.11021 0.699971C1.72021 0.309971 1.09021 0.309971 0.700215 0.699971C0.310215 1.08997 0.310215 1.71997 0.700215 2.10997L5.59021 6.99997L0.700215 11.89C0.310215 12.28 0.310215 12.91 0.700215 13.3C1.09021 13.69 1.72021 13.69 2.11021 13.3L7.00022 8.40997L11.8902 13.3C12.2802 13.69 12.9102 13.69 13.3002 13.3C13.6902 12.91 13.6902 12.28 13.3002 11.89L8.41021 6.99997L13.3002 2.10997C13.6802 1.72997 13.6802 1.08997 13.3002 0.709971Z" fill="#fff"/>
        </svg>
    </a>
    <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>

<script type="text/javascript">
    let templateUrl = '<?= get_bloginfo("template_url"); ?>';

    let url = '<?= get_bloginfo("url"); ?>';
</script>

