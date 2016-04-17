( function( $ ) {

  $(document).ready(function($){

    // Trigger mmenu
    $('#mob-menu').mmenu();

    // Implement go to top
    if ( $('#btn-scrollup').length > 0 ) {

      $(window).scroll(function(){
          if ($(this).scrollTop() > 100) {
              $('#btn-scrollup').fadeIn();
          } else {
              $('#btn-scrollup').fadeOut();
          }
      });

      $('#btn-scrollup').click(function(){
          $("html, body").animate({ scrollTop: 0 }, 600);
          return false;
      });

    }

    // Search in Header
    if( $('#btn-search-icon').length > 0 ) {
      $('#btn-search-icon').click(function(e){
          e.preventDefault();
          $("#header-search-form").fadeToggle();
      });

    }

  });

} )( jQuery );
