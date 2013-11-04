<?php
/*
 * Template Name: Left Sidebar
 */

/**
 * @package _tk
 */

get_header(); ?>
<div class="main-content-inner col-3 col-md-3 col-lg-3">

<?php
get_sidebar();
?>
</div>

			<div class="main-content-inner col-9 col-md-9 col-lg-9">
	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'page' ); ?>

		<?php
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || '0' != get_comments_number() )
				comments_template();
		?>

	<?php endwhile; // end of the loop. ?>

</div>			

<?php get_footer(); ?>
