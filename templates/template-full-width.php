<?php
/**
Template Name: Full-width
Template Post Type: page, service
 */
 use Roots\Sage\Config;
 use Roots\Sage\Wrapper;
 
?>
<div class="content row">
  <main class="main small-12 columns <?php if (Config\display_sidebar()) echo 'medium-8'; ?>" role="main">
  <?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/page', 'header'); ?>
    <?php get_template_part('templates/content', 'page'); ?>
  <?php endwhile; ?>

  <?php if (Config\display_sidebar()) : ?>
    <aside class="sidebar small-12 medium-4 columns" role="complementary">
      <?php include Wrapper\sidebar_path(); ?>
    </aside><!-- /.sidebar -->
  <?php endif; ?>
</div><!-- /.content -->