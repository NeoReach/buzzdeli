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

<?php
    //do_action( 'woocommerce_before_mini_cart' );
    echo '<!-- start: root element for the items -->';
        //echo '<!-- $woocommerce mcart: '; print_r($woocommerce->cart->get_cart()); echo '-->';
        if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ){

            $i = 1;
            //echo '<!-- cart: '; var_dump($woocommerce->cart->get_cart()); echo '-->';
            foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item )
            {
                $_product = $cart_item['data'];
                //echo '<pre>'; print_r($_product); echo '</pre>';
                // Only display if allowed
                if ( ! apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) || ! $_product->exists() || $cart_item['quantity'] == 0 )
                    continue;

                // set product vars
                $product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? $_product->get_price_excluding_tax() : $_product->get_price_including_tax();
                $product_price = apply_filters( 'woocommerce_cart_item_price_html', woocommerce_price( $product_price ), $cart_item, $cart_item_key );
                $product_link = get_permalink( $cart_item['product_id'] );
                $product_image = $_product->get_image(array( 50, 80 ),array( 'style' => 'width:50px;height:37px;' ));
                $product_title =  apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product );
               //$product = $woocommerce->cart->get_item_data( $cart_item );
               // echo '<!-- product data: '; var_dump($product); echo '-->';
                $product_qty = '<div class="quantity buttons_added">'.
                                   '<input type="button" value="-" class="minus">'.$cart_item['quantity'].' &times;'.
                                   '<span class="amount">'.$product_price.'</span><input type="button" value="+" class="plus" />'.
                                   '<input type="hidden" class="cart_item_quantity" value="'.$cart_item['quantity'].'" />'.
                                   '<input type="hidden" class="cart_item_key" value="'.$cart_item_key.'" />'.
                                   '<div class="clear"></div>'.
                               '</div>';

                $mini_cart_html .=  '<div class="item">'.
							            '<a href="javascript:void(0);" class="remove" title="Remove this item">×</a>'.
                                        '<a href="'.$product_link.'" style="display:block;float:left;">' . $product_image .'</a>'.
                                        '<div class="mini-cart-details">'.
                                            '<a href="'.$product_link.'">' . $product_title .'</a>'.
                                            $product_qty.
                                        '</div><div class="clear"></div></div>';



                if($i % 3 == 0)
                    $mini_cart_html .= ' <!-- start: item section --></div><div>';

                $i++;
            }
           echo $mini_cart_html;
        }else{
            echo '<div class="no-product-msg">';
            _e( 'There are no products in the cart.', 'woocommerce' );
            echo '</div>';
        }
?>