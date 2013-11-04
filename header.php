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
<?php do_action( 'before' );?>

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
                do_action('_tk_get_logo_text');
            ?>
            <div class="clearfix"></div>
        </div>
        <div>
             <?php wp_nav_menu(
			                array(
			                    'theme_location' => 'primary',
			                    'container_class' => 'nav-collapse collapse navbar-responsive-collapse',
			                    'menu_class' => 'nav navbar-nav',
			                    'fallback_cb' => '',
			                    'menu_id' => 'main-menu',
			                    'walker' => new wp_bootstrap_navwalker()
			                )
			            ); ?>
        </div><!--/.nav-collapse -->
    </div>
</div>

<div class="main-content">	
	<div class="container">
		<div class="row">
        <?php
            if(is_single())
                do_action('_tk_prepend_code_post');
        ?>