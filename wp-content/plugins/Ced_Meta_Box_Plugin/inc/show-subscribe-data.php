<?php
// now implimttion of list-table in this plugin
if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class Subscriobe_data extends WP_List_Table {

	/** Class constructor */
	public function __construct() {

		parent::__construct( [
			'singular' => __( 'Subscribe', 'sp' ), //singular name of the listed records
			'plural'   => __( 'Subscribes', 'sp' ), //plural name of the listed records
			'ajax'     => false //should this table support ajax?

		] );

	}
	public function data_fatched() {
	$args = array(
	'post_type' => '',
	//'post_status' => 'publish',
	'fields' => 'ids',
	'meta_query' => array(
	  array(
	'meta_key' => 'ced_subscribed_email',
	'compare' => 'exist',
	),
  ),
);

$result_query = new WP_Query( $args );
$ID_array = $result_query->posts;
// print_r($result_query);
  // Restore original Post Data
wp_reset_postdata();
return $ID_array;
}
public function item_array_fatched_data() {
	$data = $this->data_fatched();
	// print_r($data);
	$array_for_item_data = array();
	foreach($data as $val) {
		$value = get_post_meta($val, 'ced_subscribed_email', 1 );
		foreach($value as $email) 
		$array_for_item_data[] = array("id" => $val ,"email" => $email, "post_title" => get_the_title($val));
		// echo ($val); 	
		// print_r($value);
		// foreach ($val as )
	}
	return $array_for_item_data; 	
}
	/** Text displayed when no customer data is available */
public function no_items() {
  _e( 'No customers avaliable.', 'sp' );
}

/**
 * Render a column when no column specific method exists.
 *
 * @param array $item
 * @param string $column_name
 *
 * @return mixed
 */
public function column_default( $item, $column_name ) {
  switch ( $column_name ) {
    case 'id':
    case 'email':
    case 'post_title':
      return $item[ $column_name ];
    default:
      return print_r( $item, true ); //Show the whole array for troubleshooting purposes
  }
}
/**
 *  Associative array of columns
 *
 * @return array
 */
function get_columns() {
  $columns = [
    // 'cb'      => '<input type="checkbox" />',
    'id'    => __( 'ID', 'sp' ),
    'email' => __( 'Email', 'sp' ),
    'post_title'    => __( 'Post Title', 'sp' )
  ];

  return $columns;
}
/**
 * Handles data query and filter, sorting, and pagination.
 */
public function prepare_items() {

    $this->_column_headers = $this->item_array_fatched_data();
	$columns = $this->get_columns();
	$hidden = array();
	$sortable = array();
	$this->_column_headers = array($columns, $hidden, $sortable);
    $this->items = $this->item_array_fatched_data();
}
}

function class_calling()  {
	$objcte = new Subscriobe_data();
	$objcte->prepare_items();
	$objcte->display();
}
class_calling();
?>