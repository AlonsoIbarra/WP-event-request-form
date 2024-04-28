<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.linkedin.com/in/saulalonsoibarra-software-engineer/
 * @since             1.0.0
 * @package           Event_Request_Form
 *
 * @wordpress-plugin
 * Plugin Name:       Event request form
 * Plugin URI:        https://github.com/AlonsoIbarra/WP-event-request-form
 * Description:       Render a cool form to know all about your costumers.
 * Version:           1.0.0
 * Author:            Saul Alonso Ibarra
 * Author URI:        https://www.linkedin.com/in/saulalonsoibarra-software-engineer/
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
 * Currently event close excel template url.
 */
define( 'EVENT_REQUEST_FORM_GUESTS_TEMPLATE', 'https://docs.google.com/spreadsheets/d/1uUrCGQalnpxQsdc7rs9UWOh3XyZ6V6vzmEcwq0jZaF4/edit?usp=sharing' );

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
			__( 'Event request form', 'event-request-form' ),
			__( 'Event request form', 'event-request-form' ),
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

		add_submenu_page(
			'event-requests-entries',
			__( 'Book Events Settings Page', 'event-request-form' ),
			__( 'Settings', 'event-request-form' ),
			'manage_options',
			'event_requests_plugin_settings',
			'event_requests_render_plugin_settings_form'
		);
	}
}

if ( ! function_exists( 'event_requests_render_plugin_settings_form' ) ) {
	/**
	 * Function for render style input field.
	 */
	function event_requests_render_plugin_settings_form() {
		if ( is_admin() ) {
			?>
			<h2><?php echo __( 'Event requests plugin', 'event-request-form' ); ?></h2>
			<form action="options.php" method="post">
				<?php settings_fields( 'event_requests_plugin_settings_options' ); ?>
				<?php do_settings_sections( 'event_requests_plugin_settings' ); ?>
				<?php submit_button(); ?>
			</form>
			<?php
		}
	}
}

/**
 *  Action to render Plugin settings setup page.
 */
add_action( 'admin_init', 'event_requests_setings_setup_page' );

if ( ! function_exists( 'event_requests_setings_setup_page' ) ) {
	/**
	 * Function for plugin settings.
	 */
	function event_requests_setings_setup_page() {

		register_setting(
			'em_plugin_settings_options',
			'em_plugin_settings_options'
		);

		register_setting(
			'event_requests_plugin_settings_options',
			'event_requests_plugin_settings_options'
		);

		add_settings_section(
			'event_requests_settings',
			__( 'Settings', 'event-memories' ),
			'event_requests_plugin_settings_instructions',
			'event_requests_plugin_settings'
		);
		add_settings_field(
			'event_requests_plugin_settings_email',
			__( 'Email form reciber', 'event-request-form' ),
			'event_requests_plugin_settings_email',
			'event_requests_plugin_settings',
			'event_requests_settings'
		);
		add_settings_field(
			'event_requests_plugin_settings_maps_key',
			__( 'Google maps key', 'event-request-form' ),
			'event_requests_plugin_settings_maps_key',
			'event_requests_plugin_settings',
			'event_requests_settings'
		);
	}
}

if ( ! function_exists( 'event_requests_plugin_settings_instructions' ) ) {
	/**
	 * Function for plugin settings.
	 */
	function event_requests_plugin_settings_instructions() {
		echo sprintf( '<p>%s</p>',  __( 'Here you can update Plug-in settings.', 'event-request-form' ) );
		echo '<p>Form shortcode: [ERF_FORM type="gold|silver|bronze"]</p>';
		echo '<p>Shortcode para formulario de edición: [ERF_EDIT_FORM]</p>';
	}
}

if ( ! function_exists( 'event_requests_plugin_settings_email' ) ) {
	/**
	 * Function for render button label input field.
	 */
	function event_requests_plugin_settings_email() {
		$options = get_option( 'event_requests_plugin_settings_options' );
		echo "<input id='event_requests_plugin_settings_email' name='event_requests_plugin_settings_options[email]' type='text' value='" . esc_attr( $options['email'] ) . "' />";
		if( ! is_email( $options['email'] ) ) {
			?>
			<div class="notice notice-error cssfe-review">
				<div class="row cssfe-review-notice">
					<div class="col-md-11" style="margin: 0.5rem;">
						<small>Revisa que este dato sea un correo electrónico valido.</small>
					</div>
				</div>
			</div>
			<?php
		}
	}
}

if ( ! function_exists( 'event_requests_plugin_settings_maps_key' ) ) {
	/**
	 * Function for render input field for google maps key.
	 */
	function event_requests_plugin_settings_maps_key() {
		$options = get_option( 'event_requests_plugin_settings_options' );
		echo "<input id='event_requests_plugin_settings_maps_key' name='event_requests_plugin_settings_options[maps_key]' type='text' value='" . esc_attr( $options['maps_key'] ) . "' />";
		?>
		<p><small>Google API Key provided from Google console credential services.</small></p>
		<p><small>This value is obteined when you create a new API Credential on <a href="https://console.cloud.google.com/google/maps-apis/credentials">https://console.cloud.google.com/google/maps-apis/credentials.</a></small></p>
		<?php
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

if ( ! function_exists( 'erf_enqueue_google_maps_api_js' ) ) {
	/**
	 * Enqueuing Google maps API library.
	 *
	 * @since    1.0.0
	 * @param    string $hook The name of the WordPress filter that is being registered.
	 */
	function erf_enqueue_google_maps_api_js( $hook ) {
		$settings = get_option( 'event_requests_plugin_settings_options' );
		$maps_key = $settings['maps_key'];
		if ( $maps_key && '' !== $maps_key ) {
			wp_register_script( 'googleMaps', 'https://maps.googleapis.com/maps/api/js?key=' . $maps_key, array( 'jquery' ), '1.0', true );
			wp_enqueue_script( 'googleMaps' );
		}
	}
}
add_action( 'init', 'erf_enqueue_google_maps_api_js' );


if ( ! function_exists( 'custom_plugin_enqueue_bootstrap' ) ) {
	/**
	 * Action hook to enqueue Bootstrap CSS and JS.
	 *
	 * @since    1.0.0
	 */
	function custom_plugin_enqueue_bootstrap() {
		// Enqueue Bootstrap CSS
		wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');

		// Enqueue Bootstrap JS (add popper.js if you need tooltips or popovers)
		wp_enqueue_script('popper-js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js', array(), false, true);
		wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery', 'popper-js'), false, true);
	}

	add_action('wp_enqueue_scripts', 'custom_plugin_enqueue_bootstrap');
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

		$id                                         = sanitize_text_field( isset($_POST['id']) ? $_POST['id'] : null );
		$tipo_de_formulario                         = sanitize_text_field( wp_unslash( $_POST['tipo_de_formulario'] ) );
		$nombre_del_cliente                         = sanitize_text_field( wp_unslash( $_POST['nombre_del_cliente'] ) );
		$tipo_de_evento                             = sanitize_text_field( wp_unslash( $_POST['tipo_de_evento'] ) );
		$abierto_al_publico                         = sanitize_text_field( wp_unslash( $_POST['abierto_al_publico'] ) );
		$nombre_de_novia                            = sanitize_text_field( wp_unslash( $_POST['nombre_de_novia'] ) );
		$nombre_de_novio                            = sanitize_text_field( wp_unslash( $_POST['nombre_de_novio'] ) );
		$nombre_de_festejado                        = sanitize_text_field( wp_unslash( $_POST['nombre_de_festejado'] ) );
		$fecha_de_evento                            = sanitize_text_field( wp_unslash( $_POST['fecha_de_evento'] ) );
		$fecha_de_cierre                            = sanitize_text_field( wp_unslash( $_POST['fecha_de_cierre'] ) );
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
		$padrinos_extra                             = sanitize_text_field( wp_unslash( $_POST['padrinos_extra'] ) );
		$nombre_de_ceremonia_religiosa              = sanitize_text_field( wp_unslash( $_POST['nombre_de_ceremonia_religiosa'] ) );
		$direccion_de_ceremonia_religiosa           = sanitize_text_field( wp_unslash( $_POST['direccion_de_ceremonia_religiosa'] ) );
		$hora_de_ceremonia_religiosa                = sanitize_text_field( wp_unslash( $_POST['hora_de_ceremonia_religiosa'] ) );
		$link_de_google_maps_de_ceremonia_religiosa = sanitize_text_field( wp_unslash( $_POST['link_de_google_maps_de_ceremonia_religiosa'] ) );
		$nombre_de_recepcion                        = sanitize_text_field( wp_unslash( $_POST['nombre_de_recepcion'] ) );
		$direccion_de_recepcion                     = sanitize_text_field( wp_unslash( $_POST['direccion_de_recepcion'] ) );
		$hora_de_recepcion                          = sanitize_text_field( wp_unslash( $_POST['hora_de_recepcion'] ) );
		$link_de_google_maps_de_recepcion           = sanitize_text_field( wp_unslash( $_POST['link_de_google_maps_de_recepcion'] ) );
		$direccion_de_hotel                         = sanitize_text_field( wp_unslash( $_POST['direccion_de_hotel'] ) );
		$link_de_google_maps_de_hotel               = sanitize_text_field( wp_unslash( $_POST['link_de_google_maps_de_hotel'] ) );
		$codigo_de_descuento_de_hotel               = sanitize_text_field( wp_unslash( $_POST['codigo_de_descuento_de_hotel'] ) );
		$datos_de_hotel_2                           = sanitize_text_field( wp_unslash( $_POST['datos_de_hotel_2'] ) );
		$datos_de_hotel_3                           = sanitize_text_field( wp_unslash( $_POST['datos_de_hotel_3'] ) );
		$sugerencia_de_transporte                   = sanitize_text_field( wp_unslash( $_POST['sugerencia_de_transporte'] ) );
		$mesa_de_regalos                            = sanitize_text_field( wp_unslash( $_POST['mesa_de_regalos'] ) );
		$intinerario_de_evento                      = sanitize_text_field( wp_unslash( $_POST['intinerario_de_evento'] ) );
		$recomendaciones                            = sanitize_text_field( wp_unslash( $_POST['recomendaciones'] ) );
		$hashtag                                    = sanitize_text_field( wp_unslash( $_POST['hashtag'] ) );
		$galeria_de_fotos                           = sanitize_text_field( wp_unslash( $_POST['galeria_de_fotos'] ) );
		$whatsapp_i_de_confirmacion                 = sanitize_text_field( wp_unslash( $_POST['whatsapp_I_de_confirmacion'] ) );
		$whatsapp_ii_de_confirmacion                = sanitize_text_field( wp_unslash( $_POST['whatsapp_II_de_confirmacion'] ) );
		$correo_i_de_confirmacion                   = sanitize_text_field( wp_unslash( $_POST['correo_I_de_confirmacion'] ) );
		$correo_ii_de_confirmacion                  = sanitize_text_field( wp_unslash( $_POST['correo_II_de_confirmacion'] ) );
		$personalizacion_escrita                    = sanitize_text_field( wp_unslash( $_POST['personalizacion_escrita'] ) );
		$personalizacion_grafica                    = sanitize_text_field( wp_unslash( $_POST['personalizacion_grafica'] ) );
		$whatsapp_de_contacto                       = sanitize_text_field( wp_unslash( $_POST['whatsapp_de_contacto'] ) );
		$correo_electronico_de_contacto             = sanitize_text_field( wp_unslash( $_POST['correo_electronico_de_contacto'] ) );
		$comentarios_y_sugerencias                  = sanitize_text_field( wp_unslash( $_POST['comentarios_y_sugerencias'] ) );
		$ropa_formal                                = sanitize_text_field( wp_unslash( $_POST['ropa_formal'] ) );
		$no_ninos                                   = sanitize_text_field( wp_unslash( $_POST['no_ninos'] ) );
		$recomendacion_otra                         = sanitize_text_field( wp_unslash( $_POST['recomendacion_otra'] ) );

		if ( wp_doing_ajax() ) {
			try {
				if ( ! class_exists( 'ERFDatabaseService' ) ) {
					require_once plugin_dir_path( __FILE__ ) . 'services/class-erfdatabaseservice.php';
				}
				$db_service = new ERFDatabaseService();
				$data       = array(
					'tipo_de_formulario'                   => $tipo_de_formulario,
					'nombre_del_cliente'                   => $nombre_del_cliente,
					'tipo_de_evento'                       => $tipo_de_evento,
					'abierto_al_publico'                   => $abierto_al_publico,
					'nombre_de_novia'                      => $nombre_de_novia,
					'nombre_de_novio'                      => $nombre_de_novio,
					'nombre_de_festejado'                  => $nombre_de_festejado,
					'fecha_de_evento'                      => $fecha_de_evento,
					'fecha_de_cierre'                      => $fecha_de_cierre,
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
		            'padrinos_extra'                       => $padrinos_extra,
		            'nombre_de_ceremonia_religiosa'        => $nombre_de_ceremonia_religiosa,
					'direccion_de_ceremonia_religiosa'     => $direccion_de_ceremonia_religiosa,
					'hora_de_ceremonia_religiosa'          => $hora_de_ceremonia_religiosa,
					'link_de_google_maps_de_ceremonia_religiosa' => $link_de_google_maps_de_ceremonia_religiosa,
		            'nombre_de_recepcion'                  => $nombre_de_recepcion,
					'direccion_de_recepcion'               => $direccion_de_recepcion,
					'hora_de_recepcion'                    => $hora_de_recepcion,
					'link_de_google_maps_de_recepcion'     => $link_de_google_maps_de_recepcion,
					'direccion_de_hotel'                   => $direccion_de_hotel,
					'link_de_google_maps_de_hotel'         => $link_de_google_maps_de_hotel,
					'codigo_de_descuento_de_hotel'         => $codigo_de_descuento_de_hotel,
		            'datos_de_hotel_2'                     => $datos_de_hotel_2,
		            'datos_de_hotel_3'                     => $datos_de_hotel_3,
					'sugerencia_de_transporte'             => $sugerencia_de_transporte,
					'mesa_de_regalos'                      => $mesa_de_regalos,
					'intinerario_de_evento'                => $intinerario_de_evento,
					'recomendaciones'                      => $recomendaciones,
					'hashtag'                              => $hashtag,
					'galeria_de_fotos'                     => $galeria_de_fotos,
					'whatsapp_I_de_confirmacion'           => $whatsapp_i_de_confirmacion,
					'whatsapp_II_de_confirmacion'          => $whatsapp_ii_de_confirmacion,
					'correo_I_de_confirmacion'             => $correo_i_de_confirmacion,
					'correo_II_de_confirmacion'            => $correo_ii_de_confirmacion,
					'personalizacion_escrita'              => $personalizacion_escrita,
					'personalizacion_grafica'              => $personalizacion_grafica,
					'whatsapp_de_contacto'                 => $whatsapp_de_contacto,
					'correo_electronico_de_contacto'       => $correo_electronico_de_contacto,
					'comentarios_y_sugerencias'            => $comentarios_y_sugerencias,
		            'ropa_formal'                          => $ropa_formal,
		            'no_ninos'                             => $no_ninos,
		            'recomendacion_otra'                   => $recomendacion_otra,
				);

				if ($id) {
					$params = array(
						'subject' => 'Se ha editado la entrada de un formulario',
						'message' => 'Se a actualizado el registro de un formulario. <br><br>',
					);
					$db_service->update_row( $id, $data );
				} else {
					$params = array(
						'subject' => 'Nueva entrada de formulario',
						'message' => 'Se a guardado un nuevo registro del formulario. <br><br>',
					);
					$id = $db_service->insert_row( $data );
				}

				event_request_send_email($params, $data );
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

if ( ! function_exists( 'erf_save_new_event_guest' ) ) {
	/**
	 * Function to save a new event guest.
	 *
	 * @since    1.0.0
	 */
	function erf_save_new_event_guest() {

		if ( ! isset( $_POST['key'] ) || '' === $_POST['key'] ) {
			wp_send_json_error(
				__( 'Access forbidden. Key does not exists.', 'event-request-form' )
			);	
		}

		if (!wp_doing_ajax()) {
			wp_send_json_error(
				__( 'This function can not be used without ajax call.', 'event-request-form' )
			);	
		}

		try {
			if ( ! class_exists( 'ERFDatabaseService' ) ) {
				require_once plugin_dir_path( __FILE__ ) . 'services/class-erfdatabaseservice.php';
			}
			$db_service         = new ERFDatabaseService();
			$eventId            = intval($_POST['eventId']);
			$guestFirstName     = sanitize_text_field($_POST['guestFirstName']);
			$guestLastName      = sanitize_text_field($_POST['guestLastName']);
			$adultCompanions    = sanitize_text_field($_POST['adultCompanions']);
			$childrenCompanions = sanitize_text_field($_POST['childrenCompanions']);

			if (!is_int($eventId)) {
				wp_send_json_error(
					__( 'Hay un error con el id del evento, intente nuevamente.', 'event-request-form' )
				);	
			}

			if ('' == $guestFirstName) {
				wp_send_json_error(
					__( 'El nombre del invitado no puede estar vacio.', 'event-request-form' )
				);	
			}

			$data = array(
				'id_event'            => $eventId,
				'first_name'          => $guestFirstName,
				'last_name'           => $guestLastName ?? '',
				'adult_companions'    => $adultCompanions ?? '',
				'children_companions' => $childrenCompanions ?? '',
				'qr_code'             => generateRandomString(25),
			);

			$id = $db_service->addGuest($data);

			if (filter_var($id, FILTER_VALIDATE_INT) !== false) {
				$params = array(
					'subject' => 'Se ha agregado un nuevo invitado a un evento',
					'message' => 'Se ha agregado un invitado desde el formulario de edición. <br><br>',
				);
				event_request_send_email($params, $data);
				wp_send_json_success($id);
			} else {
				wp_send_json_error(
					__( 'Hubo un error con el id del evento, no se pudo registrar el invitado.', 'event-request-form' )
				);
			}
			
		} catch ( Exception $e ) {
			wp_send_json_error(
				$e->message
			);
		}
	}
}
add_action( 'wp_ajax_erf_save_new_event_guest', 'erf_save_new_event_guest' );
add_action( 'wp_ajax_nopriv_erf_save_new_event_guest', 'erf_save_new_event_guest' );

if ( ! function_exists( 'generateRandomString' ) ) {
	/**
	 * Function to get a random string.
	 *
	 * @since    1.0.0
	 */
	function generateRandomString($length) {
		$base='0123456789abcdefghijklmnopqrstuvwxyz';

		return substr(str_shuffle(
			str_repeat($base, ceil($length/strlen($base)))
		), 1, $length);
	}
}

if ( ! function_exists( 'erf_remove_guest_row' ) ) {
	/**
	 * Function to send form row data to drive file.
	 *
	 * @since    1.0.0
	 */
	function erf_remove_guest_row() {

		if ( ! isset( $_POST['key'] ) || '' === $_POST['key'] ) {
			return 'Access forbidden. Key does not exists.';
		}
		if (!wp_doing_ajax() ) {
			wp_send_json_error(
				__( 'This feature can not be used without ajax call.', 'event-request-form' )
			);
		}
		$id = $_POST['id'];
		$eventId = $_POST['eventId'];
		$db_service = new ERFDatabaseService();

		$db_service->removeGuest(
			$id,
			$eventId
		);
		wp_send_json_success(true);

	}
}
add_action( 'wp_ajax_erf_remove_guest_row', 'erf_remove_guest_row' );
add_action( 'wp_ajax_nopriv_erf_remove_guest_row', 'erf_remove_guest_row' );

if ( ! function_exists( 'erf_check_field_row' ) ) {
	/**
	 * Function to mark/dismark a row field.
	 */
	function erf_check_field_row() {

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

if ( ! function_exists( 'event_request_send_email' ) ) {
	/**
	 * Send email to notify about new form request row.
	 *
	 * @since    1.0.0
	 * @param    array $params Email sending params.
	 * @param    array $data Form fields value.
	 */
	function event_request_send_email( $params, $data ) {
		$settings = get_option( 'event_requests_plugin_settings_options' );
		$to = $settings['email'];
		// $subject = 'Nueva entrada de formulario';
		$subject = $params['subject'];
		// $message = 'Se a guardado un nuevo registro del formulario. <br><br>';
		$message = $params['message'];

		$message .=  "<table>";
		foreach ( $data as $key => $value ) {
			$message .= '<tr><td>' . ucfirst( str_replace( '_', ' ', $key ) ) . "</td><td>$value</td></tr>";
		}
		$message .= '</table>';
		$headers = "From Ahmad \r\n";
		$headers .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-Type: text/html; charset=ISO-8859-1' . "\r\n";

		if ( ! wp_mail( $to, $subject, $message, $headers ) ) {
			update_option( 'event_request_email_failure', true );
		} else {
			update_option( 'event_request_email_failure', false );
		}
	}
}
if ( ! function_exists( 'erf_remove_form_entry' ) ) {
	/**
	 * Remove form entry from database by ajax.
	 */
	function erf_remove_form_entry() {
		if ( ! isset( $_POST['key'] ) || '' === $_POST['key'] ) {
			return 'Access forbidden. Key does not exists.';
		}

		$key = sanitize_text_field( wp_unslash( $_POST['key'] ) );
		if ( ! wp_verify_nonce( $key, 'key' ) ) {
			wp_send_json_error(
				__( 'Invalid request, reload and try again.', 'event-request-form' )
			);
		}
		$id = sanitize_text_field( wp_unslash( $_POST['id'] ) );
		if ( wp_doing_ajax() ) {
			try {
				if ( ! class_exists( 'ERFDatabaseService' ) ) {
					require_once plugin_dir_path( __FILE__ ) . 'services/class-erfdatabaseservice.php';
				}
				$db_service = new ERFDatabaseService();
				$response   = $db_service->delete_row( $id );
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
add_action( 'wp_ajax_erf_remove_form_entry', 'erf_remove_form_entry' );

if ( ! function_exists( 'erf_download_excel_file' ) ) {
	/**
	 * Remove form entry from database by ajax.
	 */
	function erf_download_excel_file() {
		if ( isset( $_GET['download_xls'] ) ) {

			if ( ! class_exists( 'ERFDatabaseService' ) ) {
				require_once plugin_dir_path( __FILE__ ) . 'services/class-erfdatabaseservice.php';
			}
			$db_service = new ERFDatabaseService();

			if ( isset( $_GET['q'] ) ) {
				$result = $db_service->filter( $_GET['q'] );
			} else {
				$result = $db_service->get_all();
			}

			// here .xls file is created.
			header( 'Content-Disposition: attachment; filename=ERF_List.xls' );
			header( 'Content-type: application/force-download' );
			header( 'Content-Transfer-Encoding: binary' );
			header( 'Pragma: public' );

			$flag = false;

			foreach ( $result as $row ) {
				if ( ! $flag ) {
					// display field/column names as first row
					$headers = array_keys( (array) $row );
					$headers = array_map(
						function ( $value ) {
							return ucfirst( str_replace( '_', ' ', $value ) );
						},
						$headers
					);
					echo implode( "\t", $headers ) . "\r\n";
					$flag = true;
				}
				echo implode( "\t", array_values( ( array ) $row ) ) . "\r\n";
			}
			die();
		}
	}
}
add_action( 'plugins_loaded', 'erf_download_excel_file' );

/**
 * THE FOLLOWING CODE IS NOT RELATED TO PLUGIN FUNCTIONALITY. 
 */
if ( ! function_exists( 'erf_woocommerce_checkout_css_customization' ) ) {
	/**
	 * Update css class to fix overwrite for elemetor plugin.
	 * Function for `woocommerce_checkout_before_customer_details` action-hook.
	 *
	 * @return void
	 */
	function erf_woocommerce_checkout_css_customization() {
		?>
		<style>
			.col-1 {
				width: 100% !important;
				max-width: 100% !important;
			}

			.col-2 {
				float: none !important;
				width: 100% !important;
				max-width: 100% !important;
			}
			.woocommerce-checkout{
				font-size: 1.2rem;
			}
			.woocommerce form .form-row-first, .woocommerce form .form-row-last, .woocommerce-page form .form-row-first, .woocommerce-page form .form-row-last {
				width: 100% !important;
			}
			button, input, optgroup, select, textarea {
			    font-size: 1.2rem !important;
			}
			.woocommerce-additional-fields {
				margin-bottom: 1.5rem;
			}
		</style>
		<?php
	}
	add_action( 'woocommerce_checkout_before_customer_details', 'erf_woocommerce_checkout_css_customization' );
}

if ( ! function_exists( 'erf_woocommerce_checkout_add_custom_attributes' ) ) {
	/**
	 * Customize checkout fields
	 * https://woocommerce.com/document/tutorial-customising-checkout-fields-using-actions-and-filters/
	 *
	 * @since    1.0.0
	 * @param    array $fields Form fields value.
	 */
	function erf_woocommerce_checkout_add_custom_attributes( $fields ) {
		$fields['order']['order_comments']['custom_attributes'] = array(
			'cols' => 30,
		);
		return $fields;
	}
	add_filter( 'woocommerce_checkout_fields', 'erf_woocommerce_checkout_add_custom_attributes' );
}


if ( ! function_exists( 'erf_endpoint_get_event_data' ) ) {
	/**
	 * Endpoint function to retrieve event data by API endpoint.
	 *
	 * @since    1.0.0
	 */
	function erf_endpoint_get_event_data() {
		try {
			if ( ! class_exists( 'ERFDatabaseService' ) ) {
				require_once plugin_dir_path( __FILE__ ) . 'services/class-erfdatabaseservice.php';
			}
			
			$token     = base64_decode(esc_attr($_POST['token-code']));
			$dbService = new ERFDatabaseService();
			$row       = $dbService->get_by_token($token);

			if (null == $row) {
				wp_send_json_error(
					__( 'Hubo un error con la petición, revise los parametros enviados.', 'event-request-form' )
				);
			}

			$data['event'] = $row;
			if (function_exists('getGuestsWithAnswers') && $row->evl_evento_id) {
				$localDB   = new DBService();
				$guests    = getGuestsWithAnswers($localDB, $row->evl_evento_id);
				$questions = $localDB->get_records('questions', [["", ["id_event", "=", $row->evl_evento_id]]] );
				$data['guests']    = $guests;
				$data['questions'] = $questions;
			}

			wp_send_json_success($data);
			
		} catch ( Exception $e ) {
			wp_send_json_error(
				$e->getMessage()
			);
		}
	}
	add_action('rest_api_init', function () {
		register_rest_route('erf/v1', '/get-event', array(
			'methods' => 'POST',
			'callback' => 'erf_endpoint_get_event_data',
		));
	});
}
