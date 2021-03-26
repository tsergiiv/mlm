<?php get_header(blog); ?>

<?php
    $offset = 0;
    $aside_post_number = get_option('aside_post_number');
    $other_post_number = get_option('other_post_number');
?>

<?php
    $page_object = get_queried_object();
    $category_name = $page_object->name;
    $category_slug = $page_object->slug;
    $posts_count = $page_object->category_count;

    $args = array(
        'posts_per_page' => -1,
        'post_type'      => 'post',
        'category_name'  => $category_slug,
    );

    $posts_query = new WP_Query($args);
    $post_count = $posts_query->post_count;
?>

<div class="wrapper">

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

<!--        <div class="page__title title-page">-->
<!--            <div class="title-page__container container">-->
<!--                <h1>--><?php //echo $category_name; ?><!--</h1>-->
<!--            </div>-->
<!--        </div>-->

	    <!-- BLOCK 1 -->
	    <div class="posts-block__container container">
            <?php
            // параметры по умолчанию
            $posts = get_posts(array(
                'numberposts'  => 1,
                'post_type'    => 'post',
                'orderby'      => 'date',
                'order'        => 'ASC',
                'category_name' => $category_slug,
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
                        'category_name' => $category_slug,
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
</div>

<script>
    let ppp = <?= get_option('other_post_number') ?>;
    let videoPpp = <?= get_option('video_post_number') ?>;
    let postCount = <?= $post_count ?>;
</script>

<?php get_footer(blog); ?>