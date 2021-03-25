<?php

$comment = $args['comment'];
$depth = $args['depth'];
$arguments = $args['args'];

?>

<div class="reply-messages__message message-reply single-comment">
    <div class="message-reply__body">
        <div class="message-reply__column">
            <?php echo get_avatar($comment, $size='80', $default='http://0.gravatar.com/avatar/36c2a25e62935705c5565ec465c59a70?s=32&d=mm&r=g' ); ?>
        </div>
        <div class="message-reply__column">
            <div class="message-reply__name"><?php echo get_comment_author() ?></div>
            <div class="message-reply__text"><?php comment_text() ?></div>
        </div>
    </div>
    <div class="message-reply__footer">
        <div class="message-reply__time">
            <?php printf( _x( '%s ago', '%s = human-readable time difference', 'your-text-domain' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ); ?>
        </div>
        <div class="message-reply__likes" comment-id="<?php echo get_comment_ID(); ?>">
            <?php echo get_simple_likes_button(get_comment_ID(), 1 ); ?>
        </div>
        <?php if (is_user_logged_in()) : ?>
        <div class="message-reply__reply reply-btn" comment-id="<?php echo get_comment_ID(); ?>">Reply
<!--            --><?php //comment_reply_link(array_merge( $arguments, array('depth' => $depth, 'max_depth' => 10))); ?>
        </div>
        <?php endif; ?>
    </div>
</div>