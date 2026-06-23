<nav class="navbar navbar-expand-lg fbs__net-navbar">
    <div class="container-fluid d-flex flex-wrap align-items-center">
        <div class="navbar-brand-wrapper col-12 col-lg-auto">
            <?php the_custom_logo(); ?>
        </div>
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
        <div class="nav-search-wrap ms-lg-auto mt-2 mt-lg-0">
            <?php get_search_form(); ?>
        </div>
    </div>
</nav>