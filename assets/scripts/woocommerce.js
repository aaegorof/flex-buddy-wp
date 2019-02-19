var Woo = (function($) {

  var _functions = function(e) {
    
    $(".input-inc, .input-dec").on("click", function() {
    
      var $button = $(this),
          input = $button.parent().find(".qty"),
          oldValue = input.val();
    
      if ($button.hasClass('input-inc')) {
    	  var newVal = parseFloat(oldValue) + 1;
    	} else {
       // Don't allow decrementing below zero
        if (oldValue > 0) {
          var newVal = parseFloat(oldValue) - 1;
        } else {
          newVal = 0;
        }
      }
    
      $button.parent().find("input").val(newVal);
      input.trigger('change');
    });
    
    
    

  };


  return {
    initialize: function() {
      _functions();
    }
  };
})(jQuery);

