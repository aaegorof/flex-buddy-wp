<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

$attribute_keys = array_keys( $attributes );

do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="variations_form cart padding-medium-tb" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo htmlspecialchars( wp_json_encode( $available_variations ) ); // WPCS: XSS ok. ?>">
	<?php do_action( 'woocommerce_before_variations_form' ); ?>

	<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
		<p class="stock out-of-stock"><?php esc_html_e( 'This product is currently out of stock and unavailable.', 'woocommerce' ); ?></p>
	<?php else : ?>

    <div class="product_meta variations">
  		<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
        <div>
          <label class="color-tin"><?php esc_html_e( 'SKU:', 'woocommerce' ); ?></label>
  	      <div class="sku_wrapper inline">
  	        <span class="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span>
          </div>
        </div>
  	  <?php endif; ?>
  	  

  	  
  	  <?php 
    	  // we are trying to show all others attributes that is not in a variation
      
      $allAttr = $product->get_attributes();
      
      foreach ( $allAttr as $attribute ) : 
        $values = array();
        if ( $attribute->is_taxonomy() ) {
      		$attribute_taxonomy = $attribute->get_taxonomy_object();
      		
      		//name like a Woo categoty slug
      		$tax = 'pa_' .$attribute_taxonomy->attribute_name;
      
      		
      		$attribute_values = wc_get_product_terms( $product->get_id(), $attribute->get_name(), array( 'fields' => 'all' ) );
          
          //Check if this attribute is in the variation?
          if( !array_key_exists($tax, $attributes) ){?>
            <div class="">
    					<label class="attribute-label inline"><?php echo $attribute_taxonomy->attribute_label ?>: </label>
        			<?php foreach ( $attribute_values as $attribute_value ) {
        				$value_name = esc_html( $attribute_value->name );
        
        				if ( $attribute_taxonomy->attribute_public ) {
        					$values[] = '<a href="' . esc_url( get_term_link( $attribute_value->term_id, $attribute->get_name() ) ) . '" class="attribute-link" rel="tag">' . $value_name . '</a>';
        				} else {
        					$values[] = $value_name;
        				}
        				echo apply_filters( 'woocommerce_attribute', wptexturize( implode( ', ', $values ) ), $attribute, $values );
        			}?> 
            </div>
          <?php
          }
      	};
    
      endforeach;
      ?>
  	  
  	  
  	  
  	  
  		<?php foreach ( $attributes as $attribute_name => $options ) : ?>
  		
  	    <label class="attribute-label" for="<?php echo esc_attr( sanitize_title( $attribute_name ) ); ?>">
  	      <?php echo esc_html( wc_attribute_label( $attribute_name ) ); ?>
  	    </label>
  	    
  	    <div class="attribute-value">
  				<?php
  					$selected = isset( $_REQUEST[ 'attribute_' . $attribute_name ] ) ? wc_clean( urldecode( wp_unslash( $_REQUEST[ 'attribute_' . $attribute_name ] ) ) ) : $product->get_variation_default_attribute( $attribute_name ); // WPCS: input var ok, CSRF ok, sanitization ok.
  	
  					wc_dropdown_variation_attribute_options( array(
  						'options'   => $options,
  						'attribute' => $attribute_name,
  						'product'   => $product,
  						'selected'  => $selected,
  					) );
  	
  					echo end( $attribute_keys ) === $attribute_name ? wp_kses_post( apply_filters( 'woocommerce_reset_variations_link', '') ) : '';
  				?>
  	    </div>
  		<?php endforeach; ?>			
    </div>
    
    
		<div class="single_variation_wrap">
			<?php
				/**
				 * Hook: woocommerce_before_single_variation.
				 */
				do_action( 'woocommerce_before_single_variation' );

				/**
				 * Hook: woocommerce_single_variation. Used to output the cart button and placeholder for variation data.
				 *
				 * @since 2.4.0
				 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
				 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
				 */
				do_action( 'woocommerce_single_variation' );

				/**
				 * Hook: woocommerce_after_single_variation.
				 */
				do_action( 'woocommerce_after_single_variation' );
			?>
		</div>
	<?php endif; ?>

	<?php do_action( 'woocommerce_after_variations_form' ); ?>
</form>

<?php
do_action( 'woocommerce_after_add_to_cart_form' );