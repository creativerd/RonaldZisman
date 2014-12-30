<?php get_header(); ?>

<?php $page_id = $post->ID; ?>

<?php include(locate_template('archive-banner.php')); ?>

<section id="content-wrapper" class="articles-wrapper">

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
			$author = get_the_author();
			$thumbnail_url = get_field('article_thumbnail')['sizes']['post-thumbnail'];
			$publishing_date = get_the_date();

			echo '<article class="large-4 medium-4 small-12 columns">';
			echo '<a href="' . $link . '"><img class="article-thumb" src="' . $thumbnail_url . '"></a>';
			echo '<a href="' . $link . '"><h3 class="article-title">' . $title . '</h3></a>';
			echo '<h5 class="article-author">by ' . $author . ' | ' . $publishing_date . '</h5>';
			echo '<a class="go-to-article" href="' . $link . '"><h4>Read Article</h3></a>';
			echo '</article>';
		}
	}

	wp_reset_postdata();
	?>
</div>
</section>

<?php get_footer(); ?>