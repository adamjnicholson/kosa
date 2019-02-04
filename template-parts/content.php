<?php
/**
 * The default template for displaying content
 */
?>

<?php 
  $banner = get_field('banner');
  $images = get_field('images');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-preview'); ?>>
  <div class="date"><?php echo get_the_date('j/n/y'); ?></div>
  <h2><?php the_title(); ?></h2>
  <?php if (!empty($banner)) : ?>
    <div class="banner"><?php echo genImageTag($banner); ?></div>
  <?php endif; ?>
  <div class="post-content">
    <?php the_content(); ?>
  </div>
  <?php if (!empty($images)) : ?>
    <div class="image-row">
      <?php 
      foreach ($images as $img) {
        echo genImageTag($img);
      }
      ?>
    </div>
  <?php endif; ?>   
</article>