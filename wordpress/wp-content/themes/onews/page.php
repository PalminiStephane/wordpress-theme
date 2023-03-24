<?php get_header() ?>

<?php
if (have_posts()) :
  while (have_posts()) : the_post();
  ?>
  <h2 class="right__title"><?php the_title() ?></h2>
  <section class="post post--solo">
    <?php the_content() ?>
    <a href="<?= home_url() ?>" class="post__link">Back to home</a>
  </section>
  <?php
  endwhile;
endif;
?>

<?php get_footer() ?>
