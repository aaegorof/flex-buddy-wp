<?php use Roots\Sage\Titles; ?>

<?php  
  if( get_the_post_thumbnail() ) {
    $bg_img = '';
  } else {
    $bg_img = 'no-img';
  }
?>

<div class="service-header <?php echo $bg_img; ?>" style="background-image: url(<?php the_post_thumbnail_url('full'); ?>)">

  <div class="row">
    <div class="column small-12">
      <h1><?= Titles\title(); ?></h1>
      <?php if( get_field('on_featured') ): ?>
        <div class="featured-teaser"><?php the_field('on_featured'); ?></div>
      <?php endif; ?>
    </div>
  </div>
  
</div>
