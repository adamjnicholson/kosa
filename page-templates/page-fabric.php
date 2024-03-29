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
      foreach ($attributes as $key => $attr) :
        $heading = !empty($attr['heading']) ? '<h2>' . $attr['heading'] . '</h2>' : '';
        $subheading = !empty($attr['sub_heading']) ? '<p class="subheading">' . $attr['sub_heading'] . '</p>' : '';
        $description = !empty($attr['description']) ? '<div class="description">' . $attr['description'] . '</div>' : '';
      ?>
        <div class="attribute col col-xs-12 col-md-6">
          <?php 
            echo $heading;
            echo $subheading;
            echo $description;
            if (!empty($attr['images'])) {
              foreach ($attr['images'] as $img) {
                echo '<a href="' . $img['url'] . '" data-lightbox="' . $key . '">' . genImageTag($img, 'medium_large') . '</a>';
              }
            }
          ?>
        </div>
       <?php endforeach; ?>
    </div>
  </section>
<?php endif; ?>


<?php get_footer(); ?>
