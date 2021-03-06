<?php /* Template Name: upcoming-talks */ ?>

<?php
get_header(); ?>

<!-- <div id="primary" <?php echo simple_life_content_class( 'content-area' ); ?>>
	<main id="main" class="site-main" role="main"> -->
		<?php

		$args = array(
			'post_type' => 'talk',
			'meta_key' => 'talk_date',
            'orderby' => 'meta_value',
            'order' => 'DESC'
            
			// 'post_limits' => 1,
			// 'posts_per_page' => 1,

		);

		$result = new WP_Query($args);

		if($result->have_posts() ) {
			$test = false;
			while ( $result->have_posts() ) : $result->the_post();

				if (get_field('date') >= current_time('Ymd') ){  ?>
					<?php $test =true; ?>
					<div class="talk_details_box" >
							<?php if (get_field('talk_title')){ ?>
								<h2>
									<?php the_field('talk_title'); ?>
								</h2>
							<?php } ?>
							<?php if (get_field('subtitle')){ ?>
								<h3>
									<?php the_field('subtitle'); ?>
								</h3>
							<?php } ?>
						<?php
						//Convert it to DD-MM-YYYY
						$dmy = date("jS F  Y", strtotime(get_field('talk_date')));
						?>
						<h4 class="talk_date">
							<?php echo "Monday  $dmy"; ?>
						</h4>
						<?php if (get_field('image')) { ?>
							<img class="speaker_img" src="<?php the_field('image') ;?>" />
						<?php }?>
						<div class="talk_words_box">
							<?php if (get_field('speaker_name')){ ?>
								<h4>
									<?php the_field('speaker_name'); ?>
								</h4>
							<?php } ?>
							<?php if (get_field('speaker_bio')){ ?>
							    <p class="talk_blurb">
									<?php the_field('speaker_bio'); ?>
								</p>
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



	</main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
