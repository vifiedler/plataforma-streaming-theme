<!-- carrusel destacados — estilo TM, altura 50% -->
<?php
$temp = $wp_query;
$args = array(
    'post_type'      => 'videos',
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
    'posts_per_page' => -1,
    'tax_query'      => array(
        array(
            'taxonomy' => 'genero_videos',
            'field'    => 'slug',
            'terms'    => 'destacados',
        ),
    ),
);
$wp_query = new WP_Query($args);
if ($wp_query->have_posts()):
    $carousel_id = 'carouseldestacados_' . uniqid();
?>

<div id="<?php echo esc_attr($carousel_id); ?>" class="carousel slide tm-carousel" data-bs-ride="carousel">
    <!-- Slides -->
    <div class="carousel-inner">
        <?php $i = 0;
            while ($wp_query->have_posts()):
                $wp_query->the_post(); ?>
        <div class="carousel-item <?php echo $i === 0 ? 'active' : ''; ?>">
            <article>
                <!-- Imagen -->
                <a href="<?php echo get_the_permalink(); ?>" class="d-block tm-carousel__img-wrap">
                     <img src="<?php echo esc_url(get_field('imagen_video')['url']); ?>"
                        alt="<?php echo esc_attr(get_the_title()); ?>" class="object-fit-fill tm-carousel__img">
                </a>
                <!-- Texto -->
                <div class="tm-carousel__body pt-3">
                    <a href="<?php echo get_the_permalink(); ?>" class="text-decoration-none">
                        <h3 class="lg__title-small mb-2"><?php the_title(); ?></h3>
                    </a>
                    <div class="tease-dek-small mb-3">
                        <?php echo get_the_excerpt(); ?>
                    </div>
                    <div class="meta-text text-muted">
                        <?php echo esc_html(get_field('nombre_artista')); ?>
                    </div>
                </div>
            </article>
        </div>
        <?php $i++; endwhile; ?>
    </div>
    <!-- Controles -->
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