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
</div>
<Table class="table">
	<thead>
		<tr>
			<th>
				<?php echo esc_attr( __( 'Nombre del cliente', 'event-request-form' ) ); ?>
			</th>
			<th>
				<?php echo esc_attr( __( 'Tipo de evento', 'event-request-form' ) ); ?>
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
					<?php echo $row->nombre_del_cliente; ?>
				</td>
				<td>
					<?php echo $row->tipo_de_evento; ?>
				</td>
				<td>
					<a href="<?php echo $url . '&id=' . $row->id; ?>" target="_blank">
						<span class="dashicons dashicons-visibility"></span>
					</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</Table>
<?php wp_reset_postdata(); ?>
