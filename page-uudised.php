<?php get_header() ?>

		<div class="container nm-pageContent">
			<section class="row" role="main">
				<div class="col-sm-12">

					<h1 class="nm-title">Uudised</h1>
					<?php include_once( dirname(__FILE__) . '/inc/social.php'); ?>

					<div class="nm-cards">

					<?php
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
							wp_reset_query();
					?>


					<?php
						/*$args = array( 'numberposts' => '5' );
						$recent_posts = wp_get_recent_posts( $args );
						foreach( $recent_posts as $recent ){
							echo '<div class="nm-newsExcerpt nm-card">';
								echo '<div class="nm-newsExcerpt__date"><i>' . get_the_date( "d.m.Y", $recent["ID"] ) . '</i></div>';
								echo '<a href="' . get_permalink($recent["ID"]) . '" class="nm-newsExcerpt__title"><h3>' . $recent["post_title"].'</h3></a>';

								echo '<p class="nm-newsExcerpt__content">' . $recent["post_excerpt"] . '</p>';
								echo '<a href="' . get_permalink($recent["ID"]) . '" class="btn btn-primary btn-sm nm-newsExcerpt__btn">Loe edasi</a>';
							echo '</div>';
						}
						wp_reset_query();*/
					?>
					</div>

					<a href="/2017" class="btn btn-primary btn-lg nm-news__btnArchive">KÕIK UUDISED </a>

				</div>

			</section>
		</div><!-- /.container -->

<?php get_footer() ?>


<?php include_once( dirname(__FILE__) . '/inc/modal.php'); ?>
