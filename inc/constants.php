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
 * Paths
 */
define( 'EMW_PATH', get_stylesheet_directory() );
define( 'EMW_INC_PATH', get_stylesheet_directory() . '/inc/' );
define( 'EMW_CSS_PATH', get_stylesheet_directory() . '/css/' );
define( 'EMW_JS_PATH', get_stylesheet_directory() . '/js/' );
define( 'EMW_IMG_PATH', get_stylesheet_directory() . '/img/' );

/**
 * URLS
 */
define( 'EMW_INC_URL', get_stylesheet_directory_uri() . '/inc/' );
define( 'EMW_CSS_URL', get_stylesheet_directory_uri() . '/css/' );
define( 'EMW_JS_URL', get_stylesheet_directory_uri() . '/js/' );
define( 'EMW_IMG_URL', get_stylesheet_directory_uri() . '/img/' );

/**
 * ACF path and URL
 */
define( 'EMW_ACF_PATH', EMW_INC_PATH . 'acf/' );
define( 'EMW_ACF_URL', EMW_INC_URL . 'acf/' );

/**
 * Theme version
 */
define( 'EMW_VERSION', '1.1' );