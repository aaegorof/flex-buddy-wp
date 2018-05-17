<header class="row row-align-center container main-header">
    
  <div class="logo col">
    <?php echo get_custom_logo(); ?>
  </div>
  
  <div class="menu-icon" type="button" data-toggle="mobile-menu"></div>
  <nav class="site-navigation main-menu col col-stretch" id="mobile-menu" data-topbar role="navigation">
    <?php if (has_nav_menu('primary_navigation')) :
      wp_nav_menu([
      'theme_location' => 'primary_navigation', 
      'menu_class' => 'nav menu row', 
      'container' => false,
      'walker' => new Submenu_Walker_Nav_Menu
      ]);
    endif; ?>
  </nav>

  <div class="contact-header col sm-padding-medium-rl">

    <a href="tel:<?php echo str_replace(' ', '', get_field('tel', 'option')); ?>" class="tel no-underline"><?php the_field('tel', 'option'); ?></a>
  </div>
  
  <div class="col sm-padding-medium-rl icons row">
    <a class="search-open hide-sm-max" href="#"><i class="fa fa-search"></i></a>
    <div class="hidden searchform-wrapper">
      <?php get_search_form(); ?>
    </div>

  </div>
    
</header>

<?php get_template_part('template-parts/breadcrumbs'); ?>