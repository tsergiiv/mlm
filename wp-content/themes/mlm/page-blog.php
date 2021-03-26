<?php get_header('blog'); ?>

<?php
$offset = 1;
$video_offset = 0;
$n = 1;
$aside_post_number = get_option('aside_post_number');
$other_post_number = get_option('other_post_number');
$video_post_number = get_option('video_post_number');
$video_slide_number = get_option('video_slide_number');

$count_posts = wp_count_posts();
$published_posts = $count_posts->publish;

$args = array(
    'suppress_filters' => true,
    'post_type'        => 'post',
    'meta_key'         => 'has_video',
    'meta_value'       => true,
);

$posts_query = new WP_Query($args);
$video_post_count = $posts_query->post_count;

$args = array(
    'posts_per_page' => -1,
    'post_type'      => 'post',
    'meta_query'     => [
        'relation' => 'OR',
        [
            'key'   => 'has_video',
            'value' => 0,
            'type'  => 'NUMERIC',
        ],
        [
            'key'     => 'has_video',
            'compare' => 'NOT EXISTS',
        ],
    ],
);

$posts_query = new WP_Query($args);
$post_count = $posts_query->post_count;
?>

    <div class="sub-header">
        <div class="inner">
            <div class="sub-header-title"><p>Uneed Stories</p></div>
            <?php wp_nav_menu([
                'menu'       => 'categories',
                'container'  => false,
                'menu_class' => 'sub-header-nav',
                'menu_id'    => false,
                'items_wrap' => '<div class="%2$s">%3$s</div>',
            ]); ?>
            <input class="sub-header-search"></div>
    </div>

    <div class="page">

        <!-- BLOCK 1 -->
        <div class="posts-block__container container">
            <?php
            // параметры по умолчанию
            $posts = get_posts(array(
                'numberposts'  => 1,
                'post_type'    => 'post',
                'orderby'      => 'date',
                'order'        => 'ASC',
                'meta_query'     => [
                    'relation' => 'OR',
                    [
                        'key'   => 'has_video',
                        'value' => 0,
                        'type'  => 'NUMERIC',
                    ],
                    [
                        'key'     => 'has_video',
                        'compare' => 'NOT EXISTS',
                    ],
                ],
            ));

            foreach($posts as $post){
                setup_postdata($post);

                get_template_part('post-templates/post-big', get_post_format());
            }

            wp_reset_postdata(); // сброс
            ?>

            <div class="posts-block__column posts-block__overflow">
                <div class="posts-block__body">
                    <?php
                    // параметры по умолчанию
                    $posts = get_posts( array(
                        'numberposts'   => $aside_post_number,
                        'post_type'     => 'post',
                        'orderby'       => 'date',
                        'order'         => 'ASC',
                        'offset'        => $offset,
                        'meta_query'     => [
                            'relation' => 'OR',
                            [
                                'key'   => 'has_video',
                                'value' => 0,
                                'type'  => 'NUMERIC',
                            ],
                            [
                                'key'     => 'has_video',
                                'compare' => 'NOT EXISTS',
                            ],
                        ],
                    ) );

                    foreach($posts as $post) {
                        setup_postdata($post);
                        if ($post) {
                            $offset++;
                            get_template_part('post-templates/post-small', get_post_format());
                        }
                    }

                    wp_reset_postdata(); // сброс
                    ?>
                </div>
            </div>
        </div>

        <!-- BLOCK 2 -->
        <div class="page__main-sliders main-sliders">
            <div class="main-sliders__body js-slider">
                <?php
                $posts = get_posts( array(
                    'post_type'      => 'post',
                    'orderby'        => 'date',
                    'order'          => 'ASC',
                    'posts_per_page' => $video_slide_number,
                    'meta_key'       => 'has_video',
                    'meta_value'     => true,
                    'offset'         => $video_offset
                ));

                foreach($posts as $post) {
                    setup_postdata($post);
                    $video_offset++;

                    if ($post) {
                        get_template_part('post-templates/video-slide', get_post_format());
                    }
                }

                wp_reset_postdata();
                ?>
            </div>
            <div class="slide__navigation navigation-slide">
                <div class="navigation-slide__container container">
                    <div class="navigation-slide__body">
                        <ul class="navigation-slide__dots" id="customize-thumbnails">
                            <?php
                            foreach($posts as $post) {
                                echo "<li></li>";
                            }
                            ?>
                        </ul>
                        <div class="navigation-slide__arrows arrows">
                            <div class="arrows__next icon-right-arrow" id="arrows__next">UP NEXT</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- BLOCK 3 -->
        <div class="posts-block__container container">
            <?php
            // параметры по умолчанию
            $posts = get_posts(array(
                'numberposts'  => 1,
                'post_type'    => 'post',
                'orderby'      => 'date',
                'order'        => 'ASC',
                'offset'       => $offset,
                'meta_query'     => [
                    'relation' => 'OR',
                    [
                        'key'   => 'has_video',
                        'value' => 0,
                        'type'  => 'NUMERIC',
                    ],
                    [
                        'key'     => 'has_video',
                        'compare' => 'NOT EXISTS',
                    ],
                ],
            ));

            foreach($posts as $post){
                setup_postdata($post);
                $offset++;

                get_template_part('post-templates/post-big', get_post_format());
            }

            wp_reset_postdata(); // сброс
            ?>

            <div class="posts-block__column posts-block__overflow">
                <div class="posts-block__body">
                    <?php
                    // параметры по умолчанию
                    $posts = get_posts( array(
                        'numberposts'   => $aside_post_number,
                        'post_type'     => 'post',
                        'orderby'       => 'date',
                        'order'         => 'ASC',
                        'offset'        => $offset,
                        'meta_query'     => [
                            'relation' => 'OR',
                            [
                                'key'   => 'has_video',
                                'value' => 0,
                                'type'  => 'NUMERIC',
                            ],
                            [
                                'key'     => 'has_video',
                                'compare' => 'NOT EXISTS',
                            ],
                        ],
                    ) );

                    foreach($posts as $post) {
                        setup_postdata($post);
                        if ($post) {
                            $offset++;
                            get_template_part('post-templates/post-small', get_post_format());
                        }
                    }

                    wp_reset_postdata(); // сброс
                    ?>
                </div>
            </div>
        </div>

        <!-- BLOCK 4 -->
        <div class="page__main-sliders main-sliders">
            <div class="main-sliders__body js-slider one">
                <?php
                $posts = get_posts( array(
                    'post_type'      => 'post',
                    'orderby'        => 'date',
                    'order'          => 'ASC',
                    'posts_per_page' => $video_slide_number,
                    'meta_key'       => 'has_video',
                    'meta_value'     => true,
                    'offset'         => $video_offset,
                ));

                foreach($posts as $post) {
                    setup_postdata($post);
                    $video_offset++;
                    if ($post) {
                        get_template_part('post-templates/video-slide', get_post_format());
                    }
                }

                wp_reset_postdata();
                ?>
            </div>
            <div class="slide__navigation navigation-slide">
                <div class="navigation-slide__container container">
                    <div class="navigation-slide__body">
                        <ul class="navigation-slide__dots" id="customize-thumbnails-1">
                            <?php
                            foreach($posts as $post) {
                                echo "<li></li>";
                            }
                            ?>
                        </ul>
                        <div class="navigation-slide__arrows arrows">
                            <div class="arrows__next icon-right-arrow" id="arrows__next-1">UP NEXT</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- BLOCK 5 -->
        <div class="posts-block__container container">
            <?php
            // параметры по умолчанию
            $posts = get_posts(array(
                'numberposts'  => 1,
                'post_type'    => 'post',
                'orderby'      => 'date',
                'order'        => 'ASC',
                'offset'       => $offset,
                'meta_query'     => [
                    'relation' => 'OR',
                    [
                        'key'   => 'has_video',
                        'value' => 0,
                        'type'  => 'NUMERIC',
                    ],
                    [
                        'key'     => 'has_video',
                        'compare' => 'NOT EXISTS',
                    ],
                ],
            ));

            foreach($posts as $post){
                setup_postdata($post);
                $offset++;

                get_template_part('post-templates/post-big', get_post_format());
            }

            wp_reset_postdata(); // сброс
            ?>

            <div class="posts-block__column posts-block__overflow">
                <div class="posts-block__body">
                    <?php
                    // параметры по умолчанию
                    $posts = get_posts( array(
                        'numberposts'   => 10,
                        'post_type'     => 'post',
                        'orderby'       => 'date',
                        'order'         => 'ASC',
                        'offset'        => $offset,
                        'meta_query'     => [
                            'relation' => 'OR',
                            [
                                'key'   => 'has_video',
                                'value' => 0,
                                'type'  => 'NUMERIC',
                            ],
                            [
                                'key'     => 'has_video',
                                'compare' => 'NOT EXISTS',
                            ],
                        ],
                    ) );

                    foreach($posts as $post) {
                        setup_postdata($post);
                        if ($post) {
                            $offset++;
                            get_template_part('post-templates/post-small', get_post_format());
                        }
                    }

                    wp_reset_postdata(); // сброс
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="popup popup_video" id="video">
        <div class="popup__content">
            <div class="popup__body">
                <div class="popup__close popup__close_video icon-close"></div>
                <div class="popup__video _video">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat,
                    similique.
                </div>
            </div>
        </div>
    </div>

    <script>
        let ppp = <?= get_option('other_post_number') ?>;
        console.log(ppp);
        let videoPpp = <?= get_option('video_post_number') ?>;
        let videoOffset = <?= $video_slide_number ?>;
        let videoPostCount = <?= $video_post_count ?>;
        let postCount = <?= $post_count ?>;
    </script>

<?php get_footer('blog'); ?>