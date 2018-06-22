<?php 
function woocommerce_breadcrumb( $args = array() ) {
	$args = wp_parse_args( $args, apply_filters( 'woocommerce_breadcrumb_defaults', array(
		'delimiter'   => '<span class="delimetr fa fa-chevron-right"></span>',
		'wrap_before' => '<nav class="woocommerce-breadcrumb">',
		'wrap_after'  => '</nav>',
		'before'      => '',
		'after'       => '',
		'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
	) ) );

	$breadcrumbs = new WC_Breadcrumb();

	if ( ! empty( $args['home'] ) ) {
		$breadcrumbs->add_crumb( $args['home'], apply_filters( 'woocommerce_breadcrumb_home_url', home_url() ) );
	}

	$args['breadcrumb'] = $breadcrumbs->generate();

	/**
	 * @hooked WC_Structured_Data::generate_breadcrumblist_data() - 10
	 */
	do_action( 'woocommerce_breadcrumb', $breadcrumbs, $args );

	wc_get_template( 'global/breadcrumb.php', $args );
}


 
function add_my_currency_symbol( $currency_symbol, $currency ) {
  switch( $currency ) {
    case 'RUB': $currency_symbol = '₽'; break;
  }
return $currency_symbol;
}


add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);
add_action('breadcrumbs', 'woocommerce_breadcrumb', 10);


// change something in Woocomerce checkout
$onePageCheckout = false;


remove_action('woocommerce_checkout_order_review', 'woocommerce_order_review',10);
remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form',10);
remove_action('woocommerce_cart_collaterals', 'woocommerce_cart_totals',10);

if($onePageCheckout) {

  remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form',10);
  add_action('woocommerce_before_checkout_billing_form', 'woocommerce_checkout_payment', 5);
}
// change something in Woocomerce checkout


add_filter( 'woocommerce_checkout_fields', 'also_remove_fields', 9999 );
 
function also_remove_fields( $woo_checkout_fields_array ) {
 
	// she wanted me to leave these fields in checkout
	// unset( $woo_checkout_fields_array['billing']['billing_first_name'] );
	unset( $woo_checkout_fields_array['billing']['billing_last_name'] );
	// unset( $woo_checkout_fields_array['billing']['billing_phone'] );
	// unset( $woo_checkout_fields_array['billing']['billing_email'] );
	unset( $woo_checkout_fields_array['order']['order_comments'] );
 
	// and to remove the fields below
	//unset( $woo_checkout_fields_array['billing']['billing_company'] );
	//unset( $woo_checkout_fields_array['billing']['billing_address_1'] );
	//unset( $woo_checkout_fields_array['billing']['billing_city'] );
  // unset( $woo_checkout_fields_array['billing']['billing_country'] );
	unset( $woo_checkout_fields_array['billing']['billing_address_2'] );
	unset( $woo_checkout_fields_array['billing']['billing_state'] );
	unset( $woo_checkout_fields_array['billing']['billing_postcode'] );
 
	return $woo_checkout_fields_array;
}

/*
add_filter( 'woocommerce_shipping_address_map_url_parts' , 'woo_custom_order_formatted_shipping_address', 10, 2 );
add_filter( 'woocommerce_order_formatted_shipping_address' , 'woo_custom_order_formatted_shipping_address', 10, 2 );
function woo_custom_order_formatted_shipping_address($address, $args) {

    $address = array(
        'address_1'		=> $args->shipping_ulitsa,
        'address_2'		=> $args->shipping_dom,
        'city'			=> $args->shipping_gorod,
        'state'			=> $args->shipping_state,
        'postcode'		=> $args->shipping_postcode,
        'country'		=> $args->shipping_country
    );
    return $address;

}
*/

/// SEO adjustments 
function yoast_seo_canonical_change_woocom_shop( $canonical ) {
	if ( !is_shop() ) {
		return $canonical;
	}
  return get_permalink( woocommerce_get_page_id( 'shop' ) );
}
?>