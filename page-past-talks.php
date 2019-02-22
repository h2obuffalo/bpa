<?php /* Template Name: past talks */ ?>

<?php
get_header(); ?>
<?php

$args = array(
  'post_type' => 'talk',

);

$result = new WP_Query($args);

if($result->have_posts() ) {
  $test = false;
  while ( $result->have_posts() ) : $result->the_post();
    ?>
    <?php
    if (get_field('date') <= current_time('Ymd') ){  ?>
      <?php $test = true; ?>
      <div class="talk_details_box" >

        <h1>
          <?php the_title(); ?>
        </h1>
        <?php
        $dmy = date("d-m-Y", strtotime(get_field('date')));
        ?>
        <h1 class="talk_date">
          <?php echo $dmy ;?>
        </h1>
        <?php if (get_field('image')) { ?>
        <img class="speaker_img" src="<?php the_field('image') ;?>" />
        <?php }?>
        <?php if (get_field('subject')){ ?>
        <p>
          <?php the_field('subject'); ?>
        </p>
        <?php } ?>
        <?php if (get_field('burb')){ ?>
        <p>
          <?php the_field('blurb'); ?>
        </p>
        <?php } ?>
      </div>
    <?php } ?>
  <?php endwhile;
  if ($test == false) {
    echo "no posts found";
  }
  wp_reset_query();
} else {
  echo "there is no posts";
}
?>



</main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
