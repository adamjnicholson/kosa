<?php
/**
 * The default template for displaying content
 */
?>

<?php $width = ''; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-preview'); ?>>
  <div class="row">
    <?php if (has_post_thumbnail()): $width = 'col-t-9'; ?>
      <div class="post-thumb col col-m-12 col-t-3">
        <?php echo get_the_post_thumbnail(get_the_ID(), 'post-preview'); ?>
      </div>
    <?php endif; ?>
    <div class="post-desc col col-m-12 <?php echo $width; ?>">
      <h2><a href="<?php echo get_permalink();?>"><?php the_title(); ?></a></h2>

      <?php 
        echo genExcerpt(get_the_content());
      ?>

      <!-- excerpt -->
      <a href="<?php echo get_permalink();?>" class="button read-more">Read More</a>
    </div>
   
  </div>
</article>