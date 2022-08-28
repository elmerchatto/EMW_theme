<?php 

/**
 * @author  Elmer Chatto
 * @link httpss://iamelmerchatto.com/
 * @version 1.1
 */

defined( 'ABSPATH' ) || exit;


/**
 * Include the main class
 */
require_once( 'inc/class-main.php' );
require_once( 'inc/class-utilities.php' );

/**
 * Global vars
 */
$Emw_Main = new Emw_Theme();
$Emw_Util = new Emw_Theme_Util();

/**
 * Class instance
 */
$Emw_Main::init();
$Emw_Util::init();