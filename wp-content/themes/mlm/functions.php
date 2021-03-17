<?php

add_action('wp_enqueue_scripts', 'enqueue_styles');
add_action('wp_footer', 'enqueue_scripts');

function enqueue_styles()
{
    wp_enqueue_style('bda-style', get_stylesheet_uri(), array(), date("h:i:s"));
}

function enqueue_scripts()
{
    wp_register_script('jquery-v-3', get_template_directory_uri() . '/assets/js/jquery-3.5.1.min.js', array(), date("h:i:s"));
    wp_enqueue_script('jquery-v-3');

//    wp_register_script('app', get_template_directory_uri() . '/assets/js/app.js', array(), date("h:i:s"));
//    wp_enqueue_script('app');

    wp_register_script('scroll', get_template_directory_uri() . '/assets/js/smoothScroll.js', array(), date("h:i:s"));
    wp_enqueue_script('scroll');

    wp_register_script('vendors', get_template_directory_uri() . '/assets/js/vendors.js', array(), date("h:i:s"));
    wp_enqueue_script('vendors');

    wp_register_script('slick', get_template_directory_uri() . '/assets/js/slick.min.js', array(), date("h:i:s"));
    wp_enqueue_script('slick');

    wp_register_script('main', get_template_directory_uri() . '/assets/js/main.js', array(), date("h:i:s"));
    wp_enqueue_script('main');
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

function remove_menus() {
    remove_menu_page( 'edit.php' ); //Posts
}

add_filter('script_loader_tag', 'add_type_attribute' , 10, 3);

add_action( 'admin_menu', 'remove_menus' );

add_theme_support( 'menus' );

add_action( 'init', 'register_post_types' );
function register_post_types(){
    register_post_type( 'video', [
        'label'  => null,
        'labels' => [
            'name'               => 'Video', // основное название для типа записи
            'singular_name'      => 'Video', // название для одной записи этого типа
            'add_new'            => 'Add video', // для добавления новой записи
            'add_new_item'       => 'Add video', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Edit video', // для редактирования типа записи
            'new_item'           => 'New video', // текст новой записи
            'view_item'          => 'View video', // для просмотра записи этого типа.
            'search_items'       => 'Search video', // для поиска по этим типам записи
            'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Video', // название меню
        ],
        'description'         => '',
        'public'              => true,
        'publicly_queryable'  => true, // зависит от public
        'exclude_from_search' => true, // зависит от public
        'show_ui'             => true, // зависит от public
        'show_in_nav_menus'   => true, // зависит от public
        'show_in_menu'        => true, // показывать ли в меню адмнки
        'show_in_admin_bar'   => true, // зависит от show_in_menu
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => 4,
        'menu_icon'           => null,
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => ['title'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => [],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ] );

    register_post_type( 'results', [
        'label'  => null,
        'labels' => [
            'name'               => 'Real Stories', // основное название для типа записи
            'singular_name'      => 'Real Story', // название для одной записи этого типа
            'add_new'            => 'Add story', // для добавления новой записи
            'add_new_item'       => 'Add story', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Edit story', // для редактирования типа записи
            'new_item'           => 'New story', // текст новой записи
            'view_item'          => 'View story', // для просмотра записи этого типа.
            'search_items'       => 'Search story', // для поиска по этим типам записи
            'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Stories', // название меню
        ],
        'description'         => '',
        'public'              => true,
        'publicly_queryable'  => true, // зависит от public
        'exclude_from_search' => true, // зависит от public
        'show_ui'             => true, // зависит от public
        'show_in_nav_menus'   => true, // зависит от public
        'show_in_menu'        => true, // показывать ли в меню адмнки
        'show_in_admin_bar'   => true, // зависит от show_in_menu
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => 4,
        'menu_icon'           => null,
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => ['title'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => [],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ] );

    register_post_type( 'questions', [
        'label'  => null,
        'labels' => [
            'name'               => 'Questions', // основное название для типа записи
            'singular_name'      => 'Question', // название для одной записи этого типа
            'add_new'            => 'Add question', // для добавления новой записи
            'add_new_item'       => 'Add question', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Edit question', // для редактирования типа записи
            'new_item'           => 'New question', // текст новой записи
            'view_item'          => 'View question', // для просмотра записи этого типа.
            'search_items'       => 'Search question', // для поиска по этим типам записи
            'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'FAQ', // название меню
        ],
        'description'         => '',
        'public'              => true,
        'publicly_queryable'  => true, // зависит от public
        'exclude_from_search' => true, // зависит от public
        'show_ui'             => true, // зависит от public
        'show_in_nav_menus'   => true, // зависит от public
        'show_in_menu'        => true, // показывать ли в меню адмнки
        'show_in_admin_bar'   => true, // зависит от show_in_menu
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => 4,
        'menu_icon'           => null,
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => ['title'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => [],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ] );

    register_post_type( 'review', [
        'label'  => null,
        'labels' => [
            'name'               => 'Reviews', // основное название для типа записи
            'singular_name'      => 'Review', // название для одной записи этого типа
            'add_new'            => 'Add review', // для добавления новой записи
            'add_new_item'       => 'Add review', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Edit review', // для редактирования типа записи
            'new_item'           => 'New review', // текст новой записи
            'view_item'          => 'View review', // для просмотра записи этого типа.
            'search_items'       => 'Search review', // для поиска по этим типам записи
            'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Reviews', // название меню
        ],
        'description'         => '',
        'public'              => true,
        'publicly_queryable'  => true, // зависит от public
        'exclude_from_search' => true, // зависит от public
        'show_ui'             => true, // зависит от public
        'show_in_nav_menus'   => true, // зависит от public
        'show_in_menu'        => true, // показывать ли в меню адмнки
        'show_in_admin_bar'   => true, // зависит от show_in_menu
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => 4,
        'menu_icon'           => null,
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => ['title'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => [],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ] );

    register_post_type( 'contact', [
        'label'  => null,
        'labels' => [
            'name'               => 'Contact', // основное название для типа записи
            'singular_name'      => 'Contact', // название для одной записи этого типа
            'add_new'            => 'Add contact', // для добавления новой записи
            'add_new_item'       => 'Add contact', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Edit contact', // для редактирования типа записи
            'new_item'           => 'New contact', // текст новой записи
            'view_item'          => 'View contact', // для просмотра записи этого типа.
            'search_items'       => 'Search contact', // для поиска по этим типам записи
            'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Contact Us', // название меню
        ],
        'description'         => '',
        'public'              => true,
        'publicly_queryable'  => true, // зависит от public
        'exclude_from_search' => true, // зависит от public
        'show_ui'             => true, // зависит от public
        'show_in_nav_menus'   => true, // зависит от public
        'show_in_menu'        => true, // показывать ли в меню адмнки
        'show_in_admin_bar'   => true, // зависит от show_in_menu
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => 4,
        'menu_icon'           => null,
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => ['title'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => [],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ] );

    register_post_type( 'copyright', [
        'label'  => null,
        'labels' => [
            'name'               => 'Copyright', // основное название для типа записи
            'singular_name'      => 'Copyright', // название для одной записи этого типа
            'add_new'            => 'Add copyright', // для добавления новой записи
            'add_new_item'       => 'Add copyright', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Edit copyright', // для редактирования типа записи
            'new_item'           => 'New copyright', // текст новой записи
            'view_item'          => 'View copyright', // для просмотра записи этого типа.
            'search_items'       => 'Search copyright', // для поиска по этим типам записи
            'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Copyright', // название меню
        ],
        'description'         => '',
        'public'              => true,
        'publicly_queryable'  => true, // зависит от public
        'exclude_from_search' => true, // зависит от public
        'show_ui'             => true, // зависит от public
        'show_in_nav_menus'   => true, // зависит от public
        'show_in_menu'        => true, // показывать ли в меню адмнки
        'show_in_admin_bar'   => true, // зависит от show_in_menu
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => 4,
        'menu_icon'           => null,
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => ['title', 'editor'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => [],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ] );
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

function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}

add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);