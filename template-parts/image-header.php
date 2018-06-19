<?php use Roots\Sage\Titles; ?>

<?php if ( has_post_thumbnail()) {
  $url = get_the_post_thumbnail_url(null, 'full');
  } 
?>
<div class="image-header padding-medium inner-shadow" style="background-image: url(<?php echo $url; ?>);">
  <div class="container page-header color-white">
    <h1><?= Titles\title(); ?></h1>
  </div>
</div>