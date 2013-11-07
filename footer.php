<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package _tk
 */

    if(is_single())
        do_action('_tk_append_code_post');
?>
			</div><!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->
		</div><!-- close .row -->
	</div><!-- close .container -->

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="container">
		<div class="row">
			<div id="footer-widget-container" class="site-footer-inner col-12">
                <?php

                wp_nav_menu(
                    array(
                        'theme_location' => 'nav_footer',
                        'container_class' => 'nav-collapse collapse navbar-responsive-collapse',
                        'menu_class' => 'nav navbar-nav',
                        'fallback_cb' => '',
                        'menu_id' => 'footer-nav',
                        'walker' => new wp_bootstrap_navwalker()
                    )
                );
                do_action('_tk_footer_widget_area');

                ?>
                <div class="clear"></div>
			</div>
            <div class="site-info">
                <?php do_action( '_tk_credits' ); ?>

                Designed by <a href="http://www.rankexecutives.com" target="_blank">Executive WordPress Themes</a> | Powered by <a href="http://wordpress.org/">Wordpress</a>

            </div><!-- close .site-info -->
		</div>
	</div><!-- close .container -->
</footer><!-- close #colophon -->

<?php
wp_footer();
do_action('_tk_append_code_body');
?>

</body>
</html>