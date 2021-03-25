<?php

$comment = $args['comment'];
$depth = $args['depth'];
$arguments = $args['args'];

?>

<div class="comments__item comment top-comment single-comment">
    <div class="comment__head head-comment">
        <div class="head-comment__column">
            <?php echo get_avatar($comment, $size='80', $default='http://0.gravatar.com/avatar/36c2a25e62935705c5565ec465c59a70?s=32&d=mm&r=g' ); ?>
        </div>
        <div class="head-comment__column">
            <div class="head-comment__author"><?php echo get_comment_author() ?></div>
            <div class="head-comment__data"><?php echo get_comment_date("F j, Y") ?></div>
        </div>
    </div>
    <div class="comment__body">
        <p><?php comment_text() ?></p>
    </div>
    <div class="comment__footer footer-comment">
        <div class="footer-comment__likes" comment-id="<?php echo get_comment_ID(); ?>">
            <?php echo get_simple_likes_button(get_comment_ID(), 1 ); ?>
        </div>
        <?php if (is_user_logged_in()) : ?>
        <div class="footer-comment__reply reply-btn" comment-id="<?php echo get_comment_ID(); ?>">Reply</div>
<!--        --><?php
//            $class = 'footer-comment__reply';
//            echo preg_replace( '/comment-reply-link/', 'comment-reply-link ' . $class, get_comment_reply_link(array_merge( $arguments, array('depth' => $depth, 'max_depth' => 10))));
//        ?>
        <?php endif; ?>
    </div>
</div>