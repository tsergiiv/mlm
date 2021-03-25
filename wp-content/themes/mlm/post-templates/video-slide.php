<div class="main-sliders__item slide">
	<div class="slide__image ibg">
		<img src="<?php the_field('video_cover'); ?>">
	</div>
	<div class="slide__content container">
		<div class="slide__column">
			<div class="slide__subtitle">TOP OF THE WEEK PLAYLIST</div>
			<div class="slide__title"><?php the_field('banner_text'); ?></div>
		</div>
		<div class="slide__column">
			<div class="slide__play">
				<a class="slide__play-icon icon-play popup-link" data-video="<?php the_field('youtube_video_id'); ?>" href="#video"></a>
			</div>
		</div>
	</div>
</div>