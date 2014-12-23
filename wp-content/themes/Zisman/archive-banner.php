<?php 
	$post_type_name = get_post_type($page_id);
	$post_type_obj = get_post_type_object($post_type_name);
	$post_type_label = $post_type_obj->labels->name; 

	// banner id
	switch($post_type_label) {
		case 'Articles':
			$banner_post_type = 'rz_articles_banner';
			break;
		case 'Us Immigration':
			$banner_post_type = '';
			break;
		default : 'alfio';
	}

	$banner_args = array(
		'post_type'				=> $banner_post_type,
		'post_status'			=> 'publish',
		'posts_per_page'	=> 1,
	);

	$banner_loop = new WP_QUery($banner_args);
	if($banner_loop->have_posts()) {
		while($banner_loop->have_posts()) {
			$banner_loop->the_post();

			$banner_id = get_the_ID();
			$banner_url = get_field('banner_image', $banner_id)['sizes']['post-thumbnail'];

			echo '<section id="page-banner">';
			echo '<img src="' . $banner_url . '" >';
			echo '<h2>' . $post_type_label .'</h2>';
			echo '</section>';
		}
	}
	wp_reset_postdata();
?>