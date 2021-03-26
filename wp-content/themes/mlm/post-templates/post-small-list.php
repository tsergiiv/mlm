<div class="row-post__item side-post">
    <a class="side-post__img" href="<?php the_permalink(); ?>">
        <img src="<?php the_field('cover'); ?>">
    </a>
    <div class="side-post__content">
        <div class="side-post__category">
            <?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?>
        </div>
        <a class="side-post__title" href="<?php the_permalink(); ?>"><?php the_title() ?></a>
    </div>
</div>