<!-- Custom loop metalcore -->
<?php
$temp = $wp_query;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type'      => 'videos',
    'orderby'        => 'date',
    'order'          => 'DESC',
    'paged'          => $paged,
    'posts_per_page' => -1,
    'tax_query'      => array(
        array(
            'taxonomy' => 'genero_videos',
            'field'    => 'slug',
            'terms'    => 'metalcore',
        ),
    ),
);
$wp_query = new WP_Query($args);
if ($wp_query->have_posts()):
?>

<div class="bd-carousel-wrap">
    <button class="bd-carousel-btn bd-carousel-prev">
        <i class="bi bi-chevron-left"></i>
    </button>
    <div class="bd-carousel-track">
        <?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
        <div class="bd-carousel-card">
            <a href="<?php the_permalink(); ?>" class="d-block text-decoration-none">
                <div class="bd-carousel-thumb-wrap">
                    <img src="<?php echo esc_url(get_field('imagen_video')['url']); ?>"
                        alt="<?php echo esc_attr(get_the_title()); ?>"
                        class="bd-carousel-thumb">
                    <span class="bd-carousel-duration">
                        <?php echo esc_html(get_field('duracion')); ?>
                    </span>
                </div>
            </a>
            <div class="bd-carousel-card-body">
                <h5 class="bd-carousel-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h5>
                <p class="bd-carousel-artist">
                    <?php echo esc_html(get_field('nombre_artista')); ?>
                </p>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
    <button class="bd-carousel-btn bd-carousel-next">
        <i class="bi bi-chevron-right"></i>
    </button>
</div>

<?php
endif;
wp_reset_query();
$wp_query = $temp;
?>
<!-- End metalcore -->