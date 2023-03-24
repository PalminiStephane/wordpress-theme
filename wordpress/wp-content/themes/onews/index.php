<?php get_header() ?>
        <!-- emmet: h2+article*6>a+h3+div>(img+strong+time)+p+a -->
        <h2 class="right__title">Latest News</h2>
        <div class="posts">
          <?php
          if (have_posts()) :
            while (have_posts()) : the_post();
            ?>
            <article class="post">
                <?php
                $categories = get_the_category();
                foreach ($categories as $category) :
                ?>
                <a href="<?= get_category_link($category->term_id) ?>" class="post__category post__category--color-<?= strtolower($category->name) ?>"><?= $category->name ?></a>
                <?php
                endforeach;
                ?>
                <h3><?php the_title() ?></h3>
                <div class="post__meta">
                <strong class="post__author"><?php the_author() ?></strong>
                <time datetime="<?= the_date_xml() ?>">le <?= get_the_date() ?></time>
                </div>
                <p><?php the_excerpt() ?></p>
                <a href="<?php the_permalink() ?>" class="post__link">Continue reading</a>
            </article>
            <?php
            endwhile;
          endif;
          ?>
        </div>
<?php get_footer() ?>
