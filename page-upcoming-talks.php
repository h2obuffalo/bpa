<?php /* Template Name: past talks */ ?>

<?php
get_header(); ?>

<div id="primary" <?php echo simple_life_content_class( 'content-area' ); ?>>
	<main id="main" class="site-main" role="main">



		<?php

		$args = array(
			'post_type' => 'talk',

		);

		$result = new WP_Query($args);

		if($result->have_posts() ) {

			while ( $result->have_posts() ) : $result->the_post();

				if (get_field('date') >= current_time('Ymd') ){  ?>

							<div class="talk_details_box" >
							<h1><?php the_title(); ?></h1>

							<img class="speaker_img" src="<?php the_field('image') ?>" />
							<div class="talk_details_words">
							<?php
						//Convert it to DD-MM-YYYY
							$dmy = date("d-m-Y", strtotime(get_field('date')));
							?>
							<!-- //echo it -->
							<h4 ><?php echo $dmy ?></h4>
							<h4> <?php the_field('subject') ?> </h4>
							<p> <?php the_field('title') ?> </p>
							<p><?php the_field('blurb') ?> </p>

							<a class="speaker_website" href="<?php  the_field(website) ?>"><?php  the_field(website) ?></a>
						</div>
					</div>

				<?php } ?>
			<?php endwhile;
			wp_reset_query();
		} else {
			echo "there is no posts";
		}
		?>



	</main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
