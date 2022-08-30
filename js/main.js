jQuery(document).ready(function(){

    $(window).scroll(function () {
        if ($(document).scrollTop() > 80) {
          $('header').addClass('sticky');
        } else {
          $('header').removeClass('sticky');
        }
      });
      
});