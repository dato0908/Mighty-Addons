(function ($) {
  "use strict";

  window.onscroll = function() {readingProgressBar()};

  function readingProgressBar() {
    var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    var scrolled = (winScroll / height) * 100;

    // View 1
    if( document.getElementById( "ma-rpb" ) ) {
      document.getElementById( "ma-rpb" ).style.width = scrolled + "%";
    }

    // View 2
    if ( document.getElementById( "ma-btt-rpb" ) ) {
      
      let progressPath = document.querySelector('.ma-progress-wrap path');
      let pathLength = progressPath.getTotalLength();
      let progress = pathLength - (winScroll * pathLength / height);

      progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
      progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
      progressPath.style.strokeDashoffset = pathLength;
      progressPath.getBoundingClientRect();
      progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
      
      progressPath.style.strokeDashoffset = progress;

      let offset = 50;
      let duration = 550;

      // Activate progress bar after defined limit
      $(window).on('scroll', function() {
        if ($(this).scrollTop() > offset) {
          $('.ma-progress-wrap').addClass('active-progress');
        } else {
          $('.ma-progress-wrap').removeClass('active-progress');
        }
      });

      // Send to top
      $('.ma-progress-wrap').on('click', function(event) {
        event.preventDefault();
        $('html, body').animate({
          scrollTop: 0
        }, duration);
        return false;
      })
    }

  }

  // Dynamic Progress Bar for Elementor Editor
  $(window).on('elementor/frontend/init', function () {

    if ( elementorFrontend.isEditMode() ) {
      
      // On Enable RPB
      elementor.settings.page.addChangeCallback( 'ma_enable_rpb', function( value ) {
        if( value == 'yes' ) {
          let html = '<div class="ma-rpb-header"><div class="ma-rpb-progress-container"><div class="ma-rpb-progress-bar" id="ma-rpb"></div></div></div>';
          jQuery( elementorFrontend.elements.$body ).append( html );
        } else {
          if ( jQuery( elementorFrontend.elements.$body ).find( '.ma-rpb-header' ).length ) {
            jQuery( elementorFrontend.elements.$body ).find( '.ma-rpb-header' ).remove();
          }
        }
      });

      // On Hide On Change
      elementor.settings.page.addChangeCallback( 'ma_hide_on', function( value ) {
        jQuery( elementorFrontend.elements.$body ).find( '.ma-rpb-header' ).attr( 'data-hide-on', value );  
      });

      // On Position change
      elementor.settings.page.addChangeCallback( 'ma_position', function( value ) {
        jQuery( elementorFrontend.elements.$body ).find( '.ma-rpb-header' ).attr( 'data-position', value );
      });

    }
      

  });

})(jQuery);