<?php /* Template Name: past talks */ ?>

<?php
get_header(); ?>
<?php

$args = array(
  'post_type' => 'talk',
  'orderby' => 'date',
  'order'	=> 'Desc',
  // 'post_limits' => 1,
  // 'posts_per_page' => 1,

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
        <h2>
          <?php the_title(); ?>
        </h2>
        <?php
        $dmy = date("jS F  Y", strtotime(get_field('date')));
        ?>
        <h4 class="talk_date">
          <?php echo "Talk from the  $dmy"; ?>
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

      <?php if (get_field('blurb')){ ?>
        <p class="talk_blurb">
          <?php the_field('blurb'); ?>
        </p>
      <?php } ?>
        </div>
  </div>
  <?php } if ($test == false) {
  echo "no posts found";
}?>
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
