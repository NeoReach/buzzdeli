<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package _tk
 */

get_header(); ?>
<?php
if(is_product()) :
?>
			<div class="main-content-inner col-12 col-lg-12">
		<?php  woocommerce_content(); ?>
</div>

<?php
endif;
?>

<?php
if(is_shop()):
?>
<div class="main-content-inner col-8 col-lg-8">
		<?php  woocommerce_content(); ?>
</div>
<div class="col-md-4">
<?php
get_sidebar('shop');
?>
</div>
<?php
endif;
?>

<?php get_footer(); ?>
