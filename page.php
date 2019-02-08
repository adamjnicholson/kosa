<?php
/**
 * The template for displaying pages
 */

get_header();

$sections = get_field('sections');
?>

<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
    <h1 class="align-center col"><?php echo the_title(); ?></h1>
  <?php endwhile; ?>
<?php endif; ?>

<?php if (!empty($sections)) : ?>
  <section id="page-sections" class="page-section container md">
    <?php 
    foreach ($sections as $section) : 
      $gap = $section['gap'] ? ' gap' : '';
    ?>
      <div class="row<?php echo $gap; ?>">
        <div class="col col-xs-12 col-sm-4 col-md-3">
          <?php 
          if (!empty($section['image'])) {
            foreach ($section['image'] as $img) {
              echo genImageTag($img, 'full', false, 'full-width');
            }
          }
          ?>
        </div>
        <div class="col col-xs-12 col-sm-8 col-md-9">
          <?php echo $section['content']; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </section>
<?php endif; ?>


<?php get_footer(); ?>
