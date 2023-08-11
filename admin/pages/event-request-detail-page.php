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
$db_service  = new ERFDatabaseService();
$row         = null;
$event_types = array(
	'baptism_communion' => 'Bautismo o primera comunion',
	'wedding'           => 'Boda',
	'event_other'       => 'Otro',
);

if ( isset( $_GET['id'] ) ){
	$row = $db_service->get_one( $_GET['id'] );
}

$template_path = dirname( __FILE__ ) . '/../templates/single-template.php';
set_query_var( 'row', $row );
set_query_var( 'event_types', $event_types );
load_template( $template_path );
