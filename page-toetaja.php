<?php
/*
Template Name: Toetajad Template
Template Post Type: page, toetaja
*/
?>


<?php get_header() ?>

		<div class="container nm-pageContent">
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

					<h3>Suursponsorid:</h3>

					<div class="nm-supporters">
        	<?php
						$args = array(
							'post_type' => 'toetaja',
							'category_name' => 'toetaja-suursponsor'
							/*
							'meta_query'	=> array(
								'relation'		=> 'OR',
								array(
									'key'		=> 'Toetaja_kategooria',
									'value'		=> '0',
									'compare'	=> 'LIKE'
								),
								array(
									'key'		=> 'Toetaja_kategooria',
									'value'		=> 'Sydney',
									'compare'	=> 'LIKE'
								)
							)*/
						);
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post();
                echo '<a href="' . get_post_meta(get_the_ID(), 'Toetaja_URL', true) . '" class="nm-card nm-supporter" target="_blank">';
                echo '<div class="nm-supporter__img"><img src="' . get_the_post_thumbnail_url() . '"></div>';
                echo '<hr>';
                echo '<div class="nm-supporter__text">' . get_the_title() . '</div>';
              echo '</a>';
            endwhile;

            ?>

					</div>

					<h3>Sponsorid:</h3>

					<div class="nm-supporters">
        	<?php
						$args = array(
							'post_type' => 'toetaja',
							'category_name' => 'toetaja-sponsor'
						);
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post();
                echo '<a href="' . get_post_meta(get_the_ID(), 'Toetaja_URL', true) . '" class="nm-card nm-supporter" target="_blank">';
                echo '<div class="nm-supporter__img"><img src="' . get_the_post_thumbnail_url() . '"></div>';
                echo '<hr>';
                echo '<div class="nm-supporter__text">' . get_the_title() . '</div>';
              echo '</a>';
            endwhile;

            ?>

					</div>

					<h3>Koostööpartnerid:</h3>

					<div class="nm-supporters">
        	<?php
						$args = array(
							'post_type' => 'toetaja',
							'category_name' => 'toetaja-koostoopartner'
						);
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post();
                echo '<a href="' . get_post_meta(get_the_ID(), 'Toetaja_URL', true) . '" class="nm-card nm-supporter" target="_blank">';
                echo '<div class="nm-supporter__img"><img src="' . get_the_post_thumbnail_url() . '"></div>';
                echo '<hr>';
                echo '<div class="nm-supporter__text">' . get_the_title() . '</div>';
              echo '</a>';
            endwhile;

            ?>

					</div>

				</div>

			</section>
		</div><!-- /.container -->

<?php get_footer() ?>
