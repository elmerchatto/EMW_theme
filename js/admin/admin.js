
(function(emw){
  emw(function(){
    
    let is_appended = false;

    /**
     * Add publish button on scroll
     */
    emw(window).scroll(function () {
      if (emw(document).scrollTop() > 300) {
        var publish_button = emw('#publish').clone();

        if ( !is_appended ) {
          publish_button.addClass("emw-publish--button");
          publish_button.appendTo('#post');
          is_appended = true;
        } 
      } else {
        emw('.emw-publish--button').remove();
        is_appended = false;
      }
    });


    /**
     * Disable WP metabox from sorting
     */
    emw('.postbox .hndle').css('cursor', 'pointer');
    emw('.meta-box-sortables').sortable({
      disabled: true
    });
    

  })
})(jQuery);
