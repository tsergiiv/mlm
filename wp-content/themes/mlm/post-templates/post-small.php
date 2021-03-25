<div class="side-post">
	<a class="side-post__img" href="<?php the_permalink(); ?>">
		<img src="<?php the_field('cover'); ?>">
	</a>
	<div class="side-post__content">
		<div class="side-post__category">
			<?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?>
		</div>
		<a class="side-post__title" href="<?php the_permalink(); ?>"><?php the_title() ?></a>
		<div class="post__footer">
			<div class="post__author">
				<span><?php the_author_meta('first_name') ?> <?php the_author_meta('last_name') ?></span>
			</div>
		</div>
	</div>
</div>