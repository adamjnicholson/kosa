<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header(); ?>

<section id="page-not-found" class="container sm align-center">
  <h1>404</h1>
  <h2>Oops! Looks like that page doesn't exist</h2>
  <p>Would you like to search for something else?</p>
  <?php get_search_form(); ?>
</section>

<?php get_footer(); ?>
