let smooth_scroll = new SmoothScroll();

    /**
     * JSON parser
     */

     function parse_response(data) {
        if (!data) return false;
        if (typeof data === 'object') return data;
        if (typeof data === 'string') return JSON.parse(data);
  
        return false;
      }

      
    /**
     * Loader
     */
    function loader() {
        swal({
          dangerMode: false,
          buttons: false,
          closeOnClickOutside: false,
        });
  
        $('.swal-modal').html('<div class="loader__wrapper"><span class="loader--spin"></span></div>');
        $('.swal-modal').css('width', '120px');
        $('.swal-modal').css('height', '120px');
      }

    /**
     * Append Link JS
     */
      
    function append_script( link ) {

        let script = document.createElement('script');
        script.src = link;
        document.body.appendChild(script);
        
    }

     /**
     * Append Link CSS
     */

    function add_css(fileName) {

        var head = document.head;
        var link = document.createElement("link");
      
        link.type = "text/css";
        link.rel = "stylesheet";
        link.href = fileName;
      
        head.appendChild(link);

    }


    /**
     * 
     * @param $current 
     * @param $closest 
     * @param $find 
     * @returns 
     */

     function onClosest($current, $closest, $find){

        const data = $current.closest($closest).find($find);
         
          if(data.length>0) return data;
    
          return false;
    
     }
