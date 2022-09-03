<?php 

/**
 * @author  Elmer Chatto
 * @link https://iamelmerchatto.com/
 * @version 1.1
 */

/**
 * Exit if accessed directly
 */
defined( 'ABSPATH' ) || exit;


/**
 * --------------------------------------------------------
 * All WP hooks will be created here. All function should
 * be prefix by emw_ to prevent conflict from other functions.
 * --------------------------------------------------------
 */


/**
 * Add theme locations
 */
add_action( 'init', 'emw_register_theme_locations' );
function emw_register_theme_locations() {
  register_nav_menus([
    'main-menu' => 'Main Menu'
  ]);
}



/** 
 * Enqueue Scripts
 */


/** 
 * Enqueue Scripts
 */

add_action( 'wp_enqueue_scripts', 'enqueue_scripts__' );
function enqueue_scripts__() {

  if(@get_field( 'animsition','option' )) :

    wp_enqueue_style( 'animsition-css', 'https://cdnjs.cloudflare.com/ajax/libs/animsition/3.2.1/css/animsition.min.css' );
    wp_enqueue_script( 'animsition-js', 'https://cdnjs.cloudflare.com/ajax/libs/animsition/3.2.1/js/animsition.min.js', array('jquery'), '1.0', true  );

  endif;  
  

  if(@get_field( 'barba','option' )) :

    wp_enqueue_script( 'barba-css', 'https://unpkg.com/@barba/css' );
    // wp_enqueue_script( 'barba-js', 'https://cdnjs.cloudflare.com/ajax/libs/barba.js/0.0.2/barba.min.js' ); 
    wp_enqueue_script( 'barba-js',  get_template_directory_uri().'/js/ext/barba.min.js');

  endif;  

  if(@get_field( 'images_loaded','option' )) :

    wp_enqueue_script( 'images-loaded-js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/5.0.0/imagesloaded.min.js', array('jquery'), '1.0', true  );

  endif; 

  if(@get_field( 'fullpage_js','option' )) :

    wp_enqueue_style( 'fullpage-css', 'https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.9.7/jquery.fullpage.min.css' );
    wp_enqueue_script( 'fullpage-js', 'https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.9.7/jquery.fullpage.min.js', array('jquery'), '1.0', true  );
    wp_enqueue_script( 'fullpage-extensions-js', 'https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.9.7/jquery.fullpage.extensions.min.js', array('jquery'), '1.0', true  );
    wp_enqueue_script( 'fullpage-scroll-overflow-js', 'https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.9.7/vendors/scrolloverflow.min.js', array('jquery'), '1.0', true  );
    wp_enqueue_script( 'fullpage-easings-js', 'https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.9.7/vendors/jquery.easings.min.js.js', array('jquery'), '1.0', true  );

  endif; 
  

  if(@get_field( 'gsap','option' )) :

    wp_enqueue_script( 'gsap-css', '' );
    wp_enqueue_script( 'gsap-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/gsap.min.js' );
    wp_enqueue_script( 'gsap-easepack-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/EasePack.min.js', array('jquery'), '1.0', true  );
    wp_enqueue_script( 'gsap-scrolltrigger-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/ScrollTrigger.min.js', array('jquery'), '1.0', true  );

  endif;

  if(@get_field( 'scroll_magic','option' )) :
    
    wp_enqueue_script('timelinelite-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.6/gsap.min.js');
    wp_enqueue_script( 'scroll-magic-js', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/ScrollMagic.min.js', array('jquery'), '1.0', true  );
    wp_enqueue_script( 'scroll-magic-tweenmax-js',  get_template_directory_uri(). '/js/ext/tweenmax.js', array('jquery'), '1.0', true  );
    wp_enqueue_script( 'scroll-magic-gsap-animation-js', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/plugins/animation.gsap.min.js', array('jquery'), '1.0', true  );
    wp_enqueue_script( 'scroll-magic-indicators-js', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/plugins/debug.addIndicators.min.js', array('jquery'), '1.0', true  );
    

  endif; 

  if(@get_field( 'slick','option' )) :

    wp_enqueue_style( 'slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css' );
    wp_enqueue_style( 'slick-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css' );
    wp_enqueue_script( 'slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.0', true );

  endif;  

  if(@get_field( 'bootstrap_js','option' )) :

    wp_enqueue_script( 'bootstrap-js', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.min.js', array('jquery'), '1.0', true  );

  endif; 
  
  if(@get_field( 'flickity','option' )) :

    wp_enqueue_style( 'flickity-css', 'https://cdnjs.cloudflare.com/ajax/libs/animsition/3.2.1/css/animsition.min.css' );
    wp_enqueue_script( 'flickity-js', 'https://cdnjs.cloudflare.com/ajax/libs/flickity/3.0.0/flickity.pkgd.min.js', array('jquery'), '1.0', true  );

  endif; 

  if(@get_field( 'infinite_scroll','option' )) :

    wp_enqueue_script( 'infinite-scroll-js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-infinitescroll/4.0.1/infinite-scroll.pkgd.min.js', array('jquery'), '1.0', true  );

  endif; 

  if(@get_field( 'isotope','option' )) :

    wp_enqueue_script( 'isotope-js', 'https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js', array('jquery'), '1.0', true  );

  endif; 

  if(@get_field( 'masonry','option' )) :

    wp_enqueue_script( 'masonry-js', 'https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js', array('jquery'), '1.0', true  );

  endif; 

  if(@get_field( 'lottie','option' )) :

    wp_enqueue_script( 'lottie-js', 'https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.9.6/lottie.min.js' );
    wp_enqueue_script( 'lottie-canvas-js', 'https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.9.6/lottie_canvas.min.js' );
    wp_enqueue_script( 'lottie-canvas-worker-js', 'https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.9.6/lottie_canvas_worker.min.js' );
    wp_enqueue_script( 'lottie-html-js', 'https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.9.6/lottie_html.min.js' );
    wp_enqueue_script( 'lottie-svg-js', 'https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.9.6/lottie_svg.min.js' );
    

  endif; 


  if(@get_field( 'magnific_popup','option' )) :

    wp_enqueue_style( 'magnefic-css', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css' );
    wp_enqueue_script( 'magnefic-js',  'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js', array('jquery'), '1.0', true  );

  endif;  


}



/**
 * WP Footer 
 */


 add_action('wp_footer','emw_on_footer');
 function emw_on_footer(){

  $plugins = array('animsition','barba','fullpage_js','gsap','scroll_magic','slick','bootstrap_js','flickity','infinite_scroll','isotope','masonry','lottie');

 foreach ( $plugins as $k ): ?>

  <?php if(@get_field($k,'option')) : ?>

      <script type="text/javascript" src="<?php emw_the_js_url( '/plugin-init/' .$k. '-init.js' ); ?>"></script>

  <?php endif; ?>

 <?php endforeach; 
 
 }


/** 
 * Theme Settings From Theme Options
 */

add_action( 'wp_head','emw_register_theme_settings' );
function emw_register_theme_settings(){

  $theme_color = get_field( 'theme_settings','option' );

	$theme_headings_texts = get_field( 'headings_texts','option' );
  
	$theme_text_color = $theme_headings_texts['colors'];
	$theme_text_font_size = $theme_headings_texts['font_size'];
  
	$theme_primary_btn = get_field( 'primary_button','option' );
	$theme_secondary_btn = get_field( 'secondary_button','option' );
	$theme_html_elements = get_field( 'html_elements','option' );
	$section_padding_desktop = $theme_html_elements['section_padding_desktop'];
	$section_padding_mobile = $theme_html_elements['section_padding_mobile'];
	
  ?>
  <style>

  :root {
  
    --primary-color__theme: <?php echo $theme_color['primary_color']; ?>;
    --secondary-color__theme: <?php echo $theme_color['secondary_color']; ?>;

    --primary-color__text: <?php echo $theme_text_color['primary_color']; ?>;
    --secondary-color__text: <?php echo $theme_text_color['secondary_color']; ?>;

    --primary-color__btn-default: <?php echo $theme_primary_btn['default']['color']; ?>;
    --primary-color__btn-hover: <?php echo $theme_primary_btn['hover_active']['color']; ?>;
    --primary-background-color__btn-default: <?php echo $theme_primary_btn['default']['background_color']; ?>;
    --primary-background-color__btn-hover: <?php echo $theme_primary_btn['hover_active']['background_color']; ?>;

    --secondary-color__btn-default: <?php echo $theme_secondary_btn['default']['color']; ?>;
    --secondary-color__btn-hover: <?php echo $theme_secondary_btn['hover_active']['color']; ?>;
    --secondary-background-color__btn-default: <?php echo $theme_secondary_btn['default']['background_color']; ?>;
    --secondary-background-color__btn-hover: <?php echo $theme_secondary_btn['hover_active']['background_color']; ?>;

    --container_max_width: <?php echo $theme_html_elements['container_max_width']; ?>;

    --section_desktop_padding_top: <?php echo $section_padding_desktop['top']; ?>;
    --section_desktop_padding_bottom: <?php echo $section_padding_desktop['bottom']; ?>;
    --section_desktop_padding_left: <?php echo $section_padding_desktop['left']; ?>;
    --section_desktop_padding_right: <?php echo $section_padding_desktop['right']; ?>;

    --section_mobile_padding_top: <?php echo $section_padding_mobile['top']; ?>;
    --section_mobile_padding_bottom: <?php echo $section_padding_mobile['bottom']; ?>;
    --section_mobile_padding_left: <?php echo $section_padding_mobile['left']; ?>;
    --section_mobile_padding_right: <?php echo $section_padding_mobile['right']; ?>;

    --font-size-body: <?php echo $theme_text_font_size['body']; ?>;
    --font-size-h1: <?php echo $theme_text_font_size['h1']; ?>;
    --font-size-h2: <?php echo $theme_text_font_size['h2']; ?>;
    --font-size-h3: <?php echo $theme_text_font_size['h3']; ?>;
    --font-size-h4: <?php echo $theme_text_font_size['h4']; ?>;
    --font-size-h5: <?php echo $theme_text_font_size['h5']; ?>;
    --font-size-h6: <?php echo $theme_text_font_size['h6']; ?>;
    --font-size-p: <?php echo $theme_text_font_size['paragraph']; ?>;
    --font-size-a: <?php echo $theme_text_font_size['a_tags']; ?>;

    }
  
 
</style>

  
  <?php
} 


