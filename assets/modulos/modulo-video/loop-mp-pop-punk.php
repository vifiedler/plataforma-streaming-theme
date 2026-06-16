<!-- Custom loop pop-punk -->
<?php
$temp = $wp_query;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type' => 'videos',
    'orderby' => 'date',
    'order' => 'DESC',
    'paged' => $paged,
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'genero_videos',
            'field' => 'slug',
            'terms' => 'pop-punk'
        ),
    ),
);
$wp_query = new WP_Query($args);
if ($wp_query->have_posts()):
    while ($wp_query->have_posts()):
        $wp_query->the_post(); ?>
    <div class="card" style="width: 18rem;">
        <img src="<?php echo esc_url(get_field('imagen_video')['url']); ?>" class="card-img-top"
            alt="<?php echo get_the_title(); ?>">
        <div class="card-body">
            <h5 class="card-title"><?php echo get_the_title(); ?></h5>
            <p><strong>Artista:</strong> <?php echo get_field('nombre_artista'); ?></p>
            <p class="card-text"><?php echo get_the_excerpt(); ?></p>
            <p><strong>Duración:</strong> <?php echo get_field('duracion'); ?></p>
            <a href="<?php the_permalink(); ?>" class="btn btn-primary">Ver video</a>
        </div>
    </div>
    <!-- End pop-punk-->

<?php endwhile;
endif;
wp_reset_query();
$wp_query = $temp; ?>