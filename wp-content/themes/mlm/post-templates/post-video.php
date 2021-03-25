<div class="video-block__item post post__small">
    <a class="post__video popup-link icon-play" href="#video" data-video="<?php the_field('youtube_video_id') ?>">
        <img src="<?php the_field('video_cover'); ?>">
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