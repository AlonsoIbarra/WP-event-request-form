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
$action      = 'see'; 
$event_types = array(
	'baptism_communion' => 'Bautismo o primera comunion',
	'wedding'           => 'Boda',
	'event_other'       => 'Otro',
);
if ( isset( $_GET['id'] ) ){
	$row = $db_service->get_one( $_GET['id'] );
}
if ( isset( $_GET['action'] ) ) {
	$action = $_GET['action'];
}

if ( isset( $_POST['save'] ) ) {
	print_r($_POST);
	$db_service->update_field(
		$row->id,
		'evl_evento_id',
		$_POST['evl_evento_id']
	);
	$row = $db_service->get_one($row->id);
}
set_query_var( 'row', $row );
set_query_var( 'event_types', $event_types );

if ($action == 'edit') {
	$url = menu_page_url( 'request-detail-view', false ).'&action=edit&id=' . $row->id;
	$events = $db_service->get_events();
	set_query_var( 'events', $events );
	set_query_var( 'url', $url );
	$template_path = dirname( __FILE__ ) . '/../templates/edit-single-template.php';
} else {
	$template_path = dirname( __FILE__ ) . '/../templates/single-template.php';
}
load_template( $template_path );
