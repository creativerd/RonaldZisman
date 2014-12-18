<?php

/**
 * Homepage post type.
 **/
function rz_homepage_post_type() {
	$labels = array(
		'name'               => _x( 'Homepage', 'post type general name' ),
		'singular_name'      => _x( 'Homapage', 'post type singular name' ),
		'menu_name'          => _x( 'Homepage', 'admin menu' ),
		'name_admin_bar'     => _x( 'Homapage', 'add new on admin bar' ),
		'add_new'            => _x( 'Add New', 'Homapage' ),
		'add_new_item'       => __( 'Add New Homapage' ),
		'new_item'           => __( 'New Homapage' ),
		'edit_item'          => __( 'Edit Homapage' ),
		'view_item'          => __( 'View Homapage' ),
		'all_items'          => __( 'All Homepage' ),
		'search_items'       => __( 'Search Homepage' ),
		'parent_item_colon'  => __( 'Parent Homepage:' ),
		'not_found'          => __( 'No Homepage found.' ),
		'not_found_in_trash' => __( 'No Homepage found in Trash.' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'home' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title' )
	);

	register_post_type( 'rz_homepage', $args );
}
add_action( 'init', 'rz_homepage_post_type' );


/**
 * Articles post type.
 **/

?>