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

add_action( 'init', 'register_post_types' );
function register_post_types()
{
    register_post_type('hotel', [
        'label' => null,
        'labels' => [
            'name' => 'Hotel', // основное название для типа записи
            'singular_name' => 'Hotels', // название для одной записи этого типа
            'add_new' => 'Add hotel photo', // для добавления новой записи
            'add_new_item' => 'Add hotel photo', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item' => 'Edit hotel photo', // для редактирования типа записи
            'new_item' => 'New hotel photo', // текст новой записи
            'view_item' => 'View hotel photo', // для просмотра записи этого типа.
            'search_items' => 'Search hotel photo', // для поиска по этим типам записи
            'not_found' => 'Not found', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
            'parent_item_colon' => '', // для родителей (у древовидных типов)
            'menu_name' => 'Hotels Photos', // название меню
        ],
        'map_meta_cap' => true,
        'description' => '',
        'public' => true,
        'publicly_queryable' => true, // зависит от public
        'exclude_from_search' => true, // зависит от public
        'show_ui' => true, // зависит от public
        'show_in_nav_menus' => true, // зависит от public
        'show_in_menu' => true, // показывать ли в меню адмнки
        'show_in_admin_bar' => true, // зависит от show_in_menu
        'show_in_rest' => null, // добавить в REST API. C WP 4.7
        'rest_base' => null, // $post_type. C WP 4.7
        'menu_position' => 4,
        'menu_icon' => null,
	    'hierarchical' => false,
        'supports' => ['title'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies' => [],
        'has_archive' => false,
        'rewrite' => true,
        'query_var' => true,
    ]);

    register_post_type('index_top', [
        'label' => null,
        'labels' => [
            'name' => 'Index Top', // основное название для типа записи
            'singular_name' => 'Index Top', // название для одной записи этого типа
            'add_new' => 'Add index top', // для добавления новой записи
            'add_new_item' => 'Add index top', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item' => 'Edit index top', // для редактирования типа записи
            'new_item' => 'New index top', // текст новой записи
            'view_item' => 'View index top', // для просмотра записи этого типа.
            'search_items' => 'Search index top', // для поиска по этим типам записи
            'not_found' => 'Not found', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
            'parent_item_colon' => '', // для родителей (у древовидных типов)
            'menu_name' => 'Index Top', // название меню
        ],
        'capability_type' => 'post',
        'capabilities' => [
            'create_posts' => false,
            'delete_posts' => false,
            'delete_published_posts' => false,
            'delete_private_posts' => false,
        ],
        'map_meta_cap' => true,
        'description' => '',
        'public' => true,
        'publicly_queryable' => true, // зависит от public
        'exclude_from_search' => true, // зависит от public
        'show_ui' => true, // зависит от public
        'show_in_nav_menus' => true, // зависит от public
        'show_in_menu' => true, // показывать ли в меню адмнки
        'show_in_admin_bar' => true, // зависит от show_in_menu
        'show_in_rest' => null, // добавить в REST API. C WP 4.7
        'rest_base' => null, // $post_type. C WP 4.7
        'menu_position' => 4,
        'menu_icon' => null,
        'hierarchical' => false,
        'supports' => ['title'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies' => [],
        'has_archive' => false,
        'rewrite' => true,
        'query_var' => true,
    ]);

    register_post_type('index_bottom', [
        'label' => null,
        'labels' => [
            'name' => 'Index Bottom', // основное название для типа записи
            'singular_name' => 'Index Bottom', // название для одной записи этого типа
            'add_new' => 'Add index bottom', // для добавления новой записи
            'add_new_item' => 'Add index bottom', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item' => 'Edit index bottom', // для редактирования типа записи
            'new_item' => 'New index bottom', // текст новой записи
            'view_item' => 'View index bottom', // для просмотра записи этого типа.
            'search_items' => 'Search index bottom', // для поиска по этим типам записи
            'not_found' => 'Not found', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
            'parent_item_colon' => '', // для родителей (у древовидных типов)
            'menu_name' => 'Index Bottom', // название меню
        ],
        'capability_type' => 'post',
        'capabilities' => [
            'create_posts' => false,
            'delete_posts' => false,
            'delete_published_posts' => false,
            'delete_private_posts' => false,
        ],
        'map_meta_cap' => true,
        'description' => '',
        'public' => true,
        'publicly_queryable' => true, // зависит от public
        'exclude_from_search' => true, // зависит от public
        'show_ui' => true, // зависит от public
        'show_in_nav_menus' => true, // зависит от public
        'show_in_menu' => true, // показывать ли в меню адмнки
        'show_in_admin_bar' => true, // зависит от show_in_menu
        'show_in_rest' => null, // добавить в REST API. C WP 4.7
        'rest_base' => null, // $post_type. C WP 4.7
        'menu_position' => 4,
        'menu_icon' => null,
        'hierarchical' => false,
        'supports' => ['title'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies' => [],
        'has_archive' => false,
        'rewrite' => true,
        'query_var' => true,
    ]);

    register_post_type('why_invest', [
        'label' => null,
        'labels' => [
            'name' => 'Why Invest', // основное название для типа записи
            'singular_name' => 'Why Invest', // название для одной записи этого типа
            'add_new' => 'Add invest', // для добавления новой записи
            'add_new_item' => 'Add invest', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item' => 'Edit invest', // для редактирования типа записи
            'new_item' => 'New invest', // текст новой записи
            'view_item' => 'View invest', // для просмотра записи этого типа.
            'search_items' => 'Search investp', // для поиска по этим типам записи
            'not_found' => 'Not found', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
            'parent_item_colon' => '', // для родителей (у древовидных типов)
            'menu_name' => 'Index - Why Invest', // название меню
        ],
        'capability_type' => 'post',
        'capabilities' => [
            'create_posts' => false,
            'delete_posts' => false,
            'delete_published_posts' => false,
            'delete_private_posts' => false,
        ],
        'map_meta_cap' => true,
        'description' => '',
        'public' => true,
        'publicly_queryable' => true, // зависит от public
        'exclude_from_search' => true, // зависит от public
        'show_ui' => true, // зависит от public
        'show_in_nav_menus' => true, // зависит от public
        'show_in_menu' => true, // показывать ли в меню адмнки
        'show_in_admin_bar' => true, // зависит от show_in_menu
        'show_in_rest' => null, // добавить в REST API. C WP 4.7
        'rest_base' => null, // $post_type. C WP 4.7
        'menu_position' => 4,
        'menu_icon' => null,
        'hierarchical' => false,
        'supports' => ['title'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies' => [],
        'has_archive' => false,
        'rewrite' => true,
        'query_var' => true,
    ]);

    register_post_type('inspirer', [
        'label' => null,
        'labels' => [
            'name' => 'Inspirer', // основное название для типа записи
            'singular_name' => 'Inspirer', // название для одной записи этого типа
            'add_new' => 'Add inspirer', // для добавления новой записи
            'add_new_item' => 'Add inspirer', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item' => 'Edit inspirer', // для редактирования типа записи
            'new_item' => 'New inspirer', // текст новой записи
            'view_item' => 'View inspirer', // для просмотра записи этого типа.
            'search_items' => 'Search inspirer', // для поиска по этим типам записи
            'not_found' => 'Not found', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
            'parent_item_colon' => '', // для родителей (у древовидных типов)
            'menu_name' => 'Index - Inspirer', // название меню
        ],
        'capability_type' => 'post',
        'capabilities' => [
            'create_posts' => false,
            'delete_posts' => false,
            'delete_published_posts' => false,
            'delete_private_posts' => false,
        ],
        'map_meta_cap' => true,
        'description' => '',
        'public' => true,
        'publicly_queryable' => true, // зависит от public
        'exclude_from_search' => true, // зависит от public
        'show_ui' => true, // зависит от public
        'show_in_nav_menus' => true, // зависит от public
        'show_in_menu' => true, // показывать ли в меню адмнки
        'show_in_admin_bar' => true, // зависит от show_in_menu
        'show_in_rest' => null, // добавить в REST API. C WP 4.7
        'rest_base' => null, // $post_type. C WP 4.7
        'menu_position' => 4,
        'menu_icon' => null,
        'hierarchical' => false,
        'supports' => ['title'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies' => [],
        'has_archive' => false,
        'rewrite' => true,
        'query_var' => true,
    ]);

    register_post_type('work', [
        'label' => null,
        'labels' => [
            'name' => 'Work', // основное название для типа записи
            'singular_name' => 'Work', // название для одной записи этого типа
            'add_new' => 'Add work', // для добавления новой записи
            'add_new_item' => 'Add work', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item' => 'Edit work', // для редактирования типа записи
            'new_item' => 'New work', // текст новой записи
            'view_item' => 'View work', // для просмотра записи этого типа.
            'search_items' => 'Search work', // для поиска по этим типам записи
            'not_found' => 'Not found', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
            'parent_item_colon' => '', // для родителей (у древовидных типов)
            'menu_name' => 'Index - How', // название меню
        ],
        'capability_type' => 'post',
        'capabilities' => [
            'create_posts' => false,
            'delete_posts' => false,
            'delete_published_posts' => false,
            'delete_private_posts' => false,
        ],
        'map_meta_cap' => true,
        'description' => '',
        'public' => true,
        'publicly_queryable' => true, // зависит от public
        'exclude_from_search' => true, // зависит от public
        'show_ui' => true, // зависит от public
        'show_in_nav_menus' => true, // зависит от public
        'show_in_menu' => true, // показывать ли в меню адмнки
        'show_in_admin_bar' => true, // зависит от show_in_menu
        'show_in_rest' => null, // добавить в REST API. C WP 4.7
        'rest_base' => null, // $post_type. C WP 4.7
        'menu_position' => 4,
        'menu_icon' => null,
        'hierarchical' => false,
        'supports' => ['title'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies' => [],
        'has_archive' => false,
        'rewrite' => true,
        'query_var' => true,
    ]);

    register_post_type('review', [
        'label' => null,
        'labels' => [
            'name' => 'Reviews', // основное название для типа записи
            'singular_name' => 'Review', // название для одной записи этого типа
            'add_new' => 'Add review', // для добавления новой записи
            'add_new_item' => 'Add review', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item' => 'Edit review', // для редактирования типа записи
            'new_item' => 'New review', // текст новой записи
            'view_item' => 'View review', // для просмотра записи этого типа.
            'search_items' => 'Search review', // для поиска по этим типам записи
            'not_found' => 'Not found', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
            'parent_item_colon' => '', // для родителей (у древовидных типов)
            'menu_name' => 'Index - Reviews', // название меню
        ],
        'map_meta_cap' => true,
        'description' => '',
        'public' => true,
        'publicly_queryable' => true, // зависит от public
        'exclude_from_search' => true, // зависит от public
        'show_ui' => true, // зависит от public
        'show_in_nav_menus' => true, // зависит от public
        'show_in_menu' => true, // показывать ли в меню адмнки
        'show_in_admin_bar' => true, // зависит от show_in_menu
        'show_in_rest' => null, // добавить в REST API. C WP 4.7
        'rest_base' => null, // $post_type. C WP 4.7
        'menu_position' => 4,
        'menu_icon' => null,
        'hierarchical' => false,
        'supports' => ['title'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies' => [],
        'has_archive' => false,
        'rewrite' => true,
        'query_var' => true,
    ]);

    register_post_type('company', [
        'label' => null,
        'labels' => [
            'name' => 'Company', // основное название для типа записи
            'singular_name' => 'Company', // название для одной записи этого типа
            'add_new' => 'Add company', // для добавления новой записи
            'add_new_item' => 'Add company', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item' => 'Edit company', // для редактирования типа записи
            'new_item' => 'New company', // текст новой записи
            'view_item' => 'View company', // для просмотра записи этого типа.
            'search_items' => 'Search company', // для поиска по этим типам записи
            'not_found' => 'Not found', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
            'parent_item_colon' => '', // для родителей (у древовидных типов)
            'menu_name' => 'About - Company', // название меню
        ],
        'capability_type' => 'post',
        'capabilities' => [
            'create_posts' => false,
            'delete_posts' => false,
            'delete_published_posts' => false,
            'delete_private_posts' => false,
        ],
        'map_meta_cap' => true,
        'description' => '',
        'public' => true,
        'publicly_queryable' => true, // зависит от public
        'exclude_from_search' => true, // зависит от public
        'show_ui' => true, // зависит от public
        'show_in_nav_menus' => true, // зависит от public
        'show_in_menu' => true, // показывать ли в меню адмнки
        'show_in_admin_bar' => true, // зависит от show_in_menu
        'show_in_rest' => null, // добавить в REST API. C WP 4.7
        'rest_base' => null, // $post_type. C WP 4.7
        'menu_position' => 4,
        'menu_icon' => null,
        'hierarchical' => false,
        'supports' => ['title'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies' => [],
        'has_archive' => false,
        'rewrite' => true,
        'query_var' => true,
    ]);

    register_post_type('contacts', [
        'label' => null,
        'labels' => [
            'name' => 'Contacts', // основное название для типа записи
            'singular_name' => 'Contacts', // название для одной записи этого типа
            'add_new' => 'Add contacts', // для добавления новой записи
            'add_new_item' => 'Add contacts', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item' => 'Edit contacts', // для редактирования типа записи
            'new_item' => 'New contacts', // текст новой записи
            'view_item' => 'View contacts', // для просмотра записи этого типа.
            'search_items' => 'Search contacts', // для поиска по этим типам записи
            'not_found' => 'Not found', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
            'parent_item_colon' => '', // для родителей (у древовидных типов)
            'menu_name' => 'Contacts', // название меню
        ],
        'capability_type' => 'post',
        'capabilities' => [
            'create_posts' => false,
            'delete_posts' => false,
            'delete_published_posts' => false,
            'delete_private_posts' => false,
        ],
        'map_meta_cap' => true,
        'description' => '',
        'public' => true,
        'publicly_queryable' => true, // зависит от public
        'exclude_from_search' => true, // зависит от public
        'show_ui' => true, // зависит от public
        'show_in_nav_menus' => true, // зависит от public
        'show_in_menu' => true, // показывать ли в меню адмнки
        'show_in_admin_bar' => true, // зависит от show_in_menu
        'show_in_rest' => null, // добавить в REST API. C WP 4.7
        'rest_base' => null, // $post_type. C WP 4.7
        'menu_position' => 4,
        'menu_icon' => null,
        'hierarchical' => false,
        'supports' => ['title'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies' => [],
        'has_archive' => false,
        'rewrite' => true,
        'query_var' => true,
    ]);

    register_post_type('about', [
        'label' => null,
        'labels' => [
            'name' => 'About Us', // основное название для типа записи
            'singular_name' => 'About Us', // название для одной записи этого типа
            'add_new' => 'Add about', // для добавления новой записи
            'add_new_item' => 'Add about', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item' => 'Edit about', // для редактирования типа записи
            'new_item' => 'New about', // текст новой записи
            'view_item' => 'View about', // для просмотра записи этого типа.
            'search_items' => 'Search about', // для поиска по этим типам записи
            'not_found' => 'Not found', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
            'parent_item_colon' => '', // для родителей (у древовидных типов)
            'menu_name' => 'About Us', // название меню
        ],
        'capability_type' => 'post',
        'capabilities' => [
            'create_posts' => false,
            'delete_posts' => false,
            'delete_published_posts' => false,
            'delete_private_posts' => false,
        ],
        'map_meta_cap' => true,
        'description' => '',
        'public' => true,
        'publicly_queryable' => true, // зависит от public
        'exclude_from_search' => true, // зависит от public
        'show_ui' => true, // зависит от public
        'show_in_nav_menus' => true, // зависит от public
        'show_in_menu' => true, // показывать ли в меню адмнки
        'show_in_admin_bar' => true, // зависит от show_in_menu
        'show_in_rest' => null, // добавить в REST API. C WP 4.7
        'rest_base' => null, // $post_type. C WP 4.7
        'menu_position' => 4,
        'menu_icon' => null,
        'hierarchical' => false,
        'supports' => ['title'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies' => [],
        'has_archive' => false,
        'rewrite' => true,
        'query_var' => true,
    ]);
}
