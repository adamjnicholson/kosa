<?php
/**
 * Template Name: Fabric
 */

get_header();

$attributes = get_field('attributes');
?>

<?php if (have_posts()) : ?>
 <?php while (have_posts()) : the_post(); ?>
    <h1 class="align-center col"><?php echo the_title(); ?></h1>
  <?php endwhile; ?>
<?php endif; ?>

<?php if (!empty($attributes)) : ?>
  <section id="attributes" class="container md">
    <div class="row">
      <?php 
      foreach ($attributes as $attr) :
        $heading = !empty($attr['heading']) ? '<h3>' . $attr['heading'] . '</h3>' : '';
        $subheading = !empty($attr['sub_heading']) ? '<p class="subheading">' . $attr['sub_heading'] . '</p>' : '';
        $description = !empty($attr['description']) ? '<div class="description">' . $attr['description'] . '</div>' : '';
      ?>
        <div class="attribute col col-xs-12 col-md-6 col-lg-4">
          <?php 
            echo $heading;
            echo $subheading;
            echo $description;
            if (!empty($attr['images'])) {
              foreach ($attr['images'] as $img) {
                echo genImageTag($img);
              }
            }
          ?>
        </div>
       <?php endforeach; ?>
    </div>
  </section>
<?php endif; ?>


<?php get_footer(); ?>
