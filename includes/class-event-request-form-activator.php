<?php

/**
 * Fired during plugin activation
 *
 * @link       https://https://https://www.linkedin.com/in/saulalonsoibarra-software-engineer/
 * @since      1.0.0
 *
 * @package    Event_Request_Form
 * @subpackage Event_Request_Form/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Event_Request_Form
 * @subpackage Event_Request_Form/includes
 * @author     Saul Alonso Ibarra Luevano <isaul37@hotmail.es>
 */
class Event_Request_Form_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		global $wpdb;

		$table_name = $wpdb->prefix . EVENT_REQUEST_FORM_DATABASE_NAME;

		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE $table_name (
		id int NOT NULL AUTO_INCREMENT,
		tipo_de_formulario varchar(50) DEFAULT '' NOT NULL,
		nombre_del_cliente varchar(100) DEFAULT '' NOT NULL,
		tipo_de_evento varchar(30) DEFAULT '' NOT NULL,
		nombre_de_novia varchar(100) DEFAULT '' NOT NULL,
		nombre_de_novio varchar(100) DEFAULT '' NOT NULL,
		nombre_de_festejado varchar(100) DEFAULT '' NOT NULL,
		fecha_de_evento varchar(15) DEFAULT '' NOT NULL,
		frase_de_bienvenida text,
		madre_de_novia varchar(100) DEFAULT '' NOT NULL,
		padre_de_novia varchar(100) DEFAULT '' NOT NULL,
		madre_de_novio varchar(100) DEFAULT '' NOT NULL,
		padre_de_novio varchar(100) DEFAULT '' NOT NULL,
		madre_del_festejado varchar(100) DEFAULT '' NOT NULL,
		padre_del_festejado varchar(100) DEFAULT '' NOT NULL,
		nombre_de_madrina varchar(100) DEFAULT '' NOT NULL,
		nombre_de_padrino varchar(100) DEFAULT '' NOT NULL,
		nombre_de_madrina_de_arras varchar(100) DEFAULT '' NOT NULL,
		nombre_de_padrino_de_arras varchar(100) DEFAULT '' NOT NULL,
		nombre_de_madrina_de_lazo varchar(100) DEFAULT '' NOT NULL,
		nombre_de_padrino_de_lazo varchar(100) DEFAULT '' NOT NULL,
		nombre_de_madrina_de_anillos varchar(100) DEFAULT '' NOT NULL,
		nombre_de_padrino_de_anillos varchar(100) DEFAULT '' NOT NULL,
		nombre_de_madrina_de_velacion varchar(100) DEFAULT '' NOT NULL,
		nombre_de_padrino_de_velacion varchar(100) DEFAULT '' NOT NULL,
		direccion_de_ceremonia_religiosa varchar(100) DEFAULT '' NOT NULL,
		ciudad_de_ceremonia_religiosa varchar(50) DEFAULT '' NOT NULL,
		estado_de_ceremonia_religiosa varchar(50) DEFAULT '' NOT NULL,
		pais_de_ceremonia_religiosa varchar(50) DEFAULT '' NOT NULL,
		codigo_postal_de_ceremonia_religiosa varchar(10) DEFAULT '' NOT NULL,
		hora_de_ceremonia_religiosa varchar(20) DEFAULT '' NOT NULL,
		link_de_google_maps_de_ceremonia_religiosa varchar(100) DEFAULT '' NOT NULL,
		direccion_de_recepcion varchar(100) DEFAULT '' NOT NULL,
		ciudad_de_recepcion varchar(50) DEFAULT '' NOT NULL,
		estado_de_recepcion varchar(50) DEFAULT '' NOT NULL,
		pais_de_recepcion varchar(50) DEFAULT '' NOT NULL,
		codigo_postal_de_recepcion varchar(10) DEFAULT '' NOT NULL,
		hora_de_recepcion varchar(20) DEFAULT '' NOT NULL,
		link_de_google_maps_de_recepcion varchar(100) DEFAULT '' NOT NULL,
		direccion_de_hotel varchar(100) DEFAULT '' NOT NULL,
		ciudad_de_hotel varchar(50) DEFAULT '' NOT NULL,
		estado_de_hotel varchar(50) DEFAULT '' NOT NULL,
		pais_de_hotel varchar(50) DEFAULT '' NOT NULL,
		codigo_postal_de_hotel varchar(10) DEFAULT '' NOT NULL,
		link_de_google_maps_de_hotel varchar(100) DEFAULT '' NOT NULL,
		codigo_de_descuento_de_hotel varchar(100) DEFAULT '' NOT NULL,
		mesa_de_regalos varchar(100) DEFAULT '' NOT NULL,
		intinerario_de_evento TEXT,
		recomendaciones TEXT,
		hashtag varchar(100) DEFAULT '' NOT NULL,
		galeria_de_fotos varchar(100) DEFAULT '' NOT NULL,
		whatsapp_I_de_confirmacion varchar(15) DEFAULT '' NOT NULL,
		whatsapp_II_de_confirmacion varchar(15) DEFAULT '' NOT NULL,
		personalizacion_escrita TEXT,
		personalizacion_grafica varchar(100) DEFAULT '' NOT NULL,
		whatsapp_de_contacto varchar(15) DEFAULT '' NOT NULL,
		correo_electronico_de_contacto varchar(50) DEFAULT '' NOT NULL,
		comentarios_y_sugerencias TEXT,
		nombre_del_cliente_bool TINYINT DEFAULT 0,
		tipo_de_evento_bool TINYINT DEFAULT 0,
		nombre_de_novia_bool TINYINT DEFAULT 0,
		nombre_de_novio_bool TINYINT DEFAULT 0,
		nombre_de_festejado_bool TINYINT DEFAULT 0,
		fecha_de_evento_bool TINYINT DEFAULT 0,
		frase_de_bienvenida_bool TINYINT DEFAULT 0,
		madre_de_novia_bool TINYINT DEFAULT 0,
		padre_de_novia_bool TINYINT DEFAULT 0,
		madre_de_novio_bool TINYINT DEFAULT 0,
		padre_de_novio_bool TINYINT DEFAULT 0,
		madre_del_festejado_bool TINYINT DEFAULT 0,
		padre_del_festejado_bool TINYINT DEFAULT 0,
		nombre_de_madrina_bool TINYINT DEFAULT 0,
		nombre_de_padrino_bool TINYINT DEFAULT 0,
		nombre_de_madrina_de_arras_bool TINYINT DEFAULT 0,
		nombre_de_padrino_de_arras_bool TINYINT DEFAULT 0,
		nombre_de_madrina_de_lazo_bool TINYINT DEFAULT 0,
		nombre_de_padrino_de_lazo_bool TINYINT DEFAULT 0,
		nombre_de_madrina_de_anillos_bool TINYINT DEFAULT 0,
		nombre_de_padrino_de_anillos_bool TINYINT DEFAULT 0,
		nombre_de_madrina_de_velacion_bool TINYINT DEFAULT 0,
		nombre_de_padrino_de_velacion_bool TINYINT DEFAULT 0,
		direccion_de_ceremonia_religiosa_bool TINYINT DEFAULT 0,
		ciudad_de_ceremonia_religiosa_bool TINYINT DEFAULT 0,
		estado_de_ceremonia_religiosa_bool TINYINT DEFAULT 0,
		pais_de_ceremonia_religiosa_bool TINYINT DEFAULT 0,
		codigo_postal_de_ceremonia_religiosa_bool TINYINT DEFAULT 0,
		hora_de_ceremonia_religiosa_bool TINYINT DEFAULT 0,
		link_de_google_maps_de_ceremonia_religiosa_bool TINYINT DEFAULT 0,
		direccion_de_recepcion_bool TINYINT DEFAULT 0,
		ciudad_de_recepcion_bool TINYINT DEFAULT 0,
		estado_de_recepcion_bool TINYINT DEFAULT 0,
		pais_de_recepcion_bool TINYINT DEFAULT 0,
		codigo_postal_de_recepcion_bool TINYINT DEFAULT 0,
		hora_de_recepcion_bool TINYINT DEFAULT 0,
		link_de_google_maps_de_recepcion_bool TINYINT DEFAULT 0,
		direccion_de_hotel_bool TINYINT DEFAULT 0,
		ciudad_de_hotel_bool TINYINT DEFAULT 0,
		estado_de_hotel_bool TINYINT DEFAULT 0,
		pais_de_hotel_bool TINYINT DEFAULT 0,
		codigo_postal_de_hotel_bool TINYINT DEFAULT 0,
		link_de_google_maps_de_hotel_bool TINYINT DEFAULT 0,
		codigo_de_descuento_de_hotel_bool TINYINT DEFAULT 0,
		mesa_de_regalos_bool TINYINT DEFAULT 0,
		intinerario_de_evento_bool TINYINT DEFAULT 0,
		recomendaciones_bool TINYINT DEFAULT 0,
		hashtag_bool TINYINT DEFAULT 0,
		galeria_de_fotos_bool TINYINT DEFAULT 0,
		whatsapp_I_de_confirmacion_bool TINYINT DEFAULT 0,
		whatsapp_II_de_confirmacion_bool TINYINT DEFAULT 0,
		personalizacion_escrita_bool TINYINT DEFAULT 0,
		personalizacion_grafica_bool TINYINT DEFAULT 0,
		whatsapp_de_contacto_bool TINYINT DEFAULT 0,
		correo_electronico_de_contacto_bool TINYINT DEFAULT 0,
		comentarios_y_sugerencias_bool TINYINT DEFAULT 0,
		PRIMARY KEY  (id)
		) $charset_collate;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );

	}

}
