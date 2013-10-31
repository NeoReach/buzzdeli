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
			<div class="main-content-inner col-12 col-lg-12">
		<?php  woocommerce_content(); ?>
</div>
<?php get_footer(); ?>
s