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
  if ( get_sub_field( 'id' ) ) {
    the_sub_field( 'id' );
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

  echo '<img src="' .$url. '" alt="' .$alt. '">';

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