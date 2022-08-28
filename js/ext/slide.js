(function($){
  $(function(){
    
    let current = '';
    let index   = 0;
    let point_x = 0;
    let point_y = 0;


    /**
     * Clicking the right arrow
     */
    $('.arrow__right').on('click', function(){
      current = 'right';
      index   = $(this).attr('lnx-slide-index');
      
      if ( index == 1 ) {
        point_x = '-100vw';
      }

      if ( index == 2 ) {
        point_x = '-200vw';
      }

      if ( index == 3 ) {
        point_x = '-300vw';
      }

      if ( index == 4 ) {
        point_x = '0';
      }

      // Move right from point_x
      move_right();

      // Set to visible
      change_active($(this));
    });

    function move_right() {
      $('.grid--container').css('left', point_x);
    }


    /**
     * Clicking the left arrow
     */
    $('.arrow__left').on('click', function(){
      current = 'left';
      index   = $(this).attr('lnx-slide-index');

      if ( index == 1 ) {
        point_x = '-300vw';
      }

      if ( index == 2 ) {
        point_x = '0';
      }

      if ( index == 3  ) {
        point_x = '-100vw';
      }

      if ( index == 4 ) {
        point_x = '-200vw';
      }

      // Move left from point_x
      move_left();

      // Set to visible
      change_active($(this));

    });

    function move_left() {
      $('.grid--container').css('left', point_x);
    }


    /**
     * Clicking the bottom arrow
     */
    $('.arrow__bottom').on('click', function(){
      current = 'bottom';
      index   = $(this).attr('lnx-slide-index');
      
      if ( index == 1 ) {
        point_y = '-100vh';
      }

      if ( index == 2 ) {
        point_y = '-200vh';
      }

      if ( index == 3 ) {
        point_y = '-300vh';
      }

      if ( index == 4 ) {
        point_y = '0';
      }

      // Move bottom from point_y
      move_bottom();

      // Set to visible
      change_active($(this));

    });

    function move_bottom() {
      $('.grid--container').css('top', point_y);
    }
    

    /**
     * Clicking the top arrow
     */

    $('.arrow__top').on('click', function(){
      current = 'top';
      index   = $(this).attr('lnx-slide-index');
      
      if ( index == 1 ) {
        point_y = '-300vh';
      }

      if ( index == 2 ) {
        point_y = '0';
      }

      if ( index == 3 ) {
        point_y = '-100vh';
      }

      if ( index == 4 ) {
        point_y = '-200vh';
      }

      // Move top from point_y
      move_top();

      // Set to visible
      change_active($(this));
      
    });

    function move_top() {
      $('.grid--container').css('top', point_y);
    }


    /**
     * Remove any active class in mouse hover
     */
    $('.arrow__right, .arrow__left, .arrow__bottom, .arrow__top').on('mouseover', function(){
      $('.grid--item').each(function(){
        $(this).removeClass('active');
      });
      $(this).parent().addClass('active');
    });


    /**
     * Remove any active class
     */
    function change_active( element ) {
      $('.grid--item').each(function(){
        $(this).removeClass('active');
      });

      var right_end = [0, 4, 8, 12];
      var left_end  = [3, 7, 11, 15];

      if ( 'right' == current ) {
        if ( index != 4 ) {
          element.parent().next().addClass('active');
        } else {
          right_end.forEach(i => {
            $('.grid--item').eq(i).addClass('active');
          });
        }
      }

      if ( 'left' == current ) {
        if ( index != 1 ) {
          element.parent().prev().addClass('active');
        } else {
          left_end.forEach(i => {
            $('.grid--item').eq(i).addClass('active');
          });
        }
      }

      if ( 'top' == current || 'bottom' == current ) {
        $('.grid--item').addClass('active');
      }
    }


    /**
     * Clicking the grid navigation
     */
    $('.grid--nav__item').on('click', function(){
      var point_n = $(this).attr('lnx-nav-point');
      var index_n = $(this).attr('lnx-nav-index');
      
      // Remove all active class from the grid
      $('.grid--item').each(function(){
        $(this).removeClass('active');
      });

      $('.grid--nav__item').each(function(){
        $(this).removeClass('active');
      });

      // Roll it out, baby..
      $(this).addClass('active');
      $('.grid--item__'+ index_n).addClass('active');
      $('.grid--container').attr('style', point_n);
    });


    /**
     * Sync the grid nav
     */
    $('.grid--item').on('mouseenter', function(){
      var class_l = $(this).attr('class').split(' ');
      var index_t = class_l[1].split('__');
      
      $('.grid--nav__item').each(function(){
        $(this).removeClass('active');
        if($(this).attr('lnx-nav-index') == index_t[1]){
          $(this).addClass('active');
        }
      });
    });

  });
})(jQuery);
