<tr>
	<td>
		<div>
			<input class="check-box" type="checkbox" data-name="nombre_de_festejado" data-id="<?php echo $row->id; ?>" <?php if ( $row->nombre_de_festejado_bool ) { echo 'checked'; } ?>>
			<strong>
				<?php echo esc_attr( __( 'Nombre de festejada/do', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->nombre_de_festejado; ?>
	</td>
</tr>
<tr>
	<td>
		<div>
			<input class="check-box" type="checkbox" data-name="fecha_de_evento" data-id="<?php echo $row->id; ?>" <?php if ( $row->fecha_de_evento_bool ) { echo 'checked'; } ?>>
			<strong>
				<?php echo esc_attr( __( 'Fecha de evento', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->fecha_de_evento; ?>
	</td>
</tr>
<tr>
	<td>
		<div>
			<strong>
				<?php echo esc_attr( __( 'Fecha de cierre del formulario', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->fecha_de_cierre; ?>
	</td>
</tr>
<tr>
	<td>
		<div>
			<input class="check-box" type="checkbox" data-name="frase_de_bienvenida" data-id="<?php echo $row->id; ?>" <?php if ( $row->frase_de_bienvenida_bool ) { echo 'checked'; } ?>>
			<strong>
				<?php echo esc_attr( __( 'Frase de bienvenida', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->frase_de_bienvenida; ?>
	</td>
</tr>
<tr>
	<td>
		<div>
			<input class="check-box" type="checkbox" data-name="madre_del_festejado" data-id="<?php echo $row->id; ?>" <?php if ( $row->madre_del_festejado_bool ) { echo 'checked'; } ?>>
			<strong>
				<?php echo esc_attr( __( 'Madre de festejada/do', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->madre_del_festejado; ?>
	</td>
</tr>
<tr>
	<td>
		<div>
			<input class="check-box" type="checkbox" data-name="padre_del_festejado" data-id="<?php echo $row->id; ?>" <?php if ( $row->padre_del_festejado_bool ) { echo 'checked'; } ?>>
			<strong>
				<?php echo esc_attr( __( 'Padre de festejada/do', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->padre_del_festejado; ?>
	</td>
</tr>
<tr>
	<td>
		<div>
			<input class="check-box" type="checkbox" data-name="nombre_de_madrina" data-id="<?php echo $row->id; ?>" <?php if ( $row->nombre_de_madrina_bool ) { echo 'checked'; } ?>>
			<strong>
				<?php echo esc_attr( __( 'Madrina', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->nombre_de_madrina; ?>
	</td>
</tr>
<tr>
	<td>
		<div>
			<input class="check-box" type="checkbox" data-name="nombre_de_padrino" data-id="<?php echo $row->id; ?>" <?php if ( $row->nombre_de_padrino_bool ) { echo 'checked'; } ?>>
			<strong>
				<?php echo esc_attr( __( 'Padrino', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->nombre_de_padrino; ?>
	</td>
</tr>