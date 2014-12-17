<?php get_header(); ?>

<section id="home-slideshow">
	<picture>
		<source srcset="<?php echo get_template_directory_uri(); ?>/library/images/home_attorneybio_xlarge.jpg" media="(min-width: 1800px)">
		<source srcset="<?php echo get_template_directory_uri(); ?>/library/images/home_attorneybio_large.jpg" media="(min-width: 1200px)">
		<source srcset="<?php echo get_template_directory_uri(); ?>/library/images/home_attorneybio_medium.jpg" media="(min-width: 800px)">
		<source srcset="<?php echo get_template_directory_uri(); ?>/library/images/home_attorneybio_small.jpg" media="(min-width: 500px)">
		<source srcset="<?php echo get_template_directory_uri(); ?>/library/images/home_attorneybio_mobile.jpg" media="(min-width: 320px)">
		<img srcset="<?php echo get_template_directory_uri(); ?>/library/images/home_attorneybio_medium.jpg" alt="Canadian mountains covered in snow">
	</picture>
</section>

<?php get_footer(); ?>
