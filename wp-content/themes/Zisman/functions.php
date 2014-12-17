<?php

/***
* SETUP
***/
function pz_setup() {

	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 300, 225, true );
	add_image_size( 'full-width', 1800, 1314, true );
	add_theme_support('html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	));

}
add_action('after_setup_theme', 'pz_setup');


/***
* SCRIPTS AND CSS
***/
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


?>
