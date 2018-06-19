<?php
while (have_posts()) : the_post(); ?>

<div class="container">
  <h1 class="post-header"><?php the_title(); ?></h1>
  
  <div class="post-body">
    <?php the_content(); ?>
  </div>
  
  <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
</div>
<?php endwhile; ?>