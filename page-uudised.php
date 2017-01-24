﻿<?php get_header() ?>

		<div class="container nm-pageContent">
			<section class="row" role="main">
				<div class="col-sm-12">

					<h1 class="nm-title">Uudised</h1>

					<div class="nm-cards">

					<?php
							$args = array( 'post_type' => 'uudis' );
							$recent_posts = wp_get_recent_posts( $args );
							foreach( $recent_posts as $recent ){
								echo '<div class="nm-newsExcerpt nm-card">';
									echo '<div class="nm-newsExcerpt__date"><i>' . get_the_date( "d.m.Y", $recent["ID"] ) . '</i></div>';
									echo '<a href="#" data-id="' . $recent["ID"] . '" data-modal-type="uudis"  class="nm-newsExcerpt__title nm-modal-opener"><h3>' . $recent["post_title"].'</h3></a>';
									echo '<p class="nm-newsExcerpt__content">' . $recent["post_excerpt"] . '</p>';
									// echo '<a href="' . get_permalink($recent["ID"]) . '" class="btn btn-primary btn-sm nm-newsExcerpt__btn">Loe edasi</a>';
								echo '</div>';
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

					<a href="#" class="btn btn-primary btn-lg">KÕIK UUDISED</a>

				</div>

			</section>
		</div><!-- /.container -->

<?php get_footer() ?>


<?php include_once( dirname(__FILE__) . '/inc/modal.php'); ?>
