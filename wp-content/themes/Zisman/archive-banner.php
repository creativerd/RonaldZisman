<?php 
	$post_type_name = get_post_type($page_id);
	$post_type_obj = get_post_type_object($post_type_name);
	$post_type_label = $post_type_obj->labels->name;
	$banner_img = ''; 

	// banner id
	switch($post_type_label) {
		case 'Articles':
			$banner_post_type = 'rz_articles_banner';
			$banner_img = true;
			break;
		case 'Attorney Bio':
			$banner_post_type = 'rz_bio_banner';
			$banner_img = true;
			break;
		case 'Immigration Links':
			$banner_post_type = 'rz_immigrationbanner';
			$banner_img = true;
			break;
		case 'US Immigration':
			$banner_post_type = 'rz_us_immig_banner';
			$banner_img = true;
			break;
		case 'Contact':
			$banner_post_type = 'google map';
			$banner_img = false;
		default : '';
	}

	if(isset($banner_img) && !empty($banner_img)) {

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
				$banner_url = get_field('banner_image', $banner_id)['sizes'];

				echo '<section id="page-banner">';
				echo '<picture>
								<source srcset="' . $banner_url['pz-banner-extra-large'] . '" media="(min-width: 1800px)">
								<source srcset="' . $banner_url['pz-banner-large'] . '" media="(min-width: 1200px)">
								<source srcset="' . $banner_url['pz-banner-medium'] . '" media="(min-width: 850px)">
								<source srcset="' . $banner_url['pz-banner-small'] . '" media="(min-width: 500px)">
								<img 		srcset="' . $banner_url['pz-banner-medium'] . '">
							</picture>';
				echo '<div class="row">';
				echo '<h2 id="banner-title">' . $post_type_label .'</h2>';
				echo '</div>';
				echo '</section>';
			}
		}
		wp_reset_postdata();

	} else {
		// google map
		echo '<section id="page-banner" class="embedded-map" style="heigth:350px;"></section>';
	}
	
?>