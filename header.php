<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package _tk
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php
wp_head();
do_action('_tk_set_custom_css');
do_action('_tk_append_code_head');
?>
</head>

<body <?php body_class(); ?>>
<?php
do_action( 'before' );

ob_start();
woocommerce_mini_cart();
$mini_cart_html = ob_get_clean();
ob_flush();
?>
<div id="mini-cart" class="visible-lg woocommerce">

    <span id="mini-cart-toggle"></span>

    <div id="actions">
        <a class="prev">&laquo; PREVIOUS</a>
        <a class="next">NEXT &raquo;</a>
    </div>

    <!-- start: root element for scrollable -->
    <div class="scrollable vertical">
        <div class="mcart-loader"></div>
        <div class="items">
            <div>
                <?php echo $mini_cart_html?>
            </div>
        </div> <!-- end: root element for the items -->
    </div>
    <!-- end: root element for scrollable -->
</div>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">

            <div id="mobile-mcart-button"></div>

            <div id="mobile-mcart-container">

                <div id="actions" class="action-mobile">
                    <a class="prev">&laquo; PREVIOUS</a>
                    <a class="next">NEXT &raquo;</a>
                </div>

                <div class="scrollable vertical-mobile">
                    <div class="mcart-loader"></div>
                    <div class="items">
                        <div>
                        <?php echo $mini_cart_html; ?>
                        </div>
                    </div>
                </div>

            </div>

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div id="mobile-nav">
                <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'nav_header',
                            'container_class' => 'mobile-nav-container',
                            'menu_class' => 'mobile-nav',
                            'fallback_cb' => false,
                            'menu_id' => 'main-menu',
                            //'walker' => new wp_bootstrap_navwalker()
                        )
                    );
                ?>
            </div>
            <?php
                do_action('_tk_get_logo');
                //do_action('_tk_get_logo_text');
                wp_nav_menu(
                    array(
                        'theme_location' => 'nav_header',
                        'container_class' => 'nav-collapse collapse navbar-responsive-collapse',
                        'menu_class' => 'nav navbar-nav',
                        'fallback_cb' => '',
                        'menu_id' => 'main-menu',
                        'walker' => new wp_bootstrap_navwalker()
                    )
                );
                echo '<div class="widget-container">';
                the_widget( 'WP_Widget_Search' );
                echo '</div>';
            ?>
            <div class="clearfix"></div>

        </div>

       <!--/.nav-collapse -->
    </div>
</div>

<div class="main-content">	
	<div class="container">
		<div class="row">
        <?php
            if(is_single())
                do_action('_tk_prepend_code_post');
        ?>
