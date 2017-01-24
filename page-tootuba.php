<?php
/*
Template Name: Töötoad-Kutsevõistlused Template
Template Post Type: page, tootuba, kutsevoistlus
*/
?>

<?php
    /*$loop = new WP_Query( array( 'post_type' => 'tootuba', 'ignore_sticky_posts' => 1 ) );
    if ( $loop->have_posts() ) :
        while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <div class="pindex">
                <?php if ( has_post_thumbnail() ) { ?>
                    <div class="pimage">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                    </div>
                <?php } ?>
                <div class="ptitle">
                    <h2><?php echo get_the_title(); ?></h2>
                </div>
            </div>
        <?php endwhile;
    endif;
    wp_reset_postdata();*/
?>


<?php get_header() ?>

		<div class="container nm-pageContent">
			<section class="row" role="main">
				<div class="col-sm-12">

          <?php while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php echo the_id()?>">
						<h1 class="nm-title"><?php the_title() ?></h1>
						<div class="entry-content">
							<?php the_content() ?>
						</div><!-- .entry-content -->
					</div><!-- #post-## -->
					<?php endwhile; // end of the loop. ?>



					<div class="nm-pictos">


            <!-- The Loop -->
          <?php
            $args = array( 'post_type' => 'tootuba', 'posts_per_page' => 10 );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post();
                echo '<a href="#" data-id="' . get_the_ID() . '" data-modal-type="tootuba" class="nm-modal-opener nm-picto">';
                echo '<img src="' . get_the_post_thumbnail_url() . '">';
                echo '<h5 class="nm-picto__text">' . get_the_title() . '</h5>';
              echo '</a>';
            endwhile;

            ?>

            <!-- End Loop -->

          <!--<?php
						$args = array( 'post_type' => 'tootuba' );
						$recent_posts = wp_get_recent_posts( $args );
						foreach( $recent_posts as $recent ){
							echo '<a href="#" data-id="' . $recent["ID"] . '" data-modal-type="tootuba" class="nm-modal-opener">';
                echo '<img src="' .  $recent["post_thumbnail"] . '">';
                echo '<p class="">' . $recent["post_title"] . '</p>';
              echo '</a>';
						}
						wp_reset_query();
					?>-->
					</div>
				</div>

			</section>
		</div><!-- /.container -->

<?php get_footer() ?>

<?php include_once( dirname(__FILE__) . '/inc/modal.php'); ?>
