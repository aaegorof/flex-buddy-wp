<?php 
$thisCatId = get_queried_object_id();
$thisCat = get_category($thisCatId);

$catName = $thisCat->cat_name;
$catCount = $thisCat->category_count;
$slug = $thisCat->slug;

$args = array( 
  'posts_per_page' => -1, 
  'category' => $thisCatId
  );
$posts = new WP_Query($args);
?>
  

<div class="container">
  
  <h1><?php echo $catName;?> <span class="count font-thin font-smaller color-tin">(<?php echo $catCount; ?>)</span></h1>
  
  <?php if( $thisCat->category_description ): ?>
    <div class="<?php echo $slug; ?>-description">
      <?php the_archive_description(); ?>
    </div>
  <?php endif; ?>
  
  <?php 
    if ( $posts->have_posts() ) : ?>
    
    <?php while ( $posts->have_posts() ) :
		$posts->the_post(); ?>
		
		  <?php get_template_part('templates/content'); ?>
    
    <?php endwhile;?>

  <?php endif; ?>

  
</div>
