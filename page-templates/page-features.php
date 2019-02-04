<?php
/**
 * Template Name: Features
 */

get_header();

$sections = get_field('sections');
$total = 0;
$numCols = 2;

$colours = get_field('colours', 'options');
$sizes = get_field('sizes', 'options');

?>

<?php if (have_posts()) :
  while (have_posts()) : the_post();
?>
  <h1 class="col align-center"><?php the_title(); ?></h1>
<?php endwhile; endif; ?>

  <section id="features" class="page-section container md">
    <?php foreach ($sections as $key =>$section) :?>
      <?php 
        $lis = explode('<li>', $section['content']);
        unset($lis[0]);

        $liCount = count($lis); // 23
        $halfway = ceil($liCount / $numCols); // 12
      ?>
      <div class="row">
        <div class="col col-xs-12">
          <?php 
          if (!empty($section['image'])) {
            foreach ($section['image'] as $img) {
              echo genImageTag($img);
            }
          }
          ?>
        </div>
        <?php for ($col = 0; $col < $numCols; $col++) : ?>
          <ul class="col col-xs-12 col-sm-6 no-list">
            <?php for ($item = $halfway * $col; $item < min($halfway * ($col + 1), $liCount); $item++) : ?>
              <li>
                <span class="number"><?php echo $item + 1 + $total . '.'; ?></span>
                <span><?php echo $lis[$item + 1]; ?></span>
              </li>
            <?php endfor; ?>
          </ul>
        <?php endfor; ?>
      </div>
      <?php $total += $liCount; ?>
    <?php endforeach; ?>
  </section>

  <?php if (!empty($colours) || !empty($sizes)) : ?>
    <section id="kosa-options" class="page-section container md">
      <div class="row">
        <?php echo genColours('kosa-colours col col-xs-12 col-md-6', '<h3>KOSA Rider Colours:</h3>'); ?>
        <?php if (!empty($sizes)) : ?>
          <div class="kosa-sizes col col-xs-12 col-md-6">
            <h3>KOSA Rider Colours:</h3>
            <p><?php echo $sizes; ?></p>
          </div>
        <?php endif; ?>
      </div>
    </section>
  <?php endif; ?>


<?php get_footer(); ?>
