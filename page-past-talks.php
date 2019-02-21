<?php /* Template Name: past talks */ ?>

<?php
get_header(); ?>

  <div id="primary" <?php echo simple_life_content_class( 'content-area' ); ?>>
    <main id="main" class="site-main" role="main">

      <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'content', 'page' ); ?>

      <?php

        $args = array(
        'post_status' => array('posts'),
        'post_type' => 'talk',
        );

        $result = new WP_Query($args);

         if($result->have_posts() ) {

        while ( $result->have_posts() ) : $result->the_post();
          ?>
         <h1><?php the_title(); ?></h1>

        <div>
          <?php the_content(); ?>
        </div>


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
