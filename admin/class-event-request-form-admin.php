<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://https://https://www.linkedin.com/in/saulalonsoibarra-software-engineer/
 * @since      1.0.0
 *
 * @package    Event_Request_Form
 * @subpackage Event_Request_Form/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Event_Request_Form
 * @subpackage Event_Request_Form/admin
 * @author     Saul Alonso Ibarra Luevano <isaul37@hotmail.es>
 */
class Event_Request_Form_Admin {

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
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Event_Request_Form_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Event_Request_Form_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/event-request-form-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Event_Request_Form_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Event_Request_Form_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/event-request-form-admin.js', array( 'jquery' ), null, false );

		wp_localize_script(
			$this->plugin_name,
			'AdminEventRequestFormRequests',
			array(
				'url' => admin_url( 'admin-ajax.php' ),
				'key' => wp_create_nonce( 'key' ),
			)
		);
	}

}
