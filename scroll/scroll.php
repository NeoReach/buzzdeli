<?php
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	if ( ! class_exists( 'SOD_WooCommerce_Infinite_Scroll' ) ) {
		class SOD_WooCommerce_Infinite_Scroll {
			function __construct(){
				//load scripts and raw js
				
				add_action( 'wp_enqueue_scripts', array( &$this, 'sod_scripts' ) );
				add_action( 'woocommerce_after_shop_loop', array( &$this, 'sod_infinite_scroll_pagination_before'), 11);
				load_plugin_textdomain('sod_inf_scroll', false, FRESH_DELI_DIR_URI . '/languages');
			}
			
			function sod_infinite_scroll_pagination_before(){
				//echo '<nav class="sod-inf-pagination-wrapper">';
				wp_reset_query();
				if(is_shop() || is_product_category() || is_product_tag()):
					?><div class="sod-inf-nav-next" style="visibility:hidden;font-size:0px;"><?php next_posts_link( __( 'Next <span class="sod-next-link">&rarr;</span>', 'sod_inf_scroll' ) ); ?></div><?php
				endif;
			}
			
			function sod_scripts(){
				wp_register_style( 'sod-infinite-style', FRESH_DELI_SCROLL_URI.'assets/css/product-scroll.css' );
				wp_enqueue_style( 'sod-infinite-style' );
				//wp_enqueue_script( 'sod-masonry', plugin_dir_url( __FILE__ ) . 'assets/js/jquery.masonry.js', array( 'jquery' ) );
				wp_enqueue_script( 'sod-infinite-script', FRESH_DELI_SCROLL_URI.'assets/js/jquery.infinitescroll.js', array( 'jquery' ) );
				wp_enqueue_script( 'sod-custom-script', FRESH_DELI_SCROLL_URI.'assets/js/custom.js', array( 'jquery' ) );
				$data = array( 'image_path' => FRESH_DELI_SCROLL_URI.'assets/images/ajax-loader.gif','loading_msg' => __('Loading More Products...', 'sod_inf_scroll'),'no_more_products' => __('No More Products to Show','sod_inf_scroll') );
				wp_localize_script( 'sod-custom-script', 'infinite_scroll', $data );
			}
		}
	}
	$SOD_WooCommerce_Infinite_Scroll = &new SOD_WooCommerce_Infinite_Scroll();
}
?>