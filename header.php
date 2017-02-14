<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<title><?php bloginfo('name');?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="google-site-verification" content="77raGIaSvZucOR4VaSrXlTJI1341fzonVVUCQx8KtWI" />
		<link rel="sitemap" href="sitemap.xml" type="application/xml" />
		<link rel="shortcut icon" href="/favicon.ico" />

		<?php wp_head(); ?>
	</head>


	<body class="<?php if(is_front_page()): echo 'nm-fp__body'; endif; ?>">

		<div class="nm-pageBg">
			<svg class="nm-pageBg__svg" viewBox="0 0 100 100" preserveAspectRatio="none"
			xmlns:nmdata="http://www.nooreister.ee">

					<?php if ( is_front_page() ): ?>
						<path d="M0,0 H100 V100 H0" style="fill:hsl(83, 49%, 49%);"></path>
						<path nmdata:axis="x" nmdata:startpos="100" nmdata:duration="240" nmdata:p1end="43" nmdata:p2end="50"	class="nm-svgBg" d="" style="fill:hsla(83, 0%, 0%, 0.1);"></path>
						<path nmdata:axis="y" nmdata:startpos="100" nmdata:duration="200" nmdata:p1end="62" nmdata:p2end="85"	class="nm-svgBg" d="" style="fill:hsla(66, 100%, 65%, 0.3);"></path>

					<?php elseif( is_page('kava') ): ?>
						<path class="nm-svgBg" d="" style="fill:hsla(83, 49%, 49%, 0.85);"
							nmdata:axis="x" nmdata:startpos="100" nmdata:duration="150" nmdata:p1end="80" nmdata:p2end="70"></path>
						<path class="nm-svgBg" d="" style="fill:hsla(83, 49%, 49%, 0.85);"
							nmdata:axis="y" nmdata:startpos="100" nmdata:duration="150" nmdata:p1end="67" nmdata:p2end="55"
						></path>

					<?php elseif( is_page('kuidas-tulla') ): ?>
						<path class="nm-svgBg" d="" style="fill:hsla(83, 49%, 49%, 0.75);"
							nmdata:axis="x" nmdata:startpos="100" nmdata:duration="150" nmdata:p1end="70" nmdata:p2end="50"
						></path>

					<?php elseif( is_page('kontakt') ): ?>
						<path class="nm-svgBg" d="" style="fill:hsla(83, 49%, 49%, 0.85);"
							nmdata:axis="x" nmdata:startpos="100" nmdata:duration="300" nmdata:p1end="80" nmdata:p2end="55"
						></path>
						<path class="nm-svgBg" d="" style="fill:hsla(38, 100%, 58%, 0.55);"
							nmdata:axis="y" nmdata:startpos="100" nmdata:duration="250" nmdata:p1end="100" nmdata:p2end="60"
						></path>

					<?php elseif( is_page('tootoad') ): ?>
						<path class="nm-svgBg" d="" style="fill:hsla(83, 49%, 49%, 0.85);"
							nmdata:axis="x" nmdata:startpos="100" nmdata:duration="150" nmdata:p1end="80" nmdata:p2end="70"
						></path>
						<path class="nm-svgBg" d="" style="fill:hsla(83, 49%, 49%, 0.85);"
							nmdata:axis="y" nmdata:startpos="100" nmdata:duration="300" nmdata:p1end="70" nmdata:p2end="55"
						></path>

					<?php else: ?>
						<path class="nm-svgBg" d="" style="fill:hsla(83, 49%, 49%, 0.85);"
							nmdata:axis="x" nmdata:startpos="100" nmdata:duration="150" nmdata:p1end="80" nmdata:p2end="70"
						></path>
						<path class="nm-svgBg" d="" style="fill:hsla(83, 49%, 49%, 0.85);"
							nmdata:axis="y" nmdata:startpos="100" nmdata:duration="320" nmdata:p1end="100" nmdata:p2end="60"
						></path>
					<?php endif ?>

			</svg>
		</div>



		<header class="container-fluid nm-headerTop" <?php if(is_front_page()) echo 'style="padding-top:0;"'; ?> >
			<div class="container">
				<div class="row nm-headerTop__logo align-items-center" <?php if(is_front_page()) echo 'style="display:none;"'; ?> >
					<div class="col-5 col-sm-4 col-lg-2">
						<a href="<?php echo home_url(); ?>">
							<img class="nm-headerTop__logo__img" src="<?php echo get_template_directory_uri(); ?>/images/nm-logo-17_neg_alternative.svg" alt="Noor Meister 2017" />
						</a>
					</div>
					<div class="col-7 col-sm-8 col-lg-10">
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

		<a class="nm-navSwapper" href="#">
			<svg viewBox="0 0 56 48">
        <g fill="#ffffff">
          <rect x="0" y="0" width="56" height="10"></rect>
          <rect x="0" y="19" width="56" height="10"></rect>
          <rect x="0" y="38" width="56" height="10"></rect>
        </g>
      </svg>
		</a>

		<?php if (is_front_page()): ?>

			<section class="nm-fpIntro">

			<div class="nm-fpIntro__logo">
				<img src="<?php echo get_template_directory_uri(); ?>/images/nm-logo-2017.svg" alt="Noor Meister 2017" />
			</div>

			<div class="nm-fpIntro__texts">
				<div class="nm-fpIntro__when">
					<h2>4.-5. mail Tallinnas</h2>
					<h5>Eesti Näituste messikeskuses</h5>
					<h3>SISSEPÄÄS TASUTA!</h3>
				</div>

				<hr style="width: 100%"/>

				<div class="nm-fpIntro__what">
					<h2>Mis toimub?</h2>
					<h5><b>KUTSE&shy;MEISTRI&shy;VÕISTLUSED:</b><br />32 eriala ja üle 400 võistleja</h5>
					<h5><b>KUTSEHARIDUSMESS:</b><br />kõik oluline kutseharidusest ja <b>põnevad töötoad</b></h5>
					<h5>Huvitav <b>LAVAPROGRAMM</b></h5>
					<h5><b>Esineb Karl Erik Taukar Band</b></h5>
					<hr style="width: 100%"/>
					<a href="/kava" class="btn btn-primary btn-lg nm-fpIntro__btn">VAATA JÄRGI</a>
				</div>

			</div>

			<?php include_once( dirname(__FILE__) . '/inc/social.php'); ?>

			<div class="nm-fpIntro__esf">
				<img class="nm-fpIntro__esf--hor"
					src="<?php echo get_template_directory_uri(); ?>/images/logo/esf_logo.svg" />
				<!--<img class="nm-fpIntro__esf--ver"
					src="<?php //echo get_template_directory_uri(); ?>/images/logo/esf_logo_ver.svg" />-->
			</div>

		</section>



		<?php endif ?>


		<section class="nm-mainContent">
