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
                            <a href="<?= get_bloginfo("url"); ?>/packages">Пакеты</a>
                        </li>
                        <li>
                            <a href="<?= get_bloginfo("url"); ?>/about">Про компанию</a>
                        </li>
                        <li>
                            <a href="<?= get_bloginfo("url"); ?>/contact-us">Контакты</a>
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
                            <a href="<?= get_bloginfo("url"); ?>/terms">
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

<script type="text/javascript">
    let templateUrl = '<?= get_bloginfo("template_url"); ?>';

    let url = '<?= get_bloginfo("url"); ?>';
</script>

