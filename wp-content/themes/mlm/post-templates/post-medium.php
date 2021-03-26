<div class="small-posts__item">
    <div class="post post__small">
        <a class="post__img" href="<?php the_permalink(); ?>">
            <img src="<?php the_field('cover'); ?>">
        </a>
        <div class="post__body">
            <div class="post__category">
                <?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?>
            </div>
            <a class="post__title" href="<?php the_permalink(); ?>">
                <?php the_title() ?>
            </a>
        </div>
    </div>
</div>