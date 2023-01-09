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
					<?php $class_name = ( $row->nombre_del_cliente_bool ) ? 'field-checked' : 'field-not-checked'; ?>
					<div id='nombre_del_cliente' data-name="nombre_del_cliente" data-id="<?php echo $row->id; ?>" data-checked="<?php echo $row->nombre_del_cliente_bool; ?>" class="<?php echo $class_name; ?>">
						<strong>
							<?php echo esc_attr( __( 'Nombre del cliente', 'event-request-form' ) ); ?>:
						</strong>	
						<?php echo $row->nombre_del_cliente; ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
				<?php $class_name = ( $row->tipo_de_evento_bool ) ? 'field-checked' : 'field-not-checked'; ?>
					<div id='tipo_de_evento' data-name="tipo_de_evento" data-id="<?php echo $row->id; ?>" data-checked="<?php echo $row->tipo_de_evento_bool; ?>" class="<?php echo $class_name; ?>">
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
				<?php $class_name = ( $row->direccion_de_ceremonia_religiosa_bool ) ? 'field-checked' : 'field-not-checked'; ?>
					<div id='direccion_de_ceremonia_religiosa' data-name="direccion_de_ceremonia_religiosa" data-id="<?php echo $row->id; ?>" data-checked="<?php echo $row->direccion_de_ceremonia_religiosa_bool; ?>" class="<?php echo $class_name; ?>">
						<strong>
							<?php echo esc_attr( __( 'Dirección de ceremonia religiosa', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->direccion_de_ceremonia_religiosa; ?>
				</td>
			</tr>
			<tr>
				<td>
				<?php $class_name = ( $row->ciudad_de_ceremonia_religiosa_bool ) ? 'field-checked' : 'field-not-checked'; ?>
					<div id='ciudad_de_ceremonia_religiosa' data-name="ciudad_de_ceremonia_religiosa" data-checked="<?php echo $row->ciudad_de_ceremonia_religiosa_bool; ?>" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
						<strong>
							<?php echo esc_attr( __( 'Ciudad de ceremonia religiosa', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->ciudad_de_ceremonia_religiosa; ?>
				</td>
			</tr>
			<tr>
				<td>
				<?php $class_name = ( $row->estado_de_ceremonia_religiosa_bool ) ? 'field-checked' : 'field-not-checked'; ?>
					<div id='estado_de_ceremonia_religiosa' data-name="estado_de_ceremonia_religiosa" data-checked="<?php echo $row->estado_de_ceremonia_religiosa_bool; ?>" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
						<strong>
							<?php echo esc_attr( __( 'Estado de ceremonia religiosa', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->estado_de_ceremonia_religiosa; ?>
				</td>
			</tr>
			<tr>
				<td>
				<?php $class_name = ( $row->pais_de_ceremonia_religiosa_bool ) ? 'field-checked' : 'field-not-checked'; ?>
					<div id='pais_de_ceremonia_religiosa' data-name="pais_de_ceremonia_religiosa" data-checked="<?php echo $row->pais_de_ceremonia_religiosa_bool; ?>" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
						<strong>
							<?php echo esc_attr( __( 'Pais de ceremonia religiosa', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->pais_de_ceremonia_religiosa; ?>
				</td>
			</tr>
			<tr>
				<td>
				<?php $class_name = ( $row->codigo_postal_de_ceremonia_religiosa_bool ) ? 'field-checked' : 'field-not-checked'; ?>
					<div id='codigo_postal_de_ceremonia_religiosa' data-name="codigo_postal_de_ceremonia_religiosa" data-checked="<?php echo $row->codigo_postal_de_ceremonia_religiosa_bool; ?>" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
						<strong>
							<?php echo esc_attr( __( 'Código postal de ceremonia religiosa', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->codigo_postal_de_ceremonia_religiosa; ?>
				</td>
			</tr>
			<tr>
				<td>
				<?php $class_name = ( $row->hora_de_ceremonia_religiosa_bool ) ? 'field-checked' : 'field-not-checked'; ?>
					<div id='hora_de_ceremonia_religiosa' data-name="hora_de_ceremonia_religiosa" data-checked="<?php echo $row->hora_de_ceremonia_religiosa_bool; ?>" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
						<strong>
							<?php echo esc_attr( __( 'Hora de ceremonia religiosa', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->hora_de_ceremonia_religiosa; ?>
				</td>
			</tr>
			<tr>
				<td>
				<?php $class_name = ( $row->link_de_google_maps_de_ceremonia_religiosa_bool ) ? 'field-checked' : 'field-not-checked'; ?>
					<div id='link_de_google_maps_de_ceremonia_religiosa' data-name="link_de_google_maps_de_ceremonia_religiosa" data-checked="<?php echo $row->link_de_google_maps_de_ceremonia_religiosa_bool; ?>" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
						<strong>
							<?php echo esc_attr( __( 'Link de ceremonia religiosa', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->link_de_google_maps_de_ceremonia_religiosa; ?>
				</td>
			</tr>
			<tr>
				<td>
				<?php $class_name = ( $row->direccion_de_recepcion_bool ) ? 'field-checked' : 'field-not-checked'; ?>
					<div id='direccion_de_recepcion' data-name="direccion_de_recepcion" data-checked="<?php echo $row->direccion_de_recepcion_bool; ?>" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
						<strong>
							<?php echo esc_attr( __( 'Dirección de recepción', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->direccion_de_recepcion; ?>
				</td>
			</tr>
			<tr>
				<td>
				<?php $class_name = ( $row->ciudad_de_recepcion_bool ) ? 'field-checked' : 'field-not-checked'; ?>
					<div id='ciudad_de_recepcion' data-name="ciudad_de_recepcion" data-checked="<?php echo $row->ciudad_de_recepcion_bool; ?>" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
						<strong>
							<?php echo esc_attr( __( 'Ciudad de recepción', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->ciudad_de_recepcion; ?>
				</td>
			</tr>
			<tr>
				<td>
				<?php $class_name = ( $row->estado_de_recepcion_bool ) ? 'field-checked' : 'field-not-checked'; ?>
					<div id='estado_de_recepcion' data-name="estado_de_recepcion" data-checked="<?php echo $row->estado_de_recepcion_bool; ?>" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
						<strong>
							<?php echo esc_attr( __( 'Estado de recepción', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->estado_de_recepcion; ?>
				</td>
			</tr>
			<tr>
				<td>
				<?php $class_name = ( $row->pais_de_recepcion_bool ) ? 'field-checked' : 'field-not-checked'; ?>
					<div id='pais_de_recepcion' data-name="pais_de_recepcion" data-id="<?php echo $row->id; ?>" data-checked="<?php echo $row->pais_de_recepcion_bool; ?>" class="<?php echo $class_name; ?>">
						<strong>
							<?php echo esc_attr( __( 'Pais de recepción', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->pais_de_recepcion; ?>
				</td>
			</tr>
			<tr>
				<td>
				<?php $class_name = ( $row->codigo_postal_de_recepcion_bool ) ? 'field-checked' : 'field-not-checked'; ?>
					<div id='codigo_postal_de_recepcion' data-name="codigo_postal_de_recepcion" data-checked="<?php echo $row->codigo_postal_de_recepcion_bool; ?>" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
						<strong>
							<?php echo esc_attr( __( 'Código postal de recepción', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->codigo_postal_de_recepcion; ?>
				</td>
			</tr>
			<tr>
				<td>
				<?php $class_name = ( $row->hora_de_recepcion_bool ) ? 'field-checked' : 'field-not-checked'; ?>
					<div id='hora_de_recepcion' data-name="hora_de_recepcion" data-checked="<?php echo $row->hora_de_recepcion_bool; ?>" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
						<strong>
							<?php echo esc_attr( __( 'Hora de recepción', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->hora_de_recepcion; ?>
				</td>
			</tr>
			<tr>
				<td>
				<?php $class_name = ( $row->link_de_google_maps_de_recepcion_bool ) ? 'field-checked' : 'field-not-checked'; ?>
					<div id='link_de_google_maps_de_recepcion' data-name="link_de_google_maps_de_recepcion" data-checked="<?php echo $row->link_de_google_maps_de_recepcion_bool; ?>" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
						<strong>
							<?php echo esc_attr( __( 'Link de google maps de recepción', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->link_de_google_maps_de_recepcion; ?>
				</td>
			</tr>
			<tr>
				<td>
				<?php $class_name = ( $row->mesa_de_regalos_bool ) ? 'field-checked' : 'field-not-checked'; ?>
					<div id='mesa_de_regalos' data-name="mesa_de_regalos" data-checked="<?php echo $row->mesa_de_regalos_bool; ?>" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
						<strong>
							<?php echo esc_attr( __( 'Mesa de regalos', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->mesa_de_regalos; ?>
				</td>
			</tr>
			<tr>
				<td>
				<?php $class_name = ( $row->intinerario_de_evento_bool ) ? 'field-checked' : 'field-not-checked'; ?>
					<div id='intinerario_de_evento' data-name="intinerario_de_evento" data-checked="<?php echo $row->intinerario_de_evento_bool; ?>" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
						<strong>
							<?php echo esc_attr( __( 'Intinerario de evento', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->intinerario_de_evento; ?>
				</td>
			</tr>
			<tr>
				<td>
				<?php $class_name = ( $row->recomendaciones_bool ) ? 'field-checked' : 'field-not-checked'; ?>
					<div id='recomendaciones' data-name="recomendaciones" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
						<strong>
							<?php echo esc_attr( __( 'Recomendaciones', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->recomendaciones; ?>
				</td>
			</tr>
			<tr>
				<td>
				<?php $class_name = ( $row->hashtag_bool ) ? 'field-checked' : 'field-not-checked'; ?>
					<div id='hashtag' data-name="hashtag" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
						<strong>
							<?php echo esc_attr( __( 'Hashtag', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->hashtag; ?>
				</td>
			</tr>
			<tr>
				<td>
				<?php $class_name = ( $row->galeria_de_fotos_bool ) ? 'field-checked' : 'field-not-checked'; ?>
					<div id='galeria_de_fotos' data-name="galeria_de_fotos" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
						<strong>
							<?php echo esc_attr( __( 'Galeria de fotos', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->galeria_de_fotos; ?>
				</td>
			</tr>
			<tr>
				<td>
				<?php $class_name = ( $row->whatsapp_I_de_confirmacion_bool ) ? 'field-checked' : 'field-not-checked'; ?>
					<div id='whatsapp_I_de_confirmacion' data-name="whatsapp_I_de_confirmacion" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
						<strong>
							<?php echo esc_attr( __( 'Whatsapp de confirmación', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->whatsapp_I_de_confirmacion; ?>
				</td>
			</tr>
			<tr>
				<td>
				<?php $class_name = ( $row->whatsapp_II_de_confirmacion_bool ) ? 'field-checked' : 'field-not-checked'; ?>
					<div id='whatsapp_II_de_confirmacion' data-name="whatsapp_II_de_confirmacion" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
						<strong>
							<?php echo esc_attr( __( 'Whatsapp II de confirmación', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->whatsapp_II_de_confirmacion; ?>
				</td>
			</tr>
			<tr>
				<td>
				<?php $class_name = ( $row->personalizacion_escrita_bool ) ? 'field-checked' : 'field-not-checked'; ?>
					<div id='personalizacion_escrita' data-name="personalizacion_escrita" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
						<strong>
							<?php echo esc_attr( __( 'Personalización escrita', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->personalizacion_escrita; ?>
				</td>
			</tr>
			<tr>
				<td>
				<?php $class_name = ( $row->personalizacion_grafica_bool ) ? 'field-checked' : 'field-not-checked'; ?>
					<div id='personalizacion_grafica' data-name="personalizacion_grafica" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
						<strong>
							<?php echo esc_attr( __( 'Personalización gráfica', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->personalizacion_grafica; ?>
				</td>
			</tr>
			<tr>
				<td>
				<?php $class_name = ( $row->whatsapp_de_contacto_bool ) ? 'field-checked' : 'field-not-checked'; ?>
					<div id='whatsapp_de_contacto' data-name="whatsapp_de_contacto" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
						<strong>
							<?php echo esc_attr( __( 'Whatsapp de contacto', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->whatsapp_de_contacto; ?>
				</td>
			</tr>
			<tr>
				<td>
				<?php $class_name = ( $row->correo_electronico_de_contacto_bool ) ? 'field-checked' : 'field-not-checked'; ?>
					<div id='correo_electronico_de_contacto' data-name="correo_electronico_de_contacto" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
						<strong>
							<?php echo esc_attr( __( 'Correo electrónico de contacto', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->correo_electronico_de_contacto; ?>
				</td>
			</tr>
			<tr>
				<td>
				<?php $class_name = ( $row->comentarios_y_sugerencias_bool ) ? 'field-checked' : 'field-not-checked'; ?>
					<div id='comentarios_y_sugerencias' data-name="comentarios_y_sugerencias" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
						<strong>
							<?php echo esc_attr( __( 'Comentarios y sugerencias', 'event-request-form' ) ); ?>
						</strong>	
					<?php echo $row->comentarios_y_sugerencias; ?>
				</td>
			</tr>
	</tbody>
</Table>
<?php wp_reset_postdata(); ?>
