<?php
/**
 * Template Name: Protection
 */

get_header();

$sections = get_field('sections');
?>

<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
    <h1 class="align-center col"><?php echo the_title(); ?></h1>
  <?php endwhile; ?>

  <section id="protection" class="page-section container sm">
    <?php foreach ($sections as $section) : ?>
      <?php 
      if (!empty($section['content'])) {
        echo $section['content'];
      }
      if (!empty($section['image'])) : ?>
        <div class="image-row">
          <?php 
            foreach ($section['image'] as $img) {
              echo genImageTag($img);
            }
          ?>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  </section>
<?php endif; ?>


<?php get_footer(); ?>
