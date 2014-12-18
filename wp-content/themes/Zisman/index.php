<?php get_header(); ?>

<section id="home-slideshow">
	<div class="slides-container">
		<?php 
			$home_id = 8;
			// get home slides 
			for($i = 1; $i < 6; $i++) {
				$title = get_field('slide_title_' . $i, $home_id);
				$link = get_field('slide_link_' . $i, $home_id);
				$description = get_field('slide_description_' . $i, $home_id);
				$img_obj = get_field('slide_image_' . $i, $home_id);

				switch(true) {
					case $i == 1:
						$cl = 'current-slide';
						break;
					case $i == 2:
						$cl = 'next-slide';
						break;
					case $i == 3:
						$cl = 'previous-slide';
						break;
					default:
						$cl = 'slide';
					}

				if(!empty($title) && !empty($img_obj)) { ?>
					<div class="slide-wrapper">

							<picture class="home-img <?php echo $cl; ?>">
								<source srcset="<?php echo $img_obj['sizes']['pz-extra-large']; ?>" media="(min-width: 1800px)">
								<source srcset="<?php echo $img_obj['sizes']['pz-large']; ?>" media="(min-width: 1200px)">
								<source srcset="<?php echo $img_obj['sizes']['pz-medium']; ?>" media="(min-width: 800px)">
								<source srcset="<?php echo $img_obj['sizes']['pz-small']; ?>" media="(min-width: 500px)">
								<source srcset="<?php echo $img_obj['sizes']['pz-mobile']; ?>" media="(min-width: 320px)">
								<img srcset="<?php echo $img_obj['sizes']['pz-medium']; ?>" alt="Canadian mountains covered in snow">
							</picture>
							
							<div class="slide-description">
								<div class="slide-info">
									<!--<a href="<?php echo $link ?>;">-->
										<h1><?php echo $title; ?></h1>
									<!-- </a>-->
									<p><?php echo $description; ?></p>
								</div>
							</div>

					</div>

				<?php } 
			}
		?>
	<div>
</section>

	<span data-dir="prev">PREV</span>	
	<span style="float:right;" data-dir="next">NEXT</span>

<?php get_footer(); ?>


