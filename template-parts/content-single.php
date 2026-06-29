<?php
/**
 * Template part for displaying single videos
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nota3-template
 */
$imagen = get_field('imagen_video');
$generos = get_the_terms(get_the_ID(), 'genero_videos');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <!-- ===== HERO: imagen + overlay ===== -->
    <div id="bd-single-hero" class="position-relative overflow-hidden">
        <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"
            class="bd-single-hero__img">

        <div class="bd-single-hero__overlay">
            <div class="bd-single-hero__body">

                <h1 class="tm-hero-title"><?php the_title(); ?></h1>

                <div class="tm-hero-excerpt">
                    <?php the_excerpt(); ?>
                </div>

                <!-- Géneros -->
                <?php if (!empty($generos) && !is_wp_error($generos)): ?>
                <div class="d-flex flex-wrap gap-2">
                    <?php foreach ($generos as $g): ?>
                    <a href="<?php echo esc_url(get_term_link($g)); ?>" class="bd-tag bd-enlace">
                        <?php echo esc_html($g->name); ?>
                    </a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <!-- Artista + Duración -->
                <p class="tm-hero-artist">
                    <?php echo esc_html(get_field('nombre_artista')); ?>
                </p>
                <p class="bd-single-meta">
                    <i class="bi bi-clock"></i> <?php echo esc_html(get_field('duracion')); ?>
                </p>

                <!-- Botón play -->
                <button id="bd-play-btn" class="tm-hero-btn mt-2">
                    <i class="bi bi-play-fill"></i> Reproducir
                </button>

            </div>
        </div>
    </div><!-- /#bd-single-hero -->

    <!-- ===== VIDEO (oculto hasta click en play) ===== -->
    <div id="bd-single-video" class="d-none">
        <div class="embed-container" id="video-container">
            <?php the_field('url_video'); ?>
        </div>
    </div>

    <!-- ===== CARRUSEL RELACIONADOS ===== -->
    <section class="container-fluid mt-5 mb-5">
        <div class="section-header-border pb-2 mb-2 ms-3">
            <h2 class="section-header-title text-uppercase fw-bold">Más videos</h2>
        </div>
        <?php include get_template_directory() . '/assets/modulos/modulo-video/loop-mp-carrusel-single.php'; ?>
    </section>

</article>