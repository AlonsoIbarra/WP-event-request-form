<?php
/**
 * No comments so far.
 *
 * @since      1.0.0
 * @package    shortcode-classes
 * @author     isaul37@hotmail.es
 */

if ( ! class_exists( 'ERF_FormShortcode' ) ) {
	/**
	 * This class defines all code necessary to render events form.
	 */
	class ERF_FormShortcode {

		/**
		 * Generate html form.
		 *
		 * @since    1.0.0
		 * @access   public
		 * @return   String
		 */
		public function get_content() {

			if ( isset( $_GET['nonce'] ) && ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['nonce'] ) ), 'coverage-nonce' ) ) {
				die( 'Access forbidden. Nonce does not match.' );
			}
			$template_path = dirname( __FILE__ ) . '/templates/form-template.php';
			ob_start();
			load_template( $template_path );
			$output = ob_get_clean();

			return $output;
		}

		/**
		 * Function to get the code.
		 *
		 * @since    1.0.0
		 * @access   public
		 * @return   String
		 */
		public function render_code() {
			$response = $this->get_content();
			return $response;
		}
	}
}

