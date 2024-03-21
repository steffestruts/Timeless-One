jQuery(document).ready(function($) {
  $('a[href*=".jpg"], a[href*=".jpeg"], a[href*=".png"], a[href*=".gif"]').each(function(){
    if ($(this).parents('.gallery').length == 0) {
      $(this).magnificPopup({
        ajax: {
          tError: '<a href="%url%">Innehållet</a> kunde inte laddas!' // Error message when ajax request failed
        },
        closeOnContentClick: true,
        image: {
          tError: '<a href="%url%">Bilden</a> kunde inte laddas!' // Error message when image could not be loaded
        },
        mainClass: 'mfp-fade',
        removalDelay: 250,
        showCloseBtn: false,
        tLoading: 'Laddar...', // Text that is displayed during loading. Can contain %curr% and %total% keys
        type:'image',
      });
    }
  });
  
  $('.gallery').each(function() {
    $(this).magnificPopup({
      ajax: {
        tError: '<a href="%url%">Innehållet</a> kunde inte laddas!' // Error message when ajax request failed
      },
      delegate: 'a',
      image: {
        tError: '<a href="%url%">Bilden</a> kunde inte laddas!' // Error message when image could not be loaded
      },
      gallery: {
        enabled: true,
        tPrev: 'Föregående (Left arrow key)', // Alt text on left arrow
        tNext: 'Nästa (Right arrow key)', // Alt text on right arrow
        tCounter: '%curr% av %total%' // Markup for "1 of 7" counter
      },
      mainClass: 'mfp-fade', // this class is for CSS animation below
      removalDelay: 250,
      tLoading: 'Laddar...', // Text that is displayed during loading. Can contain %curr% and %total% keys
      type: 'image',
    });
  });

});