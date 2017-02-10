<?php /*
get_header();
echo '<h1>Booyaka</h1>';
if(have_posts()) : while(have_posts()) : the_post();
	the_title();
	echo '<div class="entry-content">';

	the_content();
	echo '</div>';
endwhile; endif;
get_footer();
*/
?>


<?php get_header() ?>

		<div class="container nm-pageContent">
			<section class="row" role="main">
				<div class="col-sm-12">

					<h1 class="nm-title">Kõik uudised</h1>
					<?php include_once( dirname(__FILE__) . '/inc/social.php'); ?>

					<div class="row nm-card">
						<div class="col-md-8">
							<?php if(have_posts()) : while(have_posts()) : the_post();

								echo '<div class="entry-content nm-newsArchive__item">';
									echo '<h3 class="nm-fancyHeading">'. get_the_title() . '</h3>';
									echo '<div>'
											. get_the_content() .
									'</div>';
									//the_content();
								echo '</div><hr class="nm-newsDivider" />';
							endwhile; endif;
							?>

							<?php
							/*
								$args = array( 'post_type' => 'tootuba', 'posts_per_page' => 10 );
								$loop = new WP_Query( $args );
								while ( $loop->have_posts() ) : $loop->the_post();
										echo '<a href="#" data-id="' . get_the_ID() . '" data-modal-type="tootuba" class="nm-modal-opener nm-picto nm-rest__listItem">';
										echo '<img src="' . get_the_post_thumbnail_url() . '">';
										echo '<h5 class="nm-picto__text">' . get_the_title() . '</h5>';
									echo '</a>';
								endwhile;
								*/
							/*
									$args = array( 'post_type' => 'uudis', 'numberposts' => 4 );
									$recent_posts = wp_get_recent_posts( $args );
									foreach( $recent_posts as $recent ){
										echo '<a href="#" class="nm-newsExcerpt nm-card nm-modal-opener nm-rest__listItem" data-id="' . $recent["ID"] . '" data-modal-type="uudis">';
											echo '<div class="nm-newsExcerpt__date"><i>' . get_the_date( "d.m.Y", $recent["ID"] ) . '</i></div>';
											echo '<h4>' . $recent["post_title"].'</h4>';
											echo '<p class="nm-newsExcerpt__content">' . $recent["post_excerpt"] . ' <i> [loe edasi...] </i></p>';
											// echo '<a href="' . get_permalink($recent["ID"]) . '" class="btn btn-primary btn-sm nm-newsExcerpt__btn">Loe edasi</a>';
										echo '</a>';
									}
									wp_reset_query();*/
							?>
						</div>
						<div class="col-md-4">
							<?php get_sidebar('Uudiste arhiiv'); ?>
						</div>

					</div>

				</div>

			</section>
		</div><!-- /.container -->

<?php get_footer() ?>


<?php include_once( dirname(__FILE__) . '/inc/modal.php'); ?>
