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
      
        <li class="margin-medium-b bg-white news-item">
          <?php 
            echo '<a href="' . $url . '" class="no-underline row xs-padding-small md-padding-big">
              <div class="col col-xs-12 col-md-2 img-cover news-thumb" style="background-image: url('. $image .')"></div>
              
              <div class="col col-xs-12 col-md-10 md-padding-big-l">
                <div class="margin-tiny-b">
                  <time class="updated post-date" datetime="'. get_the_time("c") .'">'. get_the_date("F Y") .'</time>
                </div>
                <div class="h3 margin-small-b news-title font-semibold">' .$name . '</div>
                
                <div class="news-excerpt">
                  '. $text .'
                </div>
                
              </div>
          </a>';
          ?>
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