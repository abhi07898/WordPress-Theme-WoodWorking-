<?php
add_action( 'admin_menu', 'ced_mat_box_setting' );
function ced_mat_box_setting() {
    add_menu_page(
        'meta-box-setting',
        'Meta Setting',
        'manage_options',
        'meta-setting',
        'ced_mat_box_setting_html',
        'dashicons-admin-network',
        5
    );
}
function ced_mat_box_setting_html() {
	<?php
	$args = array(
	   'public'   => true,
	   '_builtin' => false
	);
	  
	$output = 'names'; // 'names' or 'objects' (default: 'names')
	$operator = 'and'; // 'and' or 'or' (default: 'and')
	  
	$post_types = get_post_types( $args, $output, $operator );
	  
	if ( $post_types ) { // If there are any custom public post types.
	  
	    echo '<ul>';
	  
	    foreach ( $post_types  as $post_type ) {
	        echo '<li>' . $post_type . '</li>';
	    }
	  
	    echo '<ul>';
	  
	}
?>
}

?>