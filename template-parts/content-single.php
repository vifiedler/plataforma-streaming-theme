<?php
/**
 * Template part for displaying single videos
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nota3-template
 */
$imagen  = get_field('imagen_video');
$generos = get_the_terms( get_the_ID(), 'genero_videos' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <!-- ===== HERO + VIDEO SUPERPUESTOS ===== -->
    <div id="bd-single-hero" class="bd-single-hero position-relative overflow-hidden">

        <!-- Imagen de fondo -->
        <img
            src="<?php echo esc_url( $imagen['url'] ); ?>"
            alt="<?php echo esc_attr( get_the_title() ); ?>"
            class="bd-single-hero__img">

        <!-- Contenedor del video (inicialmente oculto) -->
        <div id="bd-single-video" class="bd-single-video-container" style="display:none;">
            <div class="embed-container" id="video-container">
                <?php the_field('url_video'); ?>
            </div>
        </div>

        <!-- Overlay con contenido (tres columnas) -->
        <div class="bd-single-hero__overlay" id="bd-overlay">
            <div class="bd-single-hero__body">

                <!-- Columna 1: Botón de reproducción / pausa -->
                <div class="bd-hero-col bd-hero-col--play">
                    <div class="d-flex gap-2">
                        <button id="bd-play-btn" class="tm-hero-btn">
                            <i class="bi bi-play-fill"></i> Reproducir
                        </button>
                        <button id="bd-pause-btn" class="tm-hero-btn" style="display:none;">
                            <i class="bi bi-pause-fill"></i> Pausa
                        </button>
                    </div>
                </div>

                <!-- Columna 2: Título, excerpt, géneros, duración y año -->
                <div class="bd-hero-col bd-hero-col--info">
                    <h1 class="tm-hero-title"><?php the_title(); ?></h1>
                    <div class="tm-hero-excerpt">
                        <?php the_excerpt(); ?>
                    </div>

                    <!-- Géneros (taxonomía) -->
                    <?php if ( ! empty( $generos ) && ! is_wp_error( $generos ) ) : ?>
                    <div class="d-flex flex-wrap gap-2 mt-2">
                        <?php foreach ( $generos as $g ) : ?>
                        <a href="<?php echo esc_url( get_term_link( $g ) ); ?>"
                           class="bd-tag">
                            <?php echo esc_html( $g->name ); ?>
                        </a>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    <!-- Duración y año (campos SCF) -->
                    <div class="d-flex gap-3 mt-2">
                        <p class="bd-single-meta">
                            <i class="bi bi-clock"></i>
                            <?php echo esc_html( get_field('duracion') ?: '00:00' ); ?>
                        </p>
                        <p class="bd-single-meta">
                            <i class="bi bi-calendar"></i>
                            <?php echo esc_html( get_field('anio_lanzamiento') ?: '2024' ); ?>
                        </p>
                    </div>
                </div>

                <!-- Columna 3: Integrantes de la banda (reparto) -->
                <div class="bd-hero-col bd-hero-col--cast">
                    <?php
                    // Placeholder: puedes usar un campo de ACF tipo "relación" o "texto repetidor"
                    $integrantes = get_field('integrantes_banda'); // campo ACF que debes crear
                    if ( ! empty( $integrantes ) && is_array( $integrantes ) ) : ?>
                        <ul class="bd-cast-list">
                            <?php foreach ( $integrantes as $integrante ) : ?>
                            <li><strong><?php echo esc_html( $integrante['nombre'] ); ?></strong> &mdash; <?php echo esc_html( $integrante['instrumento'] ); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else : ?>
                        <!-- Placeholder si no hay integrantes -->
                        <ul class="bd-cast-list">
                            <li><strong>Integrante 1</strong> &mdash; Voz</li>
                            <li><strong>Integrante 2</strong> &mdash; Guitarra</li>
                            <li><strong>Integrante 3</strong> &mdash; Batería</li>
                        </ul>
                    <?php endif; ?>
                </div>

            </div><!-- /.bd-single-hero__body -->
        </div><!-- /.bd-single-hero__overlay -->

    </div><!-- /#bd-single-hero -->

    <!-- ===== CARRUSEL RELACIONADOS ===== -->
    <section class="container-fluid mt-5 mb-5">
        <div class="section-header-border pb-2 mb-2 ms-3">
            <h2 class="section-header-title text-uppercase fw-bold">Más videos</h2>
        </div>
        <?php include get_template_directory() . '/assets/modulos/modulo-video/loop-mp-carrusel-single.php'; ?>
    </section>

</article>