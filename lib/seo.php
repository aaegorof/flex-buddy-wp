<?php 
add_action('after_setup_theme','flex_start', 16);

function flex_start() {
  // launching operation cleanup
  add_action('init', 'flex_head_cleanup');
}


//The default wordpress head is a mess. Let's clean it up by removing all the junk we don't need.
function flex_head_cleanup() {
	// Remove category feeds
  remove_action( 'wp_head', 'feed_links_extra', 3 );
	// Remove post and comment feeds
  remove_action( 'wp_head', 'feed_links', 2 );
	// Remove EditURI link
	remove_action( 'wp_head', 'rsd_link' );
	// Remove Windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// Remove index link
	remove_action( 'wp_head', 'index_rel_link' );
	// Remove previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// Remove start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// Remove links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// Remove WP version
	remove_action( 'wp_head', 'wp_generator' );
}


function my_delete_metas( $str ) {
  global $paged;
  
    // Determine if current post is paginated
    // and if we're on a page other than Page 1
    if ( $paged >= 2 || isset($_GET['orderby'])) {
        return false;
    }    

  return $str;
}


function add_order_to_meta_title( $str ) {
  $add = '';
  if (isset($_GET['orderby'])) {
    
    
    $order = $_GET['orderby'];
    switch ($order) {

      case "menu_order":
      break;
      case "popularity":
      $add = "популярности";
      break;
      case "date":
      $add = "новизне";
      break;
      case "price":
      $add = "цене: по возрастанию";
      break;
      case "price-desc":
      $add = "цене: по убыванию";
      break;
    }
    return $str . ' – Сортирока по ' . $add;
  }
  return $str;
}


function my_robots( $str ) {
  if (isset($_GET['orderby'])) {
    return 'noindex, nofollow';
  }
  return $str;
}


// If only YOAST plugin is active?
add_filter( 'wpseo_canonical', 'yoast_seo_canonical_change_woocom_shop', 10, 1 );
add_filter( 'wpseo_metadesc', 'my_delete_metas', 10, 1 );
add_filter( 'wpseo_metakey', 'my_delete_metas', 10, 1 );
add_filter( 'wpseo_title', 'add_order_to_meta_title', 10, 1 );
add_filter( 'wpseo_robots', 'my_robots', 10, 1 );


?>