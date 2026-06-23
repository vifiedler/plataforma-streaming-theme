<?php
/**
 * Template part for displaying a single video card
 *
 * @package nota3-template
 */
?>
    <!-- Sección Destacados -->
    <div class="row mb-5">
        <section class="col-12 section-header-border pb-2">
            <?php include get_template_directory() . '/assets/modulos/modulo-video/loop-mp-destacados.php'; ?>
        </section>
    </div>
<div class="col-12 col-md-4">
    <div class="video-card">
        <a href="<?php the_permalink(); ?>" class="d-block text-decoration-none">
            <div class="video-card__thumb-wrap">
                <img src="<?php echo esc_url(get_field('imagen_video')['url']); ?>"
                    alt="<?php echo esc_attr(get_the_title()); ?>" class="video-card__thumb">
                <span class="video-card__duration"><?php echo get_field('duracion');?></span>
            </div>
        </a>
        <div class="video-card__body">
            <h3 class="video-card__title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
            <p class="video-card__artist">
                <?php echo esc_html(get_field('nombre_artista')); ?>
            </p>
        </div>
    </div>
</div>