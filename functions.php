<?php
/**
 * Washington functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Washington
 */

if ( ! function_exists( 'washington_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function washington_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Washington, use a find and replace
	 * to change 'washington' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'washington', get_template_directory() . '/languages' );

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
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'washington' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'washington_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'washington_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function washington_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'washington_content_width', 640 );
}
add_action( 'after_setup_theme', 'washington_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function washington_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'washington' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'washington' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	//Footer widget areas
	for ($i=1; $i<=3; $i++) {
		register_sidebar( array(
			'name'          => __( 'Footer ', 'washington' ) . $i,
			'id'            => 'footer-widget-' . $i,
			'description'   => esc_html__( 'Add widgets here to appear in Footer ', 'washington' ) .$i,
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="footer-widget-title">',
			'after_title'   => '</h4>',
		) );
	}
}
add_action( 'widgets_init', 'washington_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function washington_scripts() {
	if ( get_theme_mod('body_font_name') !='' ) {
		wp_enqueue_style( 'washington-body-fonts', '//fonts.googleapis.com/css?family=' . esc_attr(get_theme_mod('body_font_name')) );
	} else {
		wp_enqueue_style( 'washington-body-fonts', '//fonts.googleapis.com/css?family=Roboto:400,500');
	}
	if ( get_theme_mod('heading_font_name') !='' ) {
		wp_enqueue_style( 'washington-heading-fonts', '//fonts.googleapis.com/css?family=' . esc_attr(get_theme_mod('heading_font_name')) );
	} else {
		wp_enqueue_style( 'washington-heading-fonts', '//fonts.googleapis.com/css?family=Raleway:300,500');
	}
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.7.0' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '3.3.7' );
	wp_enqueue_style( 'camera', get_template_directory_uri() . '/assets/css/camera.css', array(), '1.3.4' );
	wp_enqueue_style( 'washington-style', get_stylesheet_uri() );
	wp_enqueue_style( 'washington-mobile', get_template_directory_uri() . '/assets/css/mobile.css', array(), '1.0.0' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '3.3.7', true );
	wp_enqueue_script( 'mobile-customized', get_template_directory_uri() . '/assets/js/jquery.mobile.customized.min.js', array('jquery'), '1.4.5', true );
	wp_enqueue_script( 'easing', get_template_directory_uri() . '/assets/js/jquery.easing.1.3.js', array('jquery'), '1.3', true );
	wp_enqueue_script( 'camera', get_template_directory_uri() . '/assets/js/camera.min.js', array('jquery'), '1.3.4', true );
	wp_enqueue_script( 'navigation', get_template_directory_uri() . '/assets/js/navigation.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'washington-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'washington-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0.0', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'washington_scripts' );

/**
 * Custom Logo
 */
function washington_custom_logo() {
	$defaults = array(
		'height'      => 31,
		'width'       => 125
	);
	add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'washington_custom_logo' );

/**
 * woocommerce support
 */
add_action( 'after_setup_theme', 'washington_woocommerce_support' );
function washington_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}

/**
 * Registers an editor stylesheet for the theme.
 */
function washington_theme_add_editor_styles() {
	add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'washington_theme_add_editor_styles' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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

/**
 * Load WP Bootstrap Nav Walker file.
 */
if ( ! class_exists( 'wp_bootstrap_navwalker' )) {
	require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';
}

/**
 * Load Site Origin Bundle Hooks.
 */
if ( class_exists( 'SiteOrigin_Widget' ) ) {
	require get_template_directory() . '/inc/so-widgets/so-widgets.php';
}

/**
 * Typography
 */
require get_template_directory() . '/inc/typography.php';

/**
 * Theme Functions
 */
require get_template_directory() . '/inc/theme-functions.php';

/**
 * The excerpt length
 */
function washington_excerpt_length( $blog_excerpt ) {
	$excerpt = get_theme_mod('blog_excerpt', '60');
	return $excerpt;
}
add_filter( 'excerpt_length', 'washington_excerpt_length', 999 );

/**
 * Load TGM Plugin activation.
 */
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'washington_active_plugins' );
function washington_active_plugins() {
	$plugins = array(
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
		array(
			'name'      => 'WooCommerce',
			'slug'      => 'woocommerce',
			'required'  => false,
		),
		array(
			'name'      => 'Page Builder by SiteOrigin',
			'slug'      => 'siteorigin-panels',
			'required'  => false,
		),
		array(
			'name'      => 'Widgets Bundle by SiteOrigin',
			'slug'      => 'so-widgets-bundle',
			'required'  => false,
		)
	);
	tgmpa( $plugins );
}