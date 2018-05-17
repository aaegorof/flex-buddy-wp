var Nav = (function($) {

  var _functions = function(e) {
    
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
