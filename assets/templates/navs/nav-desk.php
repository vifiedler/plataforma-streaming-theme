<nav class="navbar navbar-expand-lg fbs__net-navbar d-flex align-items-center">
  <?php the_custom_logo(); ?>
  <div class="container d-flex align-items-center justify-content-between">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <?php
      wp_nav_menu(array(
        'theme_location' => 'menu-superior',
        'menu_class' => 'navbar-nav mb-2 mb-lg-0',
        'container' => 'false',
        'depth' => 2,
        'walker' => new bootstrap_5_wp_nav_menu_walker(),
        'fallback_cb' => 'bootstrap_5_wp_nav_menu_walker::fallback',
      ));
      ?>
    </div>

  </div>
  <div class="nav-search-wrap ms-auto me-3">
    <?php get_search_form(); ?>
  </div>
</nav>