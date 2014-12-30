<?php
	
	if('rz_immigration' == get_post_type()) {
		echo '<div class="go-to-section">';
		echo '<a href="' . WP_HOME . '/articles"><img src="' . get_field('banner_image', 35)['sizes']['medium'] . '" ></a>';
		echo '<a href="' . WP_HOME . '/articles/">Articles</a>';
		echo '</div>';

		echo '<div class="go-to-section">';
		echo '<a href="' . WP_HOME . '/us-immigration"><img src="' . get_field('banner_image', 51)['sizes']['medium'] . '" ></a>';
		echo '<a href="' . WP_HOME . '/us-immigration">Us Immigration</a>';
		echo '</div>';

		echo '<div class="go-to-section">';
		echo '<a href="' . WP_HOME . '/contact"><img src="' . get_field('banner_image', 59)['sizes']['medium'] . '" ></a>';
		echo '<a href="' . WP_HOME . '/contact">Find Us</a>';
		echo '</div>';
	} else {
		echo '<div class="go-to-section">';
		echo '<a href="' . WP_HOME . '/articles"><img src="' . get_field('banner_image', 35)['sizes']['medium'] . '" ></a>';
		echo '<a href="' . WP_HOME . '/articles">Articles</a>';
		echo '</div>';
		echo '<div class="go-to-section">';
		echo '<a href="' . WP_HOME . '/immigration-links"><img src="' . get_field('banner_image', 49)['sizes']['medium'] . '" ></a>';
		echo '<a href="' . WP_HOME . '/immigration-links">Immigration Links</a>';
		echo '</div>';
		echo '<div class="go-to-section">';
		echo '<a href="' . WP_HOME . '/contact"><img src="' . get_field('banner_image', 59)['sizes']['medium'] . '" ></a>';
		echo '<a href="' . WP_HOME . '/contact">Find Us</a>';
		echo '</div>';
	}
?>