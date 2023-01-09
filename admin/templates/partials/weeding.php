<tr>
	<td>
		<?php $class_name = ( $row->nombre_de_novia_bool ) ? 'field-checked' : 'field-not-checked'; ?>
		<div id='nombre_de_novia' data-name="nombre_de_novia" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
			<strong>
				<?php echo esc_attr( __( 'Nombre de novia', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->nombre_de_novia; ?>
	</td>
</tr>
<tr>
	<td>
		<?php $class_name = ( $row->nombre_de_novio_bool ) ? 'field-checked' : 'field-not-checked'; ?>
		<div id='nombre_de_novio' data-name="nombre_de_novio" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
			<strong>
				<?php echo esc_attr( __( 'Nombre de novio', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->nombre_de_novio; ?>
	</td>
</tr>
<tr>
	<td>
		<?php $class_name = ( $row->fecha_de_evento_bool ) ? 'field-checked' : 'field-not-checked'; ?>
		<div id='fecha_de_evento' data-name="fecha_de_evento" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
			<strong>
				<?php echo esc_attr( __( 'Fecha de evento', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->fecha_de_evento; ?>
	</td>
</tr>
<tr>
	<td>
		<?php $class_name = ( $row->frase_de_bienvenida_bool ) ? 'field-checked' : 'field-not-checked'; ?>
		<div id='frase_de_bienvenida' data-name="frase_de_bienvenida" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
			<strong>
				<?php echo esc_attr( __( 'Frase de bienvenida', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->frase_de_bienvenida; ?>
	</td>
</tr>
<tr>
	<td>
		<?php $class_name = ( $row->madre_de_novia_bool ) ? 'field-checked' : 'field-not-checked'; ?>
		<div id='madre_de_novia' data-name="madre_de_novia" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
			<strong>
				<?php echo esc_attr( __( 'Madre de novia', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->madre_de_novia; ?>
	</td>
</tr>
<tr>
	<td>
		<?php $class_name = ( $row->padre_de_novia_bool ) ? 'field-checked' : 'field-not-checked'; ?>
		<div id='padre_de_novia' data-name="padre_de_novia" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
			<strong>
				<?php echo esc_attr( __( 'Padre de novia', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->padre_de_novia; ?>
	</td>
</tr>
<tr>
	<td>
		<?php $class_name = ( $row->madre_de_novio_bool ) ? 'field-checked' : 'field-not-checked'; ?>
		<div id='madre_de_novio' data-name="madre_de_novio" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
			<strong>
				<?php echo esc_attr( __( 'Madre del novio', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->madre_de_novio; ?>
	</td>
</tr>
<tr>
	<td>
		<?php $class_name = ( $row->padre_de_novio_bool ) ? 'field-checked' : 'field-not-checked'; ?>
		<div id='padre_de_novio' data-name="padre_de_novio" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
			<strong>
				<?php echo esc_attr( __( 'Madre del novio', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->padre_de_novio; ?>
	</td>
</tr>
<tr>
	<td>
		<?php $class_name = ( $row->nombre_de_madrina_de_arras_bool ) ? 'field-checked' : 'field-not-checked'; ?>
		<div id='nombre_de_madrina_de_arras' data-name="nombre_de_madrina_de_arras" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
			<strong>
				<?php echo esc_attr( __( 'Madrina de aras', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->nombre_de_madrina_de_arras; ?>
	</td>
</tr>
<tr>
	<td>
		<?php $class_name = ( $row->nombre_de_padrino_de_arras_bool ) ? 'field-checked' : 'field-not-checked'; ?>
		<div id='nombre_de_padrino_de_arras' data-name="nombre_de_padrino_de_arras" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
			<strong>
				<?php echo esc_attr( __( 'Padrino de aras', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->nombre_de_padrino_de_arras; ?>
	</td>
</tr>
<tr>
	<td>
		<?php $class_name = ( $row->nombre_de_madrina_de_lazo_bool ) ? 'field-checked' : 'field-not-checked'; ?>
		<div id='nombre_de_madrina_de_lazo' data-name="nombre_de_madrina_de_lazo" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
			<strong>
				<?php echo esc_attr( __( 'Madrina de lazo', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->nombre_de_madrina_de_lazo; ?>
	</td>
</tr>
<tr>
	<td>
		<?php $class_name = ( $row->nombre_de_padrino_de_lazo_bool ) ? 'field-checked' : 'field-not-checked'; ?>
		<div id='nombre_de_padrino_de_lazo' data-name="nombre_de_padrino_de_lazo" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
			<strong>
				<?php echo esc_attr( __( 'Padrino de lazo', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->nombre_de_padrino_de_lazo; ?>
	</td>
</tr>
<tr>
	<td>
		<?php $class_name = ( $row->nombre_de_madrina_de_anillos_bool ) ? 'field-checked' : 'field-not-checked'; ?>
		<div id='nombre_de_madrina_de_anillos' data-name="nombre_de_madrina_de_anillos" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
			<strong>
				<?php echo esc_attr( __( 'Madrina de anillos', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->nombre_de_madrina_de_anillos; ?>
	</td>
</tr>
<tr>
	<td>
		<?php $class_name = ( $row->nombre_de_padrino_de_anillos_bool ) ? 'field-checked' : 'field-not-checked'; ?>
		<div id='nombre_de_padrino_de_anillos' data-name="nombre_de_padrino_de_anillos" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
			<strong>
				<?php echo esc_attr( __( 'Padrino de anillos', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->nombre_de_padrino_de_anillos; ?>
	</td>
</tr>
<tr>
	<td>
		<?php $class_name = ( $row->nombre_de_madrina_de_velacion_bool ) ? 'field-checked' : 'field-not-checked'; ?>
		<div id='nombre_de_madrina_de_velacion' data-name="nombre_de_madrina_de_velacion" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
			<strong>
				<?php echo esc_attr( __( 'Madrina de velación', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->nombre_de_madrina_de_velacion; ?>
	</td>
</tr>
<tr>
	<td>
		<?php $class_name = ( $row->nombre_de_padrino_de_velacion_bool ) ? 'field-checked' : 'field-not-checked'; ?>
		<div id='nombre_de_padrino_de_velacion' data-name="nombre_de_padrino_de_velacion" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
			<strong>
				<?php echo esc_attr( __( 'Padrino de velación', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->nombre_de_padrino_de_velacion; ?>
	</td>
</tr>



