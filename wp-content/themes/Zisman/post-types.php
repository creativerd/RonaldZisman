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
function rz_articles_post_type() {
	$labels = array(
		'name'               => _x( 'Articles', 'post type general name' ),
		'singular_name'      => _x( 'Article', 'post type singular name' ),
		'menu_name'          => _x( 'Articles', 'admin menu' ),
		'name_admin_bar'     => _x( 'Articles', 'add new on admin bar' ),
		'add_new'            => _x( 'Add New Article', 'Article' ),
		'add_new_item'       => __( 'Add New Article' ),
		'new_item'           => __( 'New Article' ),
		'edit_item'          => __( 'Edit Article' ),
		'view_item'          => __( 'View Article' ),
		'all_items'          => __( 'All Articles' ),
		'search_items'       => __( 'Search Articles' ),
		'parent_item_colon'  => __( 'Parent Articles:' ),
		'not_found'          => __( 'No Article found.' ),
		'not_found_in_trash' => __( 'No Article found in Trash.' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'articles' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title' )
	);

	register_post_type( 'rz_articles', $args );
}
add_action( 'init', 'rz_articles_post_type' );

?>