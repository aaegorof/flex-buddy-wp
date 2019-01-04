<?php 
  $posts = get_field('to-doctor');
  $title = 'Прием ведет врач:';
  if(count($posts) > 1) {
    $title = 'Прием ведут врачи:';
  };
  
if( $posts ): ?>
  <div class="h3 text-center margin-small-b"><?php echo $title; ?></div>
  
  <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
      <?php setup_postdata($post); ?>
      <div class="row padding-small padding-big-b bg-cotton">
        <div class="columns small-12 medium-4">
        <?php if ( has_post_thumbnail()) {the_post_thumbnail("full",array("class"=>"full-doctor-image"));} ?>
        </div>
        
        <div class="columns small-12 medium-8 lg-padding-medium-rl">
          <div class="h4"><?php the_title(); ?></div>
          <p class="doc-position"><?php the_field('positiion') ?></p>
          <div class="doc-about"><?php the_field('doc_about') ?></div>
        </div>
        
      </div>
  <?php endforeach; ?>

  <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>


<div class="text-center">
  <button class="column small-6 button bg-coral large wide shadow top-50" data-open="form-priem">Записаться к врачу</button>
</div>
