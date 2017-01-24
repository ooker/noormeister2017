	</div><!-- /.nm-mainContent-->

		<!-- Sponsorite logod -->
		<section class="container-fluid nm-footer__logobar">

			<!--
			<div style="display:none;" id="carousel_container">
				<div class="nav_left"><img src="<?php //echo get_bloginfo('template_directory') ?>/images/left.png" title=""/></div>
				<div class="nav_right"><img src="<?php //echo get_bloginfo('template_directory') ?>/images/right.png" title=""/></div>
				<ol>
					<?php //dynamic_sidebar('logo_widget_area'); ?>
				</ol>
			</div>
			-->
			<div id="carousel_container" class="owl-carousel" >
				<?php
					$handle = opendir(dirname(realpath(__FILE__)).'/logos/');
					while($file = readdir($handle)){
						if($file !== '.' && $file !== '..'){
							echo '<img class="item" src="'.get_template_directory_uri().'/logos/'.$file.'" alt="" />';
						}
					}
				?>
			</div>
			<?php // logo_slider(); ?>
		</section>


		<!-- FOOTER -->
		<footer id="footer" class="container-fluid">
			<div class="row">
				<?php //dynamic_sidebar('footer') ?>
				<h4>Korraldajad:</h4>
				<div class="col-sm">
					<img src="" alt="">
				</div>
				<div class="col-sm">
					<img src="" alt="" >
				</div>
				<div class="col-sm">
					<img src="" alt="" >
				</div>

			</div>

		</footer>

		<script src="<?php echo get_bloginfo('template_directory') ?>/js/jquery-3.1.1.min.js" type="text/javascript"></script>
		<!-- <script src="<?php echo get_bloginfo('template_directory') ?>/js/turbo.js" type="text/javascript"></script> -->
		<!-- <script src="<?php echo get_bloginfo('template_directory') ?>/js/slider.js" type="text/javascript"></script> -->

		<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js" type="text/javascript"></script>
		<script src="<?php echo get_bloginfo('template_directory') ?>/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="<?php echo get_bloginfo('template_directory') ?>/js/owl.carousel.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
			    $('.owl-carousel').owlCarousel(
			    {
			    	loop:true,
			    	autoplay:true,
			    	autoplayTimeout:2000,
				    margin:10,
				    slideBy:3,
				    responsiveClass:true,
						responsive:{
				        0:{
				            items:2,
				            nav:false
				        },
				        600:{
				            items:4,
				            nav:false
				        },
				        1000:{
				            items:8,
				            nav:false,
				            loop:true
				        }
				    }
				});
			});

		</script>

		<script src="<?php echo get_bloginfo('template_directory') ?>/js/skript.js" type="text/javascript"></script>

		<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-47997459-1']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>
</body>
</html>
