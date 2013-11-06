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


//get default page template
$default_template = _tk_get_default_template('default-page-layout');

//echo '<pre>'; print_r($default_template); echo '</pre>';

get_header();

if($default_template['sidebar'])
    echo $default_template['sidebar'];

?>

<div class="<?php echo $default_template['class']; ?>">
<?php

    while ( have_posts() ) {

        the_post();

        if(is_front_page() || is_home())
            get_template_part( 'template-parts/content', 'homepage' );
        else
            get_template_part( 'template-parts/content', 'page' );

        //comments
        if ( comments_open() || '0' != get_comments_number()){
            if(!is_front_page())
                comments_template();
        }
    } // end of the loop.
?>
</div>
<?php get_footer(); ?>
