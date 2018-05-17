<?php while (have_posts()) : the_post(); ?>
  <div class="container">
    <?php get_template_part('template-parts/page', 'header'); ?>
    <?php the_content(); ?>
    <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
  </div>
<?php endwhile; ?>