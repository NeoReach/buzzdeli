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
$mini_cart = ob_get_clean();
ob_flush();

echo '<div id="mini-cart">'.$mini_cart.'</div>';
?>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
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
