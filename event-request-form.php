<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://https://https://www.linkedin.com/in/saulalonsoibarra-software-engineer/
 * @since             1.0.0
 * @package           Event_Request_Form
 *
 * @wordpress-plugin
 * Plugin Name:       Event request form
 * Plugin URI:        https://https://https://github.com/AlonsoIbarra/WP-event-request-form
 * Description:       Plugin to save event data in drive.
 * Version:           1.0.0
 * Author:            Saul Alonso Ibarra Luevano
 * Author URI:        https://https://https://www.linkedin.com/in/saulalonsoibarra-software-engineer/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       event-request-form
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
define( 'EVENT_REQUEST_FORM_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-event-request-form-activator.php
 */
function activate_event_request_form() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-event-request-form-activator.php';
	Event_Request_Form_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-event-request-form-deactivator.php
 */
function deactivate_event_request_form() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-event-request-form-deactivator.php';
	Event_Request_Form_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_event_request_form' );
register_deactivation_hook( __FILE__, 'deactivate_event_request_form' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-event-request-form.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_event_request_form() {

	$plugin = new Event_Request_Form();
	$plugin->run();

}
run_event_request_form();

/**
 * Include shortcodes file.
 */
$shortcodes_file_path = plugin_dir_path( __FILE__ ) . 'shortcodes.php';
if ( file_exists( $shortcodes_file_path ) ) {
	require_once $shortcodes_file_path;
}

/**
 * Google client ID.
 * For more info go to:
 * https://cloud.google.com/docs/authentication?_ga=2.264139148.-1870061200.1671078708
 */
define( 'ERF_GOOGLE_CLIENT_ID', '535548890952-b5h45k7qdapr2binm1bijt4n8rp1mr12.apps.googleusercontent.com' );

/**
 * Google client secret.
 * For more info go to:
 * https://cloud.google.com/docs/authentication?_ga=2.264139148.-1870061200.1671078708
 */
define( 'ERF_GOOGLE_CLIENT_SECRET', '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' );

/**
 * Google OAuth scope.
 * For more info go to:
 * https://cloud.google.com/docs/authentication?_ga=2.264139148.-1870061200.1671078708
 */
define( 'ERF_GOOGLE_OAUTH_SCOPE', 'https://www.googleapis.com/auth/drive' );

/**
 * Redirect callback URI.
 * For more info go to:
 * https://cloud.google.com/docs/authentication?_ga=2.264139148.-1870061200.1671078708
 */
define( 'ERF_REDIRECT_URI', 'http://localhost/demo/' );

/**
 * Google OAuth URL.
 * For more info go to:
 * https://www.codexworld.com/upload-file-to-google-drive-using-php/
 */
define(
	'ERF_GOOGLE_OAUTH_URL',
	'https://accounts.google.com/o/oauth2/auth?scope=' . urlencode( ERF_GOOGLE_OAUTH_SCOPE ) . '&redirect_uri=' . ERF_REDIRECT_URI . '&response_type=code&client_id=' . ERF_GOOGLE_CLIENT_ID . '&access_type=online'
);


if ( ! function_exists( 'erf_send_form_data' ) ) {
	/**
	 * Function to send form row data to drive file.
	 *
	 * @since    1.0.0
	 */
	function erf_send_form_data() {

		if ( ! isset( $_POST['key'] ) || '' === $_POST['key'] ) {
			return 'Access forbidden. Key does not exists.';
		}

		$key = sanitize_text_field( wp_unslash( $_POST['key'] ) );
		if ( ! wp_verify_nonce( $key, 'key' ) ) {
			wp_send_json_error(
				__( 'Invalid request, reload and try again.', 'event-request-form' )
			);
		}


		if ( wp_doing_ajax() ) {
			$response = 'response...';

			try {
				wp_send_json_success( $response );
			} catch ( Exception $e ) {
				wp_send_json_error(
					$e->message
				);
			}

		}
		wp_send_json_error(
			__( 'This feature can not be used without ajax call.', 'event-request-form' )
		);
	}
}
add_action( 'wp_ajax_erf_send_form_data', 'erf_send_form_data' );
add_action( 'wp_ajax_nopriv_erf_send_form_data', 'erf_send_form_data' );
