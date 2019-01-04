<header class="main-header">
  
  
  <div class="searchform-wrapper" id="hidden-search" data-class="opened">
    <?php get_search_form(); ?>
  </div>

  <div class="bg-cotton top-bar">
  
    <div class="container row row-align-center">
      
      <div class="hide-sm padding-tiny-h mobile-logo">
        <?php echo get_custom_logo(); ?>
      </div>
      
      <div class="col sm-padding-medium-rl icons row">
        <button class="search-open hide-sm-max" toggle="#hidden-search"><i class="fa fa-search color-text"></i></button>
      </div>
      
      <div class="contact-header col push-right">
        <a href="mailto:<?php the_field('email', 'option'); ?>" class="email hide-sm-max"><?php echo str_replace(' ', '', get_field('email', 'option')); ?></a>
        <a href="tel:<?php the_field('tel', 'option'); ?>" class="tel margin-small-h"><?php echo str_replace(' ', '', get_field('tel', 'option')); ?></a>
        <button class="button primary small hide-sm-max" data-open="call-back" aria-controls="call-back">Мы перезвоним</button>
        <div class="menu-icon" type="button" data-toggle="mobile-menu"></div>
      </div>
      
    </div> <!-- container -->
  </div> <!-- top-bar -->
  
  
  <div class="row row-align-center container">
    
    <div class="logo col hide-sm-max">
      <?php echo get_custom_logo(); ?>
    </div>
    
    <nav class="site-navigation main-menu col col-stretch" id="mobile-menu" role="navigation">
      <?php if (has_nav_menu('primary_navigation')) :
        wp_nav_menu([
        'theme_location' => 'primary_navigation', 
        'menu_class' => 'nav menu row dropdown',
        'container' => false,
        'items_wrap' => '<ul id="%1$s" class="%2$s" data-dropdown-menu data-click-open="true" data-disable-hover="true">%3$s</ul>',
        'walker' => new Submenu_Walker_Nav_Menu
        ]);
      endif; ?>
    </nav>
    
  </div>
      
</header>

<?php get_template_part('template-parts/breadcrumbs'); ?>