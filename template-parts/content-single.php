<?php
/**
 * Template part for displaying single videos
 *
 * @package nota3-template
 */
$imagen = get_field('imagen_video');
$generos = get_the_terms(get_the_ID(), 'genero_videos');
$artista = get_field('nombre_artista');
$duracion = get_field('duracion');
$anio = get_field('anio_lanzamiento');
$integrantes = get_field('integrantes_banda');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <!-- ===== HERO: imagen + overlay (sin video superpuesto) ===== -->
    <div id="bd-single-hero" class="position-relative overflow-hidden">
        <img
            src="<?php echo esc_url($imagen['url']); ?>"
            alt="<?php echo esc_attr(get_the_title()); ?>"
            class="bd-single-hero__img">

        <div class="bd-single-hero__overlay">
            <div class="bd-single-hero__body">
                <h1 class="tm-hero-title"><?php the_title(); ?></h1>
                <div class="tm-hero-excerpt"><?php the_excerpt(); ?></div>

                <!-- Géneros -->
                <?php if (!empty($generos) && !is_wp_error($generos)): ?>
                <div class="d-flex flex-wrap gap-2">
                    <?php foreach ($generos as $g): ?>
                    <a href="<?php echo esc_url(get_term_link($g)); ?>" class="bd-tag">
                        <?php echo esc_html($g->name); ?>
                    </a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <!-- Artista + Duración -->
                <p class="tm-hero-artist"><?php echo esc_html($artista); ?></p>
                <p class="bd-single-meta">
                    <i class="bi bi-clock"></i> <?php echo esc_html($duracion); ?>
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

    <!-- ===== SECCIÓN DE INFORMACIÓN (debajo del hero/video) ===== -->
    <section class="container py-4">
        <div class="row g-4">

            <!-- Columna principal: título, géneros, metadatos, excerpt -->
            <div class="col-md-8 d-flex flex-column border border-secondary rounded-3 p-3">
                <h2 class="h3 fw-bold mb-2"><?php the_title(); ?></h2>

                <div class="mb-2">
                    <?php if (!empty($generos) && !is_wp_error($generos)): ?>
                        <div class="d-flex flex-wrap gap-1">
                            <?php foreach ($generos as $g): ?>
                                <a href="<?php echo esc_url(get_term_link($g)); ?>" class="bd-tag me-2">
                                    <?php echo esc_html($g->name); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="bd-single-meta d-flex flex-wrap gap-3 small text-secondary mb-2">
                    <span><i class="bi bi-clock"></i> <?php echo esc_html($duracion); ?></span>
                    <span><i class="bi bi-calendar"></i> <?php echo esc_html($anio); ?></span>
                </div>

                <p class="mb-0"><?php echo get_the_excerpt(); ?></p>
            </div>

            <!-- Columna derecha: integrantes -->
            <div class="col-md-4 d-flex flex-column border border-secondary rounded-3 p-3">
                <strong class="text-uppercase small fw-bold mb-2" style="color:var(--breakdown-text); letter-spacing:1px;">
                    Integrantes
                </strong>
                <ul class="bd-cast-list list-unstyled mb-0">
                    <?php if ($integrantes && is_array($integrantes)): ?>
                        <?php foreach ($integrantes as $integrante): ?>
                            <li><?php echo esc_html($integrante); ?></li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li><strong>Vocalista</strong> (placeholder)</li>
                        <li><strong>Guitarrista</strong> (placeholder)</li>
                        <li><strong>Bajista</strong> (placeholder)</li>
                        <li><strong>Baterista</strong> (placeholder)</li>
                    <?php endif; ?>
                </ul>
            </div>

            <!-- Fila siguiente: descripción canción -->
            <div class="col-md-8 border border-secondary rounded-3 p-3">
                <?php the_content(); ?>
            </div>

            <!-- Fila siguiente: información del álbum -->
            <div class="col-md-4 border border-secondary rounded-3 p-3">
                <div class="row align-items-center g-2">
                    <div class="col-4 col-md-12 col-xl-4">
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>"
                             alt="<?php echo esc_html(get_field('nombre_album')); ?>"
                             class="img-fluid rounded-circle">
                    </div>
                    <div class="col-8 col-md-12 col-xl-8">
                        <p class="mb-0"><?php echo get_field('desc_album'); ?></p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ===== CARRUSEL RELACIONADOS ===== -->
    <section class="container-fluid mt-5 mb-5">
        <div class="section-header-border pb-2 mb-2 ms-3">
            <h2 class="section-header-title text-uppercase fw-bold">Más videos</h2>
        </div>
        <?php include get_template_directory() . '/assets/modulos/modulo-video/loop-mp-carrusel-single.php'; ?>
    </section>
<section class="container py-4">
    <div class="row g-4">   <!-- ← AQUÍ ESTÁ EL CAMBIO -->

        <!-- Columna principal: título, géneros, metadatos, excerpt -->
        <div class="col-md-8 d-flex flex-column border border-secondary rounded-3 p-3">
            <h2 class="h3 fw-bold mb-2"><?php echo get_the_title(); ?></h2>

            <div class="mb-2">
                <?php if (!empty($generos) && !is_wp_error($generos)): ?>
                    <div class="d-flex flex-wrap gap-1">
                        <?php foreach ($generos as $g): ?>
                            <a href="<?php echo esc_url(get_term_link($g)); ?>" class="bd-tag me-2">
                                <?php echo esc_html($g->name); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="bd-single-meta d-flex flex-wrap gap-3 small text-secondary mb-2">
                <span><i class="bi bi-clock"></i> <?php echo esc_html($duracion); ?></span>
                <span><i class="bi bi-calendar"></i> <?php echo esc_html($anio); ?></span>
            </div>

            <p class="mb-0"><?php echo get_the_excerpt(); ?></p>
        </div>

        <!-- Columna derecha: integrantes -->
        <div class="col-md-4 d-flex flex-column border border-secondary rounded-3 p-3">
            <strong class="text-uppercase small fw-bold mb-2" style="color:var(--breakdown-text); letter-spacing:1px;">
                Integrantes
            </strong>
            <ul class="bd-cast-list list-unstyled mb-0">
                <?php if ($integrantes && is_array($integrantes)): ?>
                    <?php foreach ($integrantes as $integrante): ?>
                        <li><?php echo esc_html($integrante); ?></li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li><strong>Vocalista</strong> (placeholder)</li>
                    <li><strong>Guitarrista</strong> (placeholder)</li>
                    <li><strong>Bajista</strong> (placeholder)</li>
                    <li><strong>Baterista</strong> (placeholder)</li>
                <?php endif; ?>
            </ul>
        </div>

        <!-- Fila siguiente: descripción canción -->
        <div class="col-md-8 border border-secondary rounded-3 p-3">
            <?php echo the_content(); ?>
        </div>

        <!-- Fila siguiente: información del álbum -->
        <div class="col-md-4 border border-secondary rounded-3 p-3">
            <div class="row align-items-center g-2">
                <div class="col-4 col-md-12 col-xl-4">
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>"
                         alt="<?php echo esc_html($album); ?>"
                         class="img-fluid rounded-circle">
                </div>
                <div class="col-8 col-md-12 col-xl-8">
                    <p class="mb-0"><?php echo get_field('desc_album'); ?></p>
                </div>
            </div>
        </div>

    </div> <!-- /.row -->
</section> <!-- /.container -->
</article>