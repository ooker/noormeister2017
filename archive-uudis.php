<?php get_header() ?>

		<div class="container nm-pageContent">
			<section class="row" role="main">
				<div class="col-sm-12">

					<h1 class="nm-title">Uudiste arhiiv</h1>
					<?php include_once( dirname(__FILE__) . '/inc/social.php'); ?>

					<div class="row nm-card">
						<div class="col-md-8">

							<?php
								//$content = wpautop( $post->post_content );
								//$content = apply_filters('the_content', $post->post_content);
								if(have_posts()) : while(have_posts()) : the_post();

								//$content = get_the_content();
								echo '<div class="entry-content nm-newsArchive__item">';
									echo '<div style="margin-bottom: 12px; text-align: right;"><i>' . get_the_date( "d.m.Y", $recent["ID"] ) . '</i></div>';
									echo '<h3 class="nm-fancyHeading">'. get_the_title() . '</h3>';
									echo '<div>'
											. wpautop( $post->post_content ) .
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
							<div class="nm-newsArchive__sidebar">

								<h4>Kuude kaupa</h4>

							<?php
								//get_sidebar('Uudiste arhiiv');
								$args = array(
									'type'            => 'monthly',
									'limit'           => '',
									'format'          => 'custom',
									'before'          => '<div class="nm-newsArchive__sidebarItem">',
									'after'           => '</div>',
									'show_post_count' => false,
									'echo'            => 1,
									'order'           => 'DESC',
								  'post_type'     => 'uudis'
								);
								wp_get_archives( $args );

							?>

							</div>
						</div>

					</div>

				</div>

			</section>
		</div><!-- /.container -->

<?php get_footer() ?>


<?php include_once( dirname(__FILE__) . '/inc/modal.php'); ?>
