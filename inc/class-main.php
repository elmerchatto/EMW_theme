<?php 

/**
 * @author  Elmer Chatto
 * @link httpss://iamelmerchatto.com/
 * @version 1.1
 */

/**
 * Exit if accessed directly
 */
defined( 'ABSPATH' ) || exit;


/**
 * The theme main class
 */
class Emw_Theme
{

  /**
   * Initialize
   */
  public static function init() {
    self::add_hook();
  }

  /**
   * Hook the ACF plugin
   */
  public static function add_hook() {
    
    // Load the required files
    require_once( 'constants.php' );
    require_once( EMW_ACF_PATH . 'acf.php' );
    require_once( 'function-hooks.php' );
    require_once( 'function-filters.php' );
    require_once( 'function-ajax.php' );
    require_once( 'function-layouts.php' );
    require_once( 'function-utilities.php' );

    // Fix ACF incorrect asset URLs
    add_filter( 'acf/settings/url', array( __CLASS__, 'acf_settings_url' ) );
  }

  /**
   * Fix ACF incorrect asset URLs
   */
  public static function acf_settings_url( $url ) {
    return EMW_ACF_URL;
  }
  
  /**
   * Theme page builder
   */ 
  public static function page_builder( $flexible_content_name, $single_layout = '', $exclude = '' ) {
    $layouts = [];
    $count   = 0;

    if ( empty( $flexible_content_name ) ) {
      return;
    } 

    // Get all the row layouts
    if ( have_rows( $flexible_content_name ) ) {
      while ( have_rows( $flexible_content_name ) ) {
        the_row();
        array_push( $layouts, get_row_layout() );
      }
    }

    // Call the layout function
    if ( have_rows( $flexible_content_name ) ) {
      while ( have_rows( $flexible_content_name ) ) {
        the_row();
        if ( ! empty( $layouts )  ) {

          // Get the correct layout function
          if ( $layouts[ $count ] == get_row_layout() ) {
            $function = 'emw_'. $layouts[ $count ];
            if ( function_exists( $function ) ) {
              if ( !empty( $single_layout ) ) {
                if ( get_row_layout() == $single_layout ) {
                  $function();
                }
              } else {
                if ( get_row_layout() != $exclude ) {
                  $function();
                }
              }
            }
          }

          $count++;
        }
      }
    }
  }

  /**
   * This will minify the HTML
   */
  public static function minify( $content ) {

    // Search pattern
    $search = array(
      '/\n/',             // replace end of line by a space
      '/\>[^\S ]+/s',     // strip whitespaces after tags, except space
      '/[^\S ]+\</s',     // strip whitespaces before tags, except space
      '/(\s)+/s',         // shorten multiple whitespace sequences
      '/<!--(.|\s)*?-->/' // remove comments
    );
  
    $replace  = array( '', '>', '<', '\\1' );
    $content  = preg_replace( $search, $replace, $content );
    return $content;
  }

  /**
   * This will output the HTML
   */
  public static function render() {

    // Get the html contents from the buffer
    $content = ob_get_clean(); 
    $content = self::minify( $content );

    echo $content;
  }
}



/**
 * Add a sidebar.
 */
function emw_register_sidebar() {
  register_sidebar( array(
      'name'          => __( 'Main Sidebar', 'textdomain' ),
      'id'            => 'sidebar-main',
      'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
      'before_widget' => '<li id="%1$s" class="widget %2$s">',
      'after_widget'  => '</li>',
      'before_title'  => '<h2 class="widgettitle">',
      'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'emw_register_sidebar' );