<?php

function custom_comments($comment, $args, $depth) {
    $params['comment'] = $comment;
    $params['args'] = $args;
    $params['depth'] = $depth;

    if ($comment->comment_parent == 0) :
        get_template_part('comment-templates/comment', '', $params);
    else :
        get_template_part('comment-templates/reply', '', $params);
    endif;
}
