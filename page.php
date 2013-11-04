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
	<?php while ( have_posts() ) : the_post(); ?>

		<?php 
		if(is_front_page() || is_home())
		{
		get_template_part( 'content', 'page' );
	}else{
		get_template_part( 'content', 'homepage' );
	}

		?>

		<?php
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || '0' != get_comments_number() )
				comments_template();
		?>

	<?php endwhile; // end of the loop. ?>

</div>
<?php get_footer(); ?>
