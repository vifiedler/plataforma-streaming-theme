<!-- Custom loop hardcore -->
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
            'terms' => 'hardcore'
        ),
    ),
);
$wp_query = new WP_Query($args);
if ($wp_query->have_posts()):
    while ($wp_query->have_posts()):
        $wp_query->the_post(); ?>
<div class="bd-carousel-warp">
    <button class="bd-carousel-btn bd-carousel-prev"><i class="bi bi-chevron-left"></i></button>

    <div class="bd-carousel-card">
        <a href="<?php the_permalink(); ?>" class="d-block text-decorantion-none">
            <div class="bd-carousel-thumb-wrap"><img src="<?php echo esc_url(get_field('imagen_video')['url']); ?>"
                    class="bd-carousel-thumb" alt="<?php echo get_the_title(); ?>"><span
                    class="bd-carousel-duracion"><?php echo get_field('duracion'); ?></span></div>
        </a>
        <div class="bd-carousel-card-body">
            <h5 class="bd-carousel-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>
            <p class="bd-carousel-artist"><?php echo get_field('nombre_artista'); ?></p>
        </div>
    </div>
</div>
    <!-- End hardcore-->

<?php endwhile;?>
<button class="bd-carousel-btn bd-carousel-next">
    <i class="bi bi-chevron-right"></i>
</button>
<?php
endif;
wp_reset_query();
$wp_query = $temp; ?>