<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://yukyhendiawan.com
 * @since      1.0.0
 *
 * @package    Icon_Font_Awesome
 * @subpackage Icon_Font_Awesome/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Icon_Font_Awesome
 * @subpackage Icon_Font_Awesome/includes
 * @author     Yuky Hendiawan <yukyhendiawan1998@gmail.com>
 */
class Icon_Font_Awesome_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'icon-font-awesome',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
