<?php
/**
 * Template for rendering HTML form.
 *
 * @link       https://https://fiesta.lezlynorman.com
 * @since      1.0.0
 *
 * @package    includes
 */

?>
<div>
	<form method="post" id="erf_request_form">
		<label for="fname">First name:</label><br>
		<input type="text" id="fname" name="fname" value="John">
		<br>
		<label for="lname">Last name:</label><br>
		<input type="text" id="lname" name="lname" value="Doe">
		<br><br>

		<input type="radio" id="html" name="fav_language" value="HTML">
		<label for="html">HTML</label>
		<br>
		<input type="radio" id="css" name="fav_language" value="CSS">
		<label for="css">CSS</label>
		<br>
		<input type="radio" id="javascript" name="fav_language" value="JavaScript">
		<label for="javascript">JavaScript</label>
		<br><br>

		<input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
		<label for="vehicle1"> I have a bike</label>
		<br>
		<input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
		<label for="vehicle2"> I have a car</label>
		<br>
		<input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
		<label for="vehicle3"> I have a boat</label>
		<br><br>

		<input type="submit" value="Enviar">
	</form>
</div>
