<?php
/**
 * Sissy functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Sissy
 */

if ( ! function_exists( 'sissy_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sissy_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Sissy, use a find and replace
	 * to change 'sissy' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'sissy', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'sissy' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'sissy_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'sissy_setup' );

/**
* adds support for custom logo
*/
function sissy_theme_customizer( $wp_customize ) {
    
$wp_customize->add_section( 'sissy_logo_section' , array(
    'title'       => __( 'Logo', 'sissy' ),
    'priority'    => 30,
    'description' => 'Upload a logo to replace the default site name and description in the header',
) );

$wp_customize->add_setting( 'sissy_logo' );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sissy_logo', array(
    'label'    => __( 'Logo', 'sissy' ),
    'section'  => 'sissy_logo_section',
    'settings' => 'sissy_logo',
) ) );
}

add_action( 'customize_register', 'sissy_theme_customizer' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sissy_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sissy_content_width', 640 );
}
add_action( 'after_setup_theme', 'sissy_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sissy_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'sissy' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'sissy_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sissy_scripts() {
	wp_enqueue_style( 'sissy-style', get_stylesheet_uri() );
    
    wp_enqueue_style( 'sidr-style', get_template_directory_uri() . '/js/sidr-package-1.2.1/stylesheets/jquery.sidr.dark.css' );
    
    wp_enqueue_style( 'kotta_one', 'https://fonts.googleapis.com/css?family=Kotta+One' );
    
    wp_enqueue_style( 'font_awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' );
    
    wp_enqueue_script( 'sidr_js', get_template_directory_uri() . '/js/sidr-package-1.2.1/jquery.sidr.min.js', array('jquery'), '', true );
    
    wp_enqueue_script( 'jquery_init', get_template_directory_uri() . '/js/jquery.init.js', array('jquery'), '', true );

	wp_enqueue_script( 'sissy-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'sissy-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sissy_scripts' );

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
