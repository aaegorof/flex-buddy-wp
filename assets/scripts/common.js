var Common = (function($) {
  
  var _toggle = function(e) {
    
    $('[toggle]').click(function(e){
      e.preventDefault();
      var toggleEl = $(this).attr('toggle'),
          toggleClass = $(toggleEl).data('class');
      if(toggleClass.length) {
        $(toggleEl).toggleClass(toggleClass);
      } else {
        $(toggleEl).toggle();
      };
      
    });
    
  };
  
  var _dropdown = function(e) {
    $('.menu-item-has-children > a').click(function(e){
      e.preventDefault();
      e.stopPropagation();
      $(this).siblings('.submenu').toggle();
    });
    
    $(window).click(function(){
      $('.submenu').hide();
    });    
  }
  
  var _reveal = function(e) {
    
    $('[reveal]').click(function(e){
      e.preventDefault();
      var toggleEl = $(this).attr('reveal');
      
      $('.reveal-overlay').toggle();
      $(toggleEl).show();
    });
    
    
    $('.reveal').click(function(e){
      e.stopPropagation();
    });
    
    $('.reveal-overlay').click(function(e){
      e.stopPropagation();
      if(e.target = this) {
        $('.reveal').hide()
        $(this).hide();   
      }
    });
    
    $('.close-modal').click(function(e){
      e.preventDefault();
      $(this).parent().hide();
      $('.reveal-overlay').hide();
    });
  }
  
  var _facets = function(e) {
    
    ///// Facets 
    $(document).on('facetwp-loaded', function() {
      
      // Скрывает пустые значения
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
  }
  
  
  var _functions = function(e) {
    
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
    
    
  };


  return {
    initialize: function() {
      _reveal();
      _dropdown();
      _toggle();
      _functions();
    }
  };
})(jQuery);

