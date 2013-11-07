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

//get default shop template
$default_shop_template = _tk_get_default_template('default-shop-layout');

get_header();

if($default_shop_template['sidebar'])
    echo $default_shop_template['sidebar'];

if(is_product()){
?>
    <div class="<?php echo $default_shop_template['class']; ?>">
        <?php woocommerce_content(); ?>
    </div>
<?php
}

if(is_shop()){
?>
    <div class="<?php echo $default_shop_template['class']; ?>">
        <?php woocommerce_content(); ?>
    </div>
<?php
}

get_footer();
?>
