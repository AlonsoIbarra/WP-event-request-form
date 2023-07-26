<tr>
	<td>
		<div>
			<input class="check-box" type="checkbox" data-name="nombre_de_novia" data-id="<?php echo $row->id; ?>" <?php if ( $row->nombre_de_novia_bool ) { echo 'checked'; } ?>>
			<strong>
				<?php echo esc_attr( __( 'Nombre de novia', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->nombre_de_novia; ?>
	</td>
</tr>
<tr>
	<td>
		<div>
			<input class="check-box" type="checkbox" data-name="nombre_de_novio" data-id="<?php echo $row->id; ?>" <?php if ( $row->nombre_de_novio_bool ) { echo 'checked'; } ?>>
			<strong>
				<?php echo esc_attr( __( 'Nombre de novio', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->nombre_de_novio; ?>
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
			<input class="check-box" type="checkbox" data-name="madre_de_novia" data-id="<?php echo $row->id; ?>" <?php if ( $row->madre_de_novia_bool ) { echo 'checked'; } ?>>
			<strong>
				<?php echo esc_attr( __( 'Madre de novia', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->madre_de_novia; ?>
	</td>
</tr>
<tr>
	<td>
		<div>
			<input class="check-box" type="checkbox" data-name="padre_de_novia" data-id="<?php echo $row->id; ?>" <?php if ( $row->padre_de_novia_bool ) { echo 'checked'; } ?>>
			<strong>
				<?php echo esc_attr( __( 'Padre de novia', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->padre_de_novia; ?>
	</td>
</tr>
<tr>
	<td>
		<div>
			<input class="check-box" type="checkbox" data-name="madre_de_novio" data-id="<?php echo $row->id; ?>" <?php if ( $row->madre_de_novio_bool ) { echo 'checked'; } ?>>
			<strong>
				<?php echo esc_attr( __( 'Madre del novio', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->madre_de_novio; ?>
	</td>
</tr>
<tr>
	<td>
		<div>
			<input class="check-box" type="checkbox" data-name="padre_de_novio" data-id="<?php echo $row->id; ?>" <?php if ( $row->padre_de_novio_bool ) { echo 'checked'; } ?>>
			<strong>
				<?php echo esc_attr( __( 'Madre del novio', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->padre_de_novio; ?>
	</td>
</tr>
<tr>
	<td>
		<div>
			<input class="check-box" type="checkbox" data-name="nombre_de_madrina_de_arras" data-id="<?php echo $row->id; ?>" <?php if ( $row->nombre_de_madrina_de_arras_bool ) { echo 'checked'; } ?>>
			<strong>
				<?php echo esc_attr( __( 'Madrina de aras', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->nombre_de_madrina_de_arras; ?>
	</td>
</tr>
<tr>
	<td>
		<div>
			<input class="check-box" type="checkbox" data-name="nombre_de_padrino_de_arras" data-id="<?php echo $row->id; ?>" <?php if ( $row->nombre_de_padrino_de_arras_bool ) { echo 'checked'; } ?>>
			<strong>
				<?php echo esc_attr( __( 'Padrino de aras', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->nombre_de_padrino_de_arras; ?>
	</td>
</tr>
<tr>
	<td>
		<div>
			<input class="check-box" type="checkbox" data-name="nombre_de_madrina_de_lazo" data-id="<?php echo $row->id; ?>" <?php if ( $row->nombre_de_madrina_de_lazo_bool ) { echo 'checked'; } ?>>
			<strong>
				<?php echo esc_attr( __( 'Madrina de lazo', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->nombre_de_madrina_de_lazo; ?>
	</td>
</tr>
<tr>
	<td>
		<div>
			<input class="check-box" type="checkbox" data-name="nombre_de_padrino_de_lazo" data-id="<?php echo $row->id; ?>" <?php if ( $row->nombre_de_padrino_de_lazo_bool ) { echo 'checked'; } ?>>
			<strong>
				<?php echo esc_attr( __( 'Padrino de lazo', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->nombre_de_padrino_de_lazo; ?>
	</td>
</tr>
<tr>
	<td>
		<div>
			<input class="check-box" type="checkbox" data-name="nombre_de_madrina_de_anillos" data-id="<?php echo $row->id; ?>" <?php if ( $row->nombre_de_padrino_de_lazo_bool ) { echo 'checked'; } ?>>
			<strong>
				<?php echo esc_attr( __( 'Madrina de anillos', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->nombre_de_madrina_de_anillos; ?>
	</td>
</tr>
<tr>
	<td>
		<div>
			<input class="check-box" type="checkbox" data-name="nombre_de_padrino_de_anillos" data-id="<?php echo $row->id; ?>" <?php if ( $row->nombre_de_padrino_de_anillos_bool ) { echo 'checked'; } ?>>
			<strong>
				<?php echo esc_attr( __( 'Padrino de anillos', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->nombre_de_padrino_de_anillos; ?>
	</td>
</tr>
<tr>
	<td>
		<div>
			<input class="check-box" type="checkbox" data-name="nombre_de_madrina_de_velacion" data-id="<?php echo $row->id; ?>" <?php if ( $row->nombre_de_madrina_de_velacion_bool ) { echo 'checked'; } ?>>
			<strong>
				<?php echo esc_attr( __( 'Madrina de velación', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->nombre_de_madrina_de_velacion; ?>
	</td>
</tr>
<tr>
	<td>
		<div>
			<input class="check-box" type="checkbox" data-name="nombre_de_padrino_de_velacion" data-id="<?php echo $row->id; ?>" <?php if ( $row->nombre_de_padrino_de_velacion_bool ) { echo 'checked'; } ?>>
			<strong>
				<?php echo esc_attr( __( 'Padrino de velación', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->nombre_de_padrino_de_velacion; ?>
	</td>
</tr>



