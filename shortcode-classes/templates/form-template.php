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
.tab p{
	margin: 0.7rem !important;
}
.erf-field-label{
	display: block;
	font-weight: 700;
	font-size: 16px;
	float: none;
	line-height: 1.3;
	margin: 0.7rem;
	margin-bottom: 1rem;
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
	margin: 0.5rem;
	word-break: break-word;
	word-wrap: break-word;
}
.erf-image-choices-item{
	width: 40%;
	max-width: 280px !important;
	display: block;
	padding: 26px !important;
	margin: auto;
	margin-top: 0.5rem !important;
	margin-bottom: 0.5rem !important;
	box-shadow: 0 0 20px 0 rgb(0 0 0 / 10%);
	float: none;
	text-align: center;
}
.erf-contact-choices-option{
	margin:0.3rem;
	max-width: 280px !important;
}
.erf-googlemap{
	width: 100%;
	height: 35rem;
	border: 2px solid grey;
	border-radius: 2rem;
}
/* if device has a touch screen */
@media (any-pointer: coarse) {
	.erf-image-choices-item {
		width: 90%;
		padding: 10px !important;
		float: none;
	}
}
.erf-separator{
	height: 0.5rem;
}
.erf-div-selected{
	border: 1px solid grey;
	background-color: #BECCEF;
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
	<div style="text-align: center; margin:0 1.5rem 0 1.5rem;">
		<br>
		<h5>Muchas gracias por llenar este formulario! <?php echo $nombre_del_cliente; ?> te contactaré pronto para trabajar juntos!</h5>
		<br>
		<p>Si tienes algún inconveniente no dudes en escribirme a: hello@floralunar.com.</p>
	</div>
<?php else : ?>
	<form id="erf_request_form">
		<div id="loading-gif" style="display:none; width:90%; text-align: center; margin: auto;" >
			<div style="width:15%; margin: 0 43%;">
				<img src="https://fiesta.lezlynorman.com/wp-content/uploads/2023/02/344-loader-15-flat.gif" alt="">
			</div>
			<h3>Guardando datos, espera mientras guardamos tu información.</h3>
		</div>
		<input type="hidden" name="tipo_de_formulario" id="tipo_de_formulario" value="<?php echo $tipo_de_formulario; ?>">
		<!-- One "tab" for each step in the form: -->
		<div class="tab">
			<label class="erf-field-label">
				<p>
					Nombre del cliente
					<br>
					<small>
						Obligatorio*
					</small>
				</p>
			</label>
			<p><input class="erf-field-required"  name="nombre_del_cliente" id="nombre_del_cliente"></p>
			<div class="erf-field-description">Escribe tu nombre para ánotarlo en mi agenda de pedidos</div>
		</div>
		<div class="tab">
			<div>
			<label class="erf-field-label">
				<p>
					¿Que tipo de evento se va a realizar?
					<br>
					<small>
						Obligatorio*
					</small>
				</p>
			</label>
			</div>
			<div class="" style="">
					<div class="erf-image-choices-item erf-div-selected">
						<label>
							<span class="erf-image-choices-image">
								<img class="checked-choice" decoding="async" src="https://fiesta.lezlynorman.com/wp-content/uploads/2022/05/gallery9.jpg" alt="Boda" title="Boda">
							</span>
							<input type="radio" class="tipo_de_evento" name="tipo_de_evento" value="wedding" data-class="wedding" style="display: none;" checked/>
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
			<div style="margin: 1rem 0 1rem  0;">
				<h4 class="erf-field-label" style="font-size: 20px; line-height: 28px;">
					<p>
						Agrega a las estrellas del evento
						<br>
						<small>
							Obligatorio*
						</small>
					</p>
				</h4>
			</div>
			<label class="erf-field-label">
				¿A quien vamos a festejar?
			</label>
			<p class="wedding custom_field">
				<label for="nombre_de_novia">Nombre de la novia:</label>
				<input class="erf-field-required"  name="nombre_de_novia" id='nombre_de_novia'>
			</p>
			<p class="wedding custom_field">
				<label for="nombre_de_novio">Nombre del novio:</label>
				<input class="erf-field-required"  name="nombre_de_novio" id='nombre_de_novio'>
			</p>
			<p class="baptism_communion event_other custom_field" style="display: none;">
				<label for="nombre_de_festejado">Nombre de la/del festejada/o:</label>
				<input class="erf-field-required"  name="nombre_de_festejado" id='nombre_de_festejado'>
			</p>
		</div>
		<div class="tab">
			<p>
				<label class="erf-field-label" for="fecha_de_evento">
						Fecha del evento:
						<br>
						<small>
							Obligatorio*
						</small>
				</label>
				<input class="erf-field-required" type="date"  name="fecha_de_evento" id="fecha_de_evento">
			</p>
			<div>
				<div class="erf-field-description">
					<p>
						¿Cuándo es la fecha de tu evento?
					</p>
				</div>
			</div>

			<?php if ( in_array( $tipo_de_formulario, array( 'gold' ) ) ) : ?>
				<div>
					<p>
						<label class="erf-field-label" for="fecha_de_cierre">
							Cuando quieres que cierre el registro al sitio web para ir a tu evento? (te recomendamos al menos 15 dias antes de tu evento)
						</label>
						<input type="date"  name="fecha_de_cierre" id="fecha_de_cierre">
					</p>
				</div>
			<?php endif; ?>

			<div>
				<p>
					<label class="erf-field-label">
						Tu evento es abierto al público?
					</label>
					<p style='margin-left: 2rem !important;'>
						<label for="abierto_al_publico_si">Sí</label>
						<input class="erf-field-required" style='width:5%;' type="radio" name="abierto_al_publico" id="abierto_al_publico_si" value='1' checked>
					</p>
					<p style='margin-left: 2rem !important;'>
						<label for="abierto_al_publico_no">No</label>
						<input class="erf-field-required" style='width:5%;' type="radio" name="abierto_al_publico" id="abierto_al_publico_no" value='0'>
					</p>
				</p>
			</div>
		</div>
		<div class="tab">
			<div style="display: flex;">
				<img decoding="async" loading="lazy" alt="" src="https://fiesta.lezlynorman.com/wp-content/uploads/2022/12/8e4b3ca9776edc4879fc500058c72c43-300x300.jpg" class="size-medium wp-image-3841 aligncenter" width="300" height="300" srcset="https://fiesta.lezlynorman.com/wp-content/uploads/2022/12/8e4b3ca9776edc4879fc500058c72c43-300x300.jpg 300w, https://fiesta.lezlynorman.com/wp-content/uploads/2022/12/8e4b3ca9776edc4879fc500058c72c43-150x150.jpg 150w, https://fiesta.lezlynorman.com/wp-content/uploads/2022/12/8e4b3ca9776edc4879fc500058c72c43-100x100.jpg 100w, https://fiesta.lezlynorman.com/wp-content/uploads/2022/12/8e4b3ca9776edc4879fc500058c72c43.jpg 564w" sizes="(max-width: 300px) 100vw, 300px">
			</div>
			<div class="erf-separator"></div>	
			<div>
				<label class="erf-field-label" for="frase_de_bienvenida">
					<p>
						¡Dale a tus invitados una cálida bienvenida!
						<br>
						<small>
							Opcional
						</small>
					</p>
				</label>
				<p>
					<textarea  name="frase_de_bienvenida" id="frase_de_bienvenida"></textarea>
				</p>
				<div class="erf-field-description">
					Escribe una frase inspiradora que te gustaría añadir en tu invitación
				</div>
			</div>
		</div>
		<?php if ( in_array( $tipo_de_formulario, array( 'gold', 'silver' ) ) ) : ?>
			<div class="tab">
				<p>
					<h4>
						<small>
							Opcional
						</small>
					</h4>
				</p>
				<p class="wedding custom_field">
					<label for="madre_de_novia">
						Madre de la novia:
					</label>
					<input  name="madre_de_novia" id='madre_de_novia'>
				</p>
				<div class="erf-separator"></div>	
				<p class="wedding custom_field">
					<label for="padre_de_novia">
						Padre de la novia:
					</label>
					<input  name="padre_de_novia" id='padre_de_novia'>
				</p>
				<div class="erf-separator"></div>	
				<p class="wedding custom_field">
					<label for="madre_de_novio">
						Madre del novio:
					</label>
					<input  name="madre_de_novio" id='madre_de_novio'>
				</p>
				<div class="erf-separator"></div>	
				<p class="wedding custom_field">
					<label for="padre_de_novio">
						Padre del novio:
					</label>
					<input  name="padre_de_novio" id='padre_de_novio'>
				</p>
				<p class="baptism_communion event_other custom_field" style="display: none;">
					<label for="madre_del_festejado">
						Madre de la/del festejada/o:
					</label>
					<input  name="madre_del_festejado" id='madre_del_festejado'>
				</p>
				<div class="erf-separator"></div>	
				<p class="baptism_communion event_other custom_field" style="display: none;">
					<label for="padre_del_festejado">
						Padre de la/del festejada/o:
					</label>
					<input  name="padre_del_festejado" id='padre_del_festejado'>
				</p>
			</div>
		<?php endif; ?>
		<?php if ( in_array( $tipo_de_formulario, array( 'gold' ) ) ) : ?>
			<div class="tab">
				<div>
				<div>
					<h4 class="erf-field-label" style="font-size: 20px; line-height: 28px;">
						<p>
							Nombre de los padrinos
							<br>
							<small>
								Opcional
							</small>
						</p>
					</h4>
					<p style="margin: 0 0 20px 0;">Porque agradecemos a aquellas personas que nos apoyan para hacer realidad este grán evento.</p>
				</div>
				</div>
				<p class="wedding custom_field">
					<label for="nombre_de_madrina_de_arras">Nombre de madrina de arras:</label>
					<input  name="nombre_de_madrina_de_arras" id='nombre_de_madrina_de_arras'>
				</p>
				<div class="erf-separator"></div>	
				<p class="wedding custom_field">
					<label for="nombre_de_padrino_de_arras">Nombre de padrino de arras:</label>
					<input  name="nombre_de_padrino_de_arras" id='nombre_de_padrino_de_arras'>
				</p>
				<div class="erf-separator"></div>	
				<p class="wedding custom_field">
					<label for="nombre_de_madrina_de_lazo">Nombre de madrina de lazo:</label>
					<input  name="nombre_de_madrina_de_lazo" id='nombre_de_madrina_de_lazo'>
				</p>
				<div class="erf-separator"></div>	
				<p class="wedding custom_field">
					<label for="nombre_de_padrino_de_lazo">Nombre de padrino de lazo:</label>
					<input  name="nombre_de_padrino_de_lazo" id='nombre_de_padrino_de_lazo'>
				</p>
				<div class="erf-separator"></div>	
				<p class="wedding custom_field">
					<label for="nombre_de_madrina_de_anillos">Nombre de madrina de anillos:</label>
					<input  name="nombre_de_madrina_de_anillos" id='nombre_de_madrina_de_anillos'>
				</p>
				<div class="erf-separator"></div>	
				<p class="wedding custom_field">
					<label for="nombre_de_padrino_de_anillos">Nombre de padrino de anillos:</label>
					<input  name="nombre_de_padrino_de_anillos" id='nombre_de_padrino_de_anillos'>
				</p>
				<div class="erf-separator"></div>	
				<p class="wedding custom_field">
					<label for="nombre_de_madrina_de_velacion">Nombre de madrina de velación:</label>
					<input  name="nombre_de_madrina_de_velacion" id='nombre_de_madrina_de_velacion'>
				</p>
				<div class="erf-separator"></div>	
				<p class="wedding custom_field">
					<label for="nombre_de_padrino_de_velacion">Nombre de padrino de velación:</label>
					<input  name="nombre_de_padrino_de_velacion" id='nombre_de_padrino_de_velacion'>
				</p>
				<p class="baptism_communion event_other custom_field" style="display: none;">
					<label for="nombre_de_madrina">Nombre de la madrina:</label>
					<input  name="nombre_de_madrina" id='nombre_de_madrina'>
				</p>
				<div class="erf-separator"></div>	
				<p class="baptism_communion event_other custom_field" style="display: none;">
					<label for="nombre_de_padrino">Nombre del padrino:</label>
					<input  name="nombre_de_padrino" id='nombre_de_padrino'>
				</p>
			</div>
		<?php endif; ?>
		<div class="tab">
			<div>
				<p>
					<img decoding="async" loading="lazy" alt="" src="https://fiesta.lezlynorman.com/wp-content/uploads/2022/12/7532d187d8a17fc549b702ce4a7230d5-200x300.jpg" class="size-medium wp-image-3840 aligncenter" width="200" height="300" srcset="https://fiesta.lezlynorman.com/wp-content/uploads/2022/12/7532d187d8a17fc549b702ce4a7230d5-200x300.jpg 200w, https://fiesta.lezlynorman.com/wp-content/uploads/2022/12/7532d187d8a17fc549b702ce4a7230d5.jpg 564w" sizes="(max-width: 200px) 100vw, 200px">
				</p>
			</div>
			<div>
				<p>
					<h4>
						Recepción
					</h4>
					<small>
						Obligatorio*
					</small>
				</p>	
				<p>Selecciona en el mapa la ubicación donde se llevara a cabo la recepción o ingresa los datos manualmente.</p>
			</div>
			<div style="text-align: center;">
				<div id="erf-map-reception" class="erf-googlemap" ></div>
			</div>
			<div class="erf-separator"></div>	
			<p>
				<label for="direccion_de_recepcion">Dirección de recepción:</label>
				<input class="erf-field-required"  name="direccion_de_recepcion" id='direccion_de_recepcion'>
			</p>
			<div>
				<a class="find-address button-primary" value="" data-type="reception">Ubicar en el mapa</a>
			</div>
			<p>
				<label for="hora_de_recepcion">Hora de recepción:</label>
				<input class="erf-field-required" type="time"  name="hora_de_recepcion" id='hora_de_recepcion'>
			</p>
			<p>
				<label for="link_de_google_maps_de_recepcion">Link de google maps de recepción:</label>
				<input  name="link_de_google_maps_de_recepcion" id='link_de_google_maps_de_recepcion'>
			</p>
		</div>
		<div class="tab">
			<div>
				<p>
					<img decoding="async" loading="lazy" alt="" src="https://fiesta.lezlynorman.com/wp-content/uploads/2022/12/7cc7ba914e5214d0ddefcd661bf6428f-e1671561859483-300x230.jpg" class="size-medium wp-image-3839 aligncenter" width="300" height="230" srcset="https://fiesta.lezlynorman.com/wp-content/uploads/2022/12/7cc7ba914e5214d0ddefcd661bf6428f-e1671561859483-300x230.jpg 300w, https://fiesta.lezlynorman.com/wp-content/uploads/2022/12/7cc7ba914e5214d0ddefcd661bf6428f-e1671561859483.jpg 563w" sizes="(max-width: 300px) 100vw, 300px">
				</p>
			</div>
			<div>
				<p>
					<h4>
						Ceremonia religiosa
					</h4>
					<small>
						Opcional
					</small>
				</p>
				<p>Selecciona en el mapa la ubicación donde se llevara a cabo la ceremonia o ingresa los datos manualmente.</p>
				<p>Si solo manejas una ubicación, omitir.</p>
			</div>
			<div style="text-align: center;">
				<div id="erf-map-church" class="erf-googlemap" ></div>
			</div>
			<div class="erf-separator"></div>	
			<p>
				<label for="direccion_de_ceremonia_religiosa">Dirección de ceremonia religiosa:</label>
				<input  name="direccion_de_ceremonia_religiosa" id='direccion_de_ceremonia_religiosa'>
			</p>
			<div>
				<a class="find-address button-primary" value="" data-type="church">Ubicar en el mapa</a>
			</div>
			<p>
				<label for="hora_de_ceremonia_religiosa">Hora de ceremonia religiosa:</label>
				<input type="time"  name="hora_de_ceremonia_religiosa" id='hora_de_ceremonia_religiosa'>
			</p>
			<p>
				<label for="link_de_google_maps_de_ceremonia_religiosa">Link de google maps de ceremonia religiosa:</label>
				<input  name="link_de_google_maps_de_ceremonia_religiosa" id='link_de_google_maps_de_ceremonia_religiosa'>
			</p>
		</div>
		<?php if ( in_array( $tipo_de_formulario, array( 'gold' ) ) ) : ?>
			<div class="tab">
				<div>
					<p>
						<img decoding="async" loading="lazy" alt="" src="https://floralunar.com/wp-content/uploads/2023/03/336198159_5857644211022962_9042296392620835332_n.png" class="size-medium wp-image-3839 aligncenter" width="300" height="230" srcset="https://floralunar.com/wp-content/uploads/2023/03/336198159_5857644211022962_9042296392620835332_n.png 564w, https://floralunar.com/wp-content/uploads/2023/03/336198159_5857644211022962_9042296392620835332_n.png 200w" sizes="(max-width: 300px) 100vw, 300px">
					</p>
				</div>
				<div>
					<p>
						<h4>
							Hospedaje
						</h4>
						<small>
							Opcional
						</small>
					</p>
					<p>
						Sí tus invitados vienen de fuera, agrega el hotel con el cual haz hecho convenio.
					</p>
					<p>
						Para navegar en el mapa desliza tus dedos y presiona la ubicación que deseas etiquetar, o agrega la ubicación manualmente.
					</p>
				</div>
				<div style="text-align: center;">
					<div id="erf-map-hotel" class="erf-googlemap" ></div>
				</div>
				<div class="erf-separator"></div>
				<p>
					<label for="direccion_de_hotel">Dirección de hotel:</label>
					<input  name="direccion_de_hotel" id='direccion_de_hotel'>
				</p>
				<div>
					<a class="find-address button-primary" value="" data-type="hotel">Ubicar en el mapa</a>
				</div>
				<p>
					<label for="link_de_google_maps_de_hotel">Link de google maps de hotel:</label>
					<input  name="link_de_google_maps_de_hotel" id='link_de_google_maps_de_hotel'>
				</p>
				<p>
					<label for="">
						Convenio del hotel:
					</label>
					<input  name="codigo_de_descuento_de_hotel" id='codigo_de_descuento_de_hotel'>
					<small>Adjunta la liga web, sube tu documento a  https://wetransfer.com/ o escribe a continuación tu convenio de hotel.</small>
				</p>
			</div>
		<?php endif;?>
		<?php if ( in_array( $tipo_de_formulario, array( 'gold', 'silver' ) ) ) : ?>
			<div class="tab">
				<div>
					<p>
					<img decoding="async" loading="lazy" alt="" src="https://fiesta.lezlynorman.com/wp-content/uploads/2022/12/regalo_boda-221x300.jpg" class="size-medium wp-image-3838 aligncenter" width="221" height="300">
					</p>
				</div>
				<div class="erf-field-label">
					<p>
						Mesa de regalos
						<br>
						<small>
							Opcional
						</small>
					</p>
				</div>
				<p>
					<textarea  name="mesa_de_regalos" id='mesa_de_regalos'></textarea>
				</p>
				<div class="erf-field-description">
					Te recomendamos añadir tu id de Liverpool, Sears o de la tienda que hayas seleccionado, clabe / datos para depositar y tus propias recomendaciones.
				</div>
			</div>
		<?php endif; ?>
		<?php if ( in_array( $tipo_de_formulario, array( 'gold' ) ) ) : ?>
			<div class="tab">
				<p>
					<label class="erf-field-label" for="intinerario_de_evento">
							Intinerario de evento:
							<br>
							<small>
								Opcional
							</small>
					</label>
					<textarea  name="intinerario_de_evento" id='intinerario_de_evento'></textarea>
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
						<label class="erf-field-label" for="recomendaciones">
								Recomendaciones generales:
								<br>
								<small>
									Opcional
								</small>
						</label>
						<textarea  name="recomendaciones" id='recomendaciones'></textarea>
						<div class="erf-field-description">
							Añade cualquier indicación que gustas que aparezca en tu invitación(tipo de vestimenta, cuidados de salud etc). Omitir si no aplica
						</div>
					</p>
				<?php endif; ?>
				<?php if ( in_array( $tipo_de_formulario, array( 'silver', 'gold' ) ) ) : ?>
					<p>
						<label class="erf-field-label" for="hashtag">
								#Hashtag:
								<br>
								<small>
									Opcional
								</small>
						</label>
						<input  name="hashtag" id='hashtag'>
						<div class="erf-field-description">
							Si quieres crear una galería en Instagram para tu web, crea un hashtag. Omitir si no aplica.
						</div>
					</p>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<div class="tab">
			<p>
				<label class="erf-field-label" for="galeria_de_fotos">
					Galeria de fotos:
					<br>
					<small>
						Opcional
					</small>
				</label>
				Sube las fotografías en <a rel="noopener" target="_blank" href="https://wetransfer.com/">https://wetransfer.com/</a> o en cualquier almacenamiento en la nube de tu preferencia y comparte la liga en el siguiente campo:
			</p>
			<p>
				Subir fotos
			</p>
			<input  name="galeria_de_fotos" id='galeria_de_fotos'>
			<div class="erf-field-description">
				Sube las fotos que mas te gusten para que aparezcan en tu invitación (mínimo 4 máximo 15).
			</div>
		</div>
		<div class="tab">
			<label class="erf-field-label">
				<p>
					Confirmación de invitados
					<br>
					<small>
						Opcional
					</small>
				</p>
			</label>
			<p>
				¿A que número de whatsapp tus invitados pueden confirmar?<br>
				Si son pareja puedes agregar mas de uno, si no aplica omitir campo.
			</p>
			<p>
				<label for="whatsapp_I_de_confirmacion">Whatsapp:</label>
				<input  name="whatsapp_I_de_confirmacion" id='whatsapp_I_de_confirmacion'>
			</p>
			<p>
				<label for="whatsapp_II_de_confirmacion">Whatsapp II:</label>
				<input  name="whatsapp_II_de_confirmacion" id='whatsapp_II_de_confirmacion'>
			</p>
		</div>
		<div class="tab">
			<p>
				<h4>
					Diseño y personalización
				</h4>
				<small>
					Opcional
				</small>
			</p>
			<p>Añade los colores, elementos o estilos que te gustarían ver en tu invitación.</p>
			<p>Si tienes ejemplos visuales no olvides en compartirlos subiendolos a: <a href="https://wetransfer.com/">https://wetransfer.com/</a></p>
			<p>
				<label for="personalizacion_escrita">Descripción escrita:</label>
				<textarea  name="personalizacion_escrita" id='personalizacion_escrita'></textarea>
				<div class="erf-field-description">
					Describeme que colores estilos o tipo de letra te gustaría!
				</div>
			</p>
			<p>
				<label for="personalizacion_grafica">Descripción gráfica:</label>
				<input  name="personalizacion_grafica" id='personalizacion_grafica'>
				<div class="erf-field-description">
					Tienes ejemplos visuales como fotos, diseños o imágenes que quieres usar como referencia? subelas en tu liga de wetransfer.
				</div>
			</p>
		</div>
		<div class="tab">
			<p>
				<h4>
					¿Porque medio me puedo contactar contigo para entregarte y aclarar detalles para la creación de tu invitación?
				</h4>
				<br>
				<small>
					Obligatorio*
				</small>
			</p>
			<div class="" style="display: flex;">
				<div class="erf-image-choices-item erf-contact-choices-option erf-div-selected" data-id="whatsapp-contact-container">
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
				<p id='whatsapp-contact-container' style="">
					<label>
						Escribe tu número de Whatsapp
					</label>
					<input type="number" class="erf-field-required"  name="whatsapp_de_contacto" id='whatsapp_de_contacto'/>
				</p>
			</div>
			<div>
				<p id='email-contact-container' style="display: none;">
					<label>Escribre tu correo eléctronico</label>
					<input type="email" class="erf-field-required"  name="correo_electronico_de_contacto" id='correo_electronico_de_contacto'/>
				</p>
			</div>
			<div class="erf-field-description">
				En cuando reciba la informacón, me pondre en contacto contigo
			</div>
		</div>
		<div class="tab">
			<p>
				<label class="erf-field-label" for="comentarios_y_sugerencias">
						Información adicional:
						<br>
						<small>
							Opcional
						</small>
				</label>
				<textarea  name="comentarios_y_sugerencias" id='comentarios_y_sugerencias'></textarea>
				<div class="erf-field-description">
					<p>
						¿Hay algo más en este formulario que te gustaria añadir? (vuelos, recomendacion de maquillistas, despedida de soltero(a), brunch del dia despues).
					</p>
					<p>
						Cualquier dato que no este en el siguiente formulario y deses añadirlo a tu invitación puedes agregarlo en el siguiente campo.
					</p>
				</div>
			</p>
		</div>
		<div style="overflow:auto; margin: 1%;">
			<div style="text-align: center;">
				<button style="margin:0.5rem;" type="button" id="prevBtn" onclick="nextPrev(-1)">Anterior</button>
				<button style="margin:0.5rem;" type="button" id="nextBtn" onclick="nextPrev(1)">Siguiente</button>
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
		<span class="step"></span>
		</div>
	</form>
	<script>
		let map_hotel;
		let marker_hotel;
		let geocoder_hotel;
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
					lat: 22.775989,
					lng: -102.571668
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
					lat: 22.775989,
					lng: -102.571668
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
			<?php if ( in_array( $tipo_de_formulario, array( 'gold' ) ) ) : ?>
				// *********
				map_hotel = new google.maps.Map(document.getElementById("erf-map-hotel"), {
					zoom: 5,
					center: {
						lat: 22.775989,
						lng: -102.571668
					},
					mapTypeControl: false,
				});
				geocoder_hotel = new google.maps.Geocoder();
				marker_hotel = new google.maps.Marker({
					map_hotel,
				});
				map_hotel.addListener("click", (e) => {
					geocode(
						{ location: e.latLng },
						map_hotel,
						marker_hotel,
						geocoder_hotel
					);
				});
				clear(marker_hotel);
			<?php endif; ?>
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
					const formatted_address = result.results[0].formatted_address.replace(
						' ',
						'+',
					);
					const maps_link = 'https://www.google.com/maps/dir/?api=1&destination='+formatted_address;

					if(jQuery("#direccion_de_ceremonia_religiosa").is(":visible")){
						try {
							jQuery('#direccion_de_ceremonia_religiosa').val(
								result.results[0].formatted_address
							);
						} catch (error) {
							jQuery('#direccion_de_ceremonia_religiosa').val('');
						}

						try {
							jQuery('#link_de_google_maps_de_ceremonia_religiosa').val(
								maps_link
							);
						} catch (error) {
							jQuery('#link_de_google_maps_de_ceremonia_religiosa').val('');
						}
					}
					if(jQuery("#direccion_de_recepcion").is(":visible")){
						try {
							jQuery('#direccion_de_recepcion').val(
								result.results[0].formatted_address
							);
						} catch (error) {
							jQuery('#direccion_de_recepcion').val('');
						}

						try {
							jQuery('#link_de_google_maps_de_recepcion').val(
								maps_link
							);
						} catch (error) {
							jQuery('#link_de_google_maps_de_recepcion').val('');
						}
					}
					if(jQuery("#direccion_de_hotel").is(":visible")){
						try {
							jQuery('#direccion_de_hotel').val(
								result.results[0].formatted_address
							);
						} catch (error) {
							jQuery('#direccion_de_hotel').val('');
						}

						try {
							jQuery('#link_de_google_maps_de_hotel').val(
								maps_link
							);
						} catch (error) {
							jQuery('#link_de_google_maps_de_hotel').val('');
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
				var address = jQuery('#direccion_de_ceremonia_religiosa').val();
				geocode(
					{ address: address },
					map_church,
					marker_church,
					geocoder_church,
					false
				);
			}
			if (data_type=='reception'){
				var address = jQuery('#direccion_de_recepcion').val();
				geocode(
					{ address: address },
					map_reception,
					marker_reception,
					geocoder_reception,
					false
				);
			}
			if (data_type=='hotel'){
				var address = jQuery('#direccion_de_hotel').val();
				geocode(
					{ address: address },
					map_hotel,
					marker_hotel,
					geocoder_hotel,
					false
				);
			}
		}
		function isEmail(email) {
			var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if (!regex.test(email)) {
				return false;
			} else {
				return true;
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
			jQuery('#loading-gif').fadeIn();
			jQuery('#prevBtn').fadeOut();
			jQuery('#nextBtn').fadeOut();

			jQuery.ajax({
				type: "POST",
				url: EventRequestFormRequests.url,
				data: {
					key: EventRequestFormRequests.key,
					action: 'erf_send_form_data',
					tipo_de_formulario: jQuery('#tipo_de_formulario').val(),
					nombre_del_cliente: jQuery('#nombre_del_cliente').val(),
					tipo_de_evento: jQuery('input[name=tipo_de_evento]:checked').val(),
					abierto_al_publico: jQuery('input[name=abierto_al_publico]:checked').val(),
					nombre_de_novia: jQuery('#nombre_de_novia').val(),
					nombre_de_novio: jQuery('#nombre_de_novio').val(),
					nombre_de_festejado: jQuery('#nombre_de_festejado').val(),
					fecha_de_evento: jQuery('#fecha_de_evento').val(),
					fecha_de_cierre: jQuery('#fecha_de_cierre').val(),
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
					hora_de_ceremonia_religiosa: jQuery('#hora_de_ceremonia_religiosa').val(),
					link_de_google_maps_de_ceremonia_religiosa: jQuery('#link_de_google_maps_de_ceremonia_religiosa').val(),
					direccion_de_recepcion: jQuery('#direccion_de_recepcion').val(),
					hora_de_recepcion: jQuery('#hora_de_recepcion').val(),
					link_de_google_maps_de_recepcion: jQuery('#link_de_google_maps_de_recepcion').val(),
					direccion_de_hotel: jQuery('#direccion_de_hotel').val(),
					link_de_google_maps_de_hotel: jQuery('#link_de_google_maps_de_hotel').val(),
					codigo_de_descuento_de_hotel: jQuery('#codigo_de_descuento_de_hotel').val(),
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
					jQuery('#loading-gif').fadeOut();
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
		var tabs, inputs_required, i, valid = true;
		tabs = document.getElementsByClassName("tab");
		inputs_required = tabs[currentTab].getElementsByClassName("erf-field-required");
		// A loop that checks every input field in the current tab:
		for (i = 0; i < inputs_required.length; i++) {
			// If a field is empty...
			let paragraph = inputs_required[i].closest('p');
			if (inputs_required[i].value == "" && ! isHidden(paragraph)) {
				// add an "invalid" class to the field:
				inputs_required[i].className += " invalid";
				// and set the current valid status to false
				valid = false;
				// valid = true;
			} else {
				// remove "invalid" class to the field:
				inputs_required[i].className = " erf-field-required";
			}
		}
		// ******************** HARD CODE ************************* //
		//hack to validate email contact field.
		const email_input = document.getElementById("correo_electronico_de_contacto");
		let email_input_paragraph = email_input.closest('p');
		const email_input_paragraph_style = window.getComputedStyle(email_input_paragraph);
		if (email_input_paragraph_style.display === 'block'){
			const value = email_input.value;
			if(! isEmail(value)){
				email_input.className += " invalid";
				valid = false;
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
