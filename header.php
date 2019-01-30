<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 */
$headerBanner = get_field('header_banner', 'options');

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <?php wp_head(); ?>

  </head>


  <body <?php body_class(); ?>>

    <div id="hamburger">
      <?php echo genSvg('icon-bars', ['absolute-center']); ?>
      <?php echo genSvg('icon-close', ['absolute-center']); ?>
    </div>
    
    <nav id="mobile-menu-container">
      <?php wp_nav_menu(['theme_location' => 'mobile', 'container' => false, 'menu_id' => 'mobile-menu', 'menu_class' => 'no-list menu']); ?>
      <?php get_search_form(); ?>
    </nav>

    <header>
      <div class="container lg">
        <?php if (!empty($headerBanner)) : ?>
          <div class="header-banner">
            <?php echo genImageTag($headerBanner); ?>
          </div>
        <?php endif; ?>
        <?php wp_nav_menu(['theme_location' => 'main', 'container' => 'nav',  'container_id' => 'main-menu', 'menu_class' => 'no-list menu horizontal']); ?>
      </div> <!--Container-->
    </header>
    <main>
    
    

    