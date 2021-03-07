<?php

/**
 * wattever2021 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wattever2021
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Enqueue scripts et styles
 */
function wattever_scripts()
{
	// Jquery
	wp_enqueue_script('wattever-jquery', 'https://code.jquery.com/jquery-3.5.1.slim.min.js');
	wp_enqueue_script('wattever-jquery-project', 'https://code.jquery.com/jquery-3.5.1.min.js');

	// Slick
	wp_enqueue_script('wattever-slick-js', get_stylesheet_directory_uri() . '/lib/slick/slick.min.js', array(), '', true);
	wp_enqueue_style('wattever-slick-style', get_stylesheet_directory_uri() . '/lib/slick/slick.css', array(), _S_VERSION);

	// Bootstrap
	wp_enqueue_style('wattever-bootstrap', get_stylesheet_directory_uri() . '/lib/bootstrap-4.5.3-dist/css/bootstrap.min.css');
	// wp_enqueue_script( 'wattever-jquery', get_stylesheet_directory_uri() . '/lib/jquery/jquery-3.5.1.min.map' );
	wp_enqueue_script('wattever-bootstrap-bundle', get_stylesheet_directory_uri() . '/lib/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js');

	// JS File project
	wp_enqueue_script('wattever-main', get_stylesheet_directory_uri() . '/assets/js/script.js', array(), '', true);
	wp_enqueue_script('wattever-shop', get_stylesheet_directory_uri() . '/assets/js/shop.js', array(), '', true);

	// CSS File project
	wp_enqueue_style('wattever-liste-actualites-style', get_stylesheet_directory_uri() . '/assets/css/liste-actualites.css', array(), _S_VERSION);
	wp_enqueue_style('wattever-article-style', get_stylesheet_directory_uri() . '/assets/css/article.css', array(), _S_VERSION);
	wp_enqueue_style('wattever-tester-style', get_stylesheet_directory_uri() . '/assets/css/tester.css', array(), _S_VERSION);
	wp_enqueue_style('wattever-contact-style', get_stylesheet_directory_uri() . '/assets/css/contact.css', array(), _S_VERSION);
	wp_enqueue_style('wattever-professionnels-style', get_stylesheet_directory_uri() . '/assets/css/professionnels.css', array(), _S_VERSION);
	wp_enqueue_style('wattever-shop-style', get_stylesheet_directory_uri() . '/assets/css/shop.css', array(), _S_VERSION);
	wp_enqueue_style('wattever-main-style', get_stylesheet_directory_uri() . '/assets/css/style.css', array(), _S_VERSION);
	wp_enqueue_style('wattever-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('wattever-style', 'rtl', 'replace');
}
add_action('wp_enqueue_scripts', 'wattever_scripts');

/**
 * Supprimer la toolbar administrateur
 */
function remove_admin_bar()
{
	/*
	if (!current_user_can('administrator') && !is_admin()) {
	show_admin_bar(false);
	}
	*/
	show_admin_bar(false);
}

if (!function_exists('wattever2021_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wattever2021_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on wattever2021, use a find and replace
		 * to change 'wattever2021' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('wattever2021', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');
		add_image_size('Profil 50px', 50, 50, true);

		add_image_size('Galerie 400x500', 400, 500, true);
		add_image_size('Galerie 400x500 nocrop', 400, 500);
		add_image_size('Galerie 570x570', 570, 570, true);
		add_image_size('Galerie 570x300 nocrop', 570, 300);
		add_image_size('Galerie 600x330', 600, 330, true);

		add_image_size('Galerie 1000x1000', 1000, 1000, true);
		add_image_size('Galerie 1000x396', 1000, 396, true);
		add_image_size('Galerie 1000x596', 1000, 596, true);
		
		add_image_size('Galerie 1000x596', 1200, 600, true);
		add_image_size('Galerie 1920x700', 1920, 700, true);
		add_image_size('Galerie 1920x400', 1920, 400, true);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__('Primary', 'wattever2021'),
				'menu-2' => esc_html__('Footer', 'wattever2021'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'wattever2021_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);


	}
endif;
add_action('after_setup_theme', 'wattever2021_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wattever2021_content_width()
{
	$GLOBALS['content_width'] = apply_filters('wattever2021_content_width', 640);
}
add_action('after_setup_theme', 'wattever2021_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wattever2021_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'wattever2021'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'wattever2021'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer colonne 1', 'wattever2021' ),
			'id'            => 'widget-footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'wattever2021' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer colonne 2', 'wattever2021' ),
			'id'            => 'widget-footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'wattever2021' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer colonne 3', 'wattever2021' ),
			'id'            => 'widget-footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'wattever2021' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
}
add_action('widgets_init', 'wattever2021_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function wattever2021_scripts()
{
	wp_enqueue_style( 'wattever2021-gotham-fonts', get_stylesheet_directory_uri(). '/assets/fonts/gotham/stylesheet.css', array(), time() );
	wp_enqueue_style( 'wattever2021-myriadpro-fonts', get_stylesheet_directory_uri(). '/assets/fonts/myriadpro/stylesheet.css', array(), time() );
	wp_enqueue_style('wattever2021-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('wattever2021-style', 'rtl', 'replace');

	wp_enqueue_script('wattever2021-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'wattever2021_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}



/**
 * WOOCOMMERCE CUSTOMIZATION
 */

 /**
 * CONTENT PRODUCT
 */

//  Titre avant la thumbnail
function product_change_title_position()
{
	// Hook + Function name
	remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title');
	add_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_title', 5);
}
add_action('init','product_change_title_position');

// Ajouter la description du produit
function add_description_product() {
	echo the_excerpt();
}
add_action('woocommerce_shop_loop_item_title', 'add_description_product', 15);

// Ajouter phrase d'accroche
function add_accroche_product() {
	echo types_render_field('accroche');
}
add_action('woocommerce_shop_loop_item_title', 'add_accroche_product', 10);

/**
 * CONTENT SINGLE PRODUCT
 */

// Supprimer les produits apparentés
function remove_related_product() {
	remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
}
add_action('woocommerce_after_single_product_summary','remove_related_product', 1);

// Supprimer la catégorie dans le résumé du produit
function remove_meta_product() {
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
}
add_action('woocommerce_single_product_summary','remove_meta_product', 1);

// Supprimer le prix du produit dans le résumé du produit
function remove_price_summary_product() {
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
}
add_action('woocommerce_single_product_summary','remove_price_summary_product', 1);


/**
 * AJOUTER DES ONGLETS AU PRODUIT
 */
// Paiement et livraison
add_filter( 'woocommerce_product_tabs', 'paiement_livraison_tab' );
 
function paiement_livraison_tab( $tabs ) {
 
	$tabs['paiement_livraison_tab'] = array(
		'title'    => 'Paiement & Livraison',
		'callback' => 'paiement_livraison_tab_content', // Callback du contenu de l'onglet
		'priority' => 50,
	);
 
	return $tabs;
 
}
 
function paiement_livraison_tab_content( $slug, $tab ) {
	$argsShop = array(
		'post_type' => 'product',
		'status' => 'publish',
		'posts_per_page' => '1',
		'offset' => '0',
		'orderby' => 'ID',
		'order' => 'DESC',
	);
	$my_queryShop = new WP_Query($argsShop);
	while ($my_queryShop->have_posts()) {
		$my_queryShop->the_post();
	echo '<h2>' . $tab['title'] . '</h2>';
	echo '<p>' . types_render_field('description-paiement') .'</p>';
	}
 
}
