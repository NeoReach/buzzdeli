<?php
/**
 * _tk functions and definitions
 *
 * @package _tk
 */

/**
 * Set NHP Options
 */
require_once('nhp-options.php');

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 750; /* pixels */


if ( ! function_exists( '_tk_setup' ) ) :
/**
 * Set up theme defaults and register support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */

define('FRESH_DELI_DIR_PATH',get_template_directory()."/");
define('FRESH_DELI_DIR_URI',get_template_directory_uri()."/");
define('FRESH_DELI_OPTIONS',FRESH_DELI_DIR_PATH.'/options/');
define('FRESH_DELI_SHORTCODES',FRESH_DELI_DIR_PATH.'/shortcodes/');
define('FRESH_DELI_SCROLL',FRESH_DELI_DIR_PATH.'/scroll/');
define('FRESH_DELI_SLIDER',FRESH_DELI_DIR_PATH.'/slider/');
define('FRESH_DELI_CSS',FRESH_DELI_DIR_URI.'/includes/css/');
define('FRESH_DELI_JS',FRESH_DELI_DIR_URI.'/includes/js/');
define('FRESH_DELI_IMG',FRESH_DELI_DIR_URI.'/includes/img/');
include(FRESH_DELI_SCROLL.'scroll.php');
include(FRESH_DELI_SHORTCODES.'ExecutiveShortCodes.php');
include(FRESH_DELI_SLIDER.'flexslider.php');


add_action( 'admin_enqueue_scripts', '_tk_admin_scripts' );
add_action( 'wp_enqueue_scripts', '_tk_scripts' );


function _tk_setup() {
    global $cap, $content_width;

    // This theme styles the visual editor with editor-style.css to match the theme style.
    add_editor_style();

    if ( function_exists( 'add_theme_support' ) ) {

    	/**
    	 * WooCommerce
    	 *  
    	 * */
    	add_theme_support( 'woocommerce' );

		/**
		 * Add default posts and comments RSS feed links to head
		*/
		add_theme_support( 'automatic-feed-links' );
		
		/**
		 * Enable support for Post Thumbnails on posts and pages
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		*/
		add_theme_support( 'post-thumbnails' );
		
		/**
		 * Enable support for Post Formats
		*/
		add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
		
		/**
		 * Setup the WordPress core custom background feature.
		*/
		add_theme_support( 'custom-background', apply_filters( '_tk_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
	
    }

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on _tk, use a find and replace
	 * to change '_tk' to the name of your theme in all the template files
	*/
	load_theme_textdomain( '_tk', get_template_directory() . '/languages' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	*/ 
    register_nav_menus( array(
        'primary'  => __( 'Header bottom menu', '_tk' ),
    ) );
}
endif; // _tk_setup
add_action( 'after_setup_theme', '_tk_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function _tk_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', '_tk' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Shop Sidebar', '_tk' ),
		'id'            => 'shop',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );


}
add_action( 'widgets_init', '_tk_widgets_init' );

/**
 * Enqueue scripts and styles
 */

function _tk_admin_scripts()
{

		wp_enqueue_script('jquery');
		wp_enqueue_script('_tk-backendjs', FRESH_DELI_JS.'backend.js', array('jquery') );



}
function _tk_scripts() {
	

	// load bootstrap css

		wp_enqueue_script( 'jquery');


	add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );
		wp_enqueue_script('_tk-backendjs', FRESH_DELI_JS.'frontend.js', array('jquery') );


    wp_enqueue_style( '_tk-bootstrap_fill', '//cdn.jsdelivr.net/bootstrap/3.0.1/css/bootstrap.min.css ');

	wp_enqueue_style( '_tk-bootstrap', get_template_directory_uri() . '/includes/resources/bootstrap/css/bootstrap.min.css' );


	// load bootstrap js
	wp_enqueue_script('_tk-bootstrapjs', get_template_directory_uri().'/includes/resources/bootstrap/js/bootstrap.min.js', array('jquery') );

	// load the glyphicons
	wp_enqueue_style( '_tk-glyphicons', get_template_directory_uri() . '/includes/resources/glyphicons/css/bootstrap-glyphicons.css' );
		
	// load bootstrap wp js
	wp_enqueue_script( '_tk-bootstrapwp', get_template_directory_uri() . '/includes/js/bootstrap-wp.js', array('jquery') );

	wp_enqueue_script( '_tk-skip-link-focus-fix', get_template_directory_uri() . '/includes/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( '_tk-keyboard-image-navigation', get_template_directory_uri() . '/includes/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}

		wp_enqueue_style( '_tk-style', get_stylesheet_uri() );

}


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/includes/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/includes/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/includes/jetpack.php';

/**
 * Load Jetpack compatibility file.
 */

require get_template_directory() . '/includes/bootstrap-wp-navwalker.php';





remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

/**
 * WooCommerce Loop Product Thumbs
 **/

 if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {

	function woocommerce_template_loop_product_thumbnail() {
		echo woocommerce_get_product_thumbnail();
	} 
 }


/**
 * WooCommerce Product Thumbnail
 **/
 if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {
	
	function woocommerce_get_product_thumbnail( $size = 'shop_catalog', $placeholder_width = 0, $placeholder_height = 0  ) {
		global $post, $woocommerce;

		if ( ! $placeholder_width )
			$placeholder_width = $woocommerce->get_image_size( 'shop_catalog_image_width' );
		if ( ! $placeholder_height )
			$placeholder_height = $woocommerce->get_image_size( 'shop_catalog_image_height' );
			
			$output = '<div class="center-product">';

			if ( has_post_thumbnail() ) {
				
				$output .= get_the_post_thumbnail( $post->ID, $size ); 
				
			} else {
			
				$output .= '<img src="'. woocommerce_placeholder_img_src() .'" alt="Placeholder" width="' . $placeholder_width . '" height="' . $placeholder_height . '" />';
			
			}
			
			$output .= '</div>';
			
			return $output;
	}
 }
 if ( ! function_exists( 'get_slider' ) ) {
 function get_slider()
 {


 }

 }





?>

