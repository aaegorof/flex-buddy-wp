<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product;


remove_action('woocommerce_single_product_summary','woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_price');
remove_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt');
remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta', 40);

remove_action('woocommerce_after_single_product_summary','woocommerce_output_related_products' , 20);
remove_action('woocommerce_after_single_product_summary','woocommerce_output_product_data_tabs');


/* add_action('attributes','woocommerce_template_single_excerpt', 30); */
/* add_action('attributes','woocommerce_template_single_meta', 35); */

/* add_action('attributes','woocommerce_template_single_price', 45); */


?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div class="container">
  <div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <div class="row">
      <div class="col col-sm-8 margin-large-v">
      	<?php
      		/**
      		 * woocommerce_before_single_product_summary hook.
      		 *
      		 * @hooked woocommerce_show_product_sale_flash - 10
      		 * @hooked woocommerce_show_product_images - 20
      		 */
      		do_action( 'woocommerce_before_single_product_summary' );
      	?>
      </div>
      
    	<div class="col col-sm-4 summary entry-summary margin-large-v padding-medium-rl md-max-padding-small-rl">
      	
    	  <?php the_title( '<h1 class="product_title entry-title margin-no-b">', '</h1>' );?>
        <p class="price color-ash font-small margin-medium-b text-left"><?php echo $product->get_price_html(); ?></p>
        
        <div class="product-text margin-big-b font-smaller">
        
          <div class="product-about margin-medium-b color-ash">
            <?php $prdct = $product -> get_data(); 
              echo $prdct['description'];
            ?>
          </div>
        
          <?php 
      		/**
      		 * woocommerce_single_product_summary hook.
      		 *
      		 * @hooked woocommerce_template_single_title - 5
      		 * @hooked woocommerce_template_single_rating - 10
      		 * @hooked woocommerce_template_single_price - 10
      		 * @hooked woocommerce_template_single_excerpt - 20
      		 * @hooked woocommerce_template_single_add_to_cart - 30
      		 * @hooked woocommerce_template_single_meta - 40
      		 * @hooked woocommerce_template_single_sharing - 50
      		 * @hooked WC_Structured_Data::generate_product_data() - 60
      		 */
      		do_action( 'woocommerce_single_product_summary' ); ?>
        
        </div> <!-- product-text -->
    	</div><!-- .summary -->
  	
    </div><!-- #product-<?php the_ID(); ?> end of row -->
  
  
  <?php
  	/**
  	 * woocommerce_after_single_product_summary hook.
  	 *
  	 * @hooked woocommerce_output_product_data_tabs - 10
  	 * @hooked woocommerce_upsell_display - 15
  	 * @hooked woocommerce_output_related_products - 20
  	 */
  	do_action( 'woocommerce_after_single_product_summary' );
  ?>
    
  </div> <!-- End of id = product -->
  
  
  <!-- <?php echo do_shortcode('[su_posts template="templates/faq-loop.php" posts_per_page="4" tax_term="107"]'); ?> -->
  
  <?php do_action( 'woocommerce_after_single_product' ); ?>

</div> <!-- End of container -->
