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
	 *
	 * @param  array $atts Shortcode attributes.
	 * @return string Shortcode output.
	 */
	function render_form_shortcode( $atts ) {
		$attributes = shortcode_atts(
			array(
				'type' => 'bronze',
			),
			$atts
		);
		$form = new ERF_FormShortcode( $attributes );
		return $form->render_code();
	}
}
add_shortcode( 'ERF_FORM', 'render_form_shortcode' );
