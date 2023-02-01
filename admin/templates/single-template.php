<?php
/**
 * Provide a admin-facing view for the plugin.
 *
 * @link  https://https://fiesta.lezlynorman.com
 * @since 1.0.0
 *
 * @package includes
 */

if ( ! $row ) {
	return;
}
?>
<div id="loading-gif" style="display:none; position: fixed; width:5%; top: 50%; left: 50%; margin-right: -50%; transform: translate(-50%, -50%);">
	<img src="https://fiesta.lezlynorman.com/wp-content/uploads/2023/02/loading-loading-forever.gif" style="width: 50%;">
</div>

<div class="wrap">
	<h1> <?php echo esc_html( get_admin_page_title() ); ?></h1>
</div>

<div class="wrap">
	<h1>
		<strong>
			<?php echo esc_attr( __( 'Requests single view', 'event-request-form' ) ); ?>
		</strong>
	</h1>
</div>
<Table class="table" id='erf_single_viev_table'>
	<tbody>
			<tr>
				<td>
					<div>
						<input class="check-box" type="checkbox" id='nombre_del_cliente' data-name="nombre_del_cliente" data-id="<?php echo $row->id; ?>" <?php if ( $row->nombre_del_cliente_bool ) { echo 'checked'; } ?>>
						<strong>
							<?php echo esc_attr( __( 'Nombre del cliente', 'event-request-form' ) ); ?>:
						</strong>	
						<?php echo $row->nombre_del_cliente; ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<input class="check-box" type="checkbox"   id='tipo_de_evento' data-name="tipo_de_evento" data-id="<?php echo $row->id; ?>" <?php if ( $row->tipo_de_evento_bool ) { echo 'checked'; } ?>>
						<strong>
							<?php echo esc_attr( __( 'Tipo de evento', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo esc_attr( $event_types[ $row->tipo_de_evento ] ); ?>
				</td>
			</tr>
			<?php
			$file_path     = dirname( __FILE__ );
			$secondary_page_path = $file_path . '/partials/';
			$partial_path = $secondary_page_path . $row->tipo_de_evento . '.php';
			if ( file_exists( $partial_path ) ) {
				require_once( $partial_path );
			}
			?>
			<tr>
				<td>
					<div>
						<input class="check-box" type="checkbox" data-name="direccion_de_ceremonia_religiosa" data-id="<?php echo $row->id; ?>" <?php if ( $row->direccion_de_ceremonia_religiosa_bool ) { echo 'checked'; } ?>>
						<strong>
							<?php echo esc_attr( __( 'Dirección de ceremonia religiosa', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->direccion_de_ceremonia_religiosa; ?>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<input class="check-box" type="checkbox"   id='tipo_de_evento' data-name="ciudad_de_ceremonia_religiosa" data-id="<?php echo $row->id; ?>" <?php if ( $row->ciudad_de_ceremonia_religiosa_bool ) { echo 'checked'; } ?>>
						<strong>
							<?php echo esc_attr( __( 'Ciudad de ceremonia religiosa', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->ciudad_de_ceremonia_religiosa; ?>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<input class="check-box" type="checkbox" data-name="estado_de_ceremonia_religiosa" data-id="<?php echo $row->id; ?>" <?php if ( $row->estado_de_ceremonia_religiosa_bool ) { echo 'checked'; } ?>>
						<strong>
							<?php echo esc_attr( __( 'Estado de ceremonia religiosa', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->estado_de_ceremonia_religiosa; ?>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<input class="check-box" type="checkbox" data-name="pais_de_ceremonia_religiosa" data-id="<?php echo $row->id; ?>" <?php if ( $row->pais_de_ceremonia_religiosa_bool ) { echo 'checked'; } ?>>
						<strong>
							<?php echo esc_attr( __( 'Pais de ceremonia religiosa', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->pais_de_ceremonia_religiosa; ?>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<input class="check-box" type="checkbox" data-name="codigo_postal_de_ceremonia_religiosa" data-id="<?php echo $row->id; ?>" <?php if ( $row->codigo_postal_de_ceremonia_religiosa_bool ) { echo 'checked'; } ?>>
						<strong>
							<?php echo esc_attr( __( 'Código postal de ceremonia religiosa', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->codigo_postal_de_ceremonia_religiosa; ?>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<input class="check-box" type="checkbox" data-name="hora_de_ceremonia_religiosa" data-id="<?php echo $row->id; ?>" <?php if ( $row->hora_de_ceremonia_religiosa_bool ) { echo 'checked'; } ?>>
						<strong>
							<?php echo esc_attr( __( 'Hora de ceremonia religiosa', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->hora_de_ceremonia_religiosa; ?>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<input class="check-box" type="checkbox" data-name="link_de_google_maps_de_ceremonia_religiosa" data-id="<?php echo $row->id; ?>" <?php if ( $row->link_de_google_maps_de_ceremonia_religiosa_bool ) { echo 'checked'; } ?>>
						<strong>
							<?php echo esc_attr( __( 'Link de ceremonia religiosa', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->link_de_google_maps_de_ceremonia_religiosa; ?>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<input class="check-box" type="checkbox" data-name="direccion_de_recepcion" data-id="<?php echo $row->id; ?>" <?php if ( $row->direccion_de_recepcion_bool ) { echo 'checked'; } ?>>
						<strong>
							<?php echo esc_attr( __( 'Dirección de recepción', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->direccion_de_recepcion; ?>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<input class="check-box" type="checkbox" data-name="ciudad_de_recepcion" data-id="<?php echo $row->id; ?>" <?php if ( $row->ciudad_de_recepcion_bool ) { echo 'checked'; } ?>>
						<strong>
							<?php echo esc_attr( __( 'Ciudad de recepción', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->ciudad_de_recepcion; ?>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<input class="check-box" type="checkbox" data-name="estado_de_recepcion" data-id="<?php echo $row->id; ?>" <?php if ( $row->estado_de_recepcion_bool ) { echo 'checked'; } ?>>
						<strong>
							<?php echo esc_attr( __( 'Estado de recepción', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->estado_de_recepcion; ?>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<input class="check-box" type="checkbox" data-name="pais_de_recepcion" data-id="<?php echo $row->id; ?>" <?php if ( $row->pais_de_recepcion_bool ) { echo 'checked'; } ?>>
						<strong>
							<?php echo esc_attr( __( 'Pais de recepción', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->pais_de_recepcion; ?>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<input class="check-box" type="checkbox" data-name="codigo_postal_de_recepcion" data-id="<?php echo $row->id; ?>" <?php if ( $row->codigo_postal_de_recepcion_bool ) { echo 'checked'; } ?>>
						<strong>
							<?php echo esc_attr( __( 'Código postal de recepción', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->codigo_postal_de_recepcion; ?>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<input class="check-box" type="checkbox" data-name="hora_de_recepcion" data-id="<?php echo $row->id; ?>" <?php if ( $row->hora_de_recepcion_bool ) { echo 'checked'; } ?>>
						<strong>
							<?php echo esc_attr( __( 'Hora de recepción', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->hora_de_recepcion; ?>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<input class="check-box" type="checkbox" data-name="link_de_google_maps_de_recepcion" data-id="<?php echo $row->id; ?>" <?php if ( $row->link_de_google_maps_de_recepcion_bool ) { echo 'checked'; } ?>>
						<strong>
							<?php echo esc_attr( __( 'Link de google maps de recepción', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->link_de_google_maps_de_recepcion; ?>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<input class="check-box" type="checkbox" data-name="mesa_de_regalos" data-id="<?php echo $row->id; ?>" <?php if ( $row->mesa_de_regalos_bool ) { echo 'checked'; } ?>>
						<strong>
							<?php echo esc_attr( __( 'Mesa de regalos', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->mesa_de_regalos; ?>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<input class="check-box" type="checkbox" data-name="intinerario_de_evento" data-id="<?php echo $row->id; ?>" <?php if ( $row->intinerario_de_evento_bool ) { echo 'checked'; } ?>>
						<strong>
							<?php echo esc_attr( __( 'Intinerario de evento', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->intinerario_de_evento; ?>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<input class="check-box" type="checkbox" data-name="recomendaciones" data-id="<?php echo $row->id; ?>" <?php if ( $row->recomendaciones_bool ) { echo 'checked'; } ?>>
						<strong>
							<?php echo esc_attr( __( 'Recomendaciones', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->recomendaciones; ?>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<input class="check-box" type="checkbox" data-name="hashtag" data-id="<?php echo $row->id; ?>" <?php if ( $row->hashtag_bool ) { echo 'checked'; } ?>>
						<strong>
							<?php echo esc_attr( __( 'Hashtag', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->hashtag; ?>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<input class="check-box" type="checkbox" data-name="galeria_de_fotos" data-id="<?php echo $row->id; ?>" <?php if ( $row->galeria_de_fotos_bool ) { echo 'checked'; } ?>>
						<strong>
							<?php echo esc_attr( __( 'Galeria de fotos', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->galeria_de_fotos; ?>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<input class="check-box" type="checkbox" data-name="whatsapp_I_de_confirmacion" data-id="<?php echo $row->id; ?>" <?php if ( $row->whatsapp_I_de_confirmacion_bool ) { echo 'checked'; } ?>>
						<strong>
							<?php echo esc_attr( __( 'Whatsapp de confirmación', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->whatsapp_I_de_confirmacion; ?>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<input class="check-box" type="checkbox" data-name="whatsapp_II_de_confirmacion" data-id="<?php echo $row->id; ?>" <?php if ( $row->whatsapp_II_de_confirmacion_bool ) { echo 'checked'; } ?>>
						<strong>
							<?php echo esc_attr( __( 'Whatsapp II de confirmación', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->whatsapp_II_de_confirmacion; ?>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<input class="check-box" type="checkbox" data-name="personalizacion_escrita" data-id="<?php echo $row->id; ?>" <?php if ( $row->personalizacion_escrita_bool ) { echo 'checked'; } ?>>
						<strong>
							<?php echo esc_attr( __( 'Personalización escrita', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->personalizacion_escrita; ?>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<input class="check-box" type="checkbox" data-name="personalizacion_grafica" data-id="<?php echo $row->id; ?>" <?php if ( $row->personalizacion_grafica_bool ) { echo 'checked'; } ?>>
						<strong>
							<?php echo esc_attr( __( 'Personalización gráfica', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->personalizacion_grafica; ?>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<input class="check-box" type="checkbox" data-name="whatsapp_de_contacto" data-id="<?php echo $row->id; ?>" <?php if ( $row->whatsapp_de_contacto_bool ) { echo 'checked'; } ?>>
						<strong>
							<?php echo esc_attr( __( 'Whatsapp de contacto', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->whatsapp_de_contacto; ?>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<input class="check-box" type="checkbox" data-name="correo_electronico_de_contacto" data-id="<?php echo $row->id; ?>" <?php if ( $row->correo_electronico_de_contacto_bool ) { echo 'checked'; } ?>>
						<strong>
							<?php echo esc_attr( __( 'Correo electrónico de contacto', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->correo_electronico_de_contacto; ?>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<input class="check-box" type="checkbox" data-name="comentarios_y_sugerencias" data-id="<?php echo $row->id; ?>" <?php if ( $row->comentarios_y_sugerencias_bool ) { echo 'checked'; } ?>>
						<strong>
							<?php echo esc_attr( __( 'Comentarios y sugerencias', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->comentarios_y_sugerencias; ?>
				</td>
			</tr>
	</tbody>
</Table>
<?php wp_reset_postdata(); ?>
