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
$album = get_field('album');

// Obtener el iframe del campo oembed
$iframe_html = get_field('url_video');
$iframe_final = '';
if ($iframe_html) {
    // Extraer la url src del iframe
    preg_match('/src="([^"]+)"/', $iframe_html, $matches);
    if (isset($matches[1])) {
        $src = $matches[1];
        // parámetros extra
        $params = array(
            'controls' => 0,
            'rel' => 0,
            'iv_load_policy' => 3,
            'enablejsapi' => 1,
            // 'autoplay'    => 1,
        );
        $new_src = add_query_arg($params, $src);
        $iframe_final = str_replace($src, $new_src, $iframe_html);
        // Añadir atributos adicionales
        $attributes = 'frameborder="0" allowfullscreen';
        $iframe_final = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe_final);
    } else {
        // Si no se pudo extraer la url, mostrar el html original
        $iframe_final = $iframe_html;
    }
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!-- hero superpuesto con video de fondo -->
    <div id="bd-single-hero" class="bd-single-hero">
        <!-- Imagen de fondo -->
        <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"
            class="bd-single-hero__img">
        <!-- Video (inicialmente oculto) -->
        <div id="bd-single-video" class="bd-single-video-container" style="display:none;">
            <div class="embed-container" id="video-container">
                <?php echo $iframe_final; ?>
            </div>
        </div>
        <!-- Overlay con contenido -->
        <div class="bd-single-hero__overlay" id="bd-overlay">
            <div class="row bd-single-hero__body">
                <!-- Columna izquierda: botón de reproducción -->
                <div class="col-md-2">
                    <button id="bd-play-btn" class="tm-hero-btn">
                        <i class="bi bi-play-fill"></i> Reproducir
                    </button>
                    <button id="bd-pause-btn" class="tm-hero-btn" style="display:none;">
                        <i class="bi bi-pause-fill"></i> Pausa
                    </button>
                </div>
                <!-- Columna central: información -->
                <div class="col-md-7">
                    <h1 class="tm-hero-title d-none"><?php the_title(); ?></h1>
                    <div class="tm-hero-excerpt col-12"><?php the_excerpt(); ?></div>
                    <div class="row">
                        <div class="col-md-6">
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
                        <div class="col-md-6">
                            <div class="bd-single-meta">
                                <span><i class="bi bi-clock"></i> <?php echo esc_html($duracion); ?></span>
                                <span><i class="bi bi-calendar"></i> <?php echo esc_html($anio); ?></span>
                                <span><i class="bi bi-disc"></i> <?php echo esc_html($album); ?></span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-3 mt-2">
                    <strong
                        style="color:var(--breakdown-text); font-size:0.8rem; text-transform:uppercase; letter-spacing:1px;">Integrantes</strong>
                    <ul class="bd-cast-list">
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
            </div>
        </div>

    </div>

    <!-- carrusel relacionados -->
    <section class="container-fluid mt-5 mb-5">
        <div class="section-header-border pb-2 mb-2 ms-3">
            <h2 class="section-header-title text-uppercase fw-bold">Más videos</h2>
        </div>
        <?php include get_template_directory() . '/assets/modulos/modulo-video/loop-mp-carrusel-single.php'; ?>
    </section>

    <!-- Info detallada -->
    <section class="container-fluid px-4">
        <div class="row mx-0 gap-3 justify-content-around">
            <!-- Columna principal -->
            <div class="col-md-7 d-flex flex-column border border-secondary rounded-3 p-3">
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
            <!-- Columna integrantes -->
            <div class="col-md-4 d-flex flex-column border border-secondary rounded-3 p-3">
                <strong class="text-uppercase small fw-bold mb-2"
                    style="color:var(--breakdown-text); letter-spacing:1px;">
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
            <!-- Descripción canción -->
            <div class="col-md-7 border border-secondary rounded-3 p-3">
                <?php echo get_field('descripcion'); ?>
            </div>
            <!-- Álbum -->
            <div class="col-md-4 border border-secondary rounded-3 p-3">
                <div class="row align-items-center g-2">
                    <div class="col-md-4">
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>"
                            alt="<?php echo esc_html($album); ?>" class="img-fluid rounded-circle">
                    </div>
                    <div class="col-md-8">
                        <p class="mb-0"><?php echo get_field('desc_album'); ?></p>
                    </div>
                </div>
            </div>

        </div>
    </section>
</article>