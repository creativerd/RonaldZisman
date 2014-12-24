<?php get_header(); ?>

<?php $page_id = $post->ID; ?>

<?php include(locate_template('archive-banner.php')); ?>

<section id="content-wrapper">
	<div class="row">
		<?php 
		$args = array(
			'post_type'				=> 'rz_bio',
			'post_status'			=> 'publish',
			'posts_per_page'	=> -1
		);

		$bio_loop = new WP_Query($args);

		if($bio_loop->have_posts()) {
			while($bio_loop->have_posts()) {
				$bio_loop->the_post();

				$bio_text = get_field('biography_text');
				$attorney_img = get_field('attorney_image')['sizes'];

				echo '<div id="bio-text" class="large-7 medium-7 small-12 columns">';
				if(!empty($bio_text)) {
					echo $bio_text;
				}
				echo '</div>';

				echo '<div id="attorney-pic" class="large-5 medium-5 small-12 columns">';
				if(!empty($attorney_img)) {
					echo '<figure>
									<img src="' . $attorney_img['medium'] . '" alt="Ronald A Zisman">
								</figure>';
				}
				echo '</div>';
			}
		}

		wp_reset_postdata();
		?>

	</div>
</section>


<?php get_footer(); ?>
