<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package _tk
 */

get_header(); ?>
			<div class="main-content-inner col-9 col-lg-9">


	<?php // add the class "panel" below here to wrap the content-padder in Bootstrap style ;) ?>	
	<section class="content-padder error-404 not-found">

		<header class="page-header">
			<h2 class="page-title"><?php _e( 'Oops! Something went wrong here.', '_tk' ); ?></h2>
		</header><!-- .page-header -->

		<div class="page-content">

			<p><?php _e( 'Nothing could be found at this location. Maybe try a search?', '_tk' ); ?></p>

			<?php get_search_form(); ?>

		</div><!-- .page-content -->

	</section><!-- .content-padder -->
		</div>
					<div class="main-content-inner col-3 col-lg-3">

<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>