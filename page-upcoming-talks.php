<?php /* Template Name: upcoming talks */ ?>

<?php
get_header(); ?>

<div id="primary" <?php echo simple_life_content_class( 'content-area' ); ?>>
	<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'page' ); ?>


			<?php


			$args = array(
				'post_status' => array('post'),
				'post_type' => 'talk',
			);

			$result = new WP_Query($args);

			if($result->have_posts() ) {

				while ( $result->have_posts() ) : $result->the_post();
					?>

					<?php
					$today = date('dmY');
					$args = array(
						'post_type' => 'talk',
						'posts_per_page' => '3',
						'meta_key' => 'the_date',
						'meta_query' => array(
							// array(
							// 	'key' => 'speaker_name'
							// ),
							array(
								'key' => 'the_date',
								'value' => $today,
								'compare' => '>='
							)
						),
						'orderby' => 'meta_value_num',
						'order' => 'ASC'
					);

					$your_custom_query = new WP_Query($args);


					?>
				<?php endwhile;
				wp_reset_query();
			} else {
				echo "there is no posts";
			}
			?>

		<?php endwhile; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
