<article <?php post_class(); ?>>
  <header>
    <div class="h2 entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
    <?php if (get_post_type() === 'post') { get_template_part('template-parts/entry-meta'); } ?>
  </header>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
</article>
