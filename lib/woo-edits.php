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

if($onePageCheckout) {
  
  remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form',10);
  add_action('woocommerce_before_checkout_billing_form', 'woocommerce_checkout_payment', 5);
  
  add_filter( 'woocommerce_shipping_address_map_url_parts' , 'woo_custom_order_formatted_shipping_address', 10, 2 );
  add_filter( 'woocommerce_order_formatted_shipping_address' , 'woo_custom_order_formatted_shipping_address', 10, 2 );
}
// change something in Woocomerce checkout


/// SEO adjustments 
function yoast_seo_canonical_change_woocom_shop( $canonical ) {
	if ( !is_shop() ) {
		return $canonical;
	}
  return get_permalink( woocommerce_get_page_id( 'shop' ) );
}
?>