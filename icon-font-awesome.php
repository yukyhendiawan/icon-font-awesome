<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://yukyhendiawan.com
 * @since             1.0.0
 * @package           Icon_Font_Awesome
 *
 * @wordpress-plugin
 * Plugin Name:       Block: Icons Font Awesome
 * Plugin URI:        https://yukyhendiawan.com
 * Description:       The Block Plugin: Icon Font Awesome allows you to easily add a Gutenberg block to select icons from the Font Awesome collection.
 * Version:           1.1.0
 * Author:            Yuky Hendiawan
 * Author URI:        https://yukyhendiawan.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       icon-font-awesome
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ICON_FONT_AWESOME_VERSION', '1.1.0' );
define( 'ICON_FONT_AWESOME_NAME', 'ICON FONT AWESOME' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-icon-font-awesome-activator.php
 */
function icon_font_awesome_activate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-icon-font-awesome-activator.php';
	Icon_Font_Awesome_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-icon-font-awesome-deactivator.php
 */
function icon_font_awesome_deactivate() {
    add_option( 'icon_font_awesome_redirect_after_activation_option', true );
    add_option( 'icon_font_awesome_active_notices_option', true );	
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-icon-font-awesome-deactivator.php';
	Icon_Font_Awesome_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'icon_font_awesome_activate' );
register_deactivation_hook( __FILE__, 'icon_font_awesome_deactivate' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-icon-font-awesome.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function icon_font_awesome_run() {

	$plugin = new Icon_Font_Awesome();
	$plugin->run();

}
icon_font_awesome_run();