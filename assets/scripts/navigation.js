var Nav = (function($) {

  var _functions = function(e) {
    
/*
    $('.menu-item-has-children > a').click(function(event){
      event.preventDefault();
      $(this).parent().toggleClass('opened');
    });
*/
    
    $('[data-toggle]').click(function(){
      var rel = $(this).data('toggle');

      $('#'+rel).toggle();
    });
  };


  return {
    initialize: function() {
      _functions();
    }
  };
})(jQuery);
