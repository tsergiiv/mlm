<?php

function more_post_ajax() {
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;
    $offset = (isset($_POST['offset'])) ? $_POST['offset'] : 0;
    $category = (isset($_POST['category'])) ? $_POST['category'] : "";

    $ppp = get_option('other_post_number');
    $offset += ($page - 1) * $ppp;

    header("Content-Type: text/html");

    $args = array(
        'suppress_filters' => true,
        'post_type'        => 'post',
        'orderby'          => 'date',
        'order'            => 'ASC',
        'posts_per_page'   => $ppp,
        'offset'           => $offset,
    );

    if ($category == "") {
        $args['meta_query'] = [
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
        ];
    } else {
        $args['category_name'] = $category;
    }

    $loop = new WP_Query($args);

    $out = '';

    if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post();
        $out .= get_template_part('post-templates/post-small-list', get_post_format());;
    endwhile;
    endif;
    wp_reset_postdata();
    die($out);
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');

function more_video_ajax() {
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;

    $ppp = get_option('video_post_number');
    $offset = get_option('video_slide_number');

    $offset += ($page - 1) * $ppp;

    header("Content-Type: text/html");

    $args = array(
        'suppress_filters' => true,
        'post_type'        => 'post',
        'orderby'          => 'date',
        'order'            => 'ASC',
        'posts_per_page'   => $ppp,
        'meta_key'         => 'has_video',
        'meta_value'       => true,
        'offset'           => $offset,
    );

    $loop = new WP_Query($args);

    if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post();
        $out .= get_template_part('post-templates/post-video', get_post_format());;
    endwhile;
    endif;
    wp_reset_postdata();
    die;
}

add_action('wp_ajax_nopriv_more_video_ajax', 'more_video_ajax');
add_action('wp_ajax_more_video_ajax', 'more_video_ajax');

function more_comments_ajax() {
    global $post;
    $post = get_post($_POST['post_id']);
    setup_postdata($post);

    wp_list_comments( array(
        'page' => $_POST['page'], // current comment page
        'per_page' => get_option('comments_per_page'),
        'short_ping' => true,
        'callback' => 'custom_comments'
    ));

    die;
}

add_action('wp_ajax_nopriv_more_comments_ajax', 'more_comments_ajax');
add_action('wp_ajax_more_comments_ajax', 'more_comments_ajax');


function add_comment_ajax() {

    global $wpdb;
    $comment_post_ID = isset($_POST['comment_post_ID']) ? (int) $_POST['comment_post_ID'] : 0;

    $post = get_post($comment_post_ID);

    if ( empty($post->comment_status) ) {
        do_action('comment_id_not_found', $comment_post_ID);
        exit;
    }

    $status = get_post_status($post);

    $status_obj = get_post_status_object($status);

    /*
     * различные проверки комментария
     */
    if ( !comments_open($comment_post_ID) ) {
        do_action('comment_closed', $comment_post_ID);
        wp_die( __('Sorry, comments are closed for this item.') );
    } elseif ( 'trash' == $status ) {
        do_action('comment_on_trash', $comment_post_ID);
        exit;
    } elseif ( !$status_obj->public && !$status_obj->private ) {
        do_action('comment_on_draft', $comment_post_ID);
        exit;
    } elseif ( post_password_required($comment_post_ID) ) {
        do_action('comment_on_password_protected', $comment_post_ID);
        exit;
    } else {
        do_action('pre_comment_on_post', $comment_post_ID);
    }

    $comment_author       = ( isset($_POST['author']) )  ? trim(strip_tags($_POST['author'])) : null;
    $comment_author_email = ( isset($_POST['email']) )   ? trim($_POST['email']) : null;
    $comment_author_url   = ( isset($_POST['url']) )     ? trim($_POST['url']) : null;
    $comment_content      = ( isset($_POST['comment']) ) ? trim($_POST['comment']) : null;

    /*
     * проверяем, залогинен ли пользователь
     */
    $user = wp_get_current_user();
    if ( $user->exists() ) {
        if ( empty( $user->display_name ) )
            $user->display_name=$user->user_login;
        $comment_author       = $wpdb->escape($user->display_name);
        $comment_author_email = $wpdb->escape($user->user_email);
        $comment_author_url   = $wpdb->escape($user->user_url);
        $user_ID = get_current_user_id();
        if ( current_user_can('unfiltered_html') ) {
            if ( wp_create_nonce('unfiltered-html-comment_' . $comment_post_ID) != $_POST['_wp_unfiltered_html_comment'] ) {
                kses_remove_filters(); // start with a clean slate
                kses_init_filters(); // set up the filters
            }
        }
    } else {
        if ( get_option('comment_registration') || 'private' == $status )
            wp_die( 'Вы должны зарегистрироваться или войти, чтобы оставлять комментарии.' );
    }

    $comment_type = '';

    /*
     * проверяем, заполнил ли пользователь все необходимые поля
      */
    if ( get_option('require_name_email') && !$user->exists() ) {
        if ( 6 > strlen($comment_author_email) || '' == $comment_author )
            wp_die( 'Ошибка: заполните необходимые поля (Имя, Email).' );
		elseif ( !is_email($comment_author_email))
            wp_die( 'Ошибка: введенный вами email некорректный.' );
    }

    if ( '' == trim($comment_content) ||  '<p><br></p>' == $comment_content )
        wp_die( 'Вы забыли про комментарий.' );

    /*
     * добавляем новый коммент и сразу же обращаемся к нему
     */
    $comment_parent = isset($_POST['comment_parent']) ? absint($_POST['comment_parent']) : 0;
    $commentdata = compact('comment_post_ID', 'comment_author', 'comment_author_email', 'comment_author_url', 'comment_content', 'comment_type', 'comment_parent', 'user_ID');
    $comment_id = wp_new_comment( $commentdata );
    $comment = get_comment($comment_id);

    /*
     * выставляем кукисы
     */
    do_action('set_comment_cookies', $comment, $user);

    /*
     * вложенность комментариев
     */
    $comment_depth = 1;
    while ($comment_parent) {
        $comment_depth++;
        $parent_comment = get_comment($comment_parent);
        $comment_parent = $parent_comment->comment_parent;
    }

    $GLOBALS['comment'] = $comment;
    $GLOBALS['comment_depth'] = $comment_depth;

    $params['comment'] = $comment;
    $params['args'] = [];
    $params['depth'] = $comment_depth;

    if ($_POST['comment_parent']) {
        $out = get_template_part('comment-templates/reply', '', $params);
    } else {
        $out = get_template_part('comment-templates/comment', '', $params);
    }

    die($out);
}

add_action('wp_ajax_nopriv_add_comment_ajax', 'add_comment_ajax');
add_action('wp_ajax_add_comment_ajax', 'add_comment_ajax');

function get_top_level_comments_number($post_id) {

    global $wpdb;

    return $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments WHERE comment_parent = 0 AND comment_post_ID = " . $post_id);

}

add_filter( 'excerpt_length', function(){
    return 22;
} );

add_filter('excerpt_more', function($more) {
    return '...';
});

function add_aside_post_number_field_to_general_admin_page(){
    $option_name = 'aside_post_number';

    register_setting( 'general', $option_name );

    add_settings_field(
        'aside_post_number',
        'Aside Posts Number',
        'aside_post_number_setting_callback_function',
        'general',
        'default',
        array(
            'id' => 'aside_post_number',
            'option_name' => 'aside_post_number'
        )
    );
}

function aside_post_number_setting_callback_function( $val ){
    $id = $val['id'];
    $option_name = $val['option_name'];
    ?>
	<input
			type="text"
			name="<? echo $option_name ?>"
			id="<? echo $id ?>"
			value="<? echo esc_attr( get_option($option_name) ) ?>"
	/>
    <?
}

add_action('admin_menu', 'add_aside_post_number_field_to_general_admin_page');

function add_other_post_number_field_to_general_admin_page(){
    $option_name = 'other_post_number';

    register_setting( 'general', $option_name );

    add_settings_field(
        'other_post_number',
        'Other Posts Number',
        'other_post_number_setting_callback_function',
        'general',
        'default',
        array(
            'id' => 'other_post_number',
            'option_name' => 'other_post_number'
        )
    );
}

function other_post_number_setting_callback_function( $val ){
    $id = $val['id'];
    $option_name = $val['option_name'];
    ?>
	<input
			type="text"
			name="<? echo $option_name ?>"
			id="<? echo $id ?>"
			value="<? echo esc_attr( get_option($option_name) ) ?>"
	/>
    <?
}

add_action('admin_menu', 'add_other_post_number_field_to_general_admin_page');

function add_video_post_number_field_to_general_admin_page(){
    $option_name = 'video_post_number';

    register_setting( 'general', $option_name );

    add_settings_field(
        'video_post_number',
        'Video Posts Number',
        'video_post_number_setting_callback_function',
        'general',
        'default',
        array(
            'id' => 'video_post_number',
            'option_name' => 'video_post_number'
        )
    );
}

function video_post_number_setting_callback_function( $val ){
    $id = $val['id'];
    $option_name = $val['option_name'];
    ?>
	<input
			type="text"
			name="<? echo $option_name ?>"
			id="<? echo $id ?>"
			value="<? echo esc_attr( get_option($option_name) ) ?>"
	/>
    <?
}

add_action('admin_menu', 'add_video_post_number_field_to_general_admin_page');

function add_video_slide_number_field_to_general_admin_page(){
    $option_name = 'video_slide_number';

    register_setting( 'general', $option_name );

    add_settings_field(
        'video_slide_number',
        'Video Slides Number',
        'video_slide_number_setting_callback_function',
        'general',
        'default',
        array(
            'id' => 'video_slide_number',
            'option_name' => 'video_slide_number'
        )
    );
}

function video_slide_number_setting_callback_function( $val ){
    $id = $val['id'];
    $option_name = $val['option_name'];
    ?>
	<input
			type="text"
			name="<? echo $option_name ?>"
			id="<? echo $id ?>"
			value="<? echo esc_attr( get_option($option_name) ) ?>"
	/>
    <?
}

add_action('admin_menu', 'add_video_slide_number_field_to_general_admin_page');

function getDuration($video_id){
    $json = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=contentDetails&id=" . $video_id . "&key=AIzaSyCxWyzW3cVrE34qa_Y_dsdeDXodXckbt-M");
    $jsonData = json_decode($json, true);

    foreach ($jsonData['items'] as $vidTime)
    {
        $duration = $vidTime['contentDetails']['duration'];
    }

    preg_match_all('/(\d+)/', $duration, $parts);
    $minutes = intval($parts[0][0]);
    $seconds = intval($parts[0][1]);

    return $minutes . ':' . $seconds;
}

function get_post_likes() {
    $likes = get_post_meta(get_the_ID(), "_post_like_count", true);
    if (!$likes) {
        $likes = 0;
    } else {
        $likes = sl_format_count($likes);
    }

    return $likes;
}

function add_class_to_heading($content){
    return preg_replace('/<h([^>]+)?>/', '<h$1 class="body-content__title">', $content, 1);
}
add_filter('the_content', 'add_class_to_heading');

function get_post_by_name($name) {
    $args = array(
        'name' => $name,
        'post_type' => 'author',
        'post_status' => 'publish',
        'numberposts' => 1
    );
    $author = get_posts($args);
    if ($author) {
        return $author[0];
    };
}

function quote_shortcode ($atts) {
    $author_name = $atts['author'];
    $quote = $atts['quote'];
    $author = get_post_by_name($author_name);
    $author_id = $author->ID;

    $full_name = get_field('first_name', $author_id) . ' ' . get_field('last_name', $author_id);
    $avatar = get_field('avatar', $author_id);

    $result = '<div class="body-content__quote quote-content">';
    $result .= '<div class="quote-content__icon"><img src="' . get_bloginfo("template_url") . '/assets/img/icons/quote.svg"></div>';
    $result .= '<div class="quote-content__text">' . $quote . '</div>';
    $result .= '<div class="quote-content__author"><img src="' . $avatar . '"><span>' . $full_name . '</span>';
    $result .= '</div></div>';

    return $result;
}

add_shortcode ('quote', 'quote_shortcode');

function video_shortcode () {
    $post_id = get_the_ID();

    $video_id = get_field('youtube_video_id', $post_id);
    $video_cover = get_field('video_cover', $post_id);

    if (!$video_id) {
        return "";
    }

    $result = '<a class="body-content__video popup-link icon-play" href="#video" data-video="' . $video_id . '">';
    $result .= '<img src="' . $video_cover . '">';
    $result .= '</a>';

    return $result;
}

add_shortcode ('video', 'video_shortcode');

/**
 * Load Custom Comments Layout file.
 */
require get_template_directory() . '/custom-comments.php';

// like plugin

/*
Name:  WordPress Post Like System
Description:  A simple and efficient post like system for WordPress.
Version:      0.5.2
Author:       Jon Masterson
Author URI:   http://jonmasterson.com/
License:
Copyright (C) 2015 Jon Masterson
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

/**
 * Register the stylesheets for the public-facing side of the site.
 * @since    0.5
 */
add_action( 'wp_enqueue_scripts', 'sl_enqueue_scripts' );
function sl_enqueue_scripts() {
    wp_enqueue_script( 'simple-likes-public-js', get_template_directory_uri() . '/assets/js/simple-likes-public.js', array( 'jquery' ), '0.5', false );
    wp_localize_script( 'simple-likes-public-js', 'simpleLikes', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'like' => __( 'Like', 'YourThemeTextDomain' ),
        'unlike' => __( 'Unlike', 'YourThemeTextDomain' )
    ) );
}

/**
 * Processes like/unlike
 * @since    0.5
 */
add_action( 'wp_ajax_nopriv_process_simple_like', 'process_simple_like' );
add_action( 'wp_ajax_process_simple_like', 'process_simple_like' );
function process_simple_like() {
    if (!is_user_logged_in()) {
        return false;
    }

    // Security
    $nonce = isset( $_REQUEST['nonce'] ) ? sanitize_text_field( $_REQUEST['nonce'] ) : 0;
    if ( !wp_verify_nonce( $nonce, 'simple-likes-nonce' ) ) {
        exit( __( 'Not permitted', 'YourThemeTextDomain' ) );
    }
    // Test if javascript is disabled
    $disabled = ( isset( $_REQUEST['disabled'] ) && $_REQUEST['disabled'] == true ) ? true : false;
    // Test if this is a comment
    $is_comment = ( isset( $_REQUEST['is_comment'] ) && $_REQUEST['is_comment'] == 1 ) ? 1 : 0;
    // Base variables
    $post_id = ( isset( $_REQUEST['post_id'] ) && is_numeric( $_REQUEST['post_id'] ) ) ? $_REQUEST['post_id'] : '';
    $result = array();
    $post_users = NULL;
    $like_count = 0;
    // Get plugin options
    if ( $post_id != '' ) {
        $count = ( $is_comment == 1 ) ? get_comment_meta( $post_id, "_comment_like_count", true ) : get_post_meta( $post_id, "_post_like_count", true ); // like count
        $count = ( isset( $count ) && is_numeric( $count ) ) ? $count : 0;
        if ( !already_liked( $post_id, $is_comment ) ) { // Like the post
            if ( is_user_logged_in() ) { // user is logged in
                $user_id = get_current_user_id();
                $post_users = post_user_likes( $user_id, $post_id, $is_comment );
                if ( $is_comment == 1 ) {
                    // Update User & Comment
                    $user_like_count = get_user_option( "_comment_like_count", $user_id );
                    $user_like_count =  ( isset( $user_like_count ) && is_numeric( $user_like_count ) ) ? $user_like_count : 0;
                    update_user_option( $user_id, "_comment_like_count", ++$user_like_count );
                    if ( $post_users ) {
                        update_comment_meta( $post_id, "_user_comment_liked", $post_users );
                    }
                } else {
                    // Update User & Post
                    $user_like_count = get_user_option( "_user_like_count", $user_id );
                    $user_like_count =  ( isset( $user_like_count ) && is_numeric( $user_like_count ) ) ? $user_like_count : 0;
                    update_user_option( $user_id, "_user_like_count", ++$user_like_count );
                    if ( $post_users ) {
                        update_post_meta( $post_id, "_user_liked", $post_users );
                    }
                }

                $like_count = ++$count;
                $response['status'] = "liked";
                $response['icon'] = get_liked_icon();
            }
//            else {
//                $user_ip = sl_get_ip();
//                $post_users = post_ip_likes( $user_ip, $post_id, $is_comment );
//                // Update Post
//                if ( $post_users ) {
//                    if ( $is_comment == 1 ) {
//                        update_comment_meta( $post_id, "_user_comment_IP", $post_users );
//                    } else {
//                        update_post_meta( $post_id, "_user_IP", $post_users );
//                    }
//                }
//            }
        } else { // Unlike the post
            if ( is_user_logged_in() ) { // user is logged in
                $user_id = get_current_user_id();
                $post_users = post_user_likes( $user_id, $post_id, $is_comment );
                // Update User
                if ( $is_comment == 1 ) {
                    $user_like_count = get_user_option( "_comment_like_count", $user_id );
                    $user_like_count =  ( isset( $user_like_count ) && is_numeric( $user_like_count ) ) ? $user_like_count : 0;
                    if ( $user_like_count > 0 ) {
                        update_user_option( $user_id, "_comment_like_count", --$user_like_count );
                    }
                } else {
                    $user_like_count = get_user_option( "_user_like_count", $user_id );
                    $user_like_count =  ( isset( $user_like_count ) && is_numeric( $user_like_count ) ) ? $user_like_count : 0;
                    if ( $user_like_count > 0 ) {
                        update_user_option( $user_id, '_user_like_count', --$user_like_count );
                    }
                }
                // Update Post
                if ( $post_users ) {
                    $uid_key = array_search( $user_id, $post_users );
                    unset( $post_users[$uid_key] );
                    if ( $is_comment == 1 ) {
                        update_comment_meta( $post_id, "_user_comment_liked", $post_users );
                    } else {
                        update_post_meta( $post_id, "_user_liked", $post_users );
                    }
                }

                $like_count = ( $count > 0 ) ? --$count : 0; // Prevent negative number
                $response['status'] = "unliked";
                $response['icon'] = get_unliked_icon();
            }
//            else { // user is anonymous
//                $user_ip = sl_get_ip();
//                $post_users = post_ip_likes( $user_ip, $post_id, $is_comment );
//                // Update Post
//                if ( $post_users ) {
//                    $uip_key = array_search( $user_ip, $post_users );
//                    unset( $post_users[$uip_key] );
//                    if ( $is_comment == 1 ) {
//                        update_comment_meta( $post_id, "_user_comment_IP", $post_users );
//                    } else {
//                        update_post_meta( $post_id, "_user_IP", $post_users );
//                    }
//                }
//            }
        }
        if ( $is_comment == 1 ) {
            update_comment_meta( $post_id, "_comment_like_count", $like_count );
            update_comment_meta( $post_id, "_comment_like_modified", date( 'Y-m-d H:i:s' ) );
        } else {
            update_post_meta( $post_id, "_post_like_count", $like_count );
            update_post_meta( $post_id, "_post_like_modified", date( 'Y-m-d H:i:s' ) );
        }

        $is_liked = already_liked( $post_id, $is_comment );

        $response['count'] = get_like_count( $like_count , $is_liked);
        $response['testing'] = $is_comment;
        if ( $disabled == true ) {
            if ( $is_comment == 1 ) {
                wp_redirect( get_permalink( get_the_ID() ) );
                exit();
            } else {
                wp_redirect( get_permalink( $post_id ) );
                exit();
            }
        } else {
            wp_send_json( $response );
        }
    }
}

/**
 * Utility to test if the post is already liked
 * @since    0.5
 */
function already_liked( $post_id, $is_comment ) {
    $post_users = NULL;
    $user_id = NULL;
    if ( is_user_logged_in() ) { // user is logged in
        $user_id = get_current_user_id();
        $post_meta_users = ( $is_comment == 1 ) ? get_comment_meta( $post_id, "_user_comment_liked" ) : get_post_meta( $post_id, "_user_liked" );
        if ( count( $post_meta_users ) != 0 ) {
            $post_users = $post_meta_users[0];
        }
    }
//    else { // user is anonymous
//        $user_id = sl_get_ip();
//        $post_meta_users = ( $is_comment == 1 ) ? get_comment_meta( $post_id, "_user_comment_IP" ) : get_post_meta( $post_id, "_user_IP" );
//        if ( count( $post_meta_users ) != 0 ) { // meta exists, set up values
//            $post_users = $post_meta_users[0];
//        }
//    }
    if ( is_array( $post_users ) && in_array( $user_id, $post_users ) ) {
        return true;
    } else {
        return false;
    }
} // already_liked()

/**
 * Output the like button
 * @since    0.5
 */
function get_simple_likes_button( $post_id, $is_comment = NULL ) {
    $is_comment = ( NULL == $is_comment ) ? 0 : 1;
    $output = '';
    $nonce = wp_create_nonce( 'simple-likes-nonce' ); // Security
    if ( $is_comment == 1 ) {
        $post_id_class = esc_attr( ' sl-comment-button-' . $post_id );
        $comment_class = esc_attr( ' sl-comment' );
        $like_count = get_comment_meta( $post_id, "_comment_like_count", true );
        $like_count = ( isset( $like_count ) && is_numeric( $like_count ) ) ? $like_count : 0;
    } else {
        $post_id_class = esc_attr( ' sl-button-' . $post_id );
        $comment_class = esc_attr( '' );
        $like_count = get_post_meta( $post_id, "_post_like_count", true );
        $like_count = ( isset( $like_count ) && is_numeric( $like_count ) ) ? $like_count : 0;
    }

    $is_liked = already_liked( $post_id, $is_comment );

    $count = get_like_count( $like_count, $is_liked );
    $icon_empty = get_unliked_icon();
    $icon_full = get_liked_icon();
    // Loader
    $loader = '<span id="sl-loader"></span>';
    // Liked/Unliked Variables
    if ( $is_liked ) {
        $class = esc_attr( ' liked active' );
        $title = __( 'Unlike', 'YourThemeTextDomain' );
        $icon = $icon_full;
    } else {
        $class = '';
        $title = __( 'Like', 'YourThemeTextDomain' );
        $icon = $icon_empty;
    };

    $output = "";
    if (is_user_logged_in()) {
        $output .= '<a href="' . admin_url( 'admin-ajax.php?action=process_simple_like' . '&post_id=' . $post_id . '&nonce=' . $nonce . '&is_comment=' . $is_comment . '&disabled=true' ) . '" class="sl-button' . $post_id_class . $class . $comment_class . '" data-nonce="' . $nonce . '" data-post-id="' . $post_id . '" data-iscomment="' . $is_comment . '" title="' . $title . '">';
    }

    if ( $is_comment == 1 ) {
        $output .= $count;
    } else if (is_user_logged_in()) {
        $output .= $icon;
    }

    if (is_user_logged_in()) {
        $output .= '</a>';
    }

    if ($is_comment == 0) {
        $output .= $count;
    }

    return $output;
} // get_simple_likes_button()

/**
 * Processes shortcode to manually add the button to posts
 * @since    0.5
 */
add_shortcode( 'jmliker', 'sl_shortcode' );
function sl_shortcode() {
    return get_simple_likes_button( get_the_ID(), 0 );
} // shortcode()

/**
 * Utility retrieves post meta user likes (user id array),
 * then adds new user id to retrieved array
 * @since    0.5
 */
function post_user_likes( $user_id, $post_id, $is_comment ) {
    $post_users = '';
    $post_meta_users = ( $is_comment == 1 ) ? get_comment_meta( $post_id, "_user_comment_liked" ) : get_post_meta( $post_id, "_user_liked" );
    if ( count( $post_meta_users ) != 0 ) {
        $post_users = $post_meta_users[0];
    }
    if ( !is_array( $post_users ) ) {
        $post_users = array();
    }
    if ( !in_array( $user_id, $post_users ) ) {
        $post_users['user-' . $user_id] = $user_id;
    }
    return $post_users;
} // post_user_likes()

/**
 * Utility retrieves post meta ip likes (ip array),
 * then adds new ip to retrieved array
 * @since    0.5
 */
function post_ip_likes( $user_ip, $post_id, $is_comment ) {
    $post_users = '';
    $post_meta_users = ( $is_comment == 1 ) ? get_comment_meta( $post_id, "_user_comment_IP" ) : get_post_meta( $post_id, "_user_IP" );
    // Retrieve post information
    if ( count( $post_meta_users ) != 0 ) {
        $post_users = $post_meta_users[0];
    }
    if ( !is_array( $post_users ) ) {
        $post_users = array();
    }
    if ( !in_array( $user_ip, $post_users ) ) {
        $post_users['ip-' . $user_ip] = $user_ip;
    }
    return $post_users;
} // post_ip_likes()

/**
 * Utility to retrieve IP address
 * @since    0.5
 */
function sl_get_ip() {
    if ( isset( $_SERVER['HTTP_CLIENT_IP'] ) && ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif ( isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) && ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = ( isset( $_SERVER['REMOTE_ADDR'] ) ) ? $_SERVER['REMOTE_ADDR'] : '0.0.0.0';
    }
    $ip = filter_var( $ip, FILTER_VALIDATE_IP );
    $ip = ( $ip === false ) ? '0.0.0.0' : $ip;
    return $ip;
} // sl_get_ip()

/**
 * Utility returns the button icon for "like" action
 * @since    0.5
 */
function get_liked_icon() {
    /* If already using Font Awesome with your theme, replace svg with: <i class="fa fa-heart"></i> */
    $icon = '<img src="' . get_bloginfo("template_url") . '/assets/img/icons/likeblog.svg">';
    return $icon;
} // get_liked_icon()

/**
 * Utility returns the button icon for "unlike" action
 * @since    0.5
 */
function get_unliked_icon() {
    /* If already using Font Awesome with your theme, replace svg with: <i class="fa fa-heart-o"></i> */
    $icon = '<img src="' . get_bloginfo("template_url") . '/assets/img/icons/likeblog.svg">';
    return $icon;
} // get_unliked_icon()

/**
 * Utility function to format the button count,
 * appending "K" if one thousand or greater,
 * "M" if one million or greater,
 * and "B" if one billion or greater (unlikely).
 * $precision = how many decimal points to display (1.25K)
 * @since    0.5
 */
function sl_format_count( $number ) {
    $precision = 2;
    if ( $number >= 1000 && $number < 1000000 ) {
        $formatted = number_format( $number/1000, $precision ).'K';
    } else if ( $number >= 1000000 && $number < 1000000000 ) {
        $formatted = number_format( $number/1000000, $precision ).'M';
    } else if ( $number >= 1000000000 ) {
        $formatted = number_format( $number/1000000000, $precision ).'B';
    } else {
        $formatted = $number; // Number is less than 1000
    }
    $formatted = str_replace( '.00', '', $formatted );
    return $formatted;
} // sl_format_count()

/**
 * Utility retrieves count plus count options,
 * returns appropriate format based on options
 * @since    0.5
 */
function get_like_count( $like_count, $is_liked ) {
    $like_text = __( 'Like', 'YourThemeTextDomain' );
    if ( is_numeric( $like_count ) && $like_count > 0 ) {
        $number = sl_format_count( $like_count );
    } else {
//        $number = $like_text;
        $number = 0;
    }
    $count = '<span class="likes-wrapper';

    if ($is_liked) {
        $count .= ' active';
    }

    $count .= '">';
    $count .= '<span class="likes-number">' . $number . '</span> likes';
    $count .= '</span>';

//    $count = $number;
    return $count;
} // get_like_count()

// User Profile List
add_action( 'show_user_profile', 'show_user_likes' );
add_action( 'edit_user_profile', 'show_user_likes' );
function show_user_likes( $user ) { ?>
	<table class="form-table">
		<tr>
			<th><label for="user_likes"><?php _e( 'You Like:', 'YourThemeTextDomain' ); ?></label></th>
			<td>
                <?php
                $types = get_post_types( array( 'public' => true ) );
                $args = array(
                    'numberposts' => -1,
                    'post_type' => $types,
                    'meta_query' => array (
                        array (
                            'key' => '_user_liked',
                            'value' => $user->ID,
                            'compare' => 'LIKE'
                        )
                    ) );
                $sep = '';
                $like_query = new WP_Query( $args );
                if ( $like_query->have_posts() ) : ?>
					<p>
                        <?php while ( $like_query->have_posts() ) : $like_query->the_post();
                            echo $sep; ?><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                            <?php
                            $sep = ' &middot; ';
                        endwhile;
                        ?>
					</p>
                <?php else : ?>
					<p><?php _e( 'You do not like anything yet.', 'YourThemeTextDomain' ); ?></p>
                <?php
                endif;
                wp_reset_postdata();
                ?>
			</td>
		</tr>
	</table>
<?php } // show_user_likes()