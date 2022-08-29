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
 * Collection of miscellaneous utilities
 */
class Emw_Theme_Util
{

  /**
   * Initialize
   */
  public static function init() {
    self::add_hook();
  }

  /**
   * Hook to WP
   */
  public static function add_hook() {

    // Action hooks
    add_action( 'init', array( __CLASS__, 'disable_emoji_icons' ) );
    add_action( 'login_enqueue_scripts', array( __CLASS__, 'login_style' ) );
    add_action( 'admin_enqueue_scripts', array( __CLASS__, 'admin_scripts' ), 99, 0 );
    add_action( 'wp_before_admin_bar_render', array( __CLASS__, 'remove_admin_bar_items' ) );
    add_action( 'admin_head', array( __CLASS__, 'remove_help_tab' ) );
    add_action( 'acf/init', array( __CLASS__, 'hide_acf_menu' ) );
    add_action( 'wp_enqueue_scripts', array( __CLASS__, 'emw_remove_wp_default_styles' ) );

    // Filter hooks
    add_filter( 'tiny_mce_plugins', array( __CLASS__, 'disable_emojicons_tinymce' ) );
    add_filter( 'admin_footer_text', array( __CLASS__, 'admin_footer' ) );
    add_filter( 'emoji_svg_url', '__return_false' );
    add_filter( 'show_admin_bar', '__return_false' );
    add_filter( 'use_block_editor_for_post_type', '__return_false' );

    // Add theme support
    add_theme_support( 'menus' );
    add_theme_support( 'post-thumbnails' );
    add_post_type_support( 'page', 'excerpt' );

    // Add theme options
    self::add_theme_options();
  }

  /**
   * Remove emoji icons
   */
  public static function disable_emoji_icons() {
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  }

  /**
   * Remove WordPress default links
   */
  public static function remove_admin_bar_items() {
    global $wp_admin_bar;

    $wp_admin_bar->remove_node( 'wp-logo' );
    $wp_admin_bar->remove_node( 'about' );
    $wp_admin_bar->remove_node( 'wporg' );
    $wp_admin_bar->remove_node( 'documentation' );
    $wp_admin_bar->remove_node( 'support-forums' );
    $wp_admin_bar->remove_node( 'feedback' );
  }

  /**
   * Remove block CSS
   */
  public static function emw_remove_wp_default_styles() {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'global-styles' );
  } 

  /**
   * Register theme option page
   */
  public static function add_theme_options() {
    if ( function_exists( 'acf_add_options_page' ) ) {
      acf_add_options_page(
        [
          'page_title'  => 'Theme Options',
          'menu_title'  => 'Theme Options',
          'menu_slug'   => 'theme_options',
          'position'    => 80,
          'redirect'    => false
        ]
      );
    }
  }

  /**
   * Remove WP emoji
   * 
   * @param array $plugins
   */
  public static function disable_emojicons_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
      return array_diff( $plugins, array( 'wpemoji' ) );
    }

    return $plugins;
  }

  /**
   * Remove help tab
   */
  public static function remove_help_tab() {
    $screen = get_current_screen();
    $screen->remove_help_tabs();
  }

  /**
   * Custom login style
   */
  public static function login_style() {
    wp_enqueue_style( 'emw-login', get_template_directory_uri() . '/css/login.css', array(), EMW_VERSION );
  }

  /**
   * Custom admin scripts
   */
  public static function admin_scripts() {
    wp_enqueue_style( 'emw-admin-style', get_template_directory_uri() . '/css/admin/admin.css', array(), EMW_VERSION );
    wp_enqueue_script( 'emw-admin-script', get_template_directory_uri() . '/js/admin/admin.js', array(), EMW_VERSION );
  }

  /**
   * Hide ACF Menu
   */
  public static function hide_acf_menu() {
    if ( ! get_field( 'settings_show_acf_menu', 'option' ) ) {
      add_filter( 'acf/settings/show_admin', '__return_false' );
    }
  }


   /**
   * Custom admin footer
   */
  public static function admin_footer() {
    echo '<span id="footer-thankyou">Developed by <a href="https://www.iamelmerchatto.com/" target="_blank">EM Works</a></span>';
  }

}