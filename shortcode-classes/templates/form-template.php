<?php
/**
 * Template for rendering HTML form.
 *
 * @link  https://https://fiesta.lezlynorman.com
 * @since 1.0.0
 *
 * @package includes
 */

?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
* {
	box-sizing: border-box;
}

body {
	background-color: #f1f1f1;
}

#regForm {
	background-color: #ffffff;
	margin: 100px auto;
	font-family: Raleway;
	padding: 40px;
	width: 70%;
	min-width: 300px;
}

h1 {
	text-align: center;	
}

input {
	padding: 10px;
	width: 100%;
	font-size: 17px;
	font-family: Raleway;
	border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
	background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
	display: none;
}

button {
	background-color: #04AA6D;
	color: #ffffff;
	border: none;
	padding: 10px 20px;
	font-size: 17px;
	font-family: Raleway;
	cursor: pointer;
}

button:hover {
	opacity: 0.8;
}

#prevBtn {
	background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
	height: 5px;
	width: 5px;
	margin: 0 2px;
	background-color: #bbbbbb;
	border: none;	
	border-radius: 50%;
	display: inline-block;
	opacity: 0.5;
}

.step.active {
	opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
	background-color: #04AA6D;
}
.erf-field-label{
	display: block;
	font-weight: 700;
	font-size: 16px;
	float: none;
	line-height: 1.3;
	margin: 0 0 4px 0;
	padding: 0;
	word-break: break-word;
	word-wrap: break-word;
}
.erf-required-label{
	color: red;
}
.erf-field-description{
	font-size: 13px;
	line-height: 1.3;
	margin: 8px 0 0 0;
	word-break: break-word;
	word-wrap: break-word;
}
.erf-image-choices-item{
	width: 40%;
	display: block;
	padding: 26px !important;
	margin: 2px;
	box-shadow: 0 0 20px 0 rgb(0 0 0 / 10%);
	float: left;
	text-align: center;
}
.erf-googlemap{
	width: 100%;
	height: 30rem;
	border: 2px solid grey;
	border-radius: 2rem;
}
/* if device has a touch screen */
@media (any-pointer: coarse) {
	.erf-image-choices-item {
		padding: 10px !important;
	}
}
.erf-separator{
	height: 0.5rem;
}
.erf-div-selected{
	border: 1px solid grey;
	background-color: #F7F7F7;
}
.erf-div-error{
	background-color: #FADBDB;
}
.tab input{
	color: #cd3636 !important;
}

.button-primary {

	display: inline-block;
	font-weight: 400;
	color: #c36 !important;
	text-align: center;
	white-space: nowrap;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
	background-color: transparent;
	border: 1px solid #c36;
	padding: 0.5rem 1rem;
	font-size: 1rem;
	border-radius: 3px;
	-webkit-transition: all .3s;
	-o-transition: all .3s;
	transition: all .3s;
	}
.button-primary:hover {
	color: #fff !important;
	background-color: #c36;
	text-decoration: none;
}
</style>
<?php if ( isset( $_GET['success'] ) ) : ?>
	<?php
	$url_updated = str_replace(
		'success',
		'',
		"http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"
	);
	if ( ! isset( $_GET['client'] ) ) {
		$nombre_del_cliente = '';
	} else {
		$nombre_del_cliente = ucfirst( $_GET['client'] );
	}
	?>
	<div style="text-align: center;">
		<h1>Muchas gracias por llenar este formulario! <?php echo $nombre_del_cliente; ?> te contactaré pronto para trabajar juntos!</h1>
		<h2>Si tienes algún inconveniente no dudes en escribirme a: hi@lezlynorman.com.</h2>
		<form action="<?php echo $url_updated; ?>">
			<input type="submit" value="Ir al formulario">
		</form>
	</div>
<?php else : ?>
	<form id="erf_request_form">
		<input type="hidden" name="tipo_de_formulario" id="tipo_de_formulario" value="<?php echo $tipo_de_formulario; ?>">
		<!-- One "tab" for each step in the form: -->
		<div class="tab">
			<label class="erf-field-label">
				Nombre del cliente
				<span class="erf-required-label">*</span>
			</label>
			<p><input placeholder="Nombre del cliente" class="erf-field-required" oninput="this.className = ''" name="nombre_del_cliente" id="nombre_del_cliente"></p>
			<div class="erf-field-description">Escribe tu nombre para ánotarlo en mi agenda de pedidos</div>
		</div>
		<div class="tab">
			<div>
			<label class="erf-field-label">
				¿Que tipo de evento se va a realizar?
				<span class="erf-required-label">*</span>
			</label>
			</div>
			<div class="" style="display: flex;">
					<div class="erf-image-choices-item erf-div-selected">
						<label>
							<span class="erf-image-choices-image">
								<img class="checked-choice" decoding="async" src="https://fiesta.lezlynorman.com/wp-content/uploads/2022/05/gallery9.jpg" alt="Boda" title="Boda">
							</span>
							<input type="radio" class="tipo_de_evento" name="tipo_de_evento" value="weeding" data-class="weeding" style="display: none;" checked/>
							<div class="erf-separator"></div>	
							<span>Boda</span>
						</label>
					</div>
					<div class="erf-image-choices-item">
						<label>
							<span class="erf-image-choices-image">
								<img decoding="async" src="https://fiesta.lezlynorman.com/wp-content/uploads/2022/12/de23b88e29579e376838c5175655273c-e1671554308852.jpg" alt="XV años - Bautizo - 1ra. Comunión" title="XV años - Bautizo - 1ra. Comunión">
							</span>
							<input type="radio" class="tipo_de_evento" name="tipo_de_evento" value="baptism_communion" data-class="baptism_communion" style="display: none;"/>
							<div class="erf-separator"></div>	
							<span>
								XV años - Bautizo - 1ra. Comunión
							</span>
						</label>
					</div>
					<div class="erf-image-choices-item">
						<label>
							<span class="erf-image-choices-image">
								<img decoding="async" src="https://fiesta.lezlynorman.com/wp-content/uploads/2022/12/e52eab94bc55444ef7978bae7abfbce4-e1671554182101.jpg" alt="Otro" title="Otro">
							</span>
							<input type="radio" class="tipo_de_evento" name="tipo_de_evento" value="event_other" data-class="event_other" style="display: none;"/>
							<div class="erf-separator"></div>	
							<span>
								Otro
							</span>
						</label>
					</div>
			</div>
		</div>
		<div class="tab">
			<label class="erf-field-label">
				¿A quien vamos a festejar?
			</label>
			<p class="weeding custom_field">
				<label for="nombre_de_novia">Nombre de la novia:</label>
				<span class="erf-required-label">*</span>
				<input class="erf-field-required" placeholder="Nombre de la novia" oninput="this.className = ''" name="nombre_de_novia" id='nombre_de_novia'>
			</p>
			<p class="weeding custom_field">
				<label for="nombre_de_novio">Nombre del novio:</label>
				<span class="erf-required-label">*</span>
				<input class="erf-field-required" placeholder="Nombre del novio" oninput="this.className = ''" name="nombre_de_novio" id='nombre_de_novio'>
			</p>
			<p class="baptism_communion event_other custom_field" style="display: none;">
				<label for="nombre_de_festejado">Nombre de la/del festejada/o:</label>
				<span class="erf-required-label">*</span>
				<input class="erf-field-required" placeholder="Nombre de la/del festejada/o" oninput="this.className = ''" name="nombre_de_festejado" id='nombre_de_festejado'>
			</p>
		</div>
		<div class="tab">
			<p>
				<label class="erf-field-label" for="nombre_de_festejado">Fecha del evento:</label>
				<input type="date" placeholder="Fecha del evento" oninput="this.className = ''" name="fecha_de_evento" id="fecha_de_evento">
			</p>
			<div>
			<div class="erf-field-description">¿Cuándo es la fecha de tu evento? </div>
			</div>
		</div>
		<div class="tab">
			<div style="display: flex;">
				<img decoding="async" loading="lazy" alt="" src="https://fiesta.lezlynorman.com/wp-content/uploads/2022/12/8e4b3ca9776edc4879fc500058c72c43-300x300.jpg" class="size-medium wp-image-3841 aligncenter" width="300" height="300" srcset="https://fiesta.lezlynorman.com/wp-content/uploads/2022/12/8e4b3ca9776edc4879fc500058c72c43-300x300.jpg 300w, https://fiesta.lezlynorman.com/wp-content/uploads/2022/12/8e4b3ca9776edc4879fc500058c72c43-150x150.jpg 150w, https://fiesta.lezlynorman.com/wp-content/uploads/2022/12/8e4b3ca9776edc4879fc500058c72c43-100x100.jpg 100w, https://fiesta.lezlynorman.com/wp-content/uploads/2022/12/8e4b3ca9776edc4879fc500058c72c43.jpg 564w" sizes="(max-width: 300px) 100vw, 300px">
			</div>
			<div class="erf-separator"></div>	
			<div>
				<label class="erf-field-label" for="frase_de_bienvenida">¡Dale a tus invitados una cálida bienvenida!</label>
				<p>
					<textarea placeholder="Frase de bienvenida" oninput="this.className = ''" name="frase_de_bienvenida" id="frase_de_bienvenida"></textarea>
				</p>
				<div class="erf-field-description">
					Escribe una frase inspiradora que te gustaría añadir en tu invitación
				</div>
			</div>
		</div>
		<?php if ( in_array( $tipo_de_formulario, array( 'gold', 'silver' ) ) ) : ?>
			<div class="tab">
				<p class="weeding custom_field">
					<label for="madre_de_novia">Madre de la novia:</label>
					<input placeholder="Madre de la novia" oninput="this.className = ''" name="madre_de_novia" id='madre_de_novia'>
				</p>
				<div class="erf-separator"></div>	
				<p class="weeding custom_field">
					<label for="padre_de_novia">Padre de la novia:</label>
					<input placeholder="Padre de la novia" oninput="this.className = ''" name="padre_de_novia" id='padre_de_novia'>
				</p>
				<div class="erf-separator"></div>	
				<p class="weeding custom_field">
					<label for="madre_de_novio">Madre del novio:</label>
					<input placeholder="Madre del novio" oninput="this.className = ''" name="madre_de_novio" id='madre_de_novio'>
				</p>
				<div class="erf-separator"></div>	
				<p class="weeding custom_field">
					<label for="padre_de_novio">Padre del novio:</label>
					<input placeholder="Padre del novio" oninput="this.className = ''" name="padre_de_novio" id='padre_de_novio'>
				</p>
				<p class="baptism_communion event_other custom_field" style="display: none;">
					<label for="madre_del_festejado">Madre de la/del festejada/o:</label>
					<input placeholder="Madre de la/del festejada/o" oninput="this.className = ''" name="madre_del_festejado" id='madre_del_festejado'>
				</p>
				<div class="erf-separator"></div>	
				<p class="baptism_communion event_other custom_field" style="display: none;">
					<label for="padre_del_festejado">Padre de la/del festejada/o:</label>
					<input placeholder="Padre de la/del festejada/o" oninput="this.className = ''" name="padre_del_festejado" id='padre_del_festejado'>
				</p>
			</div>
		<?php endif; ?>
		<?php if ( in_array( $tipo_de_formulario, array( 'gold' ) ) ) : ?>
			<div class="tab">
				<div>
				<div>
					<h4 class="erf-field-label" style="font-size: 20px; line-height: 28px;">Nombre de los padrinos</h4>
					<p style="margin: 0 0 20px 0;">Porque agradecemos a aquellas personas que nos apoyan para hacer realidad este grán evento.</p>
				</div>

				</div>
				<p class="weeding custom_field">
					<label for="nombre_de_madrina_de_arras">Nombre de madrina de aras:</label>
					<input placeholder="Nombre de madrina de aras" oninput="this.className = ''" name="nombre_de_madrina_de_arras" id='nombre_de_madrina_de_arras'>
				</p>
				<div class="erf-separator"></div>	
				<p class="weeding custom_field">
					<label for="nombre_de_padrino_de_arras">Nombre de padrino de aras:</label>
					<input placeholder="Nombre de padrino de aras" oninput="this.className = ''" name="nombre_de_padrino_de_arras" id='nombre_de_padrino_de_arras'>
				</p>
				<div class="erf-separator"></div>	
				<p class="weeding custom_field">
					<label for="nombre_de_madrina_de_lazo">Nombre de madrina de lazo:</label>
					<input placeholder="Nombre de madrina de lazo" oninput="this.className = ''" name="nombre_de_madrina_de_lazo" id='nombre_de_madrina_de_lazo'>
				</p>
				<div class="erf-separator"></div>	
				<p class="weeding custom_field">
					<label for="nombre_de_padrino_de_lazo">Nombre de padrino de lazo:</label>
					<input placeholder="Nombre de padrino de lazo" oninput="this.className = ''" name="nombre_de_padrino_de_lazo" id='nombre_de_padrino_de_lazo'>
				</p>
				<div class="erf-separator"></div>	
				<p class="weeding custom_field">
					<label for="nombre_de_madrina_de_anillos">Nombre de madrina de anillos:</label>
					<input placeholder="Nombre de madrina de anillos" oninput="this.className = ''" name="nombre_de_madrina_de_anillos" id='nombre_de_madrina_de_anillos'>
				</p>
				<div class="erf-separator"></div>	
				<p class="weeding custom_field">
					<label for="nombre_de_padrino_de_anillos">Nombre de padrino de anillos:</label>
					<input placeholder="Nombre de padrino de anillos" oninput="this.className = ''" name="nombre_de_padrino_de_anillos" id='nombre_de_padrino_de_anillos'>
				</p>
				<div class="erf-separator"></div>	
				<p class="weeding custom_field">
					<label for="nombre_de_madrina_de_velacion">Nombre de madrina de velación:</label>
					<input placeholder="Nombre de madrina de velación" oninput="this.className = ''" name="nombre_de_madrina_de_velacion" id='nombre_de_madrina_de_velacion'>
				</p>
				<div class="erf-separator"></div>	
				<p class="weeding custom_field">
					<label for="nombre_de_padrino_de_velacion">Nombre de padrino de velación:</label>
					<input placeholder="Nombre de padrino de velación" oninput="this.className = ''" name="nombre_de_padrino_de_velacion" id='nombre_de_padrino_de_velacion'>
				</p>
				<p class="baptism_communion event_other custom_field" style="display: none;">
					<label for="nombre_de_madrina">Nombre de la madrina:</label>
					<input placeholder="Nombre de la madrina" oninput="this.className = ''" name="nombre_de_madrina" id='nombre_de_madrina'>
				</p>
				<div class="erf-separator"></div>	
				<p class="baptism_communion event_other custom_field" style="display: none;">
					<label for="nombre_de_padrino">Nombre del padrino:</label>
					<input placeholder="Nombre del padrino" oninput="this.className = ''" name="nombre_de_padrino" id='nombre_de_padrino'>
				</p>
			</div>
		<?php endif; ?>
		<div class="tab">
			<div>
				<p>
					<img decoding="async" loading="lazy" alt="" src="https://fiesta.lezlynorman.com/wp-content/uploads/2022/12/7cc7ba914e5214d0ddefcd661bf6428f-e1671561859483-300x230.jpg" class="size-medium wp-image-3839 aligncenter" width="300" height="230" srcset="https://fiesta.lezlynorman.com/wp-content/uploads/2022/12/7cc7ba914e5214d0ddefcd661bf6428f-e1671561859483-300x230.jpg 300w, https://fiesta.lezlynorman.com/wp-content/uploads/2022/12/7cc7ba914e5214d0ddefcd661bf6428f-e1671561859483.jpg 563w" sizes="(max-width: 300px) 100vw, 300px">
				</p>
			</div>
			<div>
				<h4>Ceremonia religiosa</h4>
				<p>Selecciona en el mapa la ubicación donde se llevara a cabo la ceremonia o ingresa los datos manualmente.</p>
				<p>Si solo manejas una ubicación, omitir.</p>
			</div>
			<div style="text-align: center;">
				<div id="erf-map-church" class="erf-googlemap" ></div>
			</div>
			<div class="erf-separator"></div>	
			<p>
				<label for="direccion_de_ceremonia_religiosa">Dirección de ceremonia religiosa:</label>
				<input placeholder="Dirección de ceremonia religiosa" oninput="this.className = ''" name="direccion_de_ceremonia_religiosa" id='direccion_de_ceremonia_religiosa'>
			</p>
			<p>
				<label for="ciudad_de_ceremonia_religiosa">Ciudad de ceremonia religiosa:</label>
				<input placeholder="Ciudad de ceremonia religiosa" oninput="this.className = ''" name="ciudad_de_ceremonia_religiosa" id='ciudad_de_ceremonia_religiosa'>
			</p>
			<p>
				<label for="estado_de_ceremonia_religiosa">Estado de ceremonia religiosa:</label>
				<input placeholder="Estado de ceremonia religiosa" oninput="this.className = ''" name="estado_de_ceremonia_religiosa" id='estado_de_ceremonia_religiosa'>
			</p>
			<p>
				<label for="pais_de_ceremonia_religiosa">Pais de ceremonia religiosa:</label>
				<input placeholder="Pais de ceremonia religiosa" oninput="this.className = ''" name="pais_de_ceremonia_religiosa" id='pais_de_ceremonia_religiosa'>
			</p>
			<p>
				<label for="codigo_postal_de_ceremonia_religiosa">Código postal de ceremonia religiosa:</label>
				<input placeholder="Código postal de ceremonia religiosa" oninput="this.className = ''" name="codigo_postal_de_ceremonia_religiosa" id='codigo_postal_de_ceremonia_religiosa'>
			</p>
			<div>
				<a class="find-address button-primary" value="" data-type="church">Ubicar en el mapa</a>
			</div>
			<p>
				<label for="hora_de_ceremonia_religiosa">Hora de ceremonia religiosa:</label>
				<input type="time" placeholder="Hora de ceremonia religiosa" oninput="this.className = ''" name="hora_de_ceremonia_religiosa" id='hora_de_ceremonia_religiosa'>
			</p>
			<p>
				<label for="link_de_google_maps_de_ceremonia_religiosa">Link de google maps de ceremonia religiosa:</label>
				<input placeholder="Link de google maps de ceremonia religiosa" oninput="this.className = ''" name="link_de_google_maps_de_ceremonia_religiosa" id='link_de_google_maps_de_ceremonia_religiosa'>
			</p>
		</div>
		<div class="tab">
			<div>
				<p>
					<img decoding="async" loading="lazy" alt="" src="https://fiesta.lezlynorman.com/wp-content/uploads/2022/12/7532d187d8a17fc549b702ce4a7230d5-200x300.jpg" class="size-medium wp-image-3840 aligncenter" width="200" height="300" srcset="https://fiesta.lezlynorman.com/wp-content/uploads/2022/12/7532d187d8a17fc549b702ce4a7230d5-200x300.jpg 200w, https://fiesta.lezlynorman.com/wp-content/uploads/2022/12/7532d187d8a17fc549b702ce4a7230d5.jpg 564w" sizes="(max-width: 200px) 100vw, 200px">
				</p>
			</div>
			<div>
				<h4>Recepción</h4>
				<p>Selecciona en el mapa la ubicación donde se llevara a cabo la recepción o ingresa los datos manualmente.</p>
			</div>
			<div style="text-align: center;">
				<div id="erf-map-reception" class="erf-googlemap" ></div>
			</div>
			<div class="erf-separator"></div>	
			<p>
				<label for="direccion_de_recepcion">Dirección de recepción:</label>
				<input class="erf-field-required" placeholder="Dirección de recepción" oninput="this.className = ''" name="direccion_de_recepcion" id='direccion_de_recepcion'>
			</p>
			<p>
				<label for="ciudad_de_recepcion">Ciudad de recepción:</label>
				<input class="erf-field-required" placeholder="Ciudad de recepción" oninput="this.className = ''" name="ciudad_de_recepcion" id='ciudad_de_recepcion'>
			</p>
			<p>
				<label for="estado_de_recepcion">Estado de recepción:</label>
				<input class="erf-field-required" placeholder="Estado de recepción" oninput="this.className = ''" name="estado_de_recepcion" id='estado_de_recepcion'>
			</p>
			<p>
				<label for="pais_de_recepcion">Pais de recepción:</label>
				<input class="erf-field-required" placeholder="Pais de recepción" oninput="this.className = ''" name="pais_de_recepcion" id='pais_de_recepcion'>
			</p>
			<p>
				<label for="codigo_postal_de_recepcion">Código postal de recepción:</label>
				<input class="erf-field-required" placeholder="Código postal de recepción" oninput="this.className = ''" name="codigo_postal_de_recepcion" id='codigo_postal_de_recepcion'>
			</p>
			<div>
				<a class="find-address button-primary" value="" data-type="reception">Ubicar en el mapa</a>
			</div>
			<p>
				<label for="hora_de_recepcion">Hora de recepción:</label>
				<input class="erf-field-required" type="time" placeholder="Hora de recepción" oninput="this.className = ''" name="hora_de_recepcion" id='hora_de_recepcion'>
			</p>
			<p>
				<label for="link_de_google_maps_de_recepcion">Link de google maps de recepción:</label>
				<input placeholder="Link de google maps de recepción" oninput="this.className = ''" name="link_de_google_maps_de_recepcion" id='link_de_google_maps_de_recepcion'>
			</p>
		</div>
		<?php if ( in_array( $tipo_de_formulario, array( 'gold', 'silver' ) ) ) : ?>
			<div class="tab">
				<div>
					<p>
					<img decoding="async" loading="lazy" alt="" src="https://fiesta.lezlynorman.com/wp-content/uploads/2022/12/regalo_boda-221x300.jpg" class="size-medium wp-image-3838 aligncenter" width="221" height="300">
					</p>
				</div>
				<div class="erf-field-description">Mesa de regalos</div>
				<p>
					<textarea oninput="this.className = ''" name="mesa_de_regalos" id='mesa_de_regalos'></textarea>
				</p>
				<div class="erf-field-description">
					Te recomendamos añadir tu id de Liverpool, Sears o de la tienda que hayas seleccionado, clabe / datos para depositar y tus propias recomendaciones. (omitir si no aplica)

				</div>
			</div>
		<?php endif; ?>
		<?php if ( in_array( $tipo_de_formulario, array( 'gold' ) ) ) : ?>
			<div class="tab">
				<p>
					<label class="erf-field-label" for="intinerario_de_evento">Intinerario de evento:</label>
					<textarea oninput="this.className = ''" name="intinerario_de_evento" id='intinerario_de_evento'></textarea>
				</p>
				<div class="erf-field-description">
					Te recomendamos añadir hora y descripción (omitir si no aplica)

				</div>
			</div>
		<?php endif; ?>
		<?php if ( in_array( $tipo_de_formulario, array( 'silver', 'gold' ) ) ) : ?>
			<div class="tab">
				<?php if ( in_array( $tipo_de_formulario, array( 'silver' ) ) ) : ?>
					<p>
						<label class="erf-field-label" for="recomendaciones">Recomendaciones generales:</label>
						<textarea oninput="this.className = ''" name="recomendaciones" id='recomendaciones'></textarea>
						<div class="erf-field-description">
							Añade cualquier indicación que gustas que aparezca en tu invitación(tipo de vestimenta, cuidados de salud etc). Omitir si no aplica
						</div>
					</p>
				<?php endif; ?>
				<?php if ( in_array( $tipo_de_formulario, array( 'silver', 'gold' ) ) ) : ?>
					<p>
						<label class="erf-field-label" for="hashtag">#Hashtag:</label>
						<input placeholder="Hastag" oninput="this.className = ''" name="hashtag" id='hashtag'>
						<div class="erf-field-description">
							Si quieres crear una galería en Instagram para tu web, crea un hashtag. Omitir si no aplica.
						</div>
					</p>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<div class="tab">
			<label class="erf-field-label" for="galeria_de_fotos">Galeria de fotos:</label>
			<p>
				Sube las fotografías en <a rel="noopener" target="_blank" href="https://wetransfer.com/">https://wetransfer.com/</a> o en cualquier almacenamiento en la nube de tu preferencia y comparte la liga en el siguiente campo:
			</p>
			<p>
				Subir fotos
			</p>
			<input placeholder="Link de galeria de fotos" oninput="this.className = ''" name="galeria_de_fotos" id='galeria_de_fotos'>
			<div class="erf-field-description">
				Sube las fotos que mas te gusten para que aparezcan en tu invitación (mínimo 4 máximo 15).
			</div>
		</div>
		<div class="tab">
			<label class="erf-field-label">
				Confirmación de invitados
			</label>
			<p>
				¿A que número de whatsapp tus invitados pueden confirmar?<br>
				Si son pareja puedes agregar mas de uno, si no aplica omitir campo.
			</p>
			<p>
				<label for="whatsapp_I_de_confirmacion">Whatsapp:</label>
				<input placeholder="Whatsapp de confirmación" oninput="this.className = ''" name="whatsapp_I_de_confirmacion" id='whatsapp_I_de_confirmacion'>
			</p>
			<p>
				<label for="whatsapp_II_de_confirmacion">Whatsapp II:</label>
				<input placeholder="Whatsapp de confirmación II" oninput="this.className = ''" name="whatsapp_II_de_confirmacion" id='whatsapp_II_de_confirmacion'>
			</p>
		</div>
		<div class="tab">
			<h4>Diseño y personalización</h4>
			<p>Añade los colores, elementos o estilos que te gustarían ver en tu invitación.</p>
			<p>Si tienes ejemplos visuales no olvides en compartirlos subiendolos a: <a href="https://wetransfer.com/">https://wetransfer.com/</a></p>
			<p>
				<label for="personalizacion_escrita">Descripción escrita:</label>
				<textarea oninput="this.className = ''" name="personalizacion_escrita" id='personalizacion_escrita'></textarea>
				<div class="erf-field-description">
					Describeme que colores estilos o tipo de letra te gustaría!
				</div>
			</p>
			<p>
				<label for="personalizacion_grafica">Descripción gráfica:</label>
				<input placeholder="Descripción gráfica" oninput="this.className = ''" name="personalizacion_grafica" id='personalizacion_grafica'>
				<div class="erf-field-description">
					Tienes ejemplos visuales como fotos, diseños o imágenes que quieres usar como referencia? subelas en tu liga de wetransfer.
				</div>
			</p>
		</div>
		<div class="tab">
			<h4>¿Porque medio me puedo contactar contigo para entregarte y aclarar detalles para la creación de tu invitación?</h4>
			<div class="" style="display: flex;">
				<div class="erf-image-choices-item erf-contact-choices-option" data-id="whatsapp-contact-container">
					<label>
						<span>
							<img class="checked-choice" decoding="async" src="https://fiesta.lezlynorman.com/wp-content/uploads/2022/12/124034.png" alt="Whatsapp" title="Whatsapp">
						</span>
						<div class="erf-separator"></div>	
						<span>Whatsapp</span>
					</label>
				</div>
				<div class="erf-image-choices-item erf-contact-choices-option" data-id="email-contact-container">
					<label>
						<span>
							<img decoding="async" src="https://fiesta.lezlynorman.com/wp-content/uploads/2022/12/3158180.png" alt="Correo Eléctronico" title="Correo Eléctronico">
						</span>
						<div class="erf-separator"></div>	
						<span>
							Correo Eléctronico
						</span>
					</label>
				</div>
			</div>
			<div class="erf-separator"></div>	
			<div>
				<p id='whatsapp-contact-container' style="display: none;">
					<label>
						Escribe tu número de Whatsapp
					</label>
					<input placeholder="Whatsapp de contacto" oninput="this.className = ''" name="whatsapp_de_contacto" id='whatsapp_de_contacto'/>
				</p>
			</div>
			<div>
				<p id='email-contact-container' style="display: none;">
					<label>Escribre tu correo eléctronico</label>
					<input placeholder="Correo electrónico de contacto" oninput="this.className = ''" name="correo_electronico_de_contacto" id='correo_electronico_de_contacto'/>
				</p>
			</div>
			<div class="erf-field-description">
				En cuando reciba la informacón, me pondre en contacto contigo
			</div>
		</div>
		<div class="tab">
			<p>
				<label class="erf-field-label" for="comentarios_y_sugerencias">Comentarios y sugerencias:</label>
				<textarea oninput="this.className = ''" name="comentarios_y_sugerencias" id='comentarios_y_sugerencias'></textarea>
				<div class="erf-field-description">
					Siente libre de escribir en este campo cualquier cosa que quieras añadir y que no estuvo en este formulario.
				</div>
			</p>
		</div>
		<div style="overflow:auto; margin: 1%;">
			<div style="text-align: center;">
				<button type="button" id="prevBtn" onclick="nextPrev(-1)">Anterior</button>
				<button type="button" id="nextBtn" onclick="nextPrev(1)">Siguiente</button>
			</div>
		</div>
		<!-- Circles which indicates the steps of the form: -->
		<div style="text-align:center;margin-top:20px;">
		<span class="step"></span>
		<span class="step"></span>
		<span class="step"></span>
		<span class="step"></span>
		<span class="step"></span>
		<span class="step"></span>
		<span class="step"></span>
		<span class="step"></span>
		<span class="step"></span>
		<span class="step"></span>
		<span class="step"></span>
		<span class="step"></span>
		<span class="step"></span>
		<span class="step"></span>
		<span class="step"></span>
		<span class="step"></span>
		<span class="step"></span>
		</div>
	</form>
	<script>
		let map_church;
		let marker_church;
		let geocoder_church;
		let map_reception;
		let marker_reception;
		let geocoder_reception;
		function initMap(){

			map_church = new google.maps.Map(document.getElementById("erf-map-church"), {
				zoom: 5,
				center: {
					lat: 22.7493334,
					lng: -102.5415697
				},
				mapTypeControl: false,
			});
			geocoder_church = new google.maps.Geocoder();
			marker_church = new google.maps.Marker({
				map_church,
			});
			map_church.addListener("click", (e) => {
				geocode(
					{ location: e.latLng },
					map_church,
					marker_church,
					geocoder_church
				);
			});
			clear(marker_church);

			// *********
			map_reception = new google.maps.Map(document.getElementById("erf-map-reception"), {
				zoom: 5,
				center: {
					lat: 22.7493334,
					lng: -102.5415697
				},
				mapTypeControl: false,
			});
			geocoder_reception = new google.maps.Geocoder();
			marker_reception = new google.maps.Marker({
				map_reception,
			});
			map_reception.addListener("click", (e) => {
				geocode(
					{ location: e.latLng },
					map_reception,
					marker_reception,
					geocoder_reception
				);
			});
			clear(marker_reception);

			

		}

		function clear(marker_reference) {
			marker_reference.setMap(null);
		}

		function geocode(request, map_reference, marker_reference, geocoder_reference, update_inputs=true) {
			clear(marker_reference);
			geocoder_reference
				.geocode(request)
				.then((result) => {
					const { results } = result;

					map_reference.setCenter(results[0].geometry.location);
					marker_reference.setPosition(results[0].geometry.location);
					marker_reference.setMap(map_reference);
					if (!update_inputs){
						return false;
					}
					var calle         = result.results[0].address_components.filter(function(item) { return item.types.includes("route"); });
					var numero        = result.results[0].address_components.filter(function(item) { return item.types.includes("street_number"); });
					var colonia       = result.results[0].address_components.filter(function(item) { return item.types.includes("sublocality"); });
					var ciudad        = result.results[0].address_components.filter(function(item) { return item.types.includes("locality"); });
					var estado        = result.results[0].address_components.filter(function(item) { return item.types.includes("administrative_area_level_1"); });
					var pais          = result.results[0].address_components.filter(function(item) { return item.types.includes("country"); });
					var codigo_postal = result.results[0].address_components.filter(function(item) { return item.types.includes("postal_code"); });
					var place_id      = result.results[0].place_id;

					if(jQuery("#direccion_de_ceremonia_religiosa").is(":visible")){
						try {
							jQuery('#direccion_de_ceremonia_religiosa').val(
								[
									calle[0].long_name,
									numero[0].long_name,
									colonia[0].long_name
								].join(' ')
							);						
						} catch (error) {
							jQuery('#direccion_de_ceremonia_religiosa').val('');
						}

						try {
							jQuery('#ciudad_de_ceremonia_religiosa').val( ciudad[0].long_name  );						
						} catch (error) {
							jQuery('#ciudad_de_ceremonia_religiosa').val('');						
						}

						try {
							jQuery('#estado_de_ceremonia_religiosa').val( estado[0].long_name );						
						} catch (error) {
							jQuery('#estado_de_ceremonia_religiosa').val('');
						}

						try{
							jQuery('#pais_de_ceremonia_religiosa').val( pais[0].long_name );
						} catch (error) {
							jQuery('#pais_de_ceremonia_religiosa').val('');
						}

						try {
							jQuery('#codigo_postal_de_ceremonia_religiosa').val( codigo_postal[0].long_name );
						} catch (error) {
							jQuery('#codigo_postal_de_ceremonia_religiosa').val('');
						}

						try {
							jQuery('#link_de_google_maps_de_ceremonia_religiosa').val( 'https://search.google.com/local/writereview?placeid=' + place_id );
						} catch (error) {
							jQuery('#link_de_google_maps_de_ceremonia_religiosa').val('');
						}
					}
					if(jQuery("#direccion_de_recepcion").is(":visible")){
						try {
							jQuery('#direccion_de_recepcion').val(
								[
									calle[0].long_name,
									numero[0].long_name,
									colonia[0].long_name
								].join(' ')
							);
						} catch (error) {
							jQuery('#direccion_de_recepcion').val('');
						}

						try {
							jQuery('#ciudad_de_recepcion').val( ciudad[0].long_name  );
						} catch (error) {
							jQuery('#ciudad_de_recepcion').val('');
						}

						try {
							jQuery('#estado_de_recepcion').val( estado[0].long_name );
						} catch (error) {
							jQuery('#estado_de_recepcion').val('');
						}

						try {
							jQuery('#pais_de_recepcion').val( pais[0].long_name );
						} catch (error) {
							jQuery('#pais_de_recepcion').val('');
						}

						try {
							jQuery('#codigo_postal_de_recepcion').val( codigo_postal[0].long_name );
						} catch (error) {
							jQuery('#codigo_postal_de_recepcion').val('');
						}

						try {
							jQuery('#link_de_google_maps_de_recepcion').val( 'https://search.google.com/local/writereview?placeid=' + place_id );
						} catch (error) {
							jQuery('#link_de_google_maps_de_recepcion').val('');
						}
					}
					return results;
					})
				.catch((e) => {
					alert("Geocode no fue exitoso debido a: " + e);
				}
			);
		}
		function mark_on_map(data_type){
			if (data_type=='church'){
				var address = jQuery('#direccion_de_ceremonia_religiosa').val()+' '+
					jQuery('#ciudad_de_ceremonia_religiosa').val()+' '+
					jQuery('#estado_de_ceremonia_religiosa').val()+' '+
					jQuery('#pais_de_ceremonia_religiosa').val()+' CP '+
					jQuery('#codigo_postal_de_ceremonia_religiosa').val();
				console.log(address);
				geocode(
					{ address: address },
					map_church,
					marker_church,
					geocoder_church,
					false
				);
			}
			if (data_type=='reception'){
				var address = jQuery('#direccion_de_recepcion').val()+' '+
					jQuery('#ciudad_de_recepcion').val()+' '+
					jQuery('#estado_de_recepcion').val()+' '+
					jQuery('#pais_de_recepcion').val()+' CP '+
					jQuery('#codigo_postal_de_recepcion').val();
				console.log(address);
				geocode(
					{ address: address },
					map_reception,
					marker_reception,
					geocoder_reception,
					false
				);
			}
		}
		jQuery(document).ready(function() {

			initMap();

			jQuery('.find-address').on('click', function(event){
				let data_type = jQuery(this).data('type');
				mark_on_map(data_type);
			});


			jQuery('.erf-contact-choices-option').on('click', function(event){
				jQuery('.erf-contact-choices-option').each(function(index, element){
					jQuery(element).removeClass("erf-div-selected");
					jQuery(element).removeClass("erf-div-error");
				});
				jQuery(this).addClass('erf-div-selected');
				let container_id = jQuery(this).data('id');
				jQuery('#whatsapp-contact-container').css('display','none');
				jQuery('#email-contact-container').css('display','none');
				jQuery('#whatsapp-contact-container :input').val('');
				jQuery('#email-contact-container :input').val('');
				jQuery('#'+container_id).css('display','block');
			});

			jQuery('.erf-image-choices-item').on('click', function(event){
				jQuery('.erf-image-choices-item').each(function(index, element){
					jQuery(element).removeClass("erf-div-selected");
					jQuery(element).removeClass("erf-div-error");
				});
				jQuery(this).addClass("erf-div-selected");	
			});

			jQuery('.tipo_de_evento').on('change', function(event){
				jQuery('.custom_field').each(function(index, element){
					jQuery(element).css('display', 'none');
				});

				let class_name = jQuery(this).data('class');
				jQuery('.' + class_name).each(function(index, element) {
					jQuery(element).css('display', 'block');
				});
			});
		});
	</script>
	<script>
		var currentTab = 0;
		showTab(currentTab); // Display the current tab

	function showTab(n) {
		// This function will display the specified tab of the form...
		var x = document.getElementsByClassName("tab");
		x[n].style.display = "block";
		//... and fix the Previous/Next buttons:
		if (n == 0) {
		document.getElementById("prevBtn").style.display = "none";
		} else {
		document.getElementById("prevBtn").style.display = "inline";
		}
		if (n == (x.length - 1)) {
		document.getElementById("nextBtn").innerHTML = "Enviar";
		} else {
		document.getElementById("nextBtn").innerHTML = "Siguiente";
		}
		//... and run a function that will display the correct step indicator:
		fixStepIndicator(n)
	}

	function nextPrev(n) {
		// This function will figure out which tab to display
		var x = document.getElementsByClassName("tab");
		// Exit the function if any field in the current tab is invalid:
		if (n == 1 && !validateForm()) return false;
		// Hide the current tab:
		x[currentTab].style.display = "none";
		// Increase or decrease the current tab by 1:
		currentTab = currentTab + n;
		// if you have reached the end of the form...
		if (currentTab >= x.length) {
			// ... the form gets submitted:
			jQuery.ajax({
				type: "POST",
				url: EventRequestFormRequests.url,
				data: {
					key: EventRequestFormRequests.key,
					action: 'erf_send_form_data',
					tipo_de_formulario: jQuery('#tipo_de_formulario').val(),
					nombre_del_cliente: jQuery('#nombre_del_cliente').val(),
					tipo_de_evento: jQuery('input[name=tipo_de_evento]:checked').val(),
					nombre_de_novia: jQuery('#nombre_de_novia').val(),
					nombre_de_novio: jQuery('#nombre_de_novio').val(),
					nombre_de_festejado: jQuery('#nombre_de_festejado').val(),
					fecha_de_evento: jQuery('#fecha_de_evento').val(),
					frase_de_bienvenida: jQuery('#frase_de_bienvenida').val(),
					madre_de_novia: jQuery('#madre_de_novia').val(),
					padre_de_novia: jQuery('#padre_de_novia').val(),
					madre_de_novio: jQuery('#madre_de_novio').val(),
					padre_de_novio: jQuery('#padre_de_novio').val(),
					madre_del_festejado: jQuery('#madre_del_festejado').val(),
					padre_del_festejado: jQuery('#padre_del_festejado').val(),
					nombre_de_madrina: jQuery('#nombre_de_madrina').val(),
					nombre_de_padrino: jQuery('#nombre_de_padrino').val(),
					nombre_de_madrina_de_arras: jQuery('#nombre_de_madrina_de_arras').val(),
					nombre_de_padrino_de_arras: jQuery('#nombre_de_padrino_de_arras').val(),
					nombre_de_madrina_de_lazo: jQuery('#nombre_de_madrina_de_lazo').val(),
					nombre_de_padrino_de_lazo: jQuery('#nombre_de_padrino_de_lazo').val(),
					nombre_de_madrina_de_anillos: jQuery('#nombre_de_madrina_de_anillos').val(),
					nombre_de_padrino_de_anillos: jQuery('#nombre_de_padrino_de_anillos').val(),
					nombre_de_madrina_de_velacion: jQuery('#nombre_de_madrina_de_velacion').val(),
					nombre_de_padrino_de_velacion: jQuery('#nombre_de_padrino_de_velacion').val(),
					direccion_de_ceremonia_religiosa: jQuery('#direccion_de_ceremonia_religiosa').val(),
					ciudad_de_ceremonia_religiosa: jQuery('#ciudad_de_ceremonia_religiosa').val(),
					estado_de_ceremonia_religiosa: jQuery('#estado_de_ceremonia_religiosa').val(),
					pais_de_ceremonia_religiosa: jQuery('#pais_de_ceremonia_religiosa').val(),
					codigo_postal_de_ceremonia_religiosa: jQuery('#codigo_postal_de_ceremonia_religiosa').val(),
					hora_de_ceremonia_religiosa: jQuery('#hora_de_ceremonia_religiosa').val(),
					link_de_google_maps_de_ceremonia_religiosa: jQuery('#link_de_google_maps_de_ceremonia_religiosa').val(),
					direccion_de_recepcion: jQuery('#direccion_de_recepcion').val(),
					ciudad_de_recepcion: jQuery('#ciudad_de_recepcion').val(),
					estado_de_recepcion: jQuery('#estado_de_recepcion').val(),
					pais_de_recepcion: jQuery('#pais_de_recepcion').val(),
					codigo_postal_de_recepcion: jQuery('#codigo_postal_de_recepcion').val(),
					hora_de_recepcion: jQuery('#hora_de_recepcion').val(),
					link_de_google_maps_de_recepcion: jQuery('#link_de_google_maps_de_recepcion').val(),
					mesa_de_regalos: jQuery('#mesa_de_regalos').val(),
					intinerario_de_evento: jQuery('#intinerario_de_evento').val(),
					recomendaciones: jQuery('#recomendaciones').val(),
					hashtag: jQuery('#hashtag').val(),
					galeria_de_fotos: jQuery('#galeria_de_fotos').val(),
					whatsapp_I_de_confirmacion: jQuery('#whatsapp_I_de_confirmacion').val(),
					whatsapp_II_de_confirmacion: jQuery('#whatsapp_II_de_confirmacion').val(),
					personalizacion_escrita: jQuery('#personalizacion_escrita').val(),
					personalizacion_grafica: jQuery('#personalizacion_grafica').val(),
					whatsapp_de_contacto: jQuery('#whatsapp_de_contacto').val(),
					correo_electronico_de_contacto: jQuery('#correo_electronico_de_contacto').val(),
					comentarios_y_sugerencias: jQuery('#comentarios_y_sugerencias').val(),
				},
				success: function(response){
					var url = new URL(window.location.href);
					url.searchParams.set('success','');
					url.searchParams.set('client',jQuery('#nombre_del_cliente').val());
					window.location.href = url.href;
				}
			});
			return false;
		}
		// Otherwise, display the correct tab:
		showTab(currentTab);
	}

	function validateForm() {
		// This function deals with validation of the form fields
		var x, y, i, valid = true;
		x = document.getElementsByClassName("tab");
		y = x[currentTab].getElementsByClassName("erf-field-required");
		// A loop that checks every input field in the current tab:
		for (i = 0; i < y.length; i++) {
		// If a field is empty...
		let paragraph = y[i].closest('p');
		if (y[i].value == "" && ! isHidden(paragraph)) {
			// add an "invalid" class to the field:
			y[i].className += " invalid";
			// and set the current valid status to false
			valid = false;
			// valid = true;
		}
		}
		// If the valid status is true, mark the step as finished and valid:
		if (valid) {
		document.getElementsByClassName("step")[currentTab].className += " finish";
		}
		return valid; // return the valid status
	}

	// Where el is the DOM element you'd like to test for visibility
	function isHidden(el) {
		var style = window.getComputedStyle(el);
		return (style.display === 'none')
	}

	function fixStepIndicator(n) {
		// This function removes the "active" class of all steps...
		var i, x = document.getElementsByClassName("step");
		for (i = 0; i < x.length; i++) {
		x[i].className = x[i].className.replace(" active", "");
		}
		//... and adds the "active" class on the current step:
		x[n].className += " active";
	}
	</script>
<?php endif; ?>
