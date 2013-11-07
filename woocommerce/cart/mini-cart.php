<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;
$mini_cart_html = '';
?>

<?php //do_action( 'woocommerce_before_mini_cart' ); ?>

<!--<ul class="cart_list product_list_widget <?php //echo $args['list_class']; ?>">-->

<!-- HTML structures -->
<div id="actions">
    <a class="prev">&laquo; Back</a>
    <a class="next">More pictures &raquo;</a>
</div>

<!-- start: root element for scrollable -->
<div class="scrollable vertical">
    <!-- start: root element for the items -->
    <div class="items"><div>

        <?php
        if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ){

            $i = 1;

            foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item )
            {
                //echo '<br>i: '.$i.'<br>';
                //echo '$i % 3:'.$i % 3;

                $_product = $cart_item['data'];
                //echo '<pre>'; print_r($_product); echo '</pre>';
                // Only display if allowed
                if ( ! apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) || ! $_product->exists() || $cart_item['quantity'] == 0 )
                    continue;

                // Get price
                $product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? $_product->get_price_excluding_tax() : $_product->get_price_including_tax();

                $product_price = apply_filters( 'woocommerce_cart_item_price_html', woocommerce_price( $product_price ), $cart_item, $cart_item_key );




                $mini_cart_html .=  '<div class="item">'.
                    '<a href="'.get_permalink( $cart_item['product_id'] ).'">'.
                    $_product->get_image(array( 50, 80 ),array( 'style' => 'width:50px;height:37px;' )).
                    apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ).'</a>'.
                    $woocommerce->cart->get_item_data( $cart_item ).
                    apply_filters( 'woocommerce_widget_cart_item_quantity',
                        '<div class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) .
                        '</div>', $cart_item, $cart_item_key ).'</div>';

                //echo '<br>'.$i.'<br>';
                if($i % 3 == 0)
                    $mini_cart_html .= ' <!-- start: item section --></div><div>';
               // if($i % 3 == 0 && $i !== 0)
                //    $mini_cart_html .= ' <!-- start: item section --></div><div>';

                $i++;
            }
           echo $mini_cart_html;
        }
        ?>
        </div>
    </div> <!-- end: root element for the items -->
</div><!-- end: root element for scrollable -->




<!-- start: item section
<div>

    <div class="item">

    </div>
    <div class="item">

    </div>
    <div class="item">
        <!-- item content here --
    </div>
</div>
end: item section -->



<?php
/*
if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) :

     foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :

        $_product = $cart_item['data'];

        // Only display if allowed
        if ( ! apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) || ! $_product->exists() || $cart_item['quantity'] == 0 )
            continue;

        // Get price
        $product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? $_product->get_price_excluding_tax() : $_product->get_price_including_tax();

        $product_price = apply_filters( 'woocommerce_cart_item_price_html', woocommerce_price( $product_price ), $cart_item, $cart_item_key );

*/
?>
<!--
			<li>
				<a href="<?php //echo get_permalink( $cart_item['product_id'] ); ?>">

					<?php //echo $_product->get_image(); ?>

					<?php //echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?>

				</a>

				<?php //echo $woocommerce->cart->get_item_data( $cart_item ); ?>

				<?php //echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
			</li>
-->
<?php
// endforeach;
// else :
?>
<!--
		<li class="empty"><?php //_e( 'No products in the cart.', 'woocommerce' ); ?></li>
-->
<?php //endif; ?>

<!-- </ul> end product list -->

<?php //if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) : ?>

<!--<p class="total"><strong><?php //_e( 'Subtotal', 'woocommerce' ); ?>:</strong> <?php //echo $woocommerce->cart->get_cart_subtotal(); ?></p>-->

<?php //do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>
<!--
	<p class="buttons">
		<a href="<?php //echo $woocommerce->cart->get_cart_url(); ?>" class="button"><?php //_e( 'View Cart &rarr;', 'woocommerce' ); ?></a>
		<a href="<?php //echo $woocommerce->cart->get_checkout_url(); ?>" class="button checkout"><?php // _e( 'Checkout &rarr;', 'woocommerce' ); ?></a>
	</p>
-->
<?php //endif; ?>

<?php //do_action( 'woocommerce_after_mini_cart' ); ?>
