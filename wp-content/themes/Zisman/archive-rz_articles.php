<?php get_header(); ?>

<section id="all-articles-container">
	<div class="row">
	<?php 
	$args = array(
		'post_type'				=> 'rz_articles',
		'post_status'			=> 'publish',
		'posts_per_page'	=> -1
	);

	$articles_loop = new WP_Query($args);
	if($articles_loop->have_posts()) {
		while($articles_loop->have_posts()) {
			$articles_loop->the_post();

			$title = get_the_title();
			$link = get_permalink();

			echo '<div class="large-4 medium-6 small-12 columns">';
			echo '<a href="' . $link . '"><h3>' . $title . '</h3></a>';
			echo '</div>';
		}
	}

	wp_reset_postdata();
	?>
</div>
</section>

<?php get_footer(); ?>