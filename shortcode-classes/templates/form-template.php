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
	height: 15px;
	width: 15px;
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
</style>

<form id="erf_request_form">
	<h1>Información de tu evento:</h1>
	<!-- One "tab" for each step in the form: -->
	<div class="tab">Nombre del cliente:
		<p><input placeholder="Nombre del cliente" oninput="this.className = ''" name="nombre_del_cliente" id="nombre_del_cliente"></p>
	</div>
	<div class="tab">Tipo de evento:
		<section>
			<div>
				<input type="radio" class="tipo_de_evento" name="tipo_de_evento" value="weeding" data-class="weeding"/>
				<label for="weeding">Boda</label>
			</div>
			<div>
				<input type="radio" class="tipo_de_evento" name="tipo_de_evento" value="baptism_communion" data-class="baptism_communion"/>
				<label for="baptism_communion">XV años | Bautizo | 1ra. Comunión</label>
			</div>
			<div>
				<input type="radio" class="tipo_de_evento" name="tipo_de_evento" value="event_other" data-class="event_other"/>
				<label for="event_other">Otro</label>
			</div>
		</section>
	</div>
	<div class="tab">
		<p class="weeding custom_field">
			<label for="nombre_de_novia">Nombre de la novia:</label>
			<input placeholder="Nombre de la novia" oninput="this.className = ''" name="nombre_de_novia" id='nombre_de_novia'>
		</p>
		<p class="weeding custom_field">
			<label for="nombre_de_novio">Nombre del novio:</label>
			<input placeholder="Nombre del novio" oninput="this.className = ''" name="nombre_de_novio" id='nombre_de_novio'>
		</p>
		<p class="baptism_communion event_other custom_field">
			<label for="nombre_de_festejado">Nombre de la/del festejada/o:</label>
			<input placeholder="Nombre de la/del festejada/o" oninput="this.className = ''" name="nombre_de_festejado" id='nombre_de_festejado'>
		</p>
	</div>
	<div class="tab">
		<p>
			<label for="nombre_de_festejado">Fecha del evento:</label>
			<input type="date" placeholder="Fecha del evento" oninput="this.className = ''" name="fecha_de_evento" id="fecha_de_evento">
		</p>
	</div>
	<div class="tab">
		<p>
			<label for="frase_de_bienvenida">Frase de bienvenida:</label>
			<textarea placeholder="Frase de bienvenida" oninput="this.className = ''" name="frase_de_bienvenida" id="frase_de_bienvenida"></textarea>
		</p>
	</div>
	<div class="tab">
		<p class="weeding custom_field">
			<label for="madre_de_novia">Madre de la novia:</label>
			<input placeholder="Madre de la novia" oninput="this.className = ''" name="madre_de_novia" id='madre_de_novia'>
		</p>
		<p class="weeding custom_field">
			<label for="padre_de_novia">Padre de la novia:</label>
			<input placeholder="Padre de la novia" oninput="this.className = ''" name="padre_de_novia" id='padre_de_novia'>
		</p>
		<p class="weeding custom_field">
			<label for="madre_de_novio">Madre del novio:</label>
			<input placeholder="Madre del novio" oninput="this.className = ''" name="madre_de_novio" id='madre_de_novio'>
		</p>
		<p class="weeding custom_field">
			<label for="padre_de_novio">Padre del novio:</label>
			<input placeholder="Padre del novio" oninput="this.className = ''" name="padre_de_novio" id='padre_de_novio'>
		</p>
		<p class="baptism_communion event_other custom_field">
			<label for="madre_del_festejado">Madre de la/del festejada/o:</label>
			<input placeholder="Madre de la/del festejada/o" oninput="this.className = ''" name="madre_del_festejado" id='madre_del_festejado'>
		</p>
		<p class="baptism_communion event_other custom_field">
			<label for="padre_del_festejado">Padre de la/del festejada/o:</label>
			<input placeholder="Padre de la/del festejada/o" oninput="this.className = ''" name="padre_del_festejado" id='padre_del_festejado'>
		</p>
	</div>
	<div class="tab">
		<p class="weeding custom_field">
			<label for="nombre_de_madrina_de_arras">Nombre de madrina de aras:</label>
			<input placeholder="Nombre de madrina de aras" oninput="this.className = ''" name="nombre_de_madrina_de_arras" id='nombre_de_madrina_de_arras'>
		</p>
		<p class="weeding custom_field">
			<label for="nombre_de_padrino_de_arras">Nombre de padrino de aras:</label>
			<input placeholder="Nombre de padrino de aras" oninput="this.className = ''" name="nombre_de_padrino_de_arras" id='nombre_de_padrino_de_arras'>
		</p>
		<p class="weeding custom_field">
			<label for="nombre_de_madrina_de_lazo">Nombre de madrina de lazo:</label>
			<input placeholder="Nombre de madrina de lazo" oninput="this.className = ''" name="nombre_de_madrina_de_lazo" id='nombre_de_madrina_de_lazo'>
		</p>
		<p class="weeding custom_field">
			<label for="nombre_de_padrino_de_lazo">Nombre de padrino de lazo:</label>
			<input placeholder="Nombre de padrino de lazo" oninput="this.className = ''" name="nombre_de_padrino_de_lazo" id='nombre_de_padrino_de_lazo'>
		</p>
		<p class="weeding custom_field">
			<label for="nombre_de_madrina_de_anillos">Nombre de madrina de anillos:</label>
			<input placeholder="Nombre de madrina de anillos" oninput="this.className = ''" name="nombre_de_madrina_de_anillos" id='nombre_de_madrina_de_anillos'>
		</p>
		<p class="weeding custom_field">
			<label for="nombre_de_padrino_de_anillos">Nombre de padrino de anillos:</label>
			<input placeholder="Nombre de padrino de anillos" oninput="this.className = ''" name="nombre_de_padrino_de_anillos" id='nombre_de_padrino_de_anillos'>
		</p>
		<p class="weeding custom_field">
			<label for="nombre_de_madrina_de_velacion">Nombre de madrina de velación:</label>
			<input placeholder="Nombre de madrina de velación" oninput="this.className = ''" name="nombre_de_madrina_de_velacion" id='nombre_de_madrina_de_velacion'>
		</p>
		<p class="weeding custom_field">
			<label for="nombre_de_padrino_de_velacion">Nombre de padrino de velación:</label>
			<input placeholder="Nombre de padrino de velación" oninput="this.className = ''" name="nombre_de_padrino_de_velacion" id='nombre_de_padrino_de_velacion'>
		</p>
		<p class="baptism_communion event_other custom_field">
			<label for="nombre_de_madrina">Nombre de la madrina:</label>
			<input placeholder="Nombre de la madrina" oninput="this.className = ''" name="nombre_de_madrina" id='nombre_de_madrina'>
		</p>
		<p class="baptism_communion event_other custom_field">
			<label for="nombre_de_padrino">Nombre del padrino:</label>
			<input placeholder="Nombre del padrino" oninput="this.className = ''" name="nombre_de_padrino" id='nombre_de_padrino'>
		</p>
	</div>
	<div class="tab">
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
		<p>
			<label for="hora_de_ceremonia_religiosa">Hora de ceremonia religiosa:</label>
			<input placeholder="Hora de ceremonia religiosa" oninput="this.className = ''" name="hora_de_ceremonia_religiosa" id='hora_de_ceremonia_religiosa'>
		</p>
		<p>
			<label for="link_de_google_maps_de_ceremonia_religiosa">Link de google maps de ceremonia religiosa:</label>
			<input placeholder="Link de google maps de ceremonia religiosa" oninput="this.className = ''" name="link_de_google_maps_de_ceremonia_religiosa" id='link_de_google_maps_de_ceremonia_religiosa'>
		</p>
	</div>
	<div class="tab">
		<p>
			<label for="direccion_de_recepcion">Dirección de recepción:</label>
			<input placeholder="Dirección de recepción" oninput="this.className = ''" name="direccion_de_recepcion" id='direccion_de_recepcion'>
		</p>
		<p>
			<label for="ciudad_de_recepcion">Ciudad de recepción:</label>
			<input placeholder="Ciudad de recepción" oninput="this.className = ''" name="ciudad_de_recepcion" id='ciudad_de_recepcion'>
		</p>
		<p>
			<label for="estado_de_recepcion">Estado de recepción:</label>
			<input placeholder="Estado de recepción" oninput="this.className = ''" name="estado_de_recepcion" id='estado_de_recepcion'>
		</p>
		<p>
			<label for="pais_de_recepcion">Pais de recepción:</label>
			<input placeholder="Pais de recepción" oninput="this.className = ''" name="pais_de_recepcion" id='pais_de_recepcion'>
		</p>
		<p>
			<label for="codigo_postal_de_recepcion">Código postal de recepción:</label>
			<input placeholder="Código postal de recepción" oninput="this.className = ''" name="codigo_postal_de_recepcion" id='codigo_postal_de_recepcion'>
		</p>
		<p>
			<label for="hora_de_recepcion">Hora de recepción:</label>
			<input type="time" placeholder="Hora de recepción" oninput="this.className = ''" name="hora_de_recepcion" id='hora_de_recepcion'>
		</p>
		<p>
			<label for="link_de_google_maps_de_recepcion">Link de google maps de recepción:</label>
			<input placeholder="Link de google maps de recepción" oninput="this.className = ''" name="link_de_google_maps_de_recepcion" id='link_de_google_maps_de_recepcion'>
		</p>
	</div>
	<div class="tab">
		<p>
			<label for="mesa_de_regalos">Mesa de regalos:</label>
			<input placeholder="Mesa de regalos" oninput="this.className = ''" name="mesa_de_regalos" id='mesa_de_regalos'>
		</p>
	</div>
	<div class="tab">
		<p>
			<label for="intinerario_de_evento">Intinerario de evento:</label>
			<textarea oninput="this.className = ''" name="intinerario_de_evento" id='intinerario_de_evento'></textarea>
		</p>
	</div>
	<div class="tab">
		<p>
			<label for="recomendaciones">Recomendaciones:</label>
			<textarea oninput="this.className = ''" name="recomendaciones" id='recomendaciones'></textarea>
		</p>
		<p>
			<label for="hashtag">#Hashtag:</label>
			<input placeholder="Hastag" oninput="this.className = ''" name="hashtag" id='hashtag'>
		</p>
	</div>
	<div class="tab">
		<p>
			<label for="galeria_de_fotos">Galeria de fotos:</label>
			<input placeholder="Link de galeria de fotos" oninput="this.className = ''" name="galeria_de_fotos" id='galeria_de_fotos'>
		</p>
	</div>
	<div class="tab">
		<p>
			<label for="whatsapp_I_de_confirmacion">Whatsapp de confirmación:</label>
			<input placeholder="Whatsapp de confirmación" oninput="this.className = ''" name="whatsapp_I_de_confirmacion" id='whatsapp_I_de_confirmacion'>
		</p>
		<p>
			<label for="whatsapp_II_de_confirmacion">Whatsapp de confirmación II:</label>
			<input placeholder="Whatsapp de confirmación II" oninput="this.className = ''" name="whatsapp_II_de_confirmacion" id='whatsapp_II_de_confirmacion'>
		</p>
	</div>
	<div class="tab">
		<p>Personalizacion</p>
		<p>
			<label for="personalizacion_escrita">Descripción escrita:</label>
			<textarea oninput="this.className = ''" name="personalizacion_escrita" id='personalizacion_escrita'></textarea>
		</p>
		<p>
			<label for="personalizacion_grafica">Descripción gráfica:</label>
			<input placeholder="Descripción gráfica" oninput="this.className = ''" name="personalizacion_grafica" id='personalizacion_grafica'>
		</p>
	</div>
	<div class="tab">
		<p>
			<label for="whatsapp_de_contacto">Whatsapp de contacto:</label>
			<input placeholder="Whatsapp de contacto" oninput="this.className = ''" name="whatsapp_de_contacto" id='whatsapp_de_contacto'>
		</p>
		<p>
			<label for="correo_electronico_de_contacto">Correo electrónico de contacto:</label>
			<input placeholder="Correo electrónico de contacto" oninput="this.className = ''" name="correo_electronico_de_contacto" id='correo_electronico_de_contacto'>
		</p>
	</div>
	<div class="tab">
		<p>
			<label for="comentarios_y_sugerencias">Comentarios y sugerencias:</label>
			<input placeholder="Comentarios y sugerencias" oninput="this.className = ''" name="comentarios_y_sugerencias" id='comentarios_y_sugerencias'>
		</p>
	</div>
	<div style="overflow:auto;">
	<div style="float:right;">
		<button type="button" id="prevBtn" onclick="nextPrev(-1)">Anterior</button>
		<button type="button" id="nextBtn" onclick="nextPrev(1)">Siguiente</button>
	</div>
	</div>
	<!-- Circles which indicates the steps of the form: -->
	<div style="text-align:center;margin-top:40px;">
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
	jQuery(document).ready(function() {
		jQuery('.tipo_de_evento').on('change', function(event){
			jQuery('.custom_field').each(function(index, element){
				jQuery(element).css('display', 'none');
			});

			let class_name = jQuery(this).data('class');
			jQuery('.' + class_name).each(function(index, element) {
				// var currentElement = jQuery(this);
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
						if(response.success){
							console.log('OK');
						}else{
							console.log('error');
						}
						console.log(response);
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
	y = x[currentTab].getElementsByTagName("input");
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
