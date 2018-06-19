<?php
/**
Template Name: Big image
Template Post Type: page, service
 */
 use Roots\Sage\Config;
 use Roots\Sage\Wrapper;
 
?>

<?php get_template_part('template-parts/image', 'header'); ?>

<div class="container row padding-big-v">
  
  <main class="main col-xs-12 <?php if (Config\display_sidebar()) echo 'col-lg-8'; ?>" role="main ">
    <?php while (have_posts()) : the_post(); ?>
      <?php get_template_part('templates/content', 'page'); ?>
    <?php endwhile; ?>
  </main>
  
  <?php if (Config\display_sidebar()) : ?>
    <aside class="sidebar col-xs-12 col-lg-4" role="complementary">
      <?php include Wrapper\sidebar_path(); ?>
    </aside><!-- /.sidebar -->
  <?php endif; ?>
  
</div><!-- /.content -->