<?php get_header(); ?>

<?php $page_id = $post->ID; ?>

<?php include(locate_template('archive-banner.php')); ?>

<section id="content-wrapper" class="us-immigration-wrapper">
	<?php 
	$args = array(
		'post_type'				=> 'rz_us_immigration',
		'post_status'			=> 'publish',
		'posts_per_page'	=> 1
	);

	$immigration_loop = new WP_Query($args);
	if($immigration_loop->have_posts()) {

		echo '<div class="row">';

		while($immigration_loop->have_posts()) {
			$immigration_loop->the_post();

			$page_content = get_field('page_content');

			echo '<article id="immigration-link-content" class="large-8 medium-8 small-12 columns">';
			echo $page_content;
			echo '</article>';

			echo '<aside id="go-to-sections" class="immig-sidebar large-4 medium-4 small-12 columns">';
							include(locate_template('immigration-aside.php'));
			echo '</aside>';
		}

		echo '</div>';
	}

	wp_reset_postdata();

	?>
</section>

<?php get_footer(); ?>