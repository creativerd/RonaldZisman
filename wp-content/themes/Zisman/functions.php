<?php

/**
* SETUP
**/
function pz_setup() {

	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 300, 225, true );
	// add_image_size( 'pz-mobile', 500, 375, true );
	// add_image_size( 'pz-small', 800, 600, true );
	// add_image_size( 'pz-medium', 1200, 900, true );
	// add_image_size( 'pz-large', 1800, 1314, true );
	// add_image_size( 'pz-extra-large', 2500, 1875, true );
	add_image_size( 'pz-mobile-portrait', 380, 450, true );
	add_image_size( 'pz-mobile', 500, 375, true );
	add_image_size( 'pz-small', 800, 528, true );
	add_image_size( 'pz-medium', 1200, 792, true );
	add_image_size( 'pz-large', 1800, 1188, true );
	add_image_size( 'pz-extra-large', 2500, 1650, true );

	add_image_size( 'pz-banner-extra-large', 2500, 832, true );
	add_image_size( 'pz-banner-large', 1800, 600, true );
	add_image_size( 'pz-banner-medium', 1200, 400, true );
	add_image_size( 'pz-banner-small', 800, 266, true );

	add_theme_support('html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	));

	remove_filter( 'the_content', 'wpautop' );
	remove_filter( 'the_excerpt', 'wpautop' );
	//remove_filter ('acf_the_content', 'wpautop');

}
add_action('after_setup_theme', 'pz_setup');

/**
* SCRIPTS AND CSS
**/
function pz_scripts() {
	wp_enqueue_style( 'pz-browserhappy-ie', get_template_directory_uri() . '/library/css/ie.css', array(), '16-12-2014' );
	wp_style_add_data( 'pz-browserhappy-ie', 'conditional', 'lt IE 9' );

	// foundation
	wp_enqueue_style( 'foundation', get_template_directory_uri() . '/library/css/foundation.css', array(), '16-12-2014' );
	// modernizer
	wp_enqueue_script( 'pz-modernizer', get_template_directory_uri() . '/library/js/vendors/modernizr.js', array(), '1.5', false );
	// picturefill
	wp_enqueue_script( 'pz-picturefill', get_template_directory_uri() . '/library/js/vendors/picturefill.js', array(), '2.2.0', true );
	// custom maion script
	wp_enqueue_script( 'pz-script', get_template_directory_uri() . '/library/js/pz-main.js', array('jquery'), '1.0', true );
}
add_action('wp_enqueue_scripts', 'pz_scripts');

function md_footer_enqueue_scripts() {
    remove_action('wp_head', 'wp_print_scripts');
    remove_action('wp_head', 'wp_print_head_scripts', 9);
    remove_action('wp_head', 'wp_enqueue_scripts', 1);
}
add_action('wp_enqueue_scripts', 'md_footer_enqueue_scripts');

/**
* REMOVE UNWANTED WP STUFF
**/
function pz_remove_header_stuff() {
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'feed_links_extra', 2);
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wp_generator');
	remove_action( 'wp_head', 'wlwmanifest_link');
}
add_action('after_setup_theme', 'pz_remove_header_stuff');

/**
* REGISTER POST TYPES
**/
include_once('post-types.php');

/**
* BACK END CLEAN-UP
**/
function remove_menus() {
	remove_menu_page('edit.php');									// posts
	remove_menu_page('edit.php?post_type=page');	// pages
	remove_menu_page('edit-comments.php');				// comments

	if (bmf_check_user_role('editor')) {
 		remove_menu_page('tools.php');
	}

}

add_action('admin_menu', 'remove_menus');

/**
* HELPERS
**/

/**
 * Checks if a particular user has a role. 
 * Returns true if a match was found.
 *
 * @param string $role Role name.
 * @param int $user_id (Optional) The ID of a user. Defaults to the current user.
 * @return bool
 */
function bmf_check_user_role( $role, $user_id = null ) {
  if ( is_numeric( $user_id ) ) {
    $user = get_userdata( $user_id );
  } else {
    $user = wp_get_current_user();
  }
  if ( empty( $user ) ) {
    return false;
  }
  return in_array( $role, (array) $user->roles );
}


?>
