<div class="reveal-overlay">
  
  <div class="reveal" id="call-back">
    <div class="h2 text-center margin-medium-b">Перезвоните мне</div>
    <div class="modal-form">
      <?php echo do_shortcode('[contact-form-7 id="132" title="Перезвоните мне"]'); ?>
    </div>
    <button class="close-modal">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  
  <div class="reveal" id="order-default">
    <?php $qo = get_queried_object(); 
      $formTitle = is_category() ? $qo->name : $qo->post_title;
    ?>
    <div class="h2 text-center margin-medium-b"><?php echo $formTitle; ?></div>
    <div class="modal-form form-default">
      
    </div>
    <button class="close-modal">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  
</div>