<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Simple_Life
 */

get_header(); ?>

	<div id="primary" <?php echo simple_life_content_class( 'content-area' ); ?>>
		<main id="main" class="site-main" role="main">



			<?php

		$args = array(
			'post_type' => 'talk',
			'orderby' => 'date',
			'order'	=> 'ASC',
			'post_limits' => 1,
			'posts_per_page' => 1,

		);

		$result = new WP_Query($args);

		if($result->have_posts() ) {
			$test = false;
			while ( $result->have_posts() ) : $result->the_post();

				if (get_field('date') >= current_time('Ymd') ){  ?>
					<?php $test =true; ?>
					<div class="next_talk_box" >
						<h2><?php the_field('subject'); ?></h2>
						<?php
						//Convert it to DD-MM-YYYY
						$dmy = date("jS F  Y", strtotime(get_field('date')));
						?>
						<h4 class="talk_date">
							<?php echo "The next talk is on the  $dmy"; ?>
						</h4>
						<?php if (get_field('image')) { ?>
							<img class="speaker_img" src="<?php the_field('image') ;?>" />
						<?php }?>
						<div class="next_talk_words_box">
							<?php if (get_field('speaker_name')){ ?>
								<h4>
									<?php the_field('speaker_name'); ?>
								</h4>
							<?php } ?>
							<?php if (get_field('blurb')){ ?>
								<p class="talk_blurb">
									<?php the_field('blurb'); ?>
								</p>
							<?php } else if ($test == false) {
								echo "no posts found";
							} ?>
							<a class="speaker_website" href="<?php  the_field(website) ?>"><?php  the_field(website) ?></a>
						</div>
					</div>

				<?php } ?>
				<?php

				?>

			<?php endwhile;
		} else {
			echo "there is no posts";
		}
		?>
		<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>



			<?php endwhile; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
