<?php

/**
* SETUP
**/
function pz_setup() {

	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 300, 225, true );
	add_image_size( 'pz-mobile', 500, 375, true );
	add_image_size( 'pz-small', 800, 600, true );
	add_image_size( 'pz-medium', 1200, 900, true );
	add_image_size( 'pz-large', 1800, 1314, true );
	add_image_size( 'pz-extra-large', 2500, 1875, true );

	add_image_size( 'pz-banner-extra-large', 2500, 832, true );
	add_image_size( 'pz-banner-large', 1800, 600, true );
	add_image_size( 'pz-banner-medium', 1200, 400, true );
	add_image_size( 'pz-small-large', 800, 266, true );

	add_theme_support('html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	));

	remove_filter( 'the_content', 'wpautop' );
	remove_filter( 'the_excerpt', 'wpautop' );
	remove_filter ('acf_the_content', 'wpautop');

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
* REGISTER POST TYPES
**/
include_once('post-types.php');

/*
add_action('admin_menu', 'register_my_custom_submenu_page');
function register_my_custom_submenu_page() {
	add_submenu_page( 'rz_articles', 'articles-banner', 'Banner', 'manage_options', 'articles-banner', 'my_custom_submenu_page_callback' );
}
function my_custom_submenu_page_callback() {
	
	echo '<div class="wrap"><div id="icon-tools" class="icon32"></div>';
		echo '<h2>My Custom Submenu Page</h2>';
	echo '</div>';
}
*/
?>
