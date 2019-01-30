<?php
/**
 * The template for displaying search results pages.
 */

get_header(); ?>

<?php 
  global $wp_query;
  $classes =  $wp_query->found_posts > 0 ? 'md' : 'sm no-results';
?>

<section id="search-results" class="container <?php echo $classes; ?>">
  <?php 
    if (have_posts()) {
      while (have_posts()) : the_post();
        get_template_part( 'template-parts/content', 'search');
      endwhile;
    } else {
      get_template_part( 'template-parts/content', 'search-none');
    }
  ?>
</section>

<?php get_footer(); ?>
