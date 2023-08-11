<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://https://www.linkedin.com/in/saulalonsoibarra-software-engineer/
 * @since      1.0.0
 *
 * @package    Event_Memories
 * @subpackage Event_Memories/admin/partials
 */

?>

<?php
/**
 * Provide a public-facing view for the plugin.
 *
 * @link       https://floralunar.com
 * @since      1.0.0
 *
 * @package    includes
 */

// check permission.
if ( ! is_admin() ) {
	die( 'Request not allowed.' );
}


if ( ! class_exists( 'ERFDatabaseService' ) ) {
	require_once plugin_dir_path( __FILE__ ) . 'services/class-erfdatabaseservice.php';
}
$db_service = new ERFDatabaseService();

if ( isset( $_GET['q'] ) ) {
	$_GET['q'] = trim( $_GET['q'] );
	if ( '' !== $_GET['q'] ) {
		$result = $db_service->filter( $_GET['q'] );
	}
}
if ( null === $result ) {
	$result = $db_service->get_all();
}
$template_path = dirname( __FILE__ ) . '/../templates/list-template.php';
set_query_var( 'result', $result );
load_template( $template_path );
