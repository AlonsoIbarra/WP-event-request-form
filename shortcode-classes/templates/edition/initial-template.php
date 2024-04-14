<?php
/**
 * Template for rendering HTML form.
 *
 * @link  https://https://floralunar.com
 * @since 1.0.0
 *
 * @package templates
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
        /* Custom styling to center the form */
        .center-form {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh; /* Set the height to 100% of the viewport height */
        }
</style>

<div class="container text-center">
	<div class="row align-items-center">
		<div class="card-body">
			<h5 class="card-title">Floralunar</h5>
			<p class="card-text">Aqui puede contiuar enviando los datos de su evento.</p>
		</div>
	</div>
</div>
<div class="container text-center ">
	<div class="row align-items-center">
		<div class="col align-self-center">
			<?php if(isset($notFound)): ?>
				<h3>Registro no encontrado</h3>
			<?php endif;?>
			<form method="POST">
				<div class=" mb-3  align-items-center">
					<div class="col-auto">
						<label for="token" class="col-form-label">Token proporcionado: ej. bq807wcgmspj4</label>
					</div>
					<div class="col-auto">
						<input type="text" class="form-control" name="token">
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Consultar mis datos</button>
			</form>
		</div>
	</div>
</div>