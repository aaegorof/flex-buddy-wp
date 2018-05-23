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
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product;


remove_action('woocommerce_single_product_summary','woocommerce_template_single_price');
remove_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt');
remove_action('woocommerce_single_product_summary','woocommerce_template_single_add_to_cart');
remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta');
remove_action('woocommerce_single_product_summary','woocommerce_template_single_sharing');

remove_action('woocommerce_after_single_product_summary','woocommerce_output_related_products' , 20);
remove_action('woocommerce_after_single_product_summary','woocommerce_output_product_data_tabs');


/* add_action('shadow-metas','woocommerce_template_single_excerpt', 30); */
/* add_action('shadow-metas','woocommerce_template_single_meta', 35); */
add_action('shadow-metas','woocommerce_template_single_sharing', 40);
/* add_action('shadow-metas','woocommerce_template_single_price', 45); */
add_action('shadow-metas','woocommerce_template_single_add_to_cart', 50);


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
  <div class="row">
    <div class="col col-sm-8 margin-large-v lg-padding-big-r">
      <div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
      
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
    </div>
      
  	<div class="col col-sm-4 summary entry-summary margin-large-v md-max-padding-small-rl">
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
  /* 		do_action( 'woocommerce_single_product_summary' ); */
      the_title( '<h1 class="product_title entry-title">', '</h1>' );
      ?>
      
      
    <div class="product-text margin-big-v font-smaller">
      
      <div class="product-about">
        <?php $prdct = $product -> get_data(); 
          echo $prdct['description'];
        ?>
      </div>
      
      <?php do_action('shadow-metas') ?>
      
    </div> <!-- product-text -->
  
  	</div><!-- .summary -->
  </div><!-- #product-<?php the_ID(); ?> end of row -->
  
  
  <div class="shadow margin-big-v md-padding-big-rl md-max-padding-small-rl padding-medium-tb relative">
    
    <?php $product_prepare = get_field_object('product-prepare'); ?>
    <?php if($product_prepare): ?>
    <div class="product-prepare">
      <div class="color-tree font-big font-medium"><?php echo $product_prepare['label'] ?></div>
      <?php echo $product_prepare['value']; ?>
    </div>
    <?php endif; ?>
    
    <?php $product_method = get_field_object('product-method'); ?>
    <?php if($product_method): ?>
    <div class="product-method">
      <div class="color-tree font-big font-medium"><?php echo $product_method['label'] ?></div>
      <?php echo $product_method['value']; ?>
    </div>
    <?php endif; ?>
      
    <?php $product_tools = get_field_object('product-tools'); ?>
    <?php if($product_tools): ?>
    <div class="product-tools">
      <div class="color-tree font-big font-medium"><?php echo $product_tools['label'] ?></div>
      <p><?php echo $product_tools['value']; ?></p>
    </div>
    <?php endif; ?>
  
    <?php $product_time = get_field_object('product-time'); ?>
    <?php if($product_time): ?>
    <div class="product-time">
      <div class="color-tree font-big font-medium"><?php echo $product_time['label'] ?></div>
      <p><?php echo $product_time['value']; ?></p>
    </div>
    <?php endif; ?>
  
    <?php $product_spend = get_field_object('product-spend'); ?>
    <?php if($product_spend): ?>
    <div class="product-spend">
      <div class="color-tree font-big font-medium"><?php echo $product_spend['label'] ?></div>
      <p><?php echo $product_spend['value']; ?></p>
    </div>
    <?php endif; ?>
  
    <?php $product_storage = get_field_object('product-storage'); ?>
    <?php if($product_storage): ?>
    <div class="product-storage">
      <div class="color-tree font-big font-medium"><?php echo $product_storage['label'] ?></div>
      <p><?php echo $product_storage['value']; ?></p>
    </div>
    <?php endif; ?>
  
    <?php 
      $pdf = get_field('pdf');
      if($pdf) : ?>
        <a class="pdf-file margin-medium-t font-semibold" href="<?php the_field('pdf') ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/pdf.svg" width="24px" valign="bottom"> Техническая характеристика <span class="color-tin">(открыть в новой вкладке)</span></a>
      
      <?php endif; ?>
      
  </div> <!-- close the additional info shadow -->
  
  <div class="gallery-full">
    <?php get_template_part('template-parts/product-gallery') ?>
  </div>
  
  
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
    
  
  <!-- <?php echo do_shortcode('[su_posts template="templates/faq-loop.php" posts_per_page="4" tax_term="107"]'); ?> -->
  
  <?php do_action( 'woocommerce_after_single_product' ); ?>

</div>
