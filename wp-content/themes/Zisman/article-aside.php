<?php
	$side_args = array(
		'post_type'				=> 'rz_articles',
		'post_status'			=> 'publish',
		'posts_per_page'	=> 5,
		'post__not_in'		=> array($current_post_id),
	);

	$side_loop = new WP_Query($side_args);
	if($side_loop->have_posts()) {
		echo '<div class="row aside-post-container">';
		while($side_loop->have_posts()) {
			$side_loop->the_post();

			echo '<article class="aside-post">';

			$as_post_title = get_the_title();
			$as_post_date = get_field('article_date');
			$as_post_author = get_the_author();
			$as_post_link = get_the_permalink();
			$as_post_thumb = get_field('article_thumbnail')['sizes'];

			echo 		'<div class="img-col large-6 medium-6 small-6 columns">';
			echo 				'<img src="' . $as_post_thumb['post-thumbnail'] . '">';
			echo 		'</div>';

			echo 		'<div class="info-col large-6 medium-6 small-6 columns">';
			echo 				'<h4>' . $as_post_title . '</h4>';
			echo 				'<p class="aside-post-info">by ' . $as_post_author . '</p>';

			if(!empty($as_post_date)) {
				echo 			'<p class="aside-post-info">' . $as_post_date . '</p>';
			}
			
			echo 				'<a href="' . $as_post_link . '">Read Article</a>';
			echo 		'</div>';

			echo 	'</article>';
		}
		echo '</div>';
	}

	wp_reset_postdata();
?>

<a class="back-to-parent" href="<?php echo WP_HOME; ?>/articles">Read All Articles</a>