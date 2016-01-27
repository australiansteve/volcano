<?php
/**
 * Volcano functions and definitions
 *
 * @package Volcano
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'volcano_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function volcano_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Volcano, use a find and replace
	 * to change 'volcano' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'volcano', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'volcano' ),
      	'secondary' => __( 'Secondary Menu', 'volcano' ),
      	'tertiary' => __( 'Tertiary Menu', 'volcano' ),
      	'quatro' => __( 'Fourth Menu', 'volcano' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'volcano_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // volcano_setup
add_action( 'after_setup_theme', 'volcano_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function volcano_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar 1', 'volcano' ),
		'id'            => 'sidebar-1',
		'description'   => 'Used on the front page, closest to the bottom of the page inside the page content',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer', 'volcano' ),
		'id'            => 'footer-sidebar',
		'description'   => '',
		'before_widget' => '<div class="volcano-footer">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => __( 'Slider', 'volcano' ),
		'id'            => 'slider-sidebar',
		'description'   => '',
		'before_widget' => '<div class="volcano-slider">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'volcano_widgets_init' );


/**
 * Enqueue styles.
 */
if ( !function_exists( 'volcano_styles' ) ) :

	function volcano_styles() {
		// Enqueue our stylesheets

		wp_enqueue_style( 'volcano_styles', get_stylesheet_directory_uri() . '/assets/dist/css/app.css', '', '1.1.0' );
		wp_enqueue_style( 'fontawesome_styles', get_stylesheet_directory_uri() . '/assets/dist/css/font-awesome.css', '', '9' );
		wp_enqueue_style( 'home_styles', get_stylesheet_directory_uri() . '/style.css', '', '9' );

	}

add_action( 'wp_enqueue_scripts', 'volcano_styles' );

endif;


/**
 * Enqueue scripts.
 */
function volcano_scripts() {

	// Add core Foundation js to footer
	wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/node_modules/foundation-sites/dist/foundation.js', array( 'jquery' ), '6.0.3', true );

	// Add our concatenated js file
	if ( WP_DEBUG ) {

		// Enqueue our full version if in development mode
		wp_enqueue_script( 'volcano_appjs', get_template_directory_uri() . '/assets/dist/js/app.js', array( 'jquery' ), '', true );

	} else {

		// Enqueue minified js if in production mode
		wp_enqueue_script( 'volcano_appjs', get_template_directory_uri() . '/assets/dist/js/app.min.js', array( 'jquery' ), '', true );
	}

	wp_enqueue_script( 'volcano-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'volcano-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'volcano_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';



add_filter( 'wp_nav_menu', 'volcano_nav_menu', 10, 2 );

function volcano_nav_menu( $menu ){
	$menu = str_replace('current-menu-item', 'current-menu-item active', $menu);
	return $menu;
}


/**
 * Make oembed elements responsive. Add Foundation's .flex-video class wrapper
 * around any oembeds
 */

add_filter( 'embed_oembed_html', 'heisenberg_oembed_flex_wrapper', 10, 4 ) ;

function heisenberg_oembed_flex_wrapper( $html, $url, $attr, $post_ID ) {
	$return = '<div class="flex-video">'.$html.'</div>';
	return $return;
}

/* Declare WooCommerce support */
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}