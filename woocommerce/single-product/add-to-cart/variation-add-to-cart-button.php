<?php
/**
 * Single variation cart button
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>
<button type="submit" class="single_add_to_cart_button button tree alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
<input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
<input type="hidden" name="variation_id" class="variation_id" value="0" />