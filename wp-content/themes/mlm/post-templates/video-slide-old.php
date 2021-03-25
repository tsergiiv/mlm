<div class="main-sliders__item slide">
    <div class="slide__image ibg">
        <img src="<?php the_field('video_cover'); ?>">
    </div>
    <div class="slide__content container">
        <div class="slide__column">
            <div class="slide__subtitle">TOP OF THE WEEK PLAYLIST</div>
            <div class="slide__title">Interior Overview</div>
        </div>
        <div class="slide__column">
            <div class="slide__play">
                <a class="slide__play-icon icon-play popup-link" href="#video" data-video="<?php the_field('youtube_video_id'); ?>"></a>
            </div>
            <div class="slide__play-time"><?php echo getDuration(get_field('youtube_video_id')); ?></div>
        </div>
    </div>
</div>