<?php get_header(); ?>

<?php 
if(have_posts()) {

	echo '<article>';

	while(have_posts()) {

		the_post();
		
		$current_post_id = $post->ID;
		$post_title = get_the_title();
		$article_date = get_field('article_date');
		$article_extrainfo = get_field('article_extra_info');
		$post_banner = get_field('article_thumbnail')['sizes'];
		$the_post_content = get_field('article_body');
		$post_type_name = get_post_type($page_id);
		$post_type_obj = get_post_type_object($post_type_name);
		$post_type_label = $post_type_obj->labels->name; 

		echo '<section id="page-banner" class="articles-wrapper">';
			echo '<picture>
							<source srcset="' . $post_banner['pz-banner-extra-large'] . '" media="(min-width: 1800px)">
							<source srcset="' . $post_banner['pz-banner-large'] . '" media="(min-width: 1200px)">
							<source srcset="' . $post_banner['pz-banner-medium'] . '" media="(min-width: 850px)">
							<source srcset="' . $post_banner['pz-banner-small'] . '" media="(min-width: 500px)">
							<img 		srcset="' . $post_banner['pz-banner-medium'] . '">
						</picture>';
			echo '<div class="row">';
			echo '<h2 id="banner-title">' . $post_type_label .'</h2>';
			echo '</div>';
		echo '</section>';

		echo '<div id="single-article-wrapper">';
		echo 		'<div class="row">';
		echo 				'<article class="main-post large-8 medium-8 small-12 columns">';

		echo 						'<div class="article-head">';
		echo 							'<h2 class="article-title">' . $post_title . '</h2>';

		if(!empty($article_date)) {
			echo 						'<p class="article-date">' . $article_date . '</p>';
		}
		
		if(!empty($article_extrainfo)) {
			echo 						'<p class="article-extra-info">' . $article_extrainfo . '</p>';
		}
		echo 						'</div>';

		echo 						'<p class="article-content">' . $the_post_content . '</p>';
		echo 				'</article>';

		echo 				'<aside id="similar-posts" class="large-4 medium-4 small-12 columns">';
								include(locate_template('article-aside.php'));
		echo 				'</aside>';
		echo 		'</div>';
		echo '<div>';
	}

	echo '</article>';
}
?>

<?php get_footer(); ?>