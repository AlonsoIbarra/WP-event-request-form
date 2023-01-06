<?php
/**
 * File that contents all plugin shortcodes.
 *
 * @package           Event_Memories
 */

/***
 *  Include shortcode class file.
 */
$formshortcode_class_path = plugin_dir_path( __FILE__ ) . 'shortcode-classes/class-formshortcode.php';
if ( file_exists( $formshortcode_class_path ) ) {
	require_once $formshortcode_class_path;
}


if ( ! function_exists( 'render_form_shortcode' ) ) {
	/**
	 * Function to render HTML code.
	 */
	function render_form_shortcode() {
		$form = new ERF_FormShortcode();
		echo $form->render_code();
	}
}
add_shortcode( 'ERF_FORM', 'render_form_shortcode' );
