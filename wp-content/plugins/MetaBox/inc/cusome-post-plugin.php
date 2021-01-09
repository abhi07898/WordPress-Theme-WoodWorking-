<?php
 
/**
 * Ced_Custome_post_for_test
 *
 * @return void
 */
function Ced_Custome_post_for_test() {
 
	$labels = array(
		'name'               => 'Blogs',
		'singular_name'      => 'Blog',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Blog',
		'edit_item'          => 'Edit Blog',
		'new_item'           => 'New Blog',
		'all_items'          => 'All Blogs',
		'view_item'          => 'View Blog',
		'search_items'       => 'Search Blogs',
		'not_found'          =>  'No Blogs found',
		'not_found_in_trash' => 'No Blogs found in Trash',
		'parent_item_colon'  => '',
		'menu_name'          => 'Blogs'
	);
 
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'Blog' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);
	register_post_type( 'Blog', $args );
 
}
add_action( 'init', 'Ced_Custome_post_for_test' );