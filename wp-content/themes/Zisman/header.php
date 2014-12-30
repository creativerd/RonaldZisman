<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<?php 
	switch(true) {
		case(is_home()):
			$current_page = 8;
			break;
		case(is_post_type_archive('rz_articles')):
			$current_page = 66;
			break;
		case('rz_immigration' == get_post_type()):
			$current_page = 48;
			break;
		case('rz_us_immigration' == get_post_type()):
			$current_page = 53;
			break;
		case('rz_contact' == get_post_type()):
			$current_page = 56;
			break;
		default:
			$current_page = $post->ID; 
	}
	
	$meta_description = get_field('meta_page_description', $current_page);
	$meta_title = get_field('meta_page_title', $current_page);
	$meta_tags = get_field('meta_tags', $current_page);
	?>
	<meta charset="UTF-8">
	<meta name="author" content="Ronald A. Zisman">
	<meta name="viewport" content="width=device-width">
	<meta name="description" content="<?php echo $meta_description; ?>">
	<meta name="keywords" content="<?php echo $meta_tags; ?>">
	<title><?php echo (!empty($meta_title)) ? $meta_title : get_the_title($current_page); ?></title>
	<link rel="stylesheet" href="<?php echo TEMPLATEPATHIO; ?>/style.css" type="text-css" media="all">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>

	<?php wp_head(); ?>
</head>

<body>

	<header>
		<div class="row">

			<div class="header-cols large-7 medium-6 small-12 columns">
				<div class="row">
					<a id="logo-header-a" class="small-8 columns" href="<?php echo WP_HOME; ?>" >
						<img src="<?php echo TEMPLATEPATHIO; ?>/library/images/Zisman-logo.svg" title="Ronald Zisman" alt="Ronald Zisman logo">
					</a>
					<div class="small-3 columns"></div>
					<a id="toggle-menu" class="small-1 columns" href="#">
						Menu
					</a>
				</div>
			</div>

			<div class="header-cols large-5 medium-6 small-12 columns">
				<div id="header-nav-container" class="row">

					<div class="large-6 medium-6 small-12 columns">
						<ul>
							<li class="nav-item" data-page="homepage">
								<a href="<?php echo WP_HOME; ?>"><i class="fa fa-star"></i>Home</a>
							</li>
							<li class="nav-item" data-page="attorney-bio">
								<a href="<?php echo WP_HOME; ?>/bio"><i class="fa fa-star"></i>Attorney Bio</a>
							</li>
							<li class="nav-item" data-page="us-immigration">
								<a href="<?php echo WP_HOME; ?>/us-immigration"><i class="fa fa-star"></i>U.S. Immigration</a>
							</li>
						</ul>
					</div>

					<div class="large-6 medium-6 small-12 columns">
						<ul>
							<li class="nav-item" data-page="articles">
								<a href="<?php echo WP_HOME; ?>/articles"><i class="fa fa-star"></i>Articles</a>
							</li>
							<li class="nav-item" data-page="immigration-links">
								<a href="<?php echo WP_HOME; ?>/immigration-links"><i class="fa fa-star"></i>Immigration Links</a>
							</li>
							<li class="nav-item" data-page="contact">
								<a href="<?php echo WP_HOME; ?>/contact"><i class="fa fa-star"></i>Contact</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</header>

