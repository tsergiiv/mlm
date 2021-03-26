<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password,
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

$twenty_twenty_one_comment_count = get_comments_number();
?>

<div id="comments-section" class="comments-area default-max-width <?php echo get_option( 'show_avatars' ) ? 'show-avatars' : ''; ?>">

    <div id="comments">
	<?php
	if ( have_comments() ) :
		;
		?>

        <?php
        wp_list_comments(array(
            'short_ping'   => true,
            'callback'     => 'custom_comments',
        ));
        ?>

		<?php if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'inspirfyblog' ); ?></p>
		<?php endif; ?>
	<?php endif; ?>

    <div id="comment-form" class="comment-form-block">

	<?php
    $current_user = wp_get_current_user();

    if (get_top_level_comments_number(get_the_ID()) > get_option('comments_per_page') ) {
        ?>
        <a class="comments__load-more" id="more_comments">Load more</a>
        <?php
    }

    $avatar = get_avatar_url($current_user->ID);

	comment_form(
		array(
            'comment_field' => '<p class="comment-form-comment">
                <textarea name="comment" id="comment" maxlength="5000" required="required" placeholder="Enter message"></textarea>
                <img id="comment" src="' . $avatar . '">
            </p>', 
			'logged_in_as' => null,
            'label_submit' => __( 'Submit' ),
            'title_reply'          => __( '' ),
            'title_reply_to'       => __( '' ),
            'title_reply_before'   => '',
            'title_reply_after'    => '',
		)
	);
	?>
    </div>

    </div>
</div><!-- #comments -->
