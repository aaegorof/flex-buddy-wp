var Slick = (function($) {

  var _functions = function(e) {
    
    $(".slider.default").on('init', function(){
    	$(this).parent().addClass('initialized');
    });
    
    
    $(".slider.default").slick({
      infinite: true,
      arrows: true,
      dots: false,
      autoplay: false,
      fade: false,
      speed: 600,
      slidesToShow: 1,
      slidesToScroll: 1,
      centerMode: true,
      adaptiveHeight: false,
      centerPadding: '60px',
      prevArrow: '<div class="prev-slide fa fa-chevron-left"></div>',
      nextArrow: '<div class="next-slide fa fa-chevron-right"></div>',
      responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 1,
        }
      },
      {
        breakpoint: 780,
        settings: {
          slidesToShow: 1,
        }
      }
      ] //end of responsive
    }); // end of slider slick
  };


  return {
    initialize: function() {
      _functions();
    }
  };
})(jQuery);

