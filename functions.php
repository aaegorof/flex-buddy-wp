<?php
/**
 * Sage includes
 *
 * The $libraries array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$libraries = [
  'lib/utils.php',                 // Utility functions
  'lib/init.php',                  // Initial theme setup and constants
  'lib/wrapper.php',               // Theme wrapper class
  'lib/conditional-tag-check.php', // ConditionalTagCheck class
  'lib/config.php',                // Configuration
  'lib/assets.php',                // Scripts and stylesheets
  'lib/titles.php',                // Page titles
  'lib/extras.php',                // Custom functions
];
require_once(get_template_directory().'/lib/seo.php');
if ( class_exists( 'WooCommerce' ) ) {
  require_once(get_template_directory().'/lib/woo-edits.php');
}

foreach ($libraries as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);


add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ) {
  $existing_mimes['svg'] = 'image/svg+xml';
  return $existing_mimes;
}
function fix_svg() {
    echo '<style type="text/css">
          .attachment-266x266, .thumbnail img {
               width: 100% !important;
               height: auto !important;
          }
          </style>';
 }
 add_action('admin_head', 'fix_svg');

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'menu_title' 	=> 'Данные о компании',
    'menu_slug' 	=> 'acf-options',
	));
	
}

class Submenu_Walker_Nav_Menu extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"is-dropdown-submenu menu submenu dropdown\">\n";
  }
}

add_action( 'after_setup_theme', 'yourtheme_setup' );
 
function yourtheme_setup() {
  add_theme_support( 'woocommerce' );
/*
  add_theme_support( 'wc-product-gallery-zoom' );
  add_theme_support( 'wc-product-gallery-lightbox' );
  remove_theme_support( 'wc-product-gallery-slider' );
*/
}