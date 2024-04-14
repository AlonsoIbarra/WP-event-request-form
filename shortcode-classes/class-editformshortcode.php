<?php
/**
 * No comments so far.
 *
 * @since      1.0.0
 * @package    shortcode-classes
 * @author     isaul37@hotmail.es
 */

if ( ! class_exists( 'ERF_EditFormShortcode' ) ) {
	/**
	 * This class defines all code necessary to render events form for edition.
	 */
	class ERF_EditFormShortcode {

		/**
		 * The array of filters registered with WordPress.
		 *
		 * @since    1.0.0
		 * @access   protected
		 * @var      array $attributes Asociative array.
		 */
		protected $attributes;

		/**
		 * Initialize the class and set its attributes.
		 *
		 * @since 1.0.0
		 * @param array $attributes Asociative array.
		 */
		public function __construct( $attributes = null ) {
			$this->attributes = $attributes;
		}

		/**
		 * Generate html form.
		 *
		 * @since    1.0.0
		 * @access   public
		 * @return   String
		 */
		public function get_content() {
			if ( isset( $_GET['nonce'] ) && ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['nonce'] ) ), 'coverage-nonce' ) ) {
				die( 'Access forbidden. Nonce does not match.' );
			}
			$template_path = dirname( __FILE__ ) . '/templates/edition/initial-template.php';

			if (isset($_POST['token'])) {
				$token   = $_POST['token'];
				$localDB = new ERFDatabaseService();
				$row     = $localDB->get_by_token($token);
				if (function_exists('getGuestsWithAnswers') && $row->evl_evento_id) {
					$localDB   = new DBService();
					$guests    = getGuestsWithAnswers($localDB, $row->evl_evento_id);
					$questions = $localDB->get_records('questions', [["", ["id_event", "=", $row->evl_evento_id]]] );
					set_query_var('renderGuestsTable', true);
					set_query_var( 'guests', $guests );
					set_query_var( 'questions', $questions );
				}

				if (null == $row) {
					set_query_var('notFound', true);
				} else {
					$template_path = dirname( __FILE__ ) . '/templates/edition/form-template.php';
					set_query_var( 'form', $row );
				}
			}

			ob_start();
			load_template( $template_path );
			$output = ob_get_clean();

			return $output;
		}

		/**
		 * Function to get the code.
		 *
		 * @since    1.0.0
		 * @access   public
		 * @return   String
		 */
		public function render_code() {
			$response = $this->get_content();
			return $response;
		}

		function buildGuestsTable($guests, $questions) {
			$table = '
			<div style="text-align: left; margin: 0.5rem 0.5rem 0.5rem 0rem;">
				<input type="text" name="guest_name_query" id ="guest_name_query" style="max-width: 25%;">
				<input type="button" id="filter_guest" value="Filtrar">
			</div>
			<table  id="data_table" class="table table-striped wp-list-table widefat fixed striped table-view-list toplevel_page_events_admin_menu">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Apellidos</th>
					<th>Estado</th>
					<th>Fecha de confirmación</th>
					<th>Acompañantes adultos</th>
					<th>Adultos confirmados</th>
					<th>Acompañantes niños</th>
					<th>Niños confirmados</th>
					<th>Asistio</th>
					<th class="private-field">Teléfono</th>
					<th class="private-field">Correo</th>';
			foreach($questions as $q) {
				$table .= "<th>".$q['question']."</th>";
			}
			if ( is_admin() ) {
				$table .= "<th class='private-field'>Opciones</th>";
			}
			$table .= "</tr> </thead> <tbody>";
			$counter = array(
				'Confirmado' => 0,
				'Pendiente' => 0,
				'Rechazada' => 0,
			);
			foreach($guests as $guest) {
				$data_name = str_replace( ' ', '', $guest["first_name"].' '.$guest["last_name"] );
				$state = $guest["state"];
				$style = '';
				if ($state=='Acepta'){
					$style = ' font-weight: bold; ';  
					$state = 'Confirmado';
					$counter['Confirmado'] += 1;
				}
				if ($state=='Rechaza'){
					$state = 'Rechazada';
					$counter['Rechazada'] += 1;
				}
				if ($state=='Pendiente'){
					$counter['Pendiente'] += 1;
				}

				$table .= "<tr data-name='$data_name' data-status='$state' style='$style'>
						<td> ".$guest["first_name"]." </td>
						<td> ".$guest["last_name"]." </td>
						<td> ".$state." </td>
						<td> ".$guest["confirmed_at"]." </td>
						<td> ".$guest["adult_companions"]." </td>
						<td> ".$guest["adult_companions_confirmed"]." </td>
						<td> ".$guest["children_companions"]." </td>
						<td> ".$guest["children_companions_confirmed"]." </td>
						<td> ".$guest["attended"]." </td>
						<td class='private-field'>".$guest["phone_number"]."</td>
						<td class='private-field'>".$guest["email"]."</td>";
				foreach($questions as $q) {
					$table .= "<td>";
					if( isset( $guest["answers"][$q["id"]] ) ) {
						$table .= $guest["answers"][$q["id"]]["answer"];
					}
					$table .= "</td>";
				}

				if ( is_admin() ) {
					$edit_url=admin_url( "admin.php?page=events_admin_new_guest&id_event=" .$guest["id_event"]."&id_guest=".$guest['id'] );

					$table .= "<td class='private-field'><a href='$edit_url'><span class='dashicons dashicons-edit'></span></a>";
					$table .= "<a href='#'><span data-name='".$guest['first_name']."' data-id='".$guest['id']."' class='dashicons dashicons-trash evl-guest-delete-class'></span></a></td>";
				}
				$table .= "</tr>";
			}
			$table .= "</tbody> </table>";

			$table .= "<div style='text-align:end;'><strong>Confirmadas:</strong>  ".$counter['Confirmado']."<br>";
			$table .= "<strong>Pendientes:</strong>  ".$counter['Pendiente']."<br>";
			$table .= "<strong>Rechazadas:</strong>  ".$counter['Rechazada']."</div>";

			$table .= "<script>
				jQuery(document).ready(function() {
					jQuery('#filter_guest').on('click', function() {
						let name = jQuery('#guest_name_query').val();
						name = name.replace(/\s+/g, '').toLowerCase();
						var rows = jQuery('#data_table tbody tr');
						rows.each(function() {
							let data_name = jQuery(this).data('name').toLowerCase();
							let data_status = jQuery(this).data('status').toLowerCase();
							if ( ! data_name.includes(name) && ! data_status.includes(name)) {
								jQuery(this).fadeOut();
							} else {
								jQuery(this).fadeIn();
							}
						});
					});
				});
				</script>";
			return $table;
		}
	}
}

