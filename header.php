<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 */
$headerBanner = get_field('page_banner');
$headerBanner = empty($headerBanner) ? get_field('site_banner', 'options') : $headerBanner;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <?php wp_head(); ?>

  </head>


  <body <?php body_class(); ?>>
    <div class="fixed-header">
      <?php genSiteLogo('small', false, ''); ?>
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
        <div id="page-banner">
          <?php 
          foreach ($headerBanner as $banner) {
            echo genImageTag($banner);
          }
          ?>
        </div>
      <?php endif; ?>
    

    