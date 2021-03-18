<?php

add_action('wp_enqueue_scripts', 'enqueue_styles');
add_action('wp_footer', 'enqueue_scripts');

function enqueue_styles()
{
    wp_enqueue_style('mlm-style', get_stylesheet_uri(), array(), date("h:i:s"));

    wp_register_style('open-sans-font', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap', array());
    wp_enqueue_style('open-sans-font');

    wp_register_style('owl-carousel', get_template_directory_uri() . '/assets/js/owl-carousel/owl.carousel.min.css', array(), date("h:i:s"));
    wp_enqueue_style('owl-carousel');

    if (is_page('Packages')) {
        wp_register_style('packages', get_template_directory_uri() . '/assets/css/packages.css', array(), date("h:i:s"));
        wp_enqueue_style('packages');
    } else if (is_page('Package')) {
        wp_register_style('package', get_template_directory_uri() . '/assets/css/single-package.css', array(), date("h:i:s"));
        wp_enqueue_style('package');
    } else if (is_page('About')) {
        wp_register_style('about-page', get_template_directory_uri() . '/assets/css/about.css', array(), date("h:i:s"));
        wp_enqueue_style('about-page');
    } else if (is_page('Contact Us')) {
        wp_register_style('contacts', get_template_directory_uri() . '/assets/css/contacts.css', array(), date("h:i:s"));
        wp_enqueue_style('contacts');
    }
}

function enqueue_scripts()
{
    wp_register_script('preloader-main', get_template_directory_uri() . '/assets/js/preloader-main.js', array(), date("h:i:s"));
    wp_enqueue_script('preloader-main');

    wp_register_script('preloader', get_template_directory_uri() . '/assets/js/preloader.js', array(), date("h:i:s"));
    wp_enqueue_script('preloader');

    wp_register_script('jquery-3.5.1.min', 'https://code.jquery.com/jquery-3.5.1.min.js', array());
    wp_enqueue_script('jquery-3.5.1.min');

    wp_register_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl-carousel/owl.carousel.min.js', array(), date("h:i:s"));
    wp_enqueue_script('owl-carousel');

    wp_register_script('main', get_template_directory_uri() . '/assets/js/main.js', array(), date("h:i:s"));
    wp_enqueue_script('main');

    wp_register_script('carousels', get_template_directory_uri() . '/assets/js/carousels.js', array(), date("h:i:s"));
    wp_enqueue_script('carousels');

    wp_register_script('business', get_template_directory_uri() . '/assets/js/api/business.js', array(), date("h:i:s"));
    wp_enqueue_script('business');

    wp_register_script('packages', get_template_directory_uri() . '/assets/js/packages.js', array(), date("h:i:s"));
    wp_enqueue_script('packages');
}

function add_type_attribute($tag, $handle, $src) {
    // if not your script, do nothing and return original $tag
    if ( 'main' !== $handle ) {
        return $tag;
    }
    // change the script tag by adding type="module" and return it.
    $tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
    return $tag;
}

function year_shortcode () {
    $year = date_i18n ('Y');
    return $year;
}
add_shortcode ('year', 'year_shortcode');

function send_mail()
{
    $headers = array(
        'From: Business Dept Adjusters <root@takasho.work>',
        'content-type: text/html',
    );

    $to = get_option('letters_email');; // place wp admin email here
    $subject = stripslashes("Form from BDA Landing");

    $b = [];
    foreach ($_POST as $key => $value) {
        $b[] = "<b>{$key}</b>: " . stripslashes($value);
    }

    $body = implode('<br>', $b);

    $result = wp_mail($to, $subject, $body, $headers);

    if ($result) {
        $data = [
            'error' => 0,
            'message' => 'Email success sent!'
        ];
    } else {
        $data = [
            'error' => 1,
            'message' => 'Sorry, email not sent'
        ];
    }

    echo wp_json_encode($data);
    die;
}

add_action('wp_ajax_send_mail', 'send_mail');
add_action('wp_ajax_nopriv_send_mail', 'send_mail');

function add_email_field_to_general_admin_page(){
    $option_name = 'letters_email';

    // регистрируем опцию
    register_setting( 'general', $option_name );

    // добавляем поле
    add_settings_field(
        'letters_email',
        'Email For Letters',
        'letters_email_setting_callback_function',
        'general',
        'default',
        array(
            'id' => 'letters_email',
            'option_name' => 'letters_email'
        )
    );
}

function letters_email_setting_callback_function( $val ){
    $id = $val['id'];
    $option_name = $val['option_name'];
    ?>
	<input
			type="email"
			name="<? echo $option_name ?>"
			size="50"
			id="<? echo $id ?>"
			value="<? echo esc_attr( get_option($option_name) ) ?>"
	/>
    <?
}

add_action('admin_menu', 'add_email_field_to_general_admin_page');

function add_phone_field_to_general_admin_page(){
    $option_name = 'phone_number';

    // регистрируем опцию
    register_setting( 'general', $option_name );

    // добавляем поле
    add_settings_field(
        'phone_number',
        'Phone Number',
        'phone_number_setting_callback_function',
        'general',
        'default',
        array(
            'id' => 'phone_number',
            'option_name' => 'phone_number'
        )
    );
}

function phone_number_setting_callback_function( $val ){
    $id = $val['id'];
    $option_name = $val['option_name'];
    ?>
	<input
			type="text"
			size="50"
			name="<? echo $option_name ?>"
			id="<? echo $id ?>"
			value="<? echo esc_attr( get_option($option_name) ) ?>"
	/>
    <?
}

add_action('admin_menu', 'add_phone_field_to_general_admin_page');

function add_site_url_field_to_general_admin_page(){
    $option_name = 'site_url';

    register_setting( 'general', $option_name );

    add_settings_field(
        'site_url',
        'Site Url',
        'site_url_setting_callback_function',
        'general',
        'default',
        array(
            'id' => 'site_url',
            'option_name' => 'site_url'
        )
    );
}

function site_url_setting_callback_function( $val ){
    $id = $val['id'];
    $option_name = $val['option_name'];
    ?>
	<input
			type="text"
			size="50"
			name="<? echo $option_name ?>"
			id="<? echo $id ?>"
			value="<? echo esc_attr( get_option($option_name) ) ?>"
	/>
    <?
}

add_action('admin_menu', 'add_site_url_field_to_general_admin_page');

function add_business_id_field_to_general_admin_page(){
    $option_name = 'business_id';

    register_setting( 'general', $option_name );

    add_settings_field(
        'business_id',
        'Business Id',
        'site_business_id_setting_callback_function',
        'general',
        'default',
        array(
            'id' => 'business_id',
            'option_name' => 'business_id'
        )
    );
}

function site_business_id_setting_callback_function( $val ){
    $id = $val['id'];
    $option_name = $val['option_name'];
    ?>
	<input
			type="text"
			size="50"
			name="<? echo $option_name ?>"
			id="<? echo $id ?>"
			value="<? echo esc_attr( get_option($option_name) ) ?>"
	/>
    <?
}

add_action('admin_menu', 'add_business_id_field_to_general_admin_page');

function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}

add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function add_cors_http_header(){
    header("Access-Control-Allow-Origin: *");
}
add_action('init','add_cors_http_header');

