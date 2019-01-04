<form role="search" method="get" class="search container" action="<?= esc_url(home_url('/')); ?>">
  <div class="row">
    <div class="col-xs-12">
      <div class="row collapse">
        <div class="col-sm-8">
          <input type="text" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php _e('Например: птицефабрики', 'sage'); ?>">
        </div>
        <div class="col-sm-4">
          <button type="submit" class="button primary postfix"><?php _e('Search', 'sage'); ?></button>
        </div>
      </div>
    </div>
  </div>
</form>