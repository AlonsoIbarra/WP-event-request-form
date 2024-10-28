<?php
/**
 * Template for edit row request.
 *
 * @link  https://https://floralunar.com
 * @since 1.0.0
 *
 * @package templates
 */

use GPBMetadata\Google\Api\Expr\V1Alpha1\Checked;

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

	#addGuestModal {
		position: fixed;
		z-index: 1;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		overflow: auto;
		background-color: rgb(0,0,0);
		background-color: rgba(0,0,0,0.4);
	}

	.modal-content {
		background-color: #fefefe;
		margin: 15% auto;
		padding: 20px;
		border: 1px solid #888;
		width: 80%;
	}

	#guestErrorMessages {
		color: red;
	}
</style>
<div>
	<div id="loading-gif" style="display:none; width:90%; text-align: center; margin: auto;" >
		<div style="width:15%; margin: 0 43%;">
			<img src="https://floralunar.com/wp-content/uploads/2023/02/344-loader-15-flat.gif" alt="">
		</div>
		<h3>Guardando datos, espera mientras guardamos tu información.</h3>
	</div>

	<form id="erf_request_form">
		<input type="hidden" name="formId" id="formId" value="<?=$form->id?>">
		<input type="hidden" name="tipo_de_formulario" id="tipo_de_formulario" value="<?=$form->tipo_de_formulario?>">
		<div class="container mt-5">
			<ul class="nav nav-tabs" id="myTabs">
				<li class="nav-item">
					<a class="nav-link active" id="link-tabCustomerData" data-toggle="tab" href="#tabCustomerData">Datos del cliente</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="tabEspecialMentions-tab" data-toggle="tab" href="#tabEspecialMentions">Menciones especiales</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="tabLocations-tab" data-toggle="tab" href="#tabLocations">Locaciones</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="tabCustoms-tab" data-toggle="tab" href="#tabCustoms">Personalización</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="tabGuests-tab" data-toggle="tab" href="#tabGuests">Registro invitados</a>
				</li>
			</ul>

			<div class="tab-content mt-2">
				<!-- TAB DATOS DEL CLIENTE -->
				<div class="tab-pane fade show active" id="tabCustomerData">
					<!-- NOMBRE DE CLIENTE -->
					<label class="erf-field-label">
						<p>
							Nombre del cliente
							<br>
							<small>
								Obligatorio*
							</small>
						</p>
					</label>
					<p><input class="erf-field-required"  name="nombre_del_cliente" id="nombre_del_cliente" maxlength="90" value="<?php echo $form->nombre_del_cliente; ?>"></p>
					<!-- TIPO DE EVENTO -->
					<label class="erf-field-label">
						<p>
							¿Que tipo de evento se va a realizar?
							<br>
							<small>
								Obligatorio*
							</small>
						</p>
					</label>
					<select name="tipo_de_evento" id="tipo_de_evento">
						<option value="wedding" data-class="wedding" <?=selected( 'wedding', $form->tipo_de_evento )?>>Boda</option>
						<option value="baptism_communion" data-class="baptism_communion" <?=selected( 'baptism_communion', $form->tipo_de_evento )?>>XV años - Bautizo - 1ra. Comunión</option>
						<option value="event_other" data-class="event_other" <?=selected( 'event_other', $form->tipo_de_evento )?>>Otro</option>
					</select>
					<!-- NOMBRE DEL FESTEJADO -->
					<label class="erf-field-label">
						¿A quien vamos a festejar?
					</label>
					<p class="wedding custom_field">
						<label for="nombre_de_novia">Nombre de la novia:</label>
						<input class="erf-field-required"  name="nombre_de_novia" id='nombre_de_novia' maxlength="90" value="<?=$form->nombre_de_novia?>">
					</p>
					<p class="wedding custom_field">
						<label for="nombre_de_novio">Nombre del novio:</label>
						<input class="erf-field-required"  name="nombre_de_novio" id='nombre_de_novio' maxlength="90" value="<?=$form->nombre_de_novio?>">
					</p>
					<p class="baptism_communion event_other custom_field" style="">
						<label for="nombre_de_festejado">Nombre de la/del festejada/o:</label>
						<input class="erf-field-required"  name="nombre_de_festejado" id='nombre_de_festejado' maxlength="90" value="<?=$form->nombre_del_festejado?>">
					</p>
					<!-- DATOS DE CONTACTO -->
					<div class="erf-separator"></div>	
					<div>
						<p id='whatsapp-contact-container' style="">
							<label>
								Escribe tu número de Whatsapp
							</label>
							<input type="number" class="erf-field-required"  name="whatsapp_de_contacto" id='whatsapp_de_contacto' maxlength="15" value="<?=$form->whatsapp_de_contacto?>"/>
						</p>
					</div>
					<div>
						<p id='email-contact-container'>
							<label>Escribre tu correo eléctronico</label>
							<input type="email" class="erf-field-required"  name="correo_electronico_de_contacto" id='correo_electronico_de_contacto' maxlength="45" value="<?=$form->correo_electronico_de_contacto?>"/>
						</p>
					</div>
				</div>
				<!-- TAB MENCIONES ESPECIALES -->
				<div class="tab-pane fade" id="tabEspecialMentions">
					<!-- PADRES -->
					<?php if ( in_array( $form->tipo_de_formulario, array( 'gold', 'silver' ) ) ) : ?>
						<p class="wedding custom_field">
							<label for="madre_de_novia">
								Madre de la novia:
							</label>
							<input  name="madre_de_novia" id='madre_de_novia' maxlength="90" value="<?=$form->madre_de_novia?>">
						</p>
						<div class="erf-separator"></div>	
						<p class="wedding custom_field">
							<label for="padre_de_novia">
								Padre de la novia:
							</label>
							<input  name="padre_de_novia" id='padre_de_novia' maxlength="90" value="<?=$form->padre_de_novia?>">
						</p>
						<div class="erf-separator"></div>	
						<p class="wedding custom_field">
							<label for="madre_de_novio">
								Madre del novio:
							</label>
							<input  name="madre_de_novio" id='madre_de_novio' maxlength="90" value="<?=$form->madre_de_novio?>">
						</p>
						<div class="erf-separator"></div>	
						<p class="wedding custom_field">
							<label for="padre_de_novio">
								Padre del novio:
							</label>
							<input  name="padre_de_novio" id='padre_de_novio' maxlength="90" value="<?=$form->padre_de_novio?>">
						</p>
						<p class="baptism_communion event_other custom_field" style="">
							<label for="madre_del_festejado">
								Madre de la/del festejada/o:
							</label>
							<input  name="madre_del_festejado" id='madre_del_festejado' maxlength="90" value="<?=$form->madre_del_festejado?>">
						</p>
						<div class="erf-separator"></div>	
						<p class="baptism_communion event_other custom_field" style="">
							<label for="padre_del_festejado">
								Padre de la/del festejada/o:
							</label>
							<input  name="padre_del_festejado" id='padre_del_festejado' maxlength="90" value="<?=$form->padre_del_festejado?>">
						</p>
					<?php endif; ?>
					<!-- PADRINOS -->
					<?php if ( in_array( $form->tipo_de_formulario, array( 'gold' ) ) ) : ?>
						<div>
							<h4 class="erf-field-label" style="font-size: 20px; line-height: 28px;">
								<p>
									Nombre de los padrinos
								</p>
							</h4>
						</div>
						<p class="wedding custom_field">
							<label for="nombre_de_madrina_de_arras">Nombre de madrina de arras:</label>
							<input  name="nombre_de_madrina_de_arras" id='nombre_de_madrina_de_arras' maxlength="90" value="<?=$form->nombre_de_madrina_de_arras?>">
						</p>
						<div class="erf-separator"></div>	
						<p class="wedding custom_field">
							<label for="nombre_de_padrino_de_arras">Nombre de padrino de arras:</label>
							<input  name="nombre_de_padrino_de_arras" id='nombre_de_padrino_de_arras' maxlength="90" value="<?=$form->nombre_de_padrino_de_arras?>">
						</p>
						<div class="erf-separator"></div>	
						<p class="wedding custom_field">
							<label for="nombre_de_madrina_de_lazo">Nombre de madrina de lazo:</label>
							<input  name="nombre_de_madrina_de_lazo" id='nombre_de_madrina_de_lazo' maxlength="90" value="<?=$form->nombre_de_madrina_de_lazo?>">
						</p>
						<div class="erf-separator"></div>	
						<p class="wedding custom_field">
							<label for="nombre_de_padrino_de_lazo">Nombre de padrino de lazo:</label>
							<input  name="nombre_de_padrino_de_lazo" id='nombre_de_padrino_de_lazo' maxlength="90" value="<?=$form->nombre_de_padrino_de_lazo?>">
						</p>
						<div class="erf-separator"></div>	
						<p class="wedding custom_field">
							<label for="nombre_de_madrina_de_anillos">Nombre de madrina de anillos:</label>
							<input  name="nombre_de_madrina_de_anillos" id='nombre_de_madrina_de_anillos' maxlength="90" value="<?=$form->nombre_de_madrina_de_anillos?>">
						</p>
						<div class="erf-separator"></div>	
						<p class="wedding custom_field">
							<label for="nombre_de_padrino_de_anillos">Nombre de padrino de anillos:</label>
							<input  name="nombre_de_padrino_de_anillos" id='nombre_de_padrino_de_anillos' maxlength="90" value="<?=$form->nombre_de_padrino_de_anillos?>">
						</p>
						<div class="erf-separator"></div>	
						<p class="wedding custom_field">
							<label for="nombre_de_madrina_de_velacion">Nombre de madrina de velación:</label>
							<input  name="nombre_de_madrina_de_velacion" id='nombre_de_madrina_de_velacion' maxlength="90" value="<?=$form->nombre_de_madrina_de_velacion?>">
						</p>
						<div class="erf-separator"></div>	
						<p class="wedding custom_field">
							<label for="nombre_de_padrino_de_velacion">Nombre de padrino de velación:</label>
							<input  name="nombre_de_padrino_de_velacion" id='nombre_de_padrino_de_velacion' maxlength="90" value="<?=$form->nombre_de_padrino_de_velacion?>">
						</p>
						<p class="baptism_communion event_other custom_field" style="display: none;">
							<label for="nombre_de_madrina">Nombre de la madrina:</label>
							<input  name="nombre_de_madrina" id='nombre_de_madrina' maxlength="90" value="<?=$form->nombre_de_madrina?>">
						</p>
						<div class="erf-separator"></div>	
						<p class="baptism_communion event_other custom_field" style="display: none;">
							<label for="nombre_de_padrino">Nombre del padrino:</label>
							<input  name="nombre_de_padrino" id='nombre_de_padrino' maxlength="90" value="<?=$form->nombre_de_padrino?>">
						</p>

						<div class="erf-separator"></div>	
						<p class="wedding baptism_communion event_other custom_field">
							<label for="padrinos_extra">¿Tienes más padrinos? Mencionalos aquí:</label>
							<textarea  name="padrinos_extra" id='padrinos_extra'><?=$form->padrinos_extra?></textarea>
						</p>
					<?php endif; ?>
					<!-- RECOMENDACIONES -->
					<p>

						<?php if ( in_array( $form->tipo_de_formulario, array( 'gold' ) ) ) : ?>
							<!-- Linik de youtube -->
							<div class="form-check">
								<label class="form-check-label" for="youtube_link">
									Agregar música (link de youtube) 
								</label>
								<input class="form-check-input" type="text" name="youtube_link" id="youtube_link" value="<?=$form->youtube_link?>">
							</div>
						<?php endif; ?>

						<!-- Checkbox para Código de Vestimenta -->
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="1" name="ropa_formal" id="ropa_formal" <?=checked( 1, $form->ropa_formal );?>>
							<label class="form-check-label" for="ropa_formal">
								Ropa formal
							</label>
						</div>

						<!-- Checkbox para Mascotas -->
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="1" name="no_ninos" id="no_ninos" <?=checked( 1, $form->no_ninos );?>>
							<label class="form-check-label" for="no_ninos">
								No niños
							</label>
						</div>

						<!-- Otro checkbox -->
						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="recomendacion_otraCheck" name="recomendacion_otraCheck" <?=checked( true, (null !== $form->recomendacion_otra) );?>>
							<label class="form-check-label" for="recomendacion_otraCheck">
								Otra
							</label>
							<input type="text" name="recomendacion_otra" id="recomendacion_otra" <?=(null !== $form->recomendacion_otra)?'':'disabled'?> value="<?=$form->recomendacion_otra?>">
						</div>
					</p>
					<?php if ( in_array( $form->tipo_de_formulario, array( 'silver' ) ) ) : ?>
						<p>
							<label class="erf-field-label" for="recomendaciones">
									Recomendaciones generales:
									<br>
									<small>
										Opcional
									</small>
							</label>
							<textarea  name="recomendaciones" id='recomendaciones'><?=$form->recomendaciones?></textarea>
							<div class="erf-field-description">
								Añade cualquier indicación que gustas que aparezca en tu invitación(tipo de vestimenta, cuidados de salud etc). Omitir si no aplica
							</div>
						</p>
					<?php endif; ?>
				</div>
				<!-- TAB PERSONALIZACIONES -->
				<div class="tab-pane fade" id="tabCustoms">
					<!-- BIENVENIDA -->
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
						<textarea  name="frase_de_bienvenida" id="frase_de_bienvenida"><?=$form->frase_de_bienvenida?></textarea>
					</p>
					<div class="erf-field-description">
						Escribe una frase inspiradora que te gustaría añadir en tu invitación
					</div>
					<!-- REGALOS -->
					<?php if ( in_array( $form->tipo_de_formulario, array( 'gold', 'silver' ) ) ) : ?>
						<div class="tab">
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
								<textarea  name="mesa_de_regalos" id='mesa_de_regalos'><?=$form->mesa_de_regalos?></textarea>
							</p>
							<div class="erf-field-description">
								Te recomendamos añadir tu id de Liverpool, Sears o de la tienda que hayas seleccionado, clabe / datos para depositar y tus propias recomendaciones.
							</div>
						</div>
					<?php endif; ?>
					<!-- INTINERARIO -->
					<?php if ( in_array( $form->tipo_de_formulario, array( 'gold' ) ) ) : ?>
						<div class="tab">
							<p>
								<label class="erf-field-label" for="intinerario_de_evento">
										Intinerario de evento:
										<br>
										<small>
											Opcional
										</small>
								</label>
								<textarea  name="intinerario_de_evento" id='intinerario_de_evento'><?=$form->intinerario_de_evento?></textarea>
							</p>
							<div class="erf-field-description">
								Te recomendamos añadir hora y descripción (omitir si no aplica)
							</div>
						</div>
					<?php endif; ?>
					<!-- HASHTAG -->
					<?php if ( in_array( $form->tipo_de_formulario, array( 'silver', 'gold' ) ) ) : ?>
						<p>
							<label class="erf-field-label" for="hashtag">
									#Hashtag:
									<br>
									<small>
										Opcional
									</small>
							</label>
							<input  name="hashtag" id='hashtag' maxlength="90" value="<?=$form->hashtag?>">
							<div class="erf-field-description">
								Si quieres crear una galería en Instagram para tu web, crea un hashtag. Omitir si no aplica.
							</div>
						</p>
					<?php endif; ?>

				</div>
				<!-- TAB LOCACIONES -->
				<div class="tab-pane fade" id="tabLocations">
					<!-- RECEPCION -->
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
						<label for="nombre_de_recepcion">Nombre del lugar:</label>
						<input class="erf-field-required"  name="nombre_de_recepcion" id='nombre_de_recepcion' maxlength="100" value="<?=$form->nombre_de_recepcion?>">
					</p>
					<p>
						<label for="direccion_de_recepcion">Dirección de recepción:</label>
						<input class="erf-field-required"  name="direccion_de_recepcion" id='direccion_de_recepcion' maxlength="190" value="<?=$form->direccion_de_recepcion?>">
					</p>
					<div>
						<a class="find-address button-primary" value="" data-type="reception">Ubicar en el mapa</a>
					</div>
					<p>
						<label for="hora_de_recepcion">Hora de recepción:</label>
						<input class="erf-field-required" type="time"  name="hora_de_recepcion" id='hora_de_recepcion' value="<?=$form->hora_de_recepcion?>">
					</p>
					<p>
						<label for="link_de_google_maps_de_recepcion">Link de google maps de recepción:</label>
						<input  name="link_de_google_maps_de_recepcion" id='link_de_google_maps_de_recepcion' maxlength="190" value="<?=$form->link_de_google_maps_de_recepcion?>">
					</p>
					<!-- CEREMONIA RELIGIOSA -->
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
						<label for="nombre_de_ceremonia_religiosa">Nombre del lugar:</label>
						<input name="nombre_de_ceremonia_religiosa" id='nombre_de_ceremonia_religiosa' maxlength="100" value="<?=$form->nombre_de_ceremonia_religiosa?>">
					</p>
					<p>
						<label for="direccion_de_ceremonia_religiosa">Dirección de ceremonia religiosa:</label>
						<input  name="direccion_de_ceremonia_religiosa" id='direccion_de_ceremonia_religiosa' maxlength="190" value="<?=$form->direccion_de_ceremonia_religiosa?>">
					</p>
					<div>
						<a class="find-address button-primary" value="" data-type="church">Ubicar en el mapa</a>
					</div>
					<p>
						<label for="hora_de_ceremonia_religiosa">Hora de ceremonia religiosa:</label>
						<input type="time"  name="hora_de_ceremonia_religiosa" id='hora_de_ceremonia_religiosa' value="<?=$form->hora_de_ceremonia_religiosa?>">
					</p>
					<p>
						<label for="link_de_google_maps_de_ceremonia_religiosa">Link de google maps de ceremonia religiosa:</label>
						<input  name="link_de_google_maps_de_ceremonia_religiosa" id='link_de_google_maps_de_ceremonia_religiosa' maxlength="190" value="<?=$form->link_de_google_maps_de_ceremonia_religiosa?>">
					</p>
					<!-- HOTEL -->
					<?php if ( in_array( $form->tipo_de_formulario, array( 'gold' ) ) ) : ?>
						<div class="tab">
							<div>
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
								<input  name="direccion_de_hotel" id='direccion_de_hotel' maxlength="190" value="<?=$form->direccion_de_hotel?>">
							</p>
							<div>
								<a class="find-address button-primary" value="" data-type="hotel">Ubicar en el mapa</a>
							</div>
							<p>
								<label for="link_de_google_maps_de_hotel">Link de google maps de hotel:</label>
								<input  name="link_de_google_maps_de_hotel" id='link_de_google_maps_de_hotel' maxlength="190" value="<?=$form->link_de_google_maps_de_hotel?>">
							</p>
							<p>
								<label for="">
									Convenio del hotel:
								</label>
								<input  name="codigo_de_descuento_de_hotel" id='codigo_de_descuento_de_hotel' maxlength="90" value="<?=$form->codigo_de_descuento_de_hotel?>">
								<small>Adjunta la liga web, sube tu documento a  https://wetransfer.com/ o escribe a continuación tu convenio de hotel.</small>
							</p>
							<p>
								<label for="datos_de_hotel_2">
									Opción hotel 2:
									<small>
										Opcional
									</small>
								</label>
								<textarea  name="datos_de_hotel_2" id='datos_de_hotel_2'><?=$form->datos_de_hotel_2?></textarea>
							</p>
							<p>
								<label for="datos_de_hotel_3">
									Opción hotel 3:
									<small>
										Opcional
									</small>
								</label>
								<textarea  name="datos_de_hotel_3" id='datos_de_hotel_3'><?=$form->datos_de_hotel_3?></textarea>
							</p>

							<p>
								<label for="">
									Vuelos o translados:
									<small>
										Opcional
									</small>
								</label>
								<input name="sugerencia_de_transporte" id='sugerencia_de_transporte' maxlength="90" value="<?=$form->sugerencia_de_transporte?>">
								<p>Si tu familia viaja, añade a continuación tu sugerencia de vuelos o de transporte:</p>
							</p>
						</div>
					<?php endif;?>
				</div>
				<!-- TAB INVITADOS -->
				<div class="tab-pane fade" id="tabGuests">
					<p>
						<label class="erf-field-label" for="fecha_de_evento">
								Fecha del evento:
						</label>
						<input class="erf-field-required" type="date"  name="fecha_de_evento" id="fecha_de_evento" value="<?=$form->fecha_de_evento?>">
					</p>
					<?php if ( in_array( $form->tipo_de_formulario, array( 'gold' ) ) ) : ?>
						<div>
							<p>
								<label class="erf-field-label" for="fecha_de_cierre">
									Cuando quieres que cierre el registro al sitio web para ir a tu evento? (te recomendamos al menos 15 dias antes de tu evento)
								</label>
								<input type="date"  name="fecha_de_cierre" id="fecha_de_cierre" value="<?=$form->fecha_de_cierre?>">
							</p>
						</div>
						<div>
							<p>
								<label class="erf-field-label">
									Tu evento es abierto al público?
								</label>
								<p style='margin-left: 2rem !important;'>
									<label for="abierto_al_publico_si">Sí</label>
									<input class="erf-field-required" style='width:5%;' type="radio" name="abierto_al_publico" id="abierto_al_publico_si" value='1' <?=checked( 1, $form->abierto_al_publico )?>>
								</p>
								<p style='margin-left: 2rem !important;'>
									<label for="abierto_al_publico_no">No</label>
									<input class="erf-field-required" style='width:5%;' type="radio" name="abierto_al_publico" id="abierto_al_publico_no" value='0' <?=checked( 0, $form->abierto_al_publico )?>>
								</p>
								<p id="excel_format_link" style='margin-left: 2rem !important; <?=( 1 == $form->abierto_al_publico)? 'display:none;': ''?>'>
									Para crear tu formulario cerrado, descarga la siguiente <a href="<?=EVENT_REQUEST_FORM_GUESTS_TEMPLATE?>" target="_blank" rel="noopener noreferrer">plantilla</a> y llenala con la lista de tus invitados al finalizar enviala por whatsapp a tu proveedor o al correo hola@floralunar.com
								</p>
							</p>
						</div>
					<?php endif; ?>
					<?php if (isset($renderGuestsTable)): ?>
						<h4>Lista de invitados</h4>
						<div style="text-align: left; margin: 0.5rem 0.5rem 0.5rem 0rem;">
							<input type="text" name="guest_name_query" id ="guest_name_query" style="max-width: 25%;">
							<input type="button" id="filter_guest" value="Filtrar">
							
							<div style="text-align: right; ">
								<input type="button" class="btn btn-primary" id="addGuestModalTrigger" value="Agregar invitado">
							</div>
						</div>
							<table  id="data_table" class="table table-striped wp-list-table widefat fixed striped table-view-list toplevel_page_events_admin_menu">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Apellidos</th>
									<th>Estado</th>
									<th>Fecha de confirmación</th>
									<th>Acompañantes adultos</th>
									<th>Adultos confirmados</th>
									<th>Acompañantes niños</th>
									<th>Niños confirmados</th>
									<th>Asistio</th>
									<?php foreach($questions as $q): ?>
										<th><?=$q['question']?></th>
									<?php endforeach; ?>
									<th>Opciones</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$counter = array(
									'Confirmado' => 0,
									'Pendiente' => 0,
									'Rechazada' => 0,
								);
								?>
								<?php foreach($guests as $guest): ?>
									<?php
									$data_name = str_replace( ' ', '', $guest["first_name"].' '.$guest["last_name"] );
									$state = $guest["state"];
									$style = '';
									if ($state=='Acepta'){
										$style = ' font-weight: bold; ';  
										$state = 'Confirmado';
										$counter['Confirmado'] += 1;
									}
									if ($state=='Rechaza'){
										$state = 'Rechazada';
										$counter['Rechazada'] += 1;
									}
									if ($state=='Pendiente'){
										$counter['Pendiente'] += 1;
									}
									?>
        							<tr data-name='<?=$data_name?>' data-status='<?=$state?>' style='<?=$style?>'>
										<td><?=$guest["first_name"]?></td>
										<td><?=$guest["last_name"]?></td>
										<td><?=$state?></td>
										<td><?=$guest["confirmed_at"]?></td>
										<td><?=$guest["adult_companions"]?></td>
										<td><?=$guest["adult_companions_confirmed"]?></td>
										<td><?=$guest["children_companions"]?></td>
										<td><?=$guest["children_companions_confirmed"]?></td>
										<td><?=$guest["attended"]?></td>
											<?php foreach($questions as $q): ?>
												<td>
												<?php if( isset( $guest["answers"][$q["id"]] ) ) : ?>
													<?=$guest["answers"][$q["id"]]["answer"]?>
												<?php endif; ?>
												</td>
											<?php endforeach; ?>
										</td>
										<td>
											<a href='#'>
												<span data-name='<?=$guest['first_name']?>' data-id='<?=$guest['id']?>' data-event='<?=$form->evl_evento_id?>' class='erf-guest-delete-class'>
													<i class="fa fa-trash" aria-hidden="true"></i>
												</span>
											</a>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
						<div style='text-align:end;'>
							<strong>Confirmadas:</strong><?=$counter['Confirmado']?><br>
							<strong>Pendientes:</strong><?=$counter['Pendiente']?><br>
							<strong>Rechazadas:</strong><?=$counter['Rechazada']?>
						</div>
						<!-- Modal -->

						<div id="addGuestModal" style="display:none;">
							<div class="modal-content">
								<h2>Agregar invitado</h2>
								<form>
									<input type="hidden" id="guestEventId" value="<?=$form->evl_evento_id?>">
									<div class="form-group row">
										<label for="guestFirstName" class="col-sm-2 col-form-label">Nombre</label>
										<div class="col-sm-10">
										<input type="text" class="form-control-plaintext" id="guestFirstName">
										</div>
									</div>
									<div class="form-group row">
										<label for="guestLastName" class="col-sm-2 col-form-label">Apellidos</label>
										<div class="col-sm-10">
										<input type="text" class="form-control-plaintext" id="guestLastName">
										</div>
									</div>
									<div class="form-group row">
										<label for="adultCompanions" class="col-sm-2 col-form-label">Acompañantes adultos</label>
										<div class="col-sm-10">
										<input type="text" class="form-control" id="adultCompanions">
										</div>
									</div>
									<div class="form-group row">
										<label for="childrenCompanions" class="col-sm-2 col-form-label">Acompañantes niños</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="childrenCompanions">
										</div>
									</div>
									<div class="form-group row">
										<div id="guestErrorMessages"></div>
									</div>
									<div class="form-group row">
										<button type="button" class="btn btn-warning" id="closeAddGuestModal">Cancelar</button>
										<button type="button" class="btn btn-primary" id="saveGuestModal">Guardar</button>
									</div>
								</form>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<input class="btn btn-error" type="button" value="Salir" id="exitForm">
		<input class="btn btn-error" type="button" value="Recargar" id="reloadEditForm">
		<input class="btn btn-success" type="button" value="Guardar" id="saveEditForm">
	</form>
</div>
<script>
	const questions = <?php echo json_encode($questions); ?>;
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
		<?php if ( in_array( $form->tipo_de_formulario, array( 'gold' ) ) ) : ?>
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

	jQuery(document).ready(function() {
		jQuery('#filter_guest').on('click', function() {
			let name = jQuery('#guest_name_query').val();
			name = name.replace(/\s+/g, '').toLowerCase();
			var rows = jQuery('#data_table tbody tr');
			rows.each(function() {
				let data_name = jQuery(this).data('name').toLowerCase();
				let data_status = jQuery(this).data('status').toLowerCase();
				if ( ! data_name.includes(name) && ! data_status.includes(name)) {
					jQuery(this).fadeOut();
				} else {
					jQuery(this).fadeIn();
				}
			});
		});

		initMap();
		jQuery('#abierto_al_publico_si').on('click', function(event){
			jQuery('#excel_format_link').fadeOut();
		});
		jQuery('#abierto_al_publico_no').on('click', function(event){
			jQuery('#excel_format_link').fadeIn();
		});

		jQuery('.find-address').on('click', function(event){
			let data_type = jQuery(this).data('type');
			mark_on_map(data_type);
		});

		jQuery('#tipo_de_evento').on('change', function(event){
			const userResponse = confirm("¿Estás seguro de que quieres cambiar el tipo de evento? Los campos serán reiniciados.");
			if (userResponse) {
				updateEventType();
			}
		});

		jQuery('#recomendacion_otraCheck').on('change', function(event){
			const checked = jQuery(this).prop('checked');

			if (checked) {
				jQuery('#recomendacion_otra').removeAttr('disabled');
			}else{
				jQuery('#recomendacion_otra').attr( 'disabled', 'disabled' );
				jQuery('#recomendacion_otra').val(null);
			}
		});

		jQuery('#exitForm').on('click', function(event){
	        window.location.href = window.location.href;
		});

		jQuery('#reloadEditForm').on('click', function(event){
	        location.reload();
		});

		jQuery('#saveEditForm').on('click', function(event){
			const userResponse = confirm("Confirma guardar el formulario?");
			if (userResponse) {
				saveForm();
			}
		});

		jQuery('.erf-guest-delete-class').on('click', function(event){
			event.preventDefault();
			const row = jQuery(this);
			const name = row.data('name')
			const id = row.data('id')
			const eventId = row.data('event')
			if ( confirm('Borrar a ' + name +'?') ) {
				jQuery.ajax({
					type: "POST",
					url: EventRequestFormRequests.url,
					data: {
						key: EventRequestFormRequests.key,
						action: 'erf_remove_guest_row',
						id: id,
						eventId: eventId,
					},
					success: function(response){
						if(response.success){
							row.closest('tr').fadeOut();
						}
					}
				});	

			}
		});

		updateEventType();

		// Modal setup
		jQuery('#addGuestModalTrigger').click(function() {
			jQuery('#addGuestModal').show();
		});

		jQuery('#closeAddGuestModal').click(function() {
			jQuery('#addGuestModal').hide();
			clearGuestModal()
		});
		jQuery('#saveGuestModal').click(function() {
			saveGuestModal()
		});
	});

	function addGuestRow(rowId) {
		const guestFirstName= jQuery('#guestFirstName').val();
		const guestLastName= jQuery('#guestLastName').val();
		const adultCompanions= jQuery('#adultCompanions').val();
		const childrenCompanions= jQuery('#childrenCompanions').val();
		const eventId= jQuery('#guestEventId').val();
	    const questionCells = Array.from({ length: questions.length }, () => '<td></td>').join('');
		const newTr = `<tr data-name='${guestFirstName}' data-status='Pendiente'>
							<td>${guestFirstName}</td>
							<td>${guestLastName}</td>
							<td>Pendiente</td>
							<td></td>
							<td>${adultCompanions}</td>
							<td></td>
							<td>${childrenCompanions}</td>
							<td></td>
							<td>no</td>
							${questionCells}
							<td></td>
						</tr>`;
		const table = jQuery('#data_table').append(newTr);
	}

	function clearGuestModal() {
		jQuery('#guestFirstName').val('');
		jQuery('#guestLastName').val('');
		jQuery('#adultCompanions').val('');
		jQuery('#childrenCompanions').val('');
	}

	function saveGuestModal() {
		let isValid = true;
        let errorMessage = "";
		const guestFirstName= jQuery('#guestFirstName').val();
		const guestLastName= jQuery('#guestLastName').val();
		const adultCompanions= jQuery('#adultCompanions').val();
		const childrenCompanions= jQuery('#childrenCompanions').val();
		const eventId= jQuery('#guestEventId').val();
        const fieldsToValidate = {
			'guestFirstName': 'Nombre',
		};
		
		jQuery('#guestErrorMessages').html('');

		// Check if each field is not empty
		Object.keys(fieldsToValidate).forEach(function(fieldId) {
            const value = jQuery(`#${fieldId}`).val().trim();
            if (!value) {
                isValid = false;
                errorMessage += `* El campo ${fieldsToValidate[fieldId]} no puede estar vacio.<br>`;
            }
        });

		if (!isValid) {
			jQuery('#guestErrorMessages').html(errorMessage);
			return;
		}

		const data = {
			key: EventRequestFormRequests.key,
			action: 'erf_save_new_event_guest',
			eventId: eventId,
			guestFirstName: guestFirstName,
			guestLastName: guestLastName,
			adultCompanions: adultCompanions,
			childrenCompanions: childrenCompanions,
		}
		jQuery('#saveGuestModal').attr('disable', true);
		jQuery('#saveGuestModal').html('Guardando...');
		jQuery.ajax({
			type: "POST",
			url: EventRequestFormRequests.url,
			data: data,
			success: function(response){
				jQuery('#saveGuestModal').html('Guardar');
				jQuery('#saveGuestModal').attr('disable', false);
				if (!response.success) {
					jQuery('#guestErrorMessages').html(response.data);
				} else {
					jQuery('#addGuestModal').hide();
					addGuestRow(response.data);
					clearGuestModal();

				}
			}
		});
	}

	function updateEventType() {
		const opcionSeleccionada = jQuery('#tipo_de_evento').find('option:selected');
		const claseSeleccionada = opcionSeleccionada.data('class');

		jQuery('.custom_field').each(function(index, element){
			jQuery(element).css('display', 'none');
		});
		// Obtener el valor de la clase del elemento seleccionado
		jQuery('.' + claseSeleccionada).each(function(index, element) {
			jQuery(element).css('display', 'block');
		});
	}

	function saveForm() {
		jQuery('#loading-gif').fadeIn();

		jQuery.ajax({
			type: "POST",
			url: EventRequestFormRequests.url,
			data: {
				key: EventRequestFormRequests.key,
				action: 'erf_send_form_data',
				id: jQuery('#formId').val(),
				nombre_del_cliente: jQuery('#nombre_del_cliente').val(),
				tipo_de_formulario: jQuery('#tipo_de_formulario').val(),
				tipo_de_evento: jQuery('#tipo_de_evento').find('option:selected').val(),
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
				sugerencia_de_transporte: jQuery('#sugerencia_de_transporte').val(),
				mesa_de_regalos: jQuery('#mesa_de_regalos').val(),
				intinerario_de_evento: jQuery('#intinerario_de_evento').val(),
				recomendaciones: jQuery('#recomendaciones').val(),
				hashtag: jQuery('#hashtag').val(),
				galeria_de_fotos: jQuery('#galeria_de_fotos').val(),
				whatsapp_I_de_confirmacion: jQuery('#whatsapp_I_de_confirmacion').val(),
				whatsapp_II_de_confirmacion: jQuery('#whatsapp_II_de_confirmacion').val(),
				correo_I_de_confirmacion: jQuery('#correo_I_de_confirmacion').val(),
				correo_II_de_confirmacion: jQuery('#correo_II_de_confirmacion').val(),
				personalizacion_escrita: jQuery('#personalizacion_escrita').val(),
				personalizacion_grafica: jQuery('#personalizacion_grafica').val(),
				whatsapp_de_contacto: jQuery('#whatsapp_de_contacto').val(),
				correo_electronico_de_contacto: jQuery('#correo_electronico_de_contacto').val(),
				comentarios_y_sugerencias: jQuery('#comentarios_y_sugerencias').val(),
				padrinos_extra: jQuery('#padrinos_extra').val(),
				nombre_de_ceremonia_religiosa: jQuery('#nombre_de_ceremonia_religiosa').val(),
				nombre_de_recepcion: jQuery('#nombre_de_recepcion').val(),
				datos_de_hotel_2: jQuery('#datos_de_hotel_2').val(),
				datos_de_hotel_3: jQuery('#datos_de_hotel_3').val(),
				youtube_link: jQuery('#youtube_link').val(),
				ropa_formal: jQuery('#ropa_formal').val(),
				no_ninos: jQuery('#no_ninos').val(),
				recomendacion_otra: jQuery('#recomendacion_otra').val(),
			},
			success: function(response){
				jQuery('#loading-gif').fadeOut();
			}
		});
	}
</script>
