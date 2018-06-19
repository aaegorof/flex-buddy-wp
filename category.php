<?php 
  $thisCatId = get_queried_object_id();
  $thisCat = get_category($thisCatId);
  
  $catName = $thisCat->cat_name;
  $catCount = $thisCat->category_count;
  $slug = $thisCat->slug;
  
?>
<div class="container">
  
  <h1><?php echo $catName;?> <span class="count font-thin font-smaller color-tin">(<?php echo $catCount; ?>)</span></h1>
  
  <?php if( $thisCat->category_description ): ?>
    <div class="<?php echo $slug; ?>-description">
      <?php the_archive_description(); ?>
    </div>
  <?php endif; ?>
  
  <?php echo do_shortcode('[su_posts template="template-parts/loop-news.php" tax_term="' . $thisCatId . '"]'); ?>
</div>