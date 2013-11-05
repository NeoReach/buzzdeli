<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package _tk
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<div class="row">
				<div class="mid-section col-12 col-lg-12">
<?php
        echo do_shortcode('[flexslider]');
?>
				</div>
<?php do_action('_tk_homepage_featured_content'); ?>
		</div>

		<?php the_content(); ?>
	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', '_tk' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
