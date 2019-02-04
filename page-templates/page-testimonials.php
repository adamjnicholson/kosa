<?php
/**
 * Template Name: Testimonials
 */

get_header();

$args = [
  'post_type' => 'testimonial',
  'posts_per_page' => -1
];

$testimonials = new WP_Query($args);
?>



<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
    <section id="entry-content" class="page-section container sm">
      <h1 class="align-center"><?php echo the_title(); ?></h1>
      <?php the_content(); ?>
    </section>
  <?php endwhile; ?>
<?php endif; ?>
<?php if ($testimonials->have_posts()) : ?>
  <section id="testimonials" class="page-section no-gap container sm">
    <?php 
    while ($testimonials->have_posts()) : $testimonials->the_post();
      get_template_part('template-parts/content', 'testimonial');
    endwhile; 
    ?>
  </section>
<?php endif; wp_reset_postdata(); ?>


<?php get_footer(); ?>
