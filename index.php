<?php
/**
 * The main template file
 */

get_header(); ?>
<section id="search-results" class="page-section container sm">
  <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('template-parts/content'); ?>
      <?php endwhile; ?>
  <?php else : ?>
    <?php get_template_part('template-parts/content', 'none'); ?>
  <?php endif; ?>
</section>

   

<?php get_footer(); ?>
