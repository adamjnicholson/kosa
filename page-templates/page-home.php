<?php
/**
 * Template Name: Home
 */

get_header();

$intro = get_field('intro');
$width = 'col col-xs-12 ';
$width .= count($intro) > 3 ? 'col-sm-6 col-lg-3' : 'col-md-4';

$styleHeading = get_field('styles_heading');
$styleImages = get_field('styles');
$styleContent = get_field('styles_content');

$leftCol = get_field('left_col');
$rightCol = get_field('right_col');
?>




<?php if (have_posts()) : ?>
  <section id="entry-content" class="page-section container sm">
    <?php 
    while (have_posts()) : the_post();
      the_content();
    endwhile;
    ?>
  </section>
<?php endif; ?>

<?php if (!empty($intro)) : ?>
    <section id="intro" class="page-section small-gap container md">
      <div class="row">
        <?php foreach ($intro as $col) : ?>
          <div class="<?php echo $width; ?>">
            <?php 
              if ($col['acf_fc_layout'] === 'image') {
              echo genImageTag($col['image']);
              } elseif ($col['acf_fc_layout'] === 'text') {
                echo $col['text'];
              }
            ?>
          </div>
        <?php endforeach; ?>
      </div>
    </section>
<?php endif; ?>

<?php if (!empty($styleImages) || !empty($styleContent)) : ?>
    <section id="styles" class="page-section container sm">
      <?php if (!empty($styleHeading)) : ?>
        <h2><?php echo $styleHeading; ?></h2>
      <?php endif; ?>
      <?php if (!empty($styleImages)) : ?>
        <div class="style-images">
          <?php  
          foreach ($styleImages as $img) {
            echo genImageTag($img);
          }
          ?>
        </div>
    <?php endif; ?>
    <?php if (!empty($styleContent)) : ?>
      <div class="style-content">
        <?php echo $styleContent; ?>
      </div>
    <?php endif; ?>
    </section>
<?php endif; ?>

<?php if (!empty($leftCol) || !empty($rightCol)) : ?>
  <section id="home-features" class="page-section big-gap container md">
    <div class="row">
      <?php if (!empty($leftCol)) : ?>
        <div class="col col-xs-12 col-md-6">
          <?php echo $leftCol; ?>
        </div>
      <?php endif; ?>
      <?php if (!empty($rightCol)) : ?>
        <div class="col col-xs-12 col-md-6">
          <?php echo $rightCol; ?>
        </div>
      <?php endif; ?>
    </div>
  </section>
<?php endif; ?>




<?php get_footer(); ?>
