<?php 
  $contactInfo = get_field('contact', 'options');
  if (!is_home()) :
    $args = [
      'post_type' => 'post',
      'posts_per_page' => '1'
    ];
    $latestPost = new WP_Query($args);
?>

          <?php if ($latestPost->have_posts()) : ?>
            <section id="latest-post" class="page-section container md">
              <?php while ($latestPost->have_posts()) : $latestPost->the_post(); ?>
                <div class="post-inner">
                  <h2>Latest News... <?php the_title(); ?></h2>
                  <div class="row">
                    <div class="container sm">
                    <?php the_content(); ?>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
            </section>
          <?php endif; ?>
  <?php endif; ?>
        </main><!-- #rest-of-site -->

        <footer class="container md">
          <div class="row">
            <div class="col">
              <?php genSiteLogo('small', false, 'footer'); ?>
            </div>
            <div class="col footer-menu-container">
              <?php wp_nav_menu(['theme_location' => 'footer', 'container' => 'nav',  'container_id' => 'footer-menu', 'menu_class' => 'no-list menu']); ?>
            </div>
            <?php if (!empty($contactInfo)) : ?>
              <div class="col contact-details">
                <?php echo $contactInfo; ?>
              </div>
            <?php endif; ?>
          </div>
        </footer>
        <div class="bottom-bar">
          <div class="container lg">
            <p>KOSA DESIGN PTY LTD</p>
            <?php genCopyright(); ?>
            <a href="http://adamnicholsondesigns.com.au" class="developer" target="_blank">Contact Developer</a>
          </div>
        </div>
    <?php wp_footer(); ?>
  </body>
</html>
