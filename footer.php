        </main><!-- #rest-of-site -->

        <footer>
          <div class="container lg">
            <div class="row">
              <div class="col col-m-12">
                <?php genSiteLogo('footer'); ?>
                <?php genSocialMenu(); ?>
                <?php genCopyright(); ?>
              </div>
              <div class="col col-m-12">
                <?php wp_nav_menu(['theme_location' => 'footer', 'container' => 'nav',  'container_id' => 'footer-menu', 'menu_class' => 'no-list menu']); ?>
              </div>
            </div>
        </footer>
    <?php wp_footer(); ?>
  </body>
</html>
