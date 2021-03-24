<?php

/*
 * Template Name: Legacies
 * description: >-
  Page template for legacies pages
 */

get_header(); ?>

    <div class="legacy-wrapper">
        <div class="back-btn">
            <a href="<?= get_bloginfo("url"); ?>" class="back-btn btn-default">
                <svg width="13" height="6" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.76389 5.44784L12.4306 3.13685C12.4769 3.09341 12.5 3.04134 12.5 2.98053C12.5 2.92403 12.4769 2.87416 12.4306 2.8308L9.76386 0.552427C9.6897 0.495996 9.60875 0.485121 9.52077 0.5198C9.43282 0.554548 9.38884 0.617454 9.38884 0.708587V2.16676L0.721977 2.16676C0.657204 2.16676 0.603934 2.18625 0.562317 2.22536C0.520797 2.26441 0.5 2.31426 0.5 2.37509V3.62491C0.5 3.68576 0.520797 3.7357 0.562317 3.77455C0.603959 3.81356 0.657204 3.83321 0.721977 3.83321L9.38884 3.83321V5.29139C9.38884 5.37817 9.43284 5.44103 9.52077 5.48004C9.60885 5.51492 9.6898 5.50402 9.76389 5.44784Z"
                          fill="#fff"/>
                </svg>
            </a>
            Вернуться
        </div>
        <h1><?= the_title() ?></h1>
        <div class="legacy-description">
            <?= the_content() ?>
        </div>
    </div>
</section>

<?= get_footer(); ?>
