jQuery(document).ready(function(){

    $('.to-popup').magnificPopup({
        type: 'inline',
        mainClass: 'mfp-fade',
        fixedContentPos: true,
        mainClass: 'mfp-with-zoom',
        closeOnBgClick: true, 
        callbacks: {
          close: function(){
          },
          open: function(){
          },
          zoom: {
            enabled: true,
            duration: 300,
            easing: 'ease-in-out',
          }
        }
        
      });
  

});