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


/**
 * Immigration Links post type.
 **/
function rz_immigration_links_post_type() {
	$labels = array(
		'name'               => _x( 'Immigration Links', 'post type general name' ),
		'singular_name'      => _x( 'Immigration Links', 'post type singular name' ),
		'menu_name'          => _x( 'Immigration Links', 'admin menu' ),
		'name_admin_bar'     => _x( 'Immigration Links', 'add new on admin bar' ),
		'add_new'            => _x( 'Add New Immigration Links', 'Immigration Links' ),
		'add_new_item'       => __( 'Add New Immigration Links' ),
		'new_item'           => __( 'New Immigration Links' ),
		'edit_item'          => __( 'Edit Immigration Links' ),
		'view_item'          => __( 'View Immigration Links' ),
		'all_items'          => __( 'Edit Immigration Links' ),
		'search_items'       => __( 'Search Immigration Links' ),
		'parent_item_colon'  => __( 'Parent Immigration Links:' ),
		'not_found'          => __( 'No Immigration Links found.' ),
		'not_found_in_trash' => __( 'No Immigration Links found in Trash.' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'immigration-links' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title' )
	);

	register_post_type( 'rz_immigration', $args );
}
add_action( 'init', 'rz_immigration_links_post_type' );

/*
* Immigration Links banner post type
*/
function rz_immigration_links_banner_post_type() {
  $labels = array(
    'name'              => 'Immigration Links Banner Image',
    'singular_name'     => 'Immigration Links Banner Image',
    'add_new'           => '',
    'add_new_item'      => 'Add Immigration Links Banner Image',
    'edit_item'         => 'Edit Immigration Links Banner',
    'new_item'          => 'New Immigration Links Banner Image',
    'all_items'         => 'Immigration Links Banner Image',
    'view_item'         => 'View Immigration Links Banner Image',
    'search_items'      => 'Search Immigration Links Banner Image',
    'not_found'         =>  'No Immigration Links Banner Image found',
    'not_found_in_trash' => 'No Immigration Links Banner Image found in Trash', 
    'parent_item_colon' => '',
    'menu_name'         => 'Immigration Links Banner Image'
  );

  $args = array(
    'labels'                => $labels,
    'public'                => true,
    'publicly_queryable'    => true,
    'show_ui'               => true, 
    'show_in_menu'          => 'edit.php?post_type=rz_immigration', 
    'query_var'             => true,
    'rewrite'               => array( 'slug' => 'immigration-banner' ),
    'capability_type'       => 'post',
    'has_archive'           => true, 
    'hierarchical'          => true,
    'menu_position'         => null,
    'supports'              => array( 'title' )
  ); 

  register_post_type( 'rz_immigrationbanner', $args );
}
add_action( 'init', 'rz_immigration_links_banner_post_type' );


/**
* US Immigration post type.
**/
function rz_us_immigration_post_type() {
	$labels = array(
		'name'               => _x( 'US Immigration', 'post type general name' ),
		'singular_name'      => _x( 'US Immigration', 'post type singular name' ),
		'menu_name'          => _x( 'US Immigration', 'admin menu' ),
		'name_admin_bar'     => _x( 'US Immigration', 'add new on admin bar' ),
		'add_new'            => _x( 'Add New US Immigration', 'US Immigration' ),
		'add_new_item'       => __( 'Add New US Immigration' ),
		'new_item'           => __( 'New US Immigration' ),
		'edit_item'          => __( 'Edit US Immigration' ),
		'view_item'          => __( 'View US Immigration' ),
		'all_items'          => __( 'Edit US Immigration' ),
		'search_items'       => __( 'Search US Immigration' ),
		'parent_item_colon'  => __( 'Parent US Immigration:' ),
		'not_found'          => __( 'No US Immigration found.' ),
		'not_found_in_trash' => __( 'No US Immigration found in Trash.' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'us-immigration' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title' )
	);

	register_post_type( 'rz_us_immigration', $args );
}
add_action( 'init', 'rz_us_immigration_post_type' );

/*
* US Immigration banner post type
*/
function rz_us_immigration_banner_post_type() {
  $labels = array(
    'name'              => 'US Immigration Banner Image',
    'singular_name'     => 'US Immigration Banner Image',
    'add_new'           => '',
    'add_new_item'      => 'Add US Immigration Banner Image',
    'edit_item'         => 'Edit US Immigration Banner',
    'new_item'          => 'New US Immigration Banner Image',
    'all_items'         => 'US Immigration Banner Image',
    'view_item'         => 'View US Immigration Banner Image',
    'search_items'      => 'Search US Immigration Banner Image',
    'not_found'         =>  'No US Immigration Banner Image found',
    'not_found_in_trash' => 'No US Immigration Banner Image found in Trash', 
    'parent_item_colon' => '',
    'menu_name'         => 'US Immigration Banner Image'
  );

  $args = array(
    'labels'                => $labels,
    'public'                => true,
    'publicly_queryable'    => true,
    'show_ui'               => true, 
    'show_in_menu'          => 'edit.php?post_type=rz_us_immigration', 
    'query_var'             => true,
    'rewrite'               => array( 'slug' => 'us-immigration-banner' ),
    'capability_type'       => 'post',
    'has_archive'           => true, 
    'hierarchical'          => true,
    'menu_position'         => null,
    'supports'              => array( 'title' )
  ); 

  register_post_type( 'rz_us_immig_banner', $args );
}
add_action( 'init', 'rz_us_immigration_banner_post_type' );


/**
* Contact post type.
**/
function rz_contact_post_type() {
	$labels = array(
		'name'               => _x( 'Contact', 'post type general name' ),
		'singular_name'      => _x( 'Contact', 'post type singular name' ),
		'menu_name'          => _x( 'Contact', 'admin menu' ),
		'name_admin_bar'     => _x( 'Contact', 'add new on admin bar' ),
		'add_new'            => _x( 'Add New Contact', 'Contact' ),
		'add_new_item'       => __( 'Add New Contact' ),
		'new_item'           => __( 'New Contact' ),
		'edit_item'          => __( 'Edit Contact' ),
		'view_item'          => __( 'View Contact' ),
		'all_items'          => __( 'Edit Contact' ),
		'search_items'       => __( 'Search Contact' ),
		'parent_item_colon'  => __( 'Parent Contact:' ),
		'not_found'          => __( 'No Contact found.' ),
		'not_found_in_trash' => __( 'No Contact found in Trash.' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'contact' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title' )
	);

	register_post_type( 'rz_contact', $args );
}
add_action( 'init', 'rz_contact_post_type' );

?>