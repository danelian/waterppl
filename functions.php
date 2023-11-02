<?php  

/**
 * Добавление возможностей
 */
if (! function_exists('freediving_setup')) {
	function freediving_setup() {
    add_theme_support( 'custom-logo', [
      'height'      => 33,
      'width'       => 168,
      'flex-width'  => false,
      'flex-height' => false,
      'header-text' => '',
      'unlink-homepage-logo' => false, // WP 5.5
    ] );
		// Добавляем динамический <title>
		add_theme_support( 'title-tag' );
    // Добавление миниатюр для постов
    add_theme_support( 'post-thumbnails', array('team') );
	}
	add_action( 'after_setup_theme', 'freediving_setup' );
}

/**
 * Подключение стилей и скриптов
 */
function freediving_scripts() {
  // STYLES
  // Main style
  wp_enqueue_style('main', get_template_directory_uri());
  // Swiper
  wp_enqueue_style('swiper', get_template_directory_uri() . '/src/css/swiper-bundle.min.css');
  // Fancybox
  wp_enqueue_style('fancybox', get_template_directory_uri() . '/src/css/fancybox.min.css');
  // AOS
  // wp_enqueue_style('aos', get_template_directory_uri() . '/src/css/aos.min.css');
  // wp_enqueue_style('animate', get_template_directory_uri() . '/src/css/animate.min.css');
  // App style
  wp_enqueue_style('app', get_template_directory_uri() . '/src/css/main.css', array( 'swiper', 'fancybox' ), null);

  // SCRIPTS
  // Swiper
  wp_enqueue_script('swiper', get_template_directory_uri() . '/src/js/swiper-bundle.min.js', array(), null, true);
  // Fancybox
  wp_enqueue_script('fancybox', get_template_directory_uri() . '/src/js/fancybox.min.js', array(), null, true);
  // AOS
  // wp_enqueue_script('aos', get_template_directory_uri() . '/src/js/aos.min.js', array(), null, true);
  // wp_enqueue_script('scrollreveal', get_template_directory_uri() . '/src/js/scrollreveal.min.js', array(), null, true);
  // App js
  wp_enqueue_script('main', get_template_directory_uri() . '/src/js/main.js', array('swiper', 'fancybox'), null, true);
}
add_action('wp_enqueue_scripts', 'freediving_scripts');


/**
 * Регистрация областей меню
 */
function freediving_menus() {
  $locations = array(
    'header' => __('Header Menu', 'freediving'),
  );
  register_nav_menus($locations);
}
add_action('init', 'freediving_menus');
// классы tailwind для пунктов меню
add_filter( 'nav_menu_link_attributes', 'custom_nav_menu_link_attributes', 10);
function custom_nav_menu_link_attributes($atts) {
	$atts['class'] = 'inline-block text-base text-white hover:opacity-80 min-[1284px]:text-xl';
	return $atts;
}


/**
 * Отключение создания миниатюр файлов для указанных размеров
 */
add_filter( 'intermediate_image_sizes', 'delete_intermediate_image_sizes' );
function delete_intermediate_image_sizes( $sizes ){
	return array_diff( $sizes, [
		'medium_large',
		'large',
		'1536x1536',
		'2048x2048',
	] );
}


/**
 * Регистрация типов постов
 */
add_action( 'init', 'register_post_types' );

function register_post_types(){

	register_post_type( 'trips', [
		'label'  => null,
		'labels' => [
			'name'               => 'Trips', // основное название для типа записи
			'singular_name'      => 'Trip', // название для одной записи этого типа
			'add_new'            => 'Add trip', // для добавления новой записи
			'add_new_item'       => 'Add trip', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Edit trip', // для редактирования типа записи
			'new_item'           => 'New trip', // текст новой записи
			'view_item'          => 'Look trip', // для просмотра записи этого типа.
			'search_items'       => 'Search trip', // для поиска по этим типам записи
			'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Not found in cart', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Trips', // название меню
		],
		'description'            => '',
		'public'                 => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'           => null, // показывать ли в меню админки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-admin-post',
		'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );

	register_post_type( 'courses', [
		'label'  => null,
		'labels' => [
			'name'               => 'Courses', // основное название для типа записи
			'singular_name'      => 'Course', // название для одной записи этого типа
			'add_new'            => 'Add course', // для добавления новой записи
			'add_new_item'       => 'Add course', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Edit course', // для редактирования типа записи
			'new_item'           => 'New course', // текст новой записи
			'view_item'          => 'Look course', // для просмотра записи этого типа.
			'search_items'       => 'Search course', // для поиска по этим типам записи
			'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Not found in cart', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Courses', // название меню
		],
		'description'            => '',
		'public'                 => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'           => null, // показывать ли в меню админки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-admin-post',
		'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );

	register_post_type( 'team', [
		'label'  => null,
		'labels' => [
			'name'               => 'Team', // основное название для типа записи
			'singular_name'      => 'Teammate', // название для одной записи этого типа
			'add_new'            => 'Add teammate', // для добавления новой записи
			'add_new_item'       => 'Add teammate', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Edit teammate', // для редактирования типа записи
			'new_item'           => 'New teammate', // текст новой записи
			'view_item'          => 'Look teammate', // для просмотра записи этого типа.
			'search_items'       => 'Search teammate', // для поиска по этим типам записи
			'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Not found in cart', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Team', // название меню
		],
		'description'            => '',
		'public'                 => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'           => null, // показывать ли в меню админки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-groups',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'thumbnail', 'excerpt' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );

  register_post_type( 'faq', [
		'label'  => null,
		'labels' => [
			'name'               => 'FAQ', // основное название для типа записи
			'singular_name'      => 'question', // название для одной записи этого типа
			'add_new'            => 'Add question', // для добавления новой записи
			'add_new_item'       => 'Add question', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Edit question', // для редактирования типа записи
			'new_item'           => 'New question', // текст новой записи
			'view_item'          => 'Look question', // для просмотра записи этого типа.
			'search_items'       => 'Search question', // для поиска по этим типам записи
			'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Not found in cart', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'FAQ', // название меню
		],
		'description'            => '',
		'public'                 => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'           => null, // показывать ли в меню админки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-format-quote',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );

  register_post_type( 'reviews', [
		'label'  => null,
		'labels' => [
			'name'               => 'Reviews', // основное название для типа записи
			'singular_name'      => 'Review', // название для одной записи этого типа
			'add_new'            => 'Add review', // для добавления новой записи
			'add_new_item'       => 'Add review', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Edit review', // для редактирования типа записи
			'new_item'           => 'New review', // текст новой записи
			'view_item'          => 'Look review', // для просмотра записи этого типа.
			'search_items'       => 'Search review', // для поиска по этим типам записи
			'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Not found in cart', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Reviews', // название меню
		],
		'description'            => '',
		'public'                 => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'           => null, // показывать ли в меню админки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-format-status',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );

}


/**
 * Создание Options Page и Options Sub Page на основе ACF Pro
 */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}


?>