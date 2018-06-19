<ul class="news-list margin-big-tb no-list">
<?php
	// Posts are found
	if ( $posts->have_posts() ) {
		while ( $posts->have_posts() ) :
			$posts->the_post();
			global $post;
			
			$id = get_the_id();
			$url = get_permalink($post->ID);
			$name = $post->post_title;
			
      $text = wp_trim_excerpt( get_the_excerpt($id));
      $image = get_the_post_thumbnail_url($id, 'medium');

			?>
      
        <li class="margin-medium-b news-item row xs-padding-small">
          
          <a href="<?php echo $url; ?>" class="no-underline col col-xs-12 col-md-2 img-cover news-thumb" style="background-image: url(<?php echo $image; ?>)"></a>
          
          <div class="col col-xs-12 col-md-10 md-padding-big-l">
            
            <a href="<?php echo $url; ?>"><div class="h3 news-title font-semibold"><?php echo $name; ?></div></a>
            <time class="color-ash font-small post-date updated" datetime="<?php get_the_time("c") ?>"><?php echo get_the_date("F Y"); ?></time>
              <div class="news-excerpt">
                <?php echo $text; ?>
              </div>
            </div>
        </li>
    

			<?php
		endwhile;
	}
	// Posts not found
	else {
		echo '<h4>' . __( 'Posts not found', 'shortcodes-ultimate' ) . '</h4>';
	}
?>
</ul>