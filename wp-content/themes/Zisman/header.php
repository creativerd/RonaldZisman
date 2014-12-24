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
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="<?php echo TEMPLATEPATHIO; ?>/style.css" type="text-css" media="all">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
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
							<li class="nav-item">
								<a href="<?php echo WP_HOME; ?>"><i class="fa fa-star"></i>Home</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo WP_HOME; ?>/bio"><i class="fa fa-star"></i>Attorney Bio</a>
							</li>
							<li class="nav-item">
								<a href="#"><i class="fa fa-star"></i>U.S. Immigration</a>
							</li>
						</ul>
					</div>

					<div class="large-6 medium-6 small-12 columns">
						<ul>
							<li class="nav-item">
								<a href="<?php echo WP_HOME; ?>/articles"><i class="fa fa-star"></i>Articles</a>
							</li>
							<li class="nav-item">
								<a href="#"><i class="fa fa-star"></i>Immigration Links</a>
							</li>
							<li class="nav-item">
								<a href="#"><i class="fa fa-star"></i>Contact</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</header>

