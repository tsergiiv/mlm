<div class="small-posts__item">
    <div class="post post__small">
        <a class="post__img" href="<?php the_permalink(); ?>">
            <img src="<?php the_field('cover'); ?>">
        </a>
        <div class="post__body">
            <div class="post__category">
                <?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?>
                <span class="side-post__time"><?php echo do_shortcode('[rt_reading_time postfix="MIN READ" ]'); ?></span>
            </div>
            <a class="post__title" href="<?php the_permalink(); ?>">
                <?php the_title() ?>
            </a>
        </div>
        <div class="post__footer">
            <div class="post__author">
                <img src="<?php echo get_avatar_url(get_the_author_meta('ID')); ?>">
                <span><?php the_author_meta('first_name') ?> <?php the_author_meta('last_name') ?></span>
            </div>
            <?php
                $likes = get_post_likes();
            ?>
            <div class="post__like icon-like"><?php echo $likes; ?></div>
            <div class="post__comments icon-message"><?php echo get_comments_number(); ?></div>
        </div>
    </div>
</div>