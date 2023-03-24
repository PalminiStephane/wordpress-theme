<?php get_header() ?>

<?php
  if (have_posts()) :
    while (have_posts()) : the_post();
    ?>
    <h2 class="right__title"><?php the_title() ?></h2>

    <article class="post post--solo">
      <?php
      $categories = get_the_category();
      foreach ($categories as $category) :
        ?>
        <a href="<?= get_category_link($category->term_id) ?>" class="post__category post__category--color-<?= strtolower($category->name) ?>"><?= $category->name ?></a>
        <?php
      endforeach;
      ?>
      <div class="post__meta">
        <strong class="post__author"><?php the_author() ?></strong>
        <time datetime="<?= the_date_xml() ?>">le <?= get_the_date() ?></time>
      </div>
      <?php the_content() ?>
      <a href="<?= home_url() ?>" class="post__link">Back to home</a>
    </article>
    <?php
    endwhile;
  endif;
  ?>

<?php get_footer() ?>
