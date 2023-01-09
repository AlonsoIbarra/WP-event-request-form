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
 * Currently plugin database name.
 */
define( 'EVENT_REQUEST_FORM_DATABASE_NAME', 'WP_ERF_TABLE' );

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
 * Include Database service.
 */
if ( ! class_exists( 'ERFDatabaseService' ) ) {
	require_once plugin_dir_path( __FILE__ ) . 'services/class-erfdatabaseservice.php';
}


/**
 *  Action to render admin menu.
 */
add_action( 'admin_menu', 'create_erf_options_menu' );

if ( ! function_exists( 'create_erf_options_menu' ) ) {
	/**
	 * Function to render admin page menu options.
	 */
	function create_erf_options_menu() {

		add_menu_page(
			__( 'Requests list', 'event-request-form' ),
			__( 'Requests list', 'event-request-form' ),
			'manage_options',
			'event-requests-entries',
			'events_request_form_dashboard_page',
			'dashicons-media-spreadsheet'
		);

		// Register the hidden submenu.
		add_submenu_page(
			'',
			__( 'Request detail view', 'event-request-form' ),
			'',
			'manage_options',
			'request-detail-view',//page name.
			'event_request_detail_page'
		);
	}
}
if ( ! function_exists( 'event_request_detail_page' ) ) {
	/**
	 * Function to render dashboard request detail page.
	 */
	function event_request_detail_page(){
		if ( is_admin() ) {
			$plugin_path     = plugin_dir_path( __FILE__ );
			$secondary_page_path = $plugin_path . 'admin/pages/event-request-detail-page.php';
			if ( file_exists( $secondary_page_path ) ) {
				require_once $secondary_page_path;
			}
		}
	}
}

if ( ! function_exists( 'events_request_form_dashboard_page' ) ) {
	/**
	 * Function to render dashboard main page.
	 */
	function events_request_form_dashboard_page() {
		if ( is_admin() ) {
			$plugin_path     = plugin_dir_path( __FILE__ );
			$admin_page_path = $plugin_path . 'admin/pages/event-request-form-admin-display.php';
			if ( file_exists( $admin_page_path ) ) {
				require_once $admin_page_path;
			}
		}
	}
}

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

		$nombre_del_cliente                         = sanitize_text_field( wp_unslash( $_POST['nombre_del_cliente'] ) );
		$tipo_de_evento                             = sanitize_text_field( wp_unslash( $_POST['tipo_de_evento'] ) );
		$nombre_de_novia                            = sanitize_text_field( wp_unslash( $_POST['nombre_de_novia'] ) );
		$nombre_de_novio                            = sanitize_text_field( wp_unslash( $_POST['nombre_de_novio'] ) );
		$nombre_de_festejado                        = sanitize_text_field( wp_unslash( $_POST['nombre_de_festejado'] ) );
		$fecha_de_evento                            = sanitize_text_field( wp_unslash( $_POST['fecha_de_evento'] ) );
		$frase_de_bienvenida                        = sanitize_text_field( wp_unslash( $_POST['frase_de_bienvenida'] ) );
		$madre_de_novia                             = sanitize_text_field( wp_unslash( $_POST['madre_de_novia'] ) );
		$padre_de_novia                             = sanitize_text_field( wp_unslash( $_POST['padre_de_novia'] ) );
		$madre_de_novio                             = sanitize_text_field( wp_unslash( $_POST['madre_de_novio'] ) );
		$padre_de_novio                             = sanitize_text_field( wp_unslash( $_POST['padre_de_novio'] ) );
		$madre_del_festejado                        = sanitize_text_field( wp_unslash( $_POST['madre_del_festejado'] ) );
		$padre_del_festejado                        = sanitize_text_field( wp_unslash( $_POST['padre_del_festejado'] ) );
		$nombre_de_madrina                          = sanitize_text_field( wp_unslash( $_POST['nombre_de_madrina'] ) );
		$nombre_de_padrino                          = sanitize_text_field( wp_unslash( $_POST['nombre_de_padrino'] ) );
		$nombre_de_madrina_de_arras                 = sanitize_text_field( wp_unslash( $_POST['nombre_de_madrina_de_arras'] ) );
		$nombre_de_padrino_de_arras                 = sanitize_text_field( wp_unslash( $_POST['nombre_de_padrino_de_arras'] ) );
		$nombre_de_madrina_de_lazo                  = sanitize_text_field( wp_unslash( $_POST['nombre_de_madrina_de_lazo'] ) );
		$nombre_de_padrino_de_lazo                  = sanitize_text_field( wp_unslash( $_POST['nombre_de_padrino_de_lazo'] ) );
		$nombre_de_madrina_de_anillos               = sanitize_text_field( wp_unslash( $_POST['nombre_de_madrina_de_anillos'] ) );
		$nombre_de_padrino_de_anillos               = sanitize_text_field( wp_unslash( $_POST['nombre_de_padrino_de_anillos'] ) );
		$nombre_de_madrina_de_velacion              = sanitize_text_field( wp_unslash( $_POST['nombre_de_madrina_de_velacion'] ) );
		$nombre_de_padrino_de_velacion              = sanitize_text_field( wp_unslash( $_POST['nombre_de_padrino_de_velacion'] ) );
		$direccion_de_ceremonia_religiosa           = sanitize_text_field( wp_unslash( $_POST['direccion_de_ceremonia_religiosa'] ) );
		$ciudad_de_ceremonia_religiosa              = sanitize_text_field( wp_unslash( $_POST['ciudad_de_ceremonia_religiosa'] ) );
		$estado_de_ceremonia_religiosa              = sanitize_text_field( wp_unslash( $_POST['estado_de_ceremonia_religiosa'] ) );
		$pais_de_ceremonia_religiosa                = sanitize_text_field( wp_unslash( $_POST['pais_de_ceremonia_religiosa'] ) );
		$codigo_postal_de_ceremonia_religiosa       = sanitize_text_field( wp_unslash( $_POST['codigo_postal_de_ceremonia_religiosa'] ) );
		$hora_de_ceremonia_religiosa                = sanitize_text_field( wp_unslash( $_POST['hora_de_ceremonia_religiosa'] ) );
		$link_de_google_maps_de_ceremonia_religiosa = sanitize_text_field( wp_unslash( $_POST['link_de_google_maps_de_ceremonia_religiosa'] ) );
		$direccion_de_recepcion                     = sanitize_text_field( wp_unslash( $_POST['direccion_de_recepcion'] ) );
		$ciudad_de_recepcion                        = sanitize_text_field( wp_unslash( $_POST['ciudad_de_recepcion'] ) );
		$estado_de_recepcion                        = sanitize_text_field( wp_unslash( $_POST['estado_de_recepcion'] ) );
		$pais_de_recepcion                          = sanitize_text_field( wp_unslash( $_POST['pais_de_recepcion'] ) );
		$codigo_postal_de_recepcion                 = sanitize_text_field( wp_unslash( $_POST['codigo_postal_de_recepcion'] ) );
		$hora_de_recepcion                          = sanitize_text_field( wp_unslash( $_POST['hora_de_recepcion'] ) );
		$link_de_google_maps_de_recepcion           = sanitize_text_field( wp_unslash( $_POST['link_de_google_maps_de_recepcion'] ) );
		$mesa_de_regalos                            = sanitize_text_field( wp_unslash( $_POST['mesa_de_regalos'] ) );
		$intinerario_de_evento                      = sanitize_text_field( wp_unslash( $_POST['intinerario_de_evento'] ) );
		$recomendaciones                            = sanitize_text_field( wp_unslash( $_POST['recomendaciones'] ) );
		$hashtag                                    = sanitize_text_field( wp_unslash( $_POST['hashtag'] ) );
		$galeria_de_fotos                           = sanitize_text_field( wp_unslash( $_POST['galeria_de_fotos'] ) );
		$whatsapp_i_de_confirmacion                 = sanitize_text_field( wp_unslash( $_POST['whatsapp_I_de_confirmacion'] ) );
		$whatsapp_ii_de_confirmacion                = sanitize_text_field( wp_unslash( $_POST['whatsapp_II_de_confirmacion'] ) );
		$personalizacion_escrita                    = sanitize_text_field( wp_unslash( $_POST['personalizacion_escrita'] ) );
		$personalizacion_grafica                    = sanitize_text_field( wp_unslash( $_POST['personalizacion_grafica'] ) );
		$whatsapp_de_contacto                       = sanitize_text_field( wp_unslash( $_POST['whatsapp_de_contacto'] ) );
		$correo_electronico_de_contacto             = sanitize_text_field( wp_unslash( $_POST['correo_electronico_de_contacto'] ) );
		$comentarios_y_sugerencias                  = sanitize_text_field( wp_unslash( $_POST['comentarios_y_sugerencias'] ) );

		if ( wp_doing_ajax() ) {
			try {
				if ( ! class_exists( 'ERFDatabaseService' ) ) {
					require_once plugin_dir_path( __FILE__ ) . 'services/class-erfdatabaseservice.php';
				}
				$db_service = new ERFDatabaseService();
				$data       = array(
					'nombre_del_cliente'                   => $nombre_del_cliente,
					'tipo_de_evento'                       => $tipo_de_evento,
					'nombre_de_novia'                      => $nombre_de_novia,
					'nombre_de_novio'                      => $nombre_de_novio,
					'nombre_de_festejado'                  => $nombre_de_festejado,
					'fecha_de_evento'                      => $fecha_de_evento,
					'frase_de_bienvenida'                  => $frase_de_bienvenida,
					'madre_de_novia'                       => $madre_de_novia,
					'padre_de_novia'                       => $padre_de_novia,
					'madre_de_novio'                       => $madre_de_novio,
					'padre_de_novio'                       => $padre_de_novio,
					'madre_del_festejado'                  => $madre_del_festejado,
					'padre_del_festejado'                  => $padre_del_festejado,
					'nombre_de_madrina'                    => $nombre_de_madrina,
					'nombre_de_padrino'                    => $nombre_de_padrino,
					'nombre_de_madrina_de_arras'           => $nombre_de_madrina_de_arras,
					'nombre_de_padrino_de_arras'           => $nombre_de_padrino_de_arras,
					'nombre_de_madrina_de_lazo'            => $nombre_de_madrina_de_lazo,
					'nombre_de_padrino_de_lazo'            => $nombre_de_padrino_de_lazo,
					'nombre_de_madrina_de_anillos'         => $nombre_de_madrina_de_anillos,
					'nombre_de_padrino_de_anillos'         => $nombre_de_padrino_de_anillos,
					'nombre_de_madrina_de_velacion'        => $nombre_de_madrina_de_velacion,
					'nombre_de_padrino_de_velacion'        => $nombre_de_padrino_de_velacion,
					'direccion_de_ceremonia_religiosa'     => $direccion_de_ceremonia_religiosa,
					'ciudad_de_ceremonia_religiosa'        => $ciudad_de_ceremonia_religiosa,
					'estado_de_ceremonia_religiosa'        => $estado_de_ceremonia_religiosa,
					'pais_de_ceremonia_religiosa'          => $pais_de_ceremonia_religiosa,
					'codigo_postal_de_ceremonia_religiosa' => $codigo_postal_de_ceremonia_religiosa,
					'hora_de_ceremonia_religiosa'          => $hora_de_ceremonia_religiosa,
					'link_de_google_maps_de_ceremonia_religiosa' => $link_de_google_maps_de_ceremonia_religiosa,
					'direccion_de_recepcion'               => $direccion_de_recepcion,
					'ciudad_de_recepcion'                  => $ciudad_de_recepcion,
					'estado_de_recepcion'                  => $estado_de_recepcion,
					'pais_de_recepcion'                    => $pais_de_recepcion,
					'codigo_postal_de_recepcion'           => $codigo_postal_de_recepcion,
					'hora_de_recepcion'                    => $hora_de_recepcion,
					'link_de_google_maps_de_recepcion'     => $link_de_google_maps_de_recepcion,
					'mesa_de_regalos'                      => $mesa_de_regalos,
					'intinerario_de_evento'                => $intinerario_de_evento,
					'recomendaciones'                      => $recomendaciones,
					'hashtag'                              => $hashtag,
					'galeria_de_fotos'                     => $galeria_de_fotos,
					'whatsapp_I_de_confirmacion'           => $whatsapp_i_de_confirmacion,
					'whatsapp_II_de_confirmacion'          => $whatsapp_ii_de_confirmacion,
					'personalizacion_escrita'              => $personalizacion_escrita,
					'personalizacion_grafica'              => $personalizacion_grafica,
					'whatsapp_de_contacto'                 => $whatsapp_de_contacto,
					'correo_electronico_de_contacto'       => $correo_electronico_de_contacto,
					'comentarios_y_sugerencias'            => $comentarios_y_sugerencias,
				);
				$id = $db_service->insert_row( $data );
				wp_send_json_success( $id );
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

if ( ! function_exists( 'erf_check_field_row' ) ) {
	/**
	 * Function to mark/dismark a row field.
	 */
	function erf_check_field_row(){

		if ( ! isset( $_POST['key'] ) || '' === $_POST['key'] ) {
			return 'Access forbidden. Key does not exists.';
		}

		$key = sanitize_text_field( wp_unslash( $_POST['key'] ) );
		if ( ! wp_verify_nonce( $key, 'key' ) ) {
			wp_send_json_error(
				__( 'Invalid request, reload and try again.', 'event-request-form' )
			);
		}
		$id    = sanitize_text_field( wp_unslash( $_POST['id'] ) );
		$field = sanitize_text_field( wp_unslash( $_POST['field'] ) );
		$value = sanitize_text_field( wp_unslash( $_POST['value'] ) );
		if ( wp_doing_ajax() ) {
			try {
				if ( ! class_exists( 'ERFDatabaseService' ) ) {
					require_once plugin_dir_path( __FILE__ ) . 'services/class-erfdatabaseservice.php';
				}
				$db_service = new ERFDatabaseService();
				$response   = $db_service->update_field( $id, $field . '_bool', $value );
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
add_action( 'wp_ajax_erf_check_field_row', 'erf_check_field_row' );
