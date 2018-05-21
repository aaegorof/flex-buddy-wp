<?php get_template_part('template-parts/orders') ?>

<?php 
  $footerNavs = 0;
  has_nav_menu('footer_left') ? $footerNavs ++ : '';
  has_nav_menu('footer_center') ? $footerNavs ++ : '';
  has_nav_menu('footer_right') ? $footerNavs ++ : '';
  $cols = 12/$footerNavs;
?>

<footer class="footer" role="contentinfo">
  <div class="row container">
    <div class="row col col-xs-12 col-lg-8">
      <?php if (has_nav_menu('footer_left')) :
        wp_nav_menu([
          'theme_location' => 'footer_left', 
          'menu_class' => 'menu footer-left',
          'container_class' => 'col col-xs-12 col-lg-' . $cols,
        ]);
      endif; ?>
      <?php if (has_nav_menu('footer_center')) :
        wp_nav_menu([
          'theme_location' => 'footer_center', 
          'menu_class' => 'menu footer-center',
          'container_class' => 'col col-xs-12 col-lg-' . $cols,
        ]);
      endif; ?>
      <?php if (has_nav_menu('footer_right')) :
        wp_nav_menu([
          'theme_location' => 'footer_right', 
          'menu_class' => 'menu footer-right',
          'container_class' => 'col col-xs-12 col-lg-' . $cols,
        ]);
      endif; ?>

    </div>
    
    <div class="col col-xs-12 col-lg-4">
      <div class="social">
        <p>
          <?php if( get_field('vk','option') ) : ?>
            <a href='<?php the_field('vk','option') ?>' target="_blank"><i class="fa fa-vk"></i></a>
          <?php endif; ?>
          <?php if( get_field('fb','option') ) : ?>
            <a href='<?php the_field('fb','option') ?>' target="_blank"><i class="fa fa-facebook"></i></a>
          <?php endif; ?>
          <?php if( get_field('insta','option') ) : ?>
            <a href='<?php the_field('insta','option') ?>' target="_blank"><i class="fa fa-instagram"></i></a>
          <?php endif; ?>
          <?php if( get_field('youtube','option') ) : ?>
            <a href='<?php the_field('youtube','option') ?>' target="_blank"><i class="fa fa-youtube"></i></a>
          <?php endif; ?>
        </p>
      </div>

    </div>  

  </div>
</footer>