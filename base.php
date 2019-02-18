<?php

use Roots\Sage\Config;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
  <?php get_template_part('template-parts/head'); ?>
  <?php if( current_user_can('manage_options') ) : ?>
    <style type="text/css">
    	.admin-only {
      	display: block !important;
    	}
    </style>
  <?php endif; ?>
  <body <?php body_class(); ?>>
    <!--[if lt IE 9]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      get_template_part('template-parts/top-bar');
    ?>
    <div class="base-wrap" role="document">
      <?php 
/*
      if( is_product() ) {
        
        woocommerce_content();
        
      } else {
*/
        
       include Wrapper\template_path();
       
/*       } */
      ?>
    </div><!-- /.wrap -->
    <?php
      do_action('get_footer');
      get_template_part('template-parts/footer');
      wp_footer();
    ?>
  </body>
</html>
