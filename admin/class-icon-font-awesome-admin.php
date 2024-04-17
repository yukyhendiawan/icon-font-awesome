<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://yukyhendiawan.com
 * @since      1.0.0
 *
 * @package    Icon_Font_Awesome
 * @subpackage Icon_Font_Awesome/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Icon_Font_Awesome
 * @subpackage Icon_Font_Awesome/admin
 * @author     Yuky Hendiawan <yukyhendiawan1998@gmail.com>
 */
class Icon_Font_Awesome_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles( $hook ) {

		wp_enqueue_style( $this->plugin_name . '-admin-style-global', plugins_url() . '/icon-font-awesome/assets/css/admin-global.min.css', array(), $this->version, 'all' );		

		if ( 'appearance_page_icon-font-awesome' === $hook ) {
			wp_enqueue_style( $this->plugin_name . '-admin-style-submenu', plugins_url() . '/icon-font-awesome/assets/css/admin-style-submenu.min.css', array(), $this->version, 'all' );
		}

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts( $hook ) {

		// Admin global.
		wp_enqueue_script( 'icon-font-awesome-admin-global', plugins_url() . '/icon-font-awesome/assets/js/admin-global.min.js', array( 'jquery' ), $this->version, true );

		// Localize admin.
		wp_localize_script(
			'icon-font-awesome-admin-global',
			'adminLocalize',
			array(
				'ajaxUrl'   => admin_url( 'admin-ajax.php' ),
				'ajaxNonce' => wp_create_nonce( 'icon-font-awesome-ajax-verification' ),
				'adminUrl'  => esc_url( admin_url() ),
			)
		);

		// Only Submenu Font Awesome
		if ( 'appearance_page_icon-font-awesome' === $hook ) {
			wp_enqueue_script( $this->plugin_name. '-admin-submenu', plugins_url() . '/icon-font-awesome/assets/js/admin-submenu.min.js', array( 'jquery' ), $this->version, true );
		}

	}

	/**
	 * Enqueues styles for the block-based editor.
	 */
	function enqueue_block_editor() {
		// Enqueue block editor styles (FontAwesome)
		wp_enqueue_style( $this->plugin_name . '-admin-font-awesome', plugins_url() . '/icon-font-awesome/fontawesome/css/all.min.css', array(), '6.5.2', 'all' );			
	}

	/**
	 * Initializes and registers a custom block type for icons, and sets script translations for internationalization.
	 * 
	 * @since    1.0.0
	 */
	public function initialize_block_icons() {
		// Registers the block type using the path to the build directory of the plugin.
		register_block_type( plugin_dir_path( __DIR__ ) . '/build' );
		
		// Sets script translations for 'icon-font-awesome-script' with the 'icon-font-awesome' domain.
		wp_set_script_translations( 'icon-font-awesome-script', 'icon-font-awesome' );
	}

	/**
	 * Adds a submenu for Font Awesome in the WordPress dashboard.
	 */
	public function add_icon_font_awesome_submenu() {
		add_theme_page(
			__( 'Font Awesome', 'icon-font-awesome' ),
			__( 'Font Awesome', 'icon-font-awesome' ),
			'edit_theme_options',
			'icon-font-awesome',
			array( $this, 'render_block_icons_submenu_template' )
		);
	}

	/**
	 * Renders the template for the Font Awesome submenu page.
	 */
	public function render_block_icons_submenu_template() {
		// Get the path to the plugin directory
		$plugin_dir = plugin_dir_path( __FILE__ );

		// Search for the template file inside the plugin directory
		$template_path = $plugin_dir . 'template/information.php';

		// Ensure the template file exists before loading
		if ( file_exists( $template_path ) ) {
			// Include the template file
			include $template_path;
		}
	}

	/**
	 * Redirects user after theme/plugin activation if option is set.
	 *
	 * This function checks if the 'icon_font_awesome_redirect_after_activation_option' is set to true.
	 * If true, it deletes the option and redirects the user to 'themes.php?page=icon-font-awesome'.
	 */
	public function activation_redirect() {
		// Check if the 'icon_font_awesome_redirect_after_activation_option' is set to true
		if ( get_option( 'icon_font_awesome_redirect_after_activation_option', false ) ) {
			// Delete the option to prevent redirection on subsequent activations
			delete_option( 'icon_font_awesome_redirect_after_activation_option' );

			// Construct the URL
			$redirect_url = admin_url( 'themes.php?page=icon-font-awesome' );

			// Make a GET request to the URL and check the HTTP response code
			$response = wp_remote_get( $redirect_url );

			if ( ! is_wp_error( $response ) && wp_remote_retrieve_response_code( $response ) === 200 ) {
				// If the response code is 200, redirect the user
				wp_redirect( esc_url( $redirect_url ) );
				exit;
			} else {
				// If there is an error or the response code is not 200, handle accordingly
				// You can log the error, display a message, or take other actions
				error_log( 'Error accessing ' . $redirect_url );
				// Handle the error, for example, redirect to another page
				wp_redirect( esc_url( admin_url() ) );
				exit;
			}
		}
	}

}
