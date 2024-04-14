<?php
/**
 * File that contents all plugin shortcodes.
 *
 * @package           Event_Memories
 */

/***
 *  Include form shortcode class file.
 */
$formshortcode_class_path = plugin_dir_path( __FILE__ ) . 'shortcode-classes/class-formshortcode.php';
if ( file_exists( $formshortcode_class_path ) ) {
	require_once $formshortcode_class_path;
}

/***
 *  Include edit form shortcode class file.
 */
$editformshortcode_class_path = plugin_dir_path( __FILE__ ) . 'shortcode-classes/class-editformshortcode.php';
if ( file_exists( $editformshortcode_class_path ) ) {
	require_once $editformshortcode_class_path;
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


if ( ! function_exists( 'render_edit_form_shortcode' ) ) {
	/**
	 * Function to render HTML code.
	 *
	 * @param  array $atts Shortcode attributes.
	 * @return string Shortcode output.
	 */
	function render_edit_form_shortcode( $atts ) {
		$form = new ERF_EditFormShortcode();
		return $form->render_code();
	}
}
add_shortcode( 'ERF_EDIT_FORM', 'render_edit_form_shortcode' );
