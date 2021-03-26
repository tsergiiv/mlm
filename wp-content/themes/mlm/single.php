<?php get_header('blog'); ?>

    <?php the_post(); ?>

    <div class="page">
        <!-- BLOCK 1 -->
        <div class="page__content post-content">
            <div class="post-content__header header-content">
                <div class="header-content__container container">
                    <div class="header-content__subtitle">
                        <a href="#">
                            <?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?>
                        </a>
                    </div>
                    <div class="header-content__title">
                        <?php the_title(); ?>
                    </div>
                    <div class="header-content__data-publication"><?php the_date(); ?></div>
                </div>
            </div>
            <div class="post-content__img img-content">
                <div class="img-content__container container">
                    <img src="<?php the_field('cover') ?>">
                </div>
            </div>
            <div class="post-content__body body-content">
                <div class="body-content__container container">
                    <div class="body-content__info">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
            <div class="post-content__footer footer-content">
                <div class="footer-content__container container">
                    <div class="footer-content__hashtag hashtag">
                        <?php the_tags('<div class="hashtag__item">','</div><div class="hashtag__item">','</div>') ?>
                    </div>
                    <div class="footer-content__like">
                        <?php echo get_simple_likes_button(get_the_ID()); ?>
                    </div>
                </div>
            </div>
            <?php if (is_user_logged_in()): ?>
            <div class="page__like like-post">
                <?php echo get_simple_likes_button(get_the_ID()); ?>
            </div>
            <?php endif; ?>
        </div>

        <!-- BLOCK 2 -->
        <div class="post-content__comments comments">
            <div class="comments__container container">
                <div class="comments__header header-comments">
                    <div class="header-comments__title">Comments
                        <div class="header-comments__sum">(<?php echo get_comments_number(); ?>)</div>
                    </div>
<!--                    <button class="header-comments__write-comment d-none">Write comment</button>-->
                </div>
                <div class="comments__body">
                    <div class="comments__item comment">
<!--                        <div class="comment__button-wrapper">-->
<!--                            <div class="comment__btn d-none">View replies<span>(12)</span></div>-->
<!--                        </div>-->

                        <?php comments_template(); ?>
                    </div>
                </div>
        </div>

        <!-- BLOCK 3 -->
        <div class="page__posts-small small-posts">
            <div class="small-posts__container container">
                <div class="small-posts__title">Lorem ipsum dolor sit amet</div>
                <div class="small-posts__row">
                    <?php

                    $offset = 0;

                    $posts = get_posts(array(
                        'numberposts' => 4,
                        'post_type' => 'post',
                        'orderby' => 'date',
                        'order' => 'ASC',
                    ));

                    foreach($posts as $post) {
                        setup_postdata($post);
                        if ($post) {
                            $offset++;
                            get_template_part('post-templates/post-medium', get_post_format());
                        }
                    }

                    wp_reset_postdata(); // сброс
                    ?>
                </div>
            </div>
        </div>

        <?php

        $other_post_number = get_option('other_post_number');

        $posts = get_posts(array(
            'numberposts' => $other_post_number,
            'post_type' => 'post',
            'orderby' => 'date',
            'order' => 'ASC',
            'offset' => $offset,
        ));

        ?>

        <!-- BLOCK 4 -->
        <?php if ($posts): ?>
            <div class="page__posts-row row-post">
                <div class="row-post__container container">
                    <div class="row-post__body" id="ajax-posts">
                        <?php

                        foreach($posts as $post) {
                            setup_postdata($post);
                            if ($post) {
                                get_template_part('post-templates/post-small-list', get_post_format());
                            }
                        }

                        wp_reset_postdata();
                        ?>
                    </div>

                    <button class="row-post__button btn" id="more_posts" onclick="loadClick(<?php echo $offset . ",''" ; ?>)">Load more</button>
                </div>
            </div>
        <?php endif; ?>
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

<?php
    $args = array(
        'posts_per_page' => -1,
        'post_type'      => 'post',
    );

    $posts_query = new WP_Query($args);
    $post_count = $posts_query->post_count;
?>

<script>
    let ppp = <?= get_option('other_post_number') ?>;
    let postCount = <?= $post_count ?>;
    let post_id = <?= get_the_ID() ?>;
    let commment_count = <?= get_top_level_comments_number(get_the_ID()) ?>;
    let cpp = <?= get_option('comments_per_page') ?>;
    console.log(cpp);
</script>

<?php get_footer('blog'); ?>