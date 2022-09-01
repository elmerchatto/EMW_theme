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
 * This is just a collection of utility functions
 * --------------------------------------------------------
 */


  /**
 * Include
 */

function emw_snippet($filename){

  include( EMW_IMG_SNIPPET.'/'.$filename. '.php' );

 }

/**
 * Buffer start
 */
function emw_buffer_start() {
  if ( get_field( 'settings_minify_html', 'option' ) ) {
    ob_start();
  }
}

/**
 * Remder content
 */
function emw_render() {
  if ( get_field( 'settings_minify_html', 'option' ) ) {
    Emw_Theme::render();
  }
}

/**
 * Get page custom style
 */
function emw_the_page_custom_css() { 
  if ( get_field( 'page_custom_css' ) ) {
    the_field( 'page_custom_css' );
  }
}

/**
 * Get section custom CSS class 
 */
function emw_the_section_class() { 
  if ( get_sub_field( 'class' ) ) {
    the_sub_field( 'class' );
  }
}

/**
 * Get section custom CSS ID 
 */
function emw_the_section_id() { 
  if ( !empty(get_sub_field( 'custom_id' )) ) {
    echo 'id='.get_sub_field('custom_id').'';
  }
}


/**
 * Images Background from ACF
 */
function emw_bg_img_acf( $field_name='example', $type='default' ) {

  $img_get = $type =='default' ? get_field($field_name) : get_field($field_name,'option');

  $url = '';
  $alt = '';

  if( !empty( $img_get ) ) {
      $url = $img_get['url']; 

  }
  else {
      $img_get_sub = get_sub_field( $field_name ); 
      $url = !empty($img_get_sub['url']) ? $img_get_sub['url'] : ''; 
  } 

  if($url) {
    echo 'background-image:url('.$url.');';
  }
  else {
    return false;
  } 
  
}


/**
 * Images from ACF
 */
function emw_img_acf( $field_name, $type='default', $size = NULL ) {
  
  $img_get = $type =='default' ? get_field($field_name) : get_field($field_name,'option');

  $url = '';
  $alt = '';

  if( !empty($img_get) ) {
      $url = !empty($size) ? $img_get['sizes'][$size] : $img_get['url']; 
      $alt = $img_get['alt']; 
  }
  else {
      $img_get_sub = get_sub_field($field_name); 
      $url = !empty($size) ? $img_get_sub['sizes'][$size] : $img_get_sub['url']; 
      $alt = $img_get_sub['alt'];
  }

  if( !empty( $url ) ) {
    ?>
      <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>">
 
   <?php 
   } else {
     echo '<p>Please insert Image</p>';
   }

}



/**
 * Multiple Images from ACF
 */
function emw_gallery_acf( $field_name, $type='default', $size = NULL ) {
  
  $imgs_get = $type =='default' ? get_field($field_name) : get_field($field_name,'option');

  $url = array();
  $alt = array();

  

  if( !empty( $imgs_get ) ) {
     
    foreach($imgs_get as $img_get) {
      array_push($url, $img_get['url']);
      array_push($alt, $img_get['url']);
    }
  }
  else {
      $img_get_sub = get_sub_field( $field_name ); 

      foreach($img_get_sub as $img_get) {
        array_push($url, $img_get['url']);
        array_push($alt, $img_get['url']);
      }
  } 
  $count = 1;
  if(!empty($url)) {
    foreach($url as $img_link) {
      ?>
    <div class="gallery--image__each gallery--image__each-<?php echo $count++; ?>">
      <div class="gallery--image__each--inner">
        <img src="<?php echo $img_link; ?>" alt="<?php echo $alt; ?>">
      </div>
    </div>
      <?php
    }
  } else {
    echo '<p>Insert Image</p>';
  }
}



/**
 * Button from ACF
 */

function emw_btn_acf($field_name){

  $btn_get = get_field($field_name);
  $url = '';
  $text = '';

  if( !empty($btn_get) ) {
      $url = $btn_get['url']; 
      $text = $btn_get['title']; 
  }
  else {
      $btn_get_sub = get_sub_field($field_name); 

      if( !empty($btn_get_sub) ) {
        $url = $btn_get_sub['url']; 
        $text = $btn_get_sub['title'];
      }
      else {
        $url = '#';
        $text = 'BUTTON';
      }
      
  }

  echo '<a href="' .$url. '" class="btn--global">' .$text. '</a>';

}



/**
 * Images URI
 */
function emw_the_image_url( $filename ) {
  echo EMW_IMG_URL . $filename;
}

/**
 * JS URI
 */
function emw_the_js_url( $filename ) {
  echo EMW_JS_URL . $filename .'?v='. EMW_VERSION;
}

/**
 * CSS URI
 */
function emw_the_css_url( $filename ) {
  echo EMW_CSS_URL . $filename .'?v='. EMW_VERSION;
}

/**
 * Custom Meta
 */
function emw_the_custom_meta() {
  if ( get_field( 'settings_custom_meta', 'option' ) ) {
    the_field( 'settings_custom_meta', 'option' );
  }
}

/**
 * Custom Header JS
 */
function emw_the_custom_header_js() {
  if ( get_field( 'settings_custom_js_header', 'option' ) ) {
    the_field( 'settings_custom_js_header', 'option' );
  }
}

/**
 * Custom Body JS
 */
function emw_the_custom_body_js() {
  if ( get_field( 'settings_custom_js_body', 'option' ) ) {
    the_field( 'settings_custom_js_body', 'option' );
  }
}

/**
 * Custom CSS
 */
function emw_the_custom_css() {
  if ( get_field( 'settings_custom_css', 'option' ) ) {
    echo "<style>". get_field( 'settings_custom_css', 'option' ) ."</style>";
  }
}

/**
 * Content Alignment
 */
function emw_the_content_alignment() {
  $content_alignment = get_sub_field( 'content_alignment' );

  if ( $content_alignment == 'left' ) {
    echo 'flex-align--start text--left';
  }

  if ( $content_alignment == 'center' ) {
    echo 'flex-align--center text--center';
  }

  if ( $content_alignment == 'right' ) {
    echo 'flex-align--end text--right';
  }
}

/**
 * Padding
 */
function emw_the_padding() {
  if ( get_sub_field( 'padding' ) ) {
    $padding = get_sub_field( 'padding' );

    $top    = $padding['top']    ? " padding-top: ". $padding['top'] .";" : null;
    $right  = $padding['right']  ? " padding-right: ". $padding['right'] .";" : null;
    $bottom = $padding['bottom'] ? " padding-bottom: ". $padding['bottom'] .";" : null;
    $left   = $padding['left']   ? " padding-left: ". $padding['left'] .";" : null;

    if ( $top || $right || $bottom || $left ) {
      echo $top . $right . $bottom . $left;
    }
  }
}

/**
 * Margin
 */
function emw_the_margin() {
  if ( get_sub_field( 'margin' ) ) {
    $margin = get_sub_field( 'margin' );

    $top    = $margin['top']    ? " margin-top: ". $margin['top'] .";" : null;
    $right  = $margin['right']  ? " margin-right: ". $margin['right'] .";" : null;
    $bottom = $margin['bottom'] ? " margin-bottom: ". $margin['bottom'] .";" : null;
    $left   = $margin['left']   ? " margin-left: ". $margin['left'] .";" : null;

    if ( $top || $right || $bottom || $left ) {
      echo $top . $right . $bottom . $left;
    }
  }
}