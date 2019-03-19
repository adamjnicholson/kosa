<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 */
$headerBanner = get_field('page_banner');
$headerBanner = empty($headerBanner) ? get_field('site_banner', 'options') : $headerBanner;
$bannerCutout = get_field('banner_cutout', 'options');
$wearIt = get_field('wear_it', 'options');

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>

  </head>


  <body <?php body_class(); ?>>
    <div class="fixed-header">
      <?php genSiteLogo('header', false, ''); ?>
      <div id="hamburger">
        <?php echo genSvg('icon-bars', ['absolute-center']); ?>
        <?php echo genSvg('icon-close', ['absolute-center']); ?>
      </div>
    </div>
    <nav id="mobile-menu-container">
      <?php wp_nav_menu(['theme_location' => 'mobile', 'container' => false, 'menu_id' => 'mobile-menu', 'menu_class' => 'no-list menu']); ?>
    </nav>

    <header>
      <div class="container lg">
        <?php genSiteLogo('header', false); ?>
        <?php wp_nav_menu(['theme_location' => 'main', 'container' => 'nav',  'container_id' => 'main-menu', 'menu_class' => 'no-list menu horizontal']); ?>
        
      </div>
    </header>
    <main>
      <?php if (!empty($headerBanner)) : ?>
        <section id="page-banner" class="page-section">
          <div class="page-banner-inner">
          <?php 
            foreach ($headerBanner as $banner) {
              echo genImageTag($banner, 'banner');
            }
          ?>
          </div>
          <?php if (is_front_page() && !empty($bannerCutout)) : ?>
          <div id="banner-cutout">
            <div class="cutout">
              <?php echo $bannerCutout; ?>
            </div>
            <?php if (!empty($wearIt)) : ?>
              <ul class="wear-it no-list">
                <?php foreach ($wearIt as $content) : ?>
                  <li class="h3"><?php echo $content['content']; ?></li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </div>
        <?php endif; ?>
        </section>
      <?php endif; ?>
    

    