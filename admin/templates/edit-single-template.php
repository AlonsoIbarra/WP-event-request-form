<?php
/**
 * Provide a admin-facing view for the plugin.
 *
 * @link  https://floralunar.com
 * @since 1.0.0
 *
 * @package includes
 */

if ( ! $row ) {
	return;
}
?>
<div id="loading-gif" style="display:none; position: fixed; width:5%; top: 50%; left: 50%; margin-right: -50%; transform: translate(-50%, -50%);">
	<img src="https://floralunar.com/wp-content/uploads/2023/02/loading-loading-forever.gif" style="width: 50%;">
</div>

<div class="wrap">
	<h1> <?php echo esc_html( get_admin_page_title() ); ?></h1>
</div>

<div class="wrap">
	<h1>
		<strong>
			<?php echo esc_attr( __( 'Edit', 'event-request-form' ) ); ?>
		</strong>
	</h1>
</div>
<form action="<?=$url?>" method="POST">
	<input type="hidden" name="save">
	<Table class="table" id='erf_single_viev_table'>
		<tbody>
			<tr>
				<td>
					<div>
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
							<strong>
								<?php echo esc_attr( __( 'Tipo de evento', 'event-request-form' ) ); ?>
							</strong>
							<?php echo esc_attr( $event_types[ $row->tipo_de_evento ] ); ?>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div>
							<strong>
								<?php echo esc_attr( __( 'Evento cerrado', 'event-request-form' ) ); ?>
							</strong>
							<?php echo ( $row->abierto_al_publico )?'Sí':'No'; ?>
						</div>
					</td>
				</tr>
				<?php
			$file_path = dirname( __FILE__ );
			$secondary_page_path = $file_path . '/partials/';
			$partial_path = $secondary_page_path . $row->tipo_de_evento . '.php';
			
			if ( file_exists( $partial_path ) ) {
				require_once( $partial_path );
			}
			?>
			<tr>
				<td>
					<div>
						<strong>
							<?php echo esc_attr( __( 'Nombre del lugar de ceremonia religiosa', 'event-request-form' ) ); ?>
						</strong>	
						<?php echo $row->nombre_de_ceremonia_religiosa; ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<strong>
							<?php echo esc_attr( __( 'Dirección de ceremonia religiosa', 'event-request-form' ) ); ?>
						</strong>	
						<?php echo $row->direccion_de_ceremonia_religiosa; ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<strong>
							<?php echo esc_attr( __( 'Hora de ceremonia religiosa', 'event-request-form' ) ); ?>
						</strong>	
						<?php echo $row->hora_de_ceremonia_religiosa; ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<strong>
							<?php echo esc_attr( __( 'Link de ceremonia religiosa', 'event-request-form' ) ); ?>
						</strong>
						<a href="<?php echo $row->link_de_google_maps_de_ceremonia_religiosa; ?>" target="_blank">
							<?php echo $row->link_de_google_maps_de_ceremonia_religiosa; ?>
						</a>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<strong>
							<?php echo esc_attr( __( 'Nombre del lugar de recepción', 'event-request-form' ) ); ?>
						</strong>	
						<?php echo $row->nombre_de_recepcion; ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<strong>
							<?php echo esc_attr( __( 'Dirección de recepción', 'event-request-form' ) ); ?>
						</strong>	
						<?php echo $row->direccion_de_recepcion; ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<strong>
							<?php echo esc_attr( __( 'Hora de recepción', 'event-request-form' ) ); ?>
						</strong>	
						<?php echo $row->hora_de_recepcion; ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<strong>
							<?php echo esc_attr( __( 'Link de google maps de recepción', 'event-request-form' ) ); ?>
						</strong>
						<a href="<?php echo $row->link_de_google_maps_de_recepcion; ?>" target="_blank">
							<?php echo $row->link_de_google_maps_de_recepcion; ?>
						</a>
					</div>
				</td>
			</tr>
			
			<tr>
				<td>
					<div>
						<strong>
							<?php echo esc_attr( __( 'Dirección de hotel', 'event-request-form' ) ); ?>
						</strong>	
						<?php echo $row->direccion_de_hotel; ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<strong>
							<?php echo esc_attr( __( 'Link de google maps de hotel', 'event-request-form' ) ); ?>
						</strong>
						<a href="<?php echo $row->link_de_google_maps_de_hotel; ?>" target="_blank">
							<?php echo $row->link_de_google_maps_de_hotel; ?>
						</a>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<strong>
							<?php echo esc_attr( __( 'Código de descuento de hotel', 'event-request-form' ) ); ?>
						</strong>	
						<?php echo $row->codigo_de_descuento_de_hotel; ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<strong>
							<?php echo esc_attr( __( 'Datos de hotel 2', 'event-request-form' ) ); ?>
						</strong>	
						<?php echo $row->datos_de_hotel_2; ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<strong>
							<?php echo esc_attr( __( 'Datos de hotel 3', 'event-request-form' ) ); ?>
						</strong>	
						<?php echo $row->datos_de_hotel_3; ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<strong>
							<?php echo esc_attr( __( 'Sugerencia de transporte', 'event-request-form' ) ); ?>
						</strong>	
						<?php echo $row->sugerencia_de_transporte; ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<strong>
							<?php echo esc_attr( __( 'Mesa de regalos', 'event-request-form' ) ); ?>
						</strong>	
						<?php echo $row->mesa_de_regalos; ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<strong>
							<?php echo esc_attr( __( 'Intinerario de evento', 'event-request-form' ) ); ?>
						</strong>	
						<?php echo $row->intinerario_de_evento; ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<strong>
							<?php echo esc_attr( __( 'Recomendaciones', 'event-request-form' ) ); ?>
						</strong>	
						<?php echo $row->recomendaciones; ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<strong>
							<?php echo esc_attr( __( 'Hashtag', 'event-request-form' ) ); ?>
						</strong>	
						<?php echo $row->hashtag; ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<strong>
							<?php echo esc_attr( __( 'Galeria de fotos', 'event-request-form' ) ); ?>
						</strong>	
						<?php echo $row->galeria_de_fotos; ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<strong>
							<?php echo esc_attr( __( 'Whatsapp de confirmación', 'event-request-form' ) ); ?>
						</strong>	
						<?php echo $row->whatsapp_I_de_confirmacion; ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<strong>
							<?php echo esc_attr( __( 'Correo electrónico I de confirmación', 'event-request-form' ) ); ?>
						</strong>	
						<?php echo $row->correo_I_de_confirmacion; ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<strong>
							<?php echo esc_attr( __( 'Correo electrónico II de confirmación', 'event-request-form' ) ); ?>
						</strong>	
						<?php echo $row->correo_II_de_confirmacion; ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<strong>
							<?php echo esc_attr( __( 'Personalización escrita', 'event-request-form' ) ); ?>
						</strong>	
						<?php echo $row->personalizacion_escrita; ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<strong>
							<?php echo esc_attr( __( 'Personalización gráfica', 'event-request-form' ) ); ?>
						</strong>	
						<?php echo $row->personalizacion_grafica; ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<strong>
							<?php echo esc_attr( __( 'Whatsapp de contacto', 'event-request-form' ) ); ?>
						</strong>	
						<?php echo $row->whatsapp_de_contacto; ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<strong>
							<?php echo esc_attr( __( 'Correo electrónico de contacto', 'event-request-form' ) ); ?>
						</strong>	
						<?php echo $row->correo_electronico_de_contacto; ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<strong>
							<?php echo esc_attr( __( 'Comentarios y sugerencias', 'event-request-form' ) ); ?>
						</strong>	
						<?php echo $row->comentarios_y_sugerencias; ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<strong>
							<?php echo esc_attr( __( 'Ropa formal', 'event-request-form' ) ); ?>
						</strong>	
						<?php echo ( $row->ropa_formal ) ? 'Sí' : 'No'; ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<strong>
							<?php echo esc_attr( __( 'No niños', 'event-request-form' ) ); ?>
						</strong>	
						<?php echo ( $row->no_ninos ) ? 'Sí' : 'No'; ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<strong>
							<?php echo esc_attr( __( 'Otra recomendación', 'event-request-form' ) ); ?>
						</strong>	
						<?php echo $row->recomendacion_otra; ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<strong>
							<?php echo esc_attr( __( 'Evento relacionado', 'event-request-form' ) ); ?>
						</strong>
						<select name="evl_evento_id">
							<option value="">Seleccione evento</option>
							<?php foreach ( $events as $event ) : ?>
								<option value="<?=$event->id?>" <?=selected($event->id, $row->evl_evento_id )?>><?=$event->name?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</td>
			</tr>
		</tbody>
	</Table>
	<input type="button" value="Cancelar" >
	<input type="submit" value="Guardar" >
</form>
	<?php wp_reset_postdata(); ?>
	