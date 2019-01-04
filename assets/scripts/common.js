var Common = (function($) {

  var _functions = function(e) {

    $('[toggle]').click(function(e){
      e.preventDefault();
      var toggleEl = $(this).attr('toggle'),
          toggleClass = $(toggleEl).data('class');
          console.log(toggleEl,toggleClass);
      $(toggleEl).toggleClass(toggleClass);
    });
    
    $('form.search').submit(function(e){
      var input = $(this).find('input').val();
      if( input.length < 1 ) {
        e.preventDefault();
        alert('Укажите фразу для поиска.')
      }
    });
    
/*
    $('.sticky').parent().css('height', function(){
      var height = $('.woocommerce-product-gallery').length ? $('.woocommerce-product-gallery').height() : $(this).height();
      return height;
    });
*/
    
/*
    $(window).on('resize load',function(){
      var wwidth = $(window).width();
    if( wwidth < 560 ) {
      $(".sticky").trigger("sticky_kit:detach");
      
    } else if( wwidth > 560 && wwidth < 780 ){
        setTimeout(function(){
          $('.sticky').stick_in_parent({
            offset_top: 60
          });
        }, 800)
        
    	} else {
        setTimeout(function(){
          $('.sticky').stick_in_parent();
        }, 800)
        
    	}
    });
*/


    ///// Facets 
    
    $(document).on('facetwp-loaded', function() {
      
      $.each(FWP.settings.num_choices, function(key, val) {
          (0 === val) ? $('.facet-' + key).hide() : $('.facet-' + key).show();
      });
      
      // Заменим facet wp цвет на удобно читаемый
      setTimeout( function(){
        var label = $('.facetwp-selections li[data-facet="color"] .facetwp-selection-value');
        var labelText = label.text();
        
        $('.facet-color .checked').each(function(){
          if( labelText = $(this).data('value') ) {
            var color = $(this).data('color')
            label.text(color);
          }   
        });
        
      }
      , 10)

    });
    
    
  };


  return {
    initialize: function() {
      _functions();
    }
  };
})(jQuery);

