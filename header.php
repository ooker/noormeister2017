<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<title><?php bloginfo('name');?></title>
		<meta name="google-site-verification" content="77raGIaSvZucOR4VaSrXlTJI1341fzonVVUCQx8KtWI" />
		<link rel="sitemap" href="sitemap.xml" type="application/xml" />
		<link rel="shortcut icon" href="/favicon.ico" />

		<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_bloginfo('template_directory') ?>/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_bloginfo('template_directory') ?>/css/style17.min.css" />
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/owl.carousel.css" />

		<?php wp_head(); ?>
	</head>


	<body class="<?php if(is_front_page()): echo "nm-fp__body"; endif; ?>">

		<div class="nm-pageBg">
			<svg class="nm-pageBg__svg" viewBox="0 0 100 100" preserveAspectRatio="none">
	  			<path id="one" class="smw-svgPath" y="100" dur="150" left="50" right="70" d="M60,0 H100 V100 L70,100" style="fill:hsla(83, 49%, 49%, 0.85);"></path>
					<path id="two" class="smw-svgPath" y="100" dur="150" left="50" right="70" d="M100,50 V100 L20,100" style="fill:hsla(83, 49%, 49%, 0.85);"></path>
	  			<!-- <path id="two" class="smw-svgPath" y="100" dur="180" left="80" right="65" d="M0,100 H100 V100 L0,100" style="fill:rgb(38, 198, 218);"></path> -->
			</svg>
		</div>


		<header class="container-fluid nm-headerTop" <?php if(is_front_page()) echo 'style="padding-top:0;"'; ?> >
			<div class="container">
				<div class="row nm-headerTop__logo align-items-center" <?php if(is_front_page()) echo 'style="display:none;"'; ?> >
					<div class="col-4 col-sm-3 col-lg-2">
						<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/nm-logo-17_neg_alternative.svg" alt="Noor Meister logo" /></a>
					</div>
					<div class="col-8 col-sm-9 col-lg-10">
						<h4 class="nm-headerTop__date">4.-5. mail Tallinnas</h4>
					</div>
				</div>

				<div class="row nm-headerTop__nav">
					<div class="col-sm">
						<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
					</div>
				</div>
			</div>
		</header>

		<?php if (is_front_page()): ?>

		<section class="nm-fpIntro">
			<!-- <h1>OMG IT IS TRUE!!!</h1> -->
			<img src="<?php echo get_template_directory_uri(); ?>/images/nm-logo-2017.svg" />
		</section>

		<?php endif ?>


		<div class="nm-mainContent">
