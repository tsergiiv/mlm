<div class="posts-block__column sticky">
	<div class="post"><a class="post__img" href="<?php the_permalink(); ?>"><img src="<?php the_field('cover'); ?>"></a>
		<div class="content">
			<div class="post__body">
				<div class="post__category"><?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?></div>
				<a class="post__title" href="<?php the_permalink(); ?>">
                    <?php the_title() ?>
				</a>
				<div class="post__text"><?php the_excerpt(); ?></div>
			</div>
			<div class="post__footer">
				<div class="post__author"><span><?php the_author_meta('first_name') ?> <?php the_author_meta('last_name') ?></span></div>
			</div>
		</div>
	</div>
</div>