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
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title' )
	);

	register_post_type( 'rz_articles', $args );
}
add_action( 'init', 'rz_articles_post_type' );

/*
* Articles banner post type
*/
function rz_articles_banner_post_type() {
  $labels = array(
    'name'              => 'Articles Banner Image',
    'singular_name'     => 'Articles Banner Image',
    'add_new'           => '',
    'add_new_item'      => 'Add Articles Banner Image',
    'edit_item'         => 'Edit Articles Banner',
    'new_item'          => 'New Articles Banner Image',
    'all_items'         => 'Articles Banner Image',
    'view_item'         => 'View Articles Banner Image',
    'search_items'      => 'Search Articles Banner Image',
    'not_found'         =>  'No Articles Banner Image found',
    'not_found_in_trash' => 'No Articles Banner Image found in Trash', 
    'parent_item_colon' => '',
    'menu_name'         => 'Articles Banner Image'
  );

  $args = array(
    'labels'                => $labels,
    'public'                => true,
    'publicly_queryable'    => true,
    'show_ui'               => true, 
    'show_in_menu'          => 'edit.php?post_type=rz_articles', 
    'query_var'             => true,
    'rewrite'               => array( 'slug' => 'articles-banner' ),
    'capability_type'       => 'post',
    'has_archive'           => true, 
    'hierarchical'          => true,
    'menu_position'         => null,
    'supports'              => array( 'title' )
  ); 

  register_post_type( 'rz_articles_banner', $args );
}
add_action( 'init', 'rz_articles_banner_post_type' );


/**
 * Bio post type.
 **/
function rz_bio_post_type() {
	$labels = array(
		'name'               => _x( 'Attorney Bio', 'post type general name' ),
		'singular_name'      => _x( 'Attorney Bio', 'post type singular name' ),
		'menu_name'          => _x( 'Attorney Bio', 'admin menu' ),
		'name_admin_bar'     => _x( 'Attorney Bio', 'add new on admin bar' ),
		'add_new'            => _x( 'Add New Attorney Bio', 'Biography' ),
		'add_new_item'       => __( 'Add New Attorney Bio' ),
		'new_item'           => __( 'New Attorney Bio' ),
		'edit_item'          => __( 'Edit Attorney Bio' ),
		'view_item'          => __( 'View Attorney Bio' ),
		'all_items'          => __( 'Edit Attorney Bio' ),
		'search_items'       => __( 'Search Attorney Bio' ),
		'parent_item_colon'  => __( 'Parent Attorney Bio:' ),
		'not_found'          => __( 'No Attorney Bio found.' ),
		'not_found_in_trash' => __( 'No Attorney Bio found in Trash.' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'bio' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title' )
	);

	register_post_type( 'rz_bio', $args );
}
add_action( 'init', 'rz_bio_post_type' );

/*
* Bio banner post type
*/
function rz_bio_banner_post_type() {
  $labels = array(
    'name'              => 'Biography Banner Image',
    'singular_name'     => 'Biography Banner Image',
    'add_new'           => '',
    'add_new_item'      => 'Add Biography Banner Image',
    'edit_item'         => 'Edit Biography Banner',
    'new_item'          => 'New Biography Banner Image',
    'all_items'         => 'Biography Banner Image',
    'view_item'         => 'View Biography Banner Image',
    'search_items'      => 'Search Biography Banner Image',
    'not_found'         =>  'No Biography Banner Image found',
    'not_found_in_trash' => 'No Biography Banner Image found in Trash', 
    'parent_item_colon' => '',
    'menu_name'         => 'Biography Banner Image'
  );

  $args = array(
    'labels'                => $labels,
    'public'                => true,
    'publicly_queryable'    => true,
    'show_ui'               => true, 
    'show_in_menu'          => 'edit.php?post_type=rz_bio', 
    'query_var'             => true,
    'rewrite'               => array( 'slug' => 'bio-banner' ),
    'capability_type'       => 'post',
    'has_archive'           => true, 
    'hierarchical'          => true,
    'menu_position'         => null,
    'supports'              => array( 'title' )
  ); 

  register_post_type( 'rz_bio_banner', $args );
}
add_action( 'init', 'rz_bio_banner_post_type' );


?>