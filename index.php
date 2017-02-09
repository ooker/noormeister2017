<?php get_header() ?>

		<div class="container nm-pageContent" <?php if(is_front_page()) echo 'style="display:none;"'; ?>>
			<section class="row" role="main">
				<div class="col-sm-12">

					<?php while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php echo the_id()?>">
						<h1 class="nm-title"><?php the_title() ?></h1>
						<?php include_once( dirname(__FILE__) . '/inc/social.php'); ?>
						<div class="entry-content">
							<?php the_content() ?>
						</div><!-- .entry-content -->
					</div><!-- #post-## -->
					<?php endwhile; // end of the loop. ?>
				</div>

			</section>


			<!--<section class="row">
				<div class="col-sm-12">
					<h2>Uudised</h2>
					<?php //$posts_array = get_posts( $args ); ?>
					<?php //foreach( $posts_array as $post ) :	setup_postdata($post); ?>
						<div>
							<h4><?php //the_title(); ?></h4>
							<p><?php //the_content(); ?></p>
						</div>
					<?php //endforeach; ?>
				</div>
			</section>-->

		</div><!-- /.container -->

<?php get_footer() ?>
