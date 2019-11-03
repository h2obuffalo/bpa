
<?php /* Template Name: upcoming talks */ ?>

<?php

        $args = array(
        'post_status' => array('future'),
        'post_type' => 'talks',
        
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
          echo "there is no talks";
        }
?>

  <?php get_sidebar( 'content-bottom' ); ?>
