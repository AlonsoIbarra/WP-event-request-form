<?php
/**
 * This file contains a class service to manage database rows for this plugin database table.
 *
 * @since      1.0.0
 * @package    services
 * @author     isaul37@hotmail.es
 */

if ( ! class_exists( 'ERFDatabaseService' ) ) {
	/**
	 * This class defines function to create, read, update database row fields.
	 */
	class ERFDatabaseService {

		/**
		 * Asdasd.
		 *
		 * @var table_name string sdds.
		 */
		public $table_name;
		public $event_tables;

		/**
		 * Function to initialize a class instance.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		public function __construct() {
			global $wpdb;
			$this->table_name = $wpdb->prefix . EVENT_REQUEST_FORM_DATABASE_NAME;

			$this->event_tables = Array(
				'events' => "{$wpdb->prefix}evl_events",
				'questions' => "{$wpdb->prefix}evl_event_questions",
				'guests' => "{$wpdb->prefix}evl_event_guests",
				'answers' => "{$wpdb->prefix}evl_event_answers",
			);
		}

		/**
		 * Function to update a row in database row.
		 * https://developer.wordpress.org/reference/classes/wpdb/update/
		 *
		 * @since  1.0.0
		 * @access public
		 * @param  int    $id   Row ID.
		 * @param  array  $data The array data to be updated.
		 *
		 * @return int|false The number of rows updated, or false on error.
		 */
		public function update_row( $id, $data ) {
			global $wpdb;
			return $wpdb->update(
				$this->table_name,
				$data,
				array( 'id' => $id )
			);
		}

		/**
		 * Function to update a field in database row.
		 * https://developer.wordpress.org/reference/classes/wpdb/update/
		 *
		 * @since  1.0.0
		 * @access public
		 * @param  int    $id   Row ID.
		 * @param  string $field The field name to be uopdated.
		 * @param  string $value The row value.
		 * @return int|false The number of rows updated, or false on error.
		 */
		public function update_field( $id, $field, $value ) {
			global $wpdb;
			return $wpdb->update(
				$this->table_name,
				array( "$field" => $value ),
				array( 'id' => $id )
			);
		}

		/**
		 * Create a new row in database.
		 * https://developer.wordpress.org/reference/classes/wpdb/insert/
		 *
		 * @since  1.0.0
		 * @access public
		 * @param array $data  Asociative array with row fields and values.
		 * @return int Id of new row.
		 */
		public function insert_row( $data ) {
			global $wpdb;
			$wpdb->insert(
				$this->table_name,
				$data
			);
			return $wpdb->insert_id;
		}

		/**
		 * Get all rows from database.
		 * https://developer.wordpress.org/reference/classes/wpdb/get_results/
		 *
		 * @since  1.0.0
		 * @access public
		 * @return array|object|null Database query results.
		 */
		public function get_all() {
			global $wpdb;
			$table = $this->table_name;
			$results = $wpdb->get_results( "SELECT * FROM $table ORDER BY id DESC" );
			return $results;
		}

		/**
		 * Get single row from database.
		 * https://developer.wordpress.org/reference/classes/wpdb/get_row/
		 *
		 * @since  1.0.0
		 * @access public
		 * @param int $id  Id of a required row.
		 * @return array|object|null|void Database query result in format specified by $output or null on failure.
		 */
		public function get_one( $id ) {
			global $wpdb;
			$table = $this->table_name;
			$row = $wpdb->get_row( "SELECT * FROM $table WHERE id = $id", OBJECT );
			return $row;
		}

		/**
		 * Get single row where field match.
		 * https://developer.wordpress.org/reference/classes/wpdb/get_row/
		 *
		 * @since  1.0.0
		 * @access public
		 * @param string $field  Table field to filter.
		 * @param string $value  String field value to filter.
		 * @return array|object|null|void Database query result in format specified by $output or null on failure.
		 */
		public function get_where( $field, $value ) {
			global $wpdb;
			$table = $this->table_name;
			$row   = $wpdb->get_row( "SELECT * FROM $table WHERE $field = $value", OBJECT );
			return $row;
		}

		/**
		 * Get single row where  event match with token.
		 * https://developer.wordpress.org/reference/classes/wpdb/get_row/
		 *
		 * @since  1.0.0
		 * @access public
		 * @param string $token  Event token.
		 *
		 * @return array|object|null|void Database query result in format specified by $output or null on failure.
		 */
		public function get_by_token( $token ) {
			global $wpdb;
			$row   = $wpdb->get_row(
				sprintf(
					"SELECT erf.* from %s erf
					left join %s evle on erf.evl_evento_id=evle.id
					where evle.seccode = '%s'",
				    $this->table_name,
					$this->event_tables['events'],
					$token
				),
				OBJECT
			);
			return $row;
		}

		/**
		 * Filter query rows from database.
		 * https://developer.wordpress.org/reference/classes/wpdb/get_results/
		 *
		 * @since  1.0.0
		 * @access public
		 * @param string $query  query to looking for.
		 * @return array|object|null|void Database query result in format specified by $output or null on failure.
		 */
		public function filter( $query ) {
			global $wpdb;
			$table = $this->table_name;
			$results = $wpdb->get_results(
				"SELECT * FROM $table WHERE nombre_del_cliente LIKE '%$query%' or tipo_de_evento LIKE '%$query%' or nombre_de_novia LIKE '%$query%' or nombre_de_novio LIKE '%$query%' or nombre_de_festejado LIKE '%$query%' or frase_de_bienvenida LIKE '%$query%' or madre_de_novia LIKE '%$query%' or padre_de_novia LIKE '%$query%' or madre_de_novio LIKE '%$query%' or padre_de_novio LIKE '%$query%' or madre_del_festejado LIKE '%$query%' or padre_del_festejado LIKE '%$query%' or nombre_de_madrina LIKE '%$query%' or nombre_de_padrino LIKE '%$query%' or nombre_de_madrina_de_arras LIKE '%$query%' or nombre_de_padrino_de_arras LIKE '%$query%' or nombre_de_madrina_de_lazo LIKE '%$query%' or nombre_de_padrino_de_lazo LIKE '%$query%' or nombre_de_madrina_de_anillos LIKE '%$query%' or nombre_de_padrino_de_anillos LIKE '%$query%' or nombre_de_madrina_de_velacion LIKE '%$query%' or nombre_de_padrino_de_velacion LIKE '%$query%' or direccion_de_ceremonia_religiosa LIKE '%$query%' or link_de_google_maps_de_ceremonia_religiosa LIKE '%$query%' or direccion_de_recepcion LIKE '%$query%' or link_de_google_maps_de_recepcion LIKE '%$query%' or mesa_de_regalos LIKE '%$query%' or intinerario_de_evento LIKE '%$query%' or recomendaciones LIKE '%$query%' or hashtag LIKE '%$query%' or galeria_de_fotos LIKE '%$query%' or whatsapp_I_de_confirmacion LIKE '%$query%' or whatsapp_II_de_confirmacion LIKE '%$query%' or personalizacion_escrita LIKE '%$query%' or personalizacion_grafica LIKE '%$query%' or whatsapp_de_contacto LIKE '%$query%' or correo_electronico_de_contacto LIKE '%$query%' or comentarios_y_sugerencias LIKE '%$query%' or tipo_de_formulario LIKE '%$query%'  ORDER BY id DESC",
				OBJECT
			);
			return $results;
		}

		/**
		 * Remove single row from database.
		 * https://developer.wordpress.org/reference/classes/wpdb/delete/
		 *
		 * @since  1.0.0
		 * @access public
		 * @param int $id  Id of the row to delete.
		 * @return int|false The number of rows deleted, or false on error.
		 */
		public function delete_row( $id ) {
			global $wpdb;
			$table = $this->table_name;
			return $wpdb->delete(
				$table,
				array( 'id' => $id ),
				array( '%d' ),
			);
		}

		/**
		 * This function returns a list of registered events.
		 * https://developer.wordpress.org/reference/classes/wpdb/get_results/
		 *
		 * @since  1.0.0
		 * @access public
		 * 
		 * @return array|object|null|void Database query result in format specified by $output or null on failure.
		 */
		public function get_events() {
			global $wpdb;
			$rows   = $wpdb->get_results(
				sprintf(
					'SELECT * from %s',
					$this->event_tables['events'],
				),
				OBJECT
			);
			return $rows;
		}

		/**
		 * This function only return a list of guests.
		 * https://developer.wordpress.org/reference/classes/wpdb/get_results/
		 *
		 * @since  1.0.0
		 * @access public
		 * @param string $field  Table field to filter.
		 * @param string $value  String field value to filter.
		 * @return array|object|null|void Database query result in format specified by $output or null on failure.
		 */
		public function get_guests( $id ) {
			global $wpdb;
			$rows   = $wpdb->get_results(
				sprintf(
					'SELECT evleg.* from %s evleg
					left join %s evle on evleg.id_event=evle.id
					left join %s ERF on evle.id=ERF.evl_evento_id
					where ERF.id = %s',
					$this->event_tables['guests'],
					$this->event_tables['events'],
					$this->table_name,
					$id
				),
				OBJECT
			);
			return $rows;
		}

		/**
		 * This function only return a list of guests.
		 * https://developer.wordpress.org/reference/classes/wpdb/get_results/
		 *
		 * @since  1.0.0
		 * @access public
		 * @param string $token  Event token.
		 *
		 * @return array|object|null|void Database query result in format specified by $output or null on failure.
		 */
		public function get_questions( $token ) {
			global $wpdb;
			$rows   = $wpdb->get_results(
				sprintf(
					"SELECT eq.* from %s eq
					left join %s evle on eq.id_event=evle.id
					where evle.seccode = '%s'",
					$this->event_tables['questions'],
					$this->event_tables['events'],
					$token
				),
				OBJECT
			);
			return $rows;
		}

		/**
		 * This function remove a guest and their answers.
		 * https://developer.wordpress.org/reference/classes/wpdb/get_results/
		 *
		 * @since  1.0.0
		 * @access public
		 * @param string $token  Event token.
		 *
		 * @return bool
		 */
		public function removeGuest( $guestId, $eventId ) {
			global $wpdb;
			$wpdb->get_results(
				sprintf(
					"DELETE FROM  %s
					where id_guest = '%s'",
					$this->event_tables['answers'],
					$guestId,
				),
				OBJECT
			);

			$wpdb->get_results(
				sprintf(
					"DELETE FROM  %s 
					where id = '%s' AND id_event =' %s'",
					$this->event_tables['guests'],
					$guestId,
					$eventId,
				),
				OBJECT
			);
			return true;
		}
	
		/**
		 * This function create an event guest.
		 * https://developer.wordpress.org/reference/classes/wpdb/get_results/
		 *
		 * @since  1.0.0
		 * @access public
		 * @param array $data  Guest row data.
		 *
		 * @return bool
		 */
		public function addGuest( $data ) {
			global $wpdb;
			if ($wpdb->insert($this->event_tables['guests'], $data) === false) {
				return $wpdb->last_error;
			} else {
				return $wpdb->insert_id;
			}
		}
	}
}