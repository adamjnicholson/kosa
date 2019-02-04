<?php
/**
 * The default template for displaying content
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class('post-preview testimonial'); ?>>
  <div class="post-content">
    <?php the_content(); ?>
  </div>
  <div class="reviewer"><?php the_title(); ?></div>
</article>