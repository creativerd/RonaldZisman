<?php get_header(); ?>

<!-- SLIDESHOW -->
<section id="home-slideshow">
	<div class="slides-container">
		<?php 
			$home_id = 8;
			$totalSlides = 0;
			// get home slides 
			for($jj = 1; $jj < 6; $jj++) {
				$current_t = get_field('slide_title_' . $jj, $home_id);
				$current_i =get_field('slide_image_' . $jj, $home_id);

				if(!empty($current_t) && !empty($current_i)) {
					$totalSlides++;
				}
			}

			for($i = 1; $i <= $totalSlides; $i++) {
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
					case $i == $totalSlides:
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
								<source srcset="<?php echo $img_obj['sizes']['pz-medium']; ?>" media="(min-width: 850px)">
								<source srcset="<?php echo $img_obj['sizes']['pz-small']; ?>" media="(min-width: 500px)">
								<source srcset="<?php echo $img_obj['sizes']['pz-mobile']; ?>" media="(min-width: 320px)">
								<source srcset="<?php echo $img_obj['sizes']['pz-mobile']; ?>" media="(min-width: 321px)">
									<source srcset="<?php echo $img_obj['sizes']['pz-mobile-portrait']; ?>" media="(max-width: 320px)">
								<img srcset="<?php echo $img_obj['sizes']['pz-medium']; ?>" alt="Canadian mountains covered in snow">
							</picture>
							
							<div class="slide-description">
								<div class="slide-info">
										<div></div>
										<div class="slide-text-col large-5 medium-6 columns">
										<!--<a href="<?php echo $link ?>;">-->
											<h1><?php echo $title; ?></h1>
										<!-- </a>-->
											<?php echo '<p class="slide-p-text">' . $description . '</p>'; ?>
											<span class="slide-dots"></span>
									</div>
								</div>
							</div>

					</div>

				<?php } 
			}
		?>
	<div>
</section>

<!--
<span data-dir="prev">PREV</span>	
<span style="float:right;" data-dir="next">NEXT</span>
00>
-->

<!-- SHORTCUTS -->
<section id="home-shorcuts">
	<div id="direction-shortcut">
		<span class="square-shortcut">
			<img style="max-width: 32px" src="<?php echo TEMPLATEPATHIO; ?>/library/images/direction-shortcut-icon.png" alt="direction arrow icon">
			<span>DIRECTIONS</span>
		</span>
		<div class="shortcut-info">
			<a href="#">
				Click Here, 808 Nelson Street<br>
				Vancouver, BC, V6Z 2H2<br>
				Click Here for Directions
			</a>
		</div>
	</div>
		
	<div id="border-times-shortcut">
		<span class="square-shortcut">
			<img style="max-width: 32px;" src="<?php echo TEMPLATEPATHIO; ?>/library/images/border-shortcut-icon.png" alt="clock icon">
			<span>TIMES</span>
		</span>
		<div class="shortcut-info">
			<a href="#">
				Click Here to Check<br>
				Citizenship amd Immigration<br>
				Processing Dates and Case Status
			</a>
		</div>
	</div>
</section>

<?php get_footer(); ?>


