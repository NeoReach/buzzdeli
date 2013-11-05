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
define('FRESH_DELI_OPTIONS_PATH',FRESH_DELI_DIR_PATH.'options/');
define('FRESH_DELI_OPTIONS_URI',FRESH_DELI_DIR_URI.'options/');
define('FRESH_DELI_SHORTCODES_PATH',FRESH_DELI_DIR_PATH.'shortcodes/');
define('FRESH_DELI_SCROLL_PATH',FRESH_DELI_DIR_PATH.'scroll/');
define('FRESH_DELI_SLIDER_PATH',FRESH_DELI_DIR_PATH.'slider/');
define('FRESH_DELI_SLIDER_URI',FRESH_DELI_DIR_URI.'slider/');
define('FRESH_DELI_CSS',FRESH_DELI_DIR_URI.'includes/css/');
define('FRESH_DELI_JS',FRESH_DELI_DIR_URI.'includes/js/');
define('FRESH_DELI_IMG',FRESH_DELI_DIR_URI.'includes/img/');
include(FRESH_DELI_SCROLL_PATH.'scroll.php');
include(FRESH_DELI_SHORTCODES_PATH.'ExecutiveShortCodes.php');
include(FRESH_DELI_SLIDER_PATH.'flexslider.php');


add_action( 'admin_enqueue_scripts', '_tk_admin_scripts' );
add_action( 'wp_enqueue_scripts', '_tk_scripts' );

/* Add Theme Option Actions */

//general
add_action('_tk_get_logo','_tk_get_logo');
add_action('_tk_get_logo_text','_tk_get_logo_text');

//layout
add_action('_tk_append_code_head','_tk_append_code_head');
add_action('_tk_append_code_body','_tk_append_code_body');
add_action('_tk_prepend_code_post','_tk_prepend_code_post');
add_action('_tk_append_code_post','_tk_append_code_post');

//colorization
add_action('_tk_set_custom_css','_tk_set_custom_css');


/* Add Theme Filters */
add_filter('body_class','_tk_body_class');

if ( ! function_exists( '_tk_get_logo' ) ) {
    function _tk_get_logo()
    {
        global $NHP_Options;

        $html = null;
        $theme_logo = !empty($NHP_Options->options['theme-logo']) ? $NHP_Options->options['theme-logo'] : null;

        if($theme_logo)
            $html .= '<a class="navbar-logo" href="#"><img src="'. $theme_logo .'" class="pull-left theme-logo" /></a>';

        echo $html;
    }
}

if ( ! function_exists( '_tk_get_logo_text' ) ) {
    function _tk_get_logo_text()
    {
        global $NHP_Options;

        $html = null;
        $theme_logo_text = !empty($NHP_Options->options['logo-text']) ? $NHP_Options->options['logo-text'] : null;

        if($theme_logo_text)
            $html .= '<div align="right" class="pull-right theme-logo-text">'. $theme_logo_text .'</div>';

        echo $html;
    }
}

if ( ! function_exists( '_tk_append_code_head' ) ) {
    function _tk_append_code_head()
    {
        global $NHP_Options;

        //echo '<pre>'; print_r($NHP_Options->options); echo '</pre>';

        $code = !empty($NHP_Options->options['custom-code-head-append']) ? $NHP_Options->options['custom-code-head-append'] : null;
        echo $code;
    }
}

if ( ! function_exists( '_tk_append_code_body' ) ) {
    function _tk_append_code_body()
    {
        global $NHP_Options;
        $code = !empty($NHP_Options->options['custom-code-body-append']) ? $NHP_Options->options['custom-code-body-append'] : null;
        echo $code;
    }
}

if ( ! function_exists( '_tk_append_code_post' ) ) {
    function _tk_append_code_post()
    {
        global $NHP_Options;
        $code = !empty($NHP_Options->options['custom-code-post-prepend']) ? $NHP_Options->options['custom-code-post-prepend'] : null;
        echo $code;
    }
}

if ( ! function_exists( '_tk_prepend_code_post' ) ) {
    function _tk_prepend_code_post()
    {
        global $NHP_Options;
        $code = !empty($NHP_Options->options['custom-code-post-append']) ? $NHP_Options->options['custom-code-post-append'] : null;
        echo $code;
    }
}

if ( ! function_exists( '_tk_set_custom_css' ) ) {
    function _tk_set_custom_css()
    {
        global $NHP_Options;
        $css = null;
        //echo '<pre>'; print_r($NHP_Options->options); echo '</pre>';
        /*

        */
        $color_text = !empty($NHP_Options->options['color-text']) ? $NHP_Options->options['color-text'] : null;
        $color_link = !empty($NHP_Options->options['color-link']) ? $NHP_Options->options['color-link'] : null;
        $color_link_hover = !empty($NHP_Options->options['color-link-hover']) ? $NHP_Options->options['color-link-hover'] : null;
        $color_link_visited = !empty($NHP_Options->options['color-link-visited']) ? $NHP_Options->options['color-link-visited'] : null;
        $color_header_bg = !empty($NHP_Options->options['color-header-bg']) ? $NHP_Options->options['color-header-bg'] : null;
        $color_header_bottom_border = !empty($NHP_Options->options['color-header-bottom-border']) ? $NHP_Options->options['color-header-bottom-border'] : null;
        $color_header_text = !empty($NHP_Options->options['color-header-text']) ? $NHP_Options->options['color-header-text'] : null;
        $color_header_link = !empty($NHP_Options->options['color-header-link']) ? $NHP_Options->options['color-header-link'] : null;
        $color_header_link_hover = !empty($NHP_Options->options['color-header-link-hover']) ? $NHP_Options->options['color-header-link-hover'] : null;
        $color_header_link_visited = !empty($NHP_Options->options['color-header-link-visited']) ? $NHP_Options->options['color-header-link-visited'] : null;
        $color_footer_bg = !empty($NHP_Options->options['color-footer-bg']) ? $NHP_Options->options['color-footer-bg'] : null;
        $color_footer_border_top = !empty($NHP_Options->options['color-footer-border-top']) ? $NHP_Options->options['color-footer-border-top'] : null;
        $color_footer_text = !empty($NHP_Options->options['color-footer-text']) ? $NHP_Options->options['color-footer-text'] : null;
        $color_footer_link = !empty($NHP_Options->options['color-footer-link']) ? $NHP_Options->options['color-footer-link'] : null;
        $color_footer_link_hover = !empty($NHP_Options->options['color-footer-link-hover']) ? $NHP_Options->options['color-footer-link-hover'] : null;
        $color_footer_link_visited = !empty($NHP_Options->options['color-footer-link-visited']) ? $NHP_Options->options['color-footer-link-visited'] : null;

        //global
        if($color_text)
           $css .= '.main-content{color:'.$color_text.';}';
        if($color_link)
            $css .= 'a{color:'.$color_link.';}';
        if($color_link_hover)
            $css .= 'a:hover{color:'.$color_link_hover.';}';
        if($color_link_visited)
            $css .= 'a:visited{color:'.$color_link_visited.';}';

        //header
        if($color_header_bg)
            $css .= '.navbar{background-color:'.$color_header_bg.'!important;}';
        if($color_footer_border_top)
            $css .= '.navbar{border-bottom:3px solid '.$color_footer_border_top.'!important;}';
        if($color_header_text)
            $css .= '.navbar a{color:'.$color_header_text.'!important;}';
        if($color_header_link)
            $css .= '.navbar a{color:'.$color_link.'!important;}';
        if($color_header_link_hover)
            $css .= '.navbar a:hover{color:'.$color_link_hover.'!important;}';
        if($color_header_link_visited)
            $css .= '.navbar a:visited{color:'.$color_link_visited.'!important;}';

        //footer
        if($color_footer_bg)
            $css .= '#colophon{background-color:'.$color_footer_bg.'!important;}';
        if($color_header_bottom_border)
            $css .= '#colophon{bottom-top:3px solid '.$color_header_bottom_border.'!important;}';
        if($color_footer_text)
            $css .= '#colophon a{color:'.$color_footer_text.'!important;}';
        if($color_footer_link)
            $css .= '#colophon a{color:'.$color_footer_link.'!important;}';
        if($color_footer_link_hover)
            $css .= '#colophon a:hover{color:'.$color_footer_link_hover.'!important;}';
        if($color_footer_link_visited)
            $css .= '#colophon a:visited{color:'.$color_footer_link_visited.'!important;}';

        echo '<!--start: custom css --><style type="text/css">'.$css.'</style><!-- end: custom css -->';
    }
}

if ( ! function_exists( '_tk_body_class' ) ) {
    function _tk_body_class($c) {
        // add 'class-name' to the $classes array
        is_front_page()                 ? $c[] = 'home'           : null;
        is_page('Corporate Editorial')  ? $c[] = 'photos'         : null;
        is_page('Creative Services')    ? $c[] = 'services'       : null;
        is_page('Biography')            ? $c[] = 'bio'            : null;
        is_page('Photography')          ? $c[] = 'photos'         : null;
        is_page('Reportage')            ? $c[] = 'photos'         : null;
        is_page_template('sidebar-gallery.php') ? $c[] = 'photos' : null;
        is_page('Multimedia')           ? $c[] = 'multimedia'     : null;
        is_page('Blog')                 ? $c[] = 'blog'           : null;
        is_page('Contact')              ? $c[] = 'contact'        : null;
        is_404()                        ? $c[] = 'four04'         : null;
        // return the $classes array
        return $c;
    }
}

    function _tk_setup()
    {
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

		add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
         */
		/**
		 * Setup the WordPress core custom background feature.

		add_theme_support( 'custom-background', apply_filters( '_tk_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
         */
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


	$labels = array( 'name' => __( 'Slides', 'flexslider_hg' ), 'singular_name' => __( 'Slide', 'flexslider_hg' ), 'all_items' => __( 'All Slides', 'flexslider_hg' ), 'add_new' => __( 'Add New Slide', 'flexslider_hg' ), 'add_new_item' => __( 'Add New Slide', 'flexslider_hg' ), 'edit_item' => __( 'Edit Slide', 'flexslider_hg' ), 'new_item' => __( 'New Slide', 'flexslider_hg' ),'view_item' => __( 'View Slide', 'flexslider_hg' ),'search_items' => __( 'Search Slides', 'flexslider_hg' ),'not_found' => __( 'No Slide found', 'flexslider_hg' ), 'not_found_in_trash' => __( 'No Slide found in Trash', 'flexslider_hg' ), 'parent_item_colon' => '' );
	
	$args = array(
		'labels'               => $labels,
		'public'               => true,
		'publicly_queryable'   => true,
		'_builtin'             => false,
		'show_ui'              => true, 
		'query_var'            => true,
		'rewrite'              => apply_filters( 'flexslider_hg_post_type_rewite', array( "slug" => "slides" )),
		'capability_type'      => 'post',
		'hierarchical'         => false,
		'menu_position'        => 26.6,
		'supports'             => array( 'title', 'thumbnail', 'excerpt', 'page-attributes' ),
		'taxonomies'           => array(),
		'has_archive'          => true,
		'show_in_nav_menus'    => false
	);
	register_post_type( 'slides', $args );




}
endif; // _tk_setup

	add_action( 'init', 'flexslider_hg_setup_init' );
	add_action( 'admin_head', 'flexslider_hg_admin_icon' );	
	add_action( 'wp_enqueue_scripts', 'flexslider_wp_enqueue' );	

	add_action( 'add_meta_boxes', 'flexslider_hg_create_slide_metaboxes' );
	add_action( 'save_post', 'flexslider_hg_save_meta', 1, 2 );
	
	add_filter( 'manage_edit-slides_columns', 'flexslider_hg_columns' );
	add_action( 'manage_slides_posts_custom_column', 'flexslider_hg_add_columns' );
	
	add_shortcode('flexslider', 'flexslider_hg_shortcode');
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
       wp_enqueue_style( 'options-panel', FRESH_DELI_CSS.'options-panel.css');



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

