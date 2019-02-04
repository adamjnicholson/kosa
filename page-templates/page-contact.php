<?php
/**
 * Template Name: Contact
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
  <section id="contact" class="page-section container sm">
    <?php 
    foreach ($sections as $section) : 
      $gap = $section['gap'] ? 'gap' : '';
    ?>
      <div class="row <?php echo $gap; ?>">
        <div class="col col-xs-12">
          <?php echo $section['content']; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </section>
<?php endif; ?>


<?php get_footer(); ?>
