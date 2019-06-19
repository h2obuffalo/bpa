<?php
/**
 * Template Name: Full Width
 *
 * @package Simple_Life
 */

get_header(); ?>

  <div id="primary" <?php echo simple_life_content_class( 'content-area' ); ?>>
    <main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'content', 'page' ); ?>



		<?php endwhile; // End of the loop. ?>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php get_footer(); ?>
