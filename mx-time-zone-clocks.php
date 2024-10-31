<?php
/*
Plugin Name: MX Time Zone Clocks
Plugin URI: https://github.com/Maksym-Marko/mx-time-zone-clock
Description: Add timezone clocks to your website.
Author: Maksym Marko
Version: 5.1.1
Author URI: https://markomaksym.com.ua/
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/*
* Unique string - MXMTZC
*/

/*
* Define MXMTZC_PLUGIN_PATH
*
* \\my-domain.com\wp-content\plugins\mx-time-zone-clocks\mx-time-zone-clocks.php
*/
if ( ! defined( 'MXMTZC_PLUGIN_PATH' ) ) {

	define( 'MXMTZC_PLUGIN_PATH', __FILE__ );

}

/*
* Define MXMTZC_PLUGIN_URL
*
* Return http://my-domain.com/wp-content/plugins/mx-time-zone-clocks/
*/
if ( ! defined( 'MXMTZC_PLUGIN_URL' ) ) {

	define( 'MXMTZC_PLUGIN_URL', plugins_url( '/', __FILE__ ) );

}

/*
* Define MXMTZC_PLUGN_BASE_NAME
*
* 	Return mx-time-zone-clocks/mx-time-zone-clocks.php
*/
if ( ! defined( 'MXMTZC_PLUGN_BASE_NAME' ) ) {

	define( 'MXMTZC_PLUGN_BASE_NAME', plugin_basename( __FILE__ ) );

}

/*
* Define MXMTZC_TABLE_SLUG
*/
if ( ! defined( 'MXMTZC_TABLE_SLUG' ) ) {

	define( 'MXMTZC_TABLE_SLUG', 'mxmtzc_table_slug' );

}

/*
* Define MXMTZC_PLUGIN_ABS_PATH
* 
* \\my-domain.com\wp-content\plugins\mx-time-zone-clocks/
*/
if ( ! defined( 'MXMTZC_PLUGIN_ABS_PATH' ) ) {

	define( 'MXMTZC_PLUGIN_ABS_PATH', dirname( MXMTZC_PLUGIN_PATH ) . '/' );

}

/*
* Define MXMTZC_PLUGIN_VERSION
*/
if ( ! defined( 'MXMTZC_PLUGIN_VERSION' ) ) {

	// version
	define( 'MXMTZC_PLUGIN_VERSION', '5.1.1' ); // '5.1.1'

}

/*
* Define MXMTZC_MAIN_MENU_SLUG
*/
if ( ! defined( 'MXMTZC_MAIN_MENU_SLUG' ) ) {

	// version
	define( 'MXMTZC_MAIN_MENU_SLUG', 'mxmtzc-mx-time-zone-clocks-menu' );

}

/**
 * activation|deactivation
 */
require_once plugin_dir_path( __FILE__ ) . 'install.php';

/*
* Registration hooks
*/
// Activation
register_activation_hook( __FILE__, array( 'MXMTZC_Basis_Plugin_Class', 'activate' ) );

// Deactivation
register_deactivation_hook( __FILE__, array( 'MXMTZC_Basis_Plugin_Class', 'deactivate' ) );


/*
* Include the main MXMTZCMXTimeZoneClocks class
*/
if ( ! class_exists( 'MXMTZCMXTimeZoneClocks' ) ) {

	require_once plugin_dir_path( __FILE__ ) . 'includes/final-class.php';

	/*
	* Translate plugin
	*/
	add_action( 'plugins_loaded', 'mxmtzc_translate' );

	function mxmtzc_translate()
	{

		load_plugin_textdomain( 'mxmtzc-domain', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

	}

}