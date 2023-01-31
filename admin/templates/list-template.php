<?php
/**
 * Provide a admin-facing view for the plugin.
 *
 * @link  https://https://fiesta.lezlynorman.com
 * @since 1.0.0
 *
 * @package includes
 */

$url = menu_page_url( 'request-detail-view', false );
$query = ( isset( $_GET['q'] ) ) ? $_GET['q'] : '';
?>
<?php if ( get_option( 'event_request_email_failure' ) ) : ?>
	<div class="notice notice-error is-dismissible cssfe-review">
		<div class="row cssfe-review-notice">
			<div class="col-md-11" style="margin: 0.5rem;">
				<h5>Al parecer hubo un error en el envio de correo electrónico.</h5>
				<p>Por favor revisa la configuración del envio de correos electronicos.</p>
			</div>
		</div>
	</div>
<?php endif; ?>
<div class="wrap">
	<h1> <?php echo esc_html( get_admin_page_title() ); ?></h1>
</div>

<div class="wrap">
	<h1>
		<strong>
			<?php echo esc_attr( __( 'Requests list', 'event-request-form' ) ); ?>
		</strong>
	</h1>
</div>
<div class="wrap">
	<div>
		<form action="<?=$_SERVER['PHP_SELF'];?>">
			<input type="hidden" name="page" value="event-requests-entries">
			<input type="text" name="q" value="<?php echo $query; ?>" >
			<input type="submit" value="Buscar">
		</form>
	</div>
	<div>
		<form action="<?=$_SERVER['PHP_SELF'];?>">
			<input type="hidden" type="text" name="download_xls" >
			<input type="hidden" name="q" value="<?php echo $query; ?>" >
			<input type="submit" value="Descargar XLS">
		</form>
	</div>
</div>

<div class="scrollable">
	<Table class="table">
		<thead>
			<tr>
				<th>
					<?php echo esc_attr( __( 'Nombre del cliente', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Tipo de formulario', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Tipo de evento', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Nombre de la novia', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Nombre del novio', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Nombre del festejado', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Fecha del evento', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Frase de bienvenida', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Madre de la novia', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Padre de la novia', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Madre del novio', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Padre del novio', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Madre del festejado', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Padre del festejado', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Nombre de la madrina', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Nombre del padrino', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Nombre de la madrina de arras', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Nombre del padrino de arras', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Nombre de la madrina de lazo', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Nombre del padrino de lazo', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Nombre de la madrina de anillos', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Nombre del padrino de anillos', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Nombre de la madrina de velación', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Nombre del padrino de velación', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Dirección de ceremonia religiosa', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Ciudad de ceremonia religiosa', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Estado de ceremonia religiosa', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Pais de ceremonia religiosa', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Codigo postal de ceremonia religiosa', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Hora de ceremonia religiosa', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Link de google_maps de ceremonia religiosa', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Direccion de recepción', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Ciudad de recepción', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Estado de recepción', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Pais de recepción', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Codigo postal de recepción', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Hora de recepción', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Link de google maps de recepción', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Mesa de regalos', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Intinerario de evento', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Recomendaciones', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Hashtag', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Galeria de fotos', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Whatsapp I de confirmación', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Whatsapp II de confirmación', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Personalizacion escrita', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Personalizacion grafica', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Whatsapp de contacto', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Correo electronico de contacto', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Comentarios y sugerencias', 'event-request-form' ) ); ?>
				</th>
				<th>
					<?php echo esc_attr( __( 'Options', 'event-request-form' ) ); ?>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ( $result as $row ) : ?>
				<?php $post_url = ''; ?>
				<tr>
					<td>
						<?php echo esc_attr( $row->nombre_del_cliente ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->tipo_de_formulario ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->tipo_de_evento ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->nombre_de_novia ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->nombre_de_novio ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->nombre_de_festejado ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->fecha_de_evento ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->frase_de_bienvenida ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->madre_de_novia ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->padre_de_novia ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->madre_de_novio ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->padre_de_novio ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->madre_del_festejado ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->padre_del_festejado ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->nombre_de_madrina ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->nombre_de_padrino ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->nombre_de_madrina_de_arras ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->nombre_de_padrino_de_arras ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->nombre_de_madrina_de_lazo ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->nombre_de_padrino_de_lazo ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->nombre_de_madrina_de_anillos ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->nombre_de_padrino_de_anillos ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->nombre_de_madrina_de_velacion ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->nombre_de_padrino_de_velacion ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->direccion_de_ceremonia_religiosa ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->ciudad_de_ceremonia_religiosa ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->estado_de_ceremonia_religiosa ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->pais_de_ceremonia_religiosa ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->codigo_postal_de_ceremonia_religiosa ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->hora_de_ceremonia_religiosa ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->link_de_google_maps_de_ceremonia_religiosa ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->direccion_de_recepcion ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->ciudad_de_recepcion ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->estado_de_recepcion ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->pais_de_recepcion ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->codigo_postal_de_recepcion ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->hora_de_recepcion ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->link_de_google_maps_de_recepcion ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->mesa_de_regalos ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->intinerario_de_evento ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->recomendaciones ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->hashtag ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->galeria_de_fotos ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->whatsapp_I_de_confirmacion ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->whatsapp_II_de_confirmacion ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->personalizacion_escrita ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->personalizacion_grafica ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->whatsapp_de_contacto ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->correo_electronico_de_contacto ); ?>
					</td>
					<td>
						<?php echo esc_attr( $row->comentarios_y_sugerencias ); ?>
					</td>
					<td>
						<div>
							<ul>
								<li>
									<a href="<?php echo $url . '&id=' . $row->id; ?>" target="_blank">
										<span class="dashicons dashicons-visibility"></span>
									</a>
								</li>
								<li>
									<a href="#">
										<span data-name="<?php echo $row->nombre_del_cliente; ?>" data-id="<?php echo $row->id; ?>" class="dashicons dashicons-trash event-request-remove-item"></span>
									</a>
								</li>
							</ul>
						</div>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</Table>
</div>

<div class="erf-separator"></div>
<Table class="table">
	<tbody>
		<tr>
			<th>
				<?php echo esc_attr( __( 'Total de registros', 'event-request-form' ) ); ?>
			</th>
			<td>
				<?php  echo count( $result ); ?>
			</td>
		</tr>
		<tr>
			<th>
				<?php echo esc_attr( __( 'Bodas', 'event-request-form' ) ); ?>
			</th>
			<td>
				<?php
				echo count(
					array_filter(
						$result,
						function ( $value ) {
							return $value->tipo_de_evento == 'weeding';
						}
					)
				);
				?>
			</td>
		</tr>
		<tr>
			<th>
				<?php echo esc_attr( __( 'XV años - Bautizo - 1ra. Comunión', 'event-request-form' ) ); ?>
			</th>
			<td>
				<?php
				echo count(
					array_filter(
						$result,
						function ( $value ) {
							return $value->tipo_de_evento == 'baptism_communion';
						}
					)
				);
				?>
			</td>
		</tr>
		<tr>
			<th>
				<?php echo esc_attr( __( 'Otro', 'event-request-form' ) ); ?>
			</th>
			<td>
				<?php
				echo count(
					array_filter(
						$result,
						function ( $value ) {
							return $value->tipo_de_evento == 'event_other';
						}
					)
				);
				?>
			</td>
		</tr>
		<tr>
			<th>
				<?php echo esc_attr( __( 'Oro', 'event-request-form' ) ); ?>
			</th>
			<td>
				<?php
				echo count(
					array_filter(
						$result,
						function ( $value ) {
							return $value->tipo_de_formulario == 'gold';
						}
					)
				);
				?>
			</td>
		</tr>
		<tr>
			<th>
				<?php echo esc_attr( __( 'Plata', 'event-request-form' ) ); ?>
			</th>
			<td>
				<?php
				echo count(
					array_filter(
						$result,
						function ( $value ) {
							return $value->tipo_de_formulario == 'silver';
						}
					)
				);
				?>
			</td>
		</tr>
		<tr>
			<th>
				<?php echo esc_attr( __( 'Bronce', 'event-request-form' ) ); ?>
			</th>
			<td>
				<?php
				echo count(
					array_filter(
						$result,
						function ( $value ) {
							return $value->tipo_de_formulario == 'bronze';
						}
					)
				);
				?>
			</td>
		</tr>
	</thead>
</Table>
<?php wp_reset_postdata(); ?>
