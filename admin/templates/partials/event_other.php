<tr>
	<td>
		<?php $class_name = ( $row->nombre_de_festejado_bool ) ? 'field-checked' : 'field-not-checked'; ?>
		<div id='nombre_de_festejado' data-name="nombre_de_festejado" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
			<strong>
				<?php echo esc_attr( __( 'Nombre de festejada/do', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->nombre_de_festejado; ?>
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
		<?php $class_name = ( $row->madre_del_festejado_bool ) ? 'field-checked' : 'field-not-checked'; ?>
		<div id='madre_del_festejado' data-name="madre_del_festejado" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
			<strong>
				<?php echo esc_attr( __( 'Madre de festejada/do', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->madre_del_festejado; ?>
	</td>
</tr>
<tr>
	<td>
		<?php $class_name = ( $row->padre_del_festejado_bool ) ? 'field-checked' : 'field-not-checked'; ?>
		<div id='padre_del_festejado' data-name="padre_del_festejado" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
			<strong>
				<?php echo esc_attr( __( 'Padre de festejada/do', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->padre_del_festejado; ?>
	</td>
</tr>
<tr>
	<td>
		<?php $class_name = ( $row->nombre_de_madrina_bool ) ? 'field-checked' : 'field-not-checked'; ?>
		<div id='nombre_de_madrina' data-name="nombre_de_madrina" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
			<strong>
				<?php echo esc_attr( __( 'Madrina', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->nombre_de_madrina; ?>
	</td>
</tr>
<tr>
	<td>
		<?php $class_name = ( $row->nombre_de_padrino_bool ) ? 'field-checked' : 'field-not-checked'; ?>
		<div id='nombre_de_padrino' data-name="nombre_de_padrino" data-id="<?php echo $row->id; ?>" class="<?php echo $class_name; ?>">
			<strong>
				<?php echo esc_attr( __( 'Padrino', 'event-request-form' ) ); ?>
			</strong>	
		<?php echo $row->nombre_de_padrino; ?>
	</td>
</tr>