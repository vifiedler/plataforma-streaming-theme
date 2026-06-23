<?php
$temp = $wp_query;
$args = array(
    'post_type' => 'videos',
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'genero_videos',
            'field' => 'slug',
            'terms' => 'destacados',
        ),
    ),
);
$wp_query = new WP_Query($args);
if ($wp_query->have_posts()):
    $carousel_id = 'carouseldestacados_' . uniqid();
    ?>

    <div id="<?php echo esc_attr($carousel_id); ?>" class="carousel slide tm-carousel" data-bs-ride="carousel">
        <!-- slider -->
        <div class="carousel-inner">
            <?php $i = 0;
            while ($wp_query->have_posts()):
                $wp_query->the_post(); ?>
                <div class="carousel-item <?php echo $i === 0 ? 'active' : ''; ?>">
                    <article class="tm-hero-slide position-relative">
                        <!-- img -->
                        <img src="<?php echo esc_url(get_field('imagen_video')['url']); ?>"
                            alt="<?php echo esc_attr(get_the_title()); ?>" class="tm-carousel__img">
                        <!-- contenido -->
                        <div class="tm-hero-body">
                            <a href="<?php echo get_the_permalink(); ?>" class="text-decoration-none">
                                <h3 class="tm-hero-title"><?php the_title(); ?></h3>
                            </a>
                            <div class="tm-hero-excerpt">
                                <?php echo get_the_excerpt(); ?>
                            </div>
                            <div class="tm-hero-artist">
                                <?php echo esc_html(get_field('nombre_artista')); ?>
                            </div>
                            <a href="<?php echo get_the_permalink();?>" class="tm-hero-btn"><i class="bi bi-play-fill"></i>Ir a video</a>
                        </div>
                    </article>
                </div>
                <?php $i++; endwhile; ?>
        </div>
        <!-- controles -->
        <button class="tm-carousel__prev" type="button" data-bs-target="#<?php echo esc_attr($carousel_id); ?>"
            data-bs-slide="prev">
            <i class="bi bi-chevron-left"></i>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="tm-carousel__next" type="button" data-bs-target="#<?php echo esc_attr($carousel_id); ?>"
            data-bs-slide="next">
            <i class="bi bi-chevron-right"></i>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>

    <?php
endif;
wp_reset_query();
$wp_query = $temp;
?>