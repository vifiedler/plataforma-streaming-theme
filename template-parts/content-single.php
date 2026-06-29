<?php
/**
 * Template part for displaying single videos (Prime Video style)
 *
 * @package nota3-template
 */
$imagen = get_field('imagen_video');
$generos = get_the_terms(get_the_ID(), 'genero_videos');
$artista = get_field('nombre_artista');
$duracion = get_field('duracion');
$anio = get_field('anio_lanzamiento'); // Campo ACF que debes crear
$integrantes = get_field('integrantes_banda'); // Campo ACF (texto o repeater)
$album = get_field('album'); // Campo ACF que debes crear
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <!-- ===== HERO con video superpuesto ===== -->
    <div id="bd-single-hero" class="bd-single-hero">

        <!-- Imagen de fondo -->
        <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"
            class="bd-single-hero__img">

        <!-- Video (inicialmente oculto) -->
        <div id="bd-single-video" class="bd-single-video-container">
            <div class="embed-container" id="video-container">
                <?php the_field('url_video'); ?>
            </div>
        </div>

        <!-- Overlay con contenido -->
        <div class="bd-single-hero__overlay" id="bd-overlay">
            <div class="row bd-single-hero__body">

                <!-- Columna izquierda: botón de reproducción -->
                <div class="col-md-3">
                    <button id="bd-play-btn" class="tm-hero-btn">
                        <i class="bi bi-play-fill"></i> Reproducir
                    </button>
                    <button id="bd-pause-btn" class="tm-hero-btn" style="display:none;">
                        <i class="bi bi-pause-fill"></i> Pausa
                    </button>
                </div>

                <!-- Columna central: información -->
                <div class="col-md-6">
                    <h1 class="tm-hero-title d-none"><?php the_title(); ?></h1>
                    <div class="row">
                        <div class="tm-hero-excerpt col-12">
                            <?php the_excerpt(); ?>
                        </div>
                        <div class="row">
                            <!-- Géneros -->
                            <div class="col-md-6">
                                <?php if (!empty($generos) && !is_wp_error($generos)): ?>
                                    <div class="">
                                        <?php foreach ($generos as $g): ?>
                                            <a href="<?php echo esc_url(get_term_link($g)); ?>" class="bd-tag me-2">
                                                <?php echo esc_html($g->name); ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <!-- Duración + Año -->
                            <div class="col-md-6">
                                <div class="bd-single-meta">
                                    <span><i class="bi bi-clock"></i> <?php echo esc_html($duracion); ?></span>
                                    <span><i class="bi bi-calendar"></i> <?php echo esc_html($anio); ?></span>
                                    <span><i class="bi bi-disc"></i> <?php echo esc_html($album); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Columna derecha: Reparto / Integrantes -->
                <div class="col-md-3">
                    <strong
                        style="color:var(--breakdown-text); font-size:0.8rem; text-transform:uppercase; letter-spacing:1px;">Integrantes</strong>
                    <ul class="bd-cast-list">
                        <?php if ($integrantes && is_array($integrantes)): ?>
                            <?php foreach ($integrantes as $integrante): ?>
                                <li><?php echo esc_html($integrante); ?></li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <!-- Placeholders mientras no tengas el campo -->
                            <li><strong>Vocalista</strong> (placeholder)</li>
                            <li><strong>Guitarrista</strong> (placeholder)</li>
                            <li><strong>Bajista</strong> (placeholder)</li>
                            <li><strong>Baterista</strong> (placeholder)</li>
                        <?php endif; ?>
                    </ul>
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
    <section class="row">
        <!-- Info detallada -->
        <div class="col-md-8 d-flex flex-column">
            <h2 class="col-md-6"><?php echo get_the_title(); ?></h2>
            <div class="col-md-6">
                <?php if (!empty($generos) && !is_wp_error($generos)): ?>
                    <div class="">
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
                    <span><i class="bi bi-clock"></i>
                        <?php echo esc_html($duracion); ?>
                    </span>
                    <span><i class="bi bi-calendar"></i>
                        <?php echo esc_html($anio); ?>
                    </span>
                </div>
            </div>
            <p><?php echo get_the_excerpt(); ?></p>
        </div>
        <!-- info banda -->
        <div class="col-md-4 d-flex flex-column">
            <strong
                style="color:var(--breakdown-text); font-size:0.8rem; text-transform:uppercase; letter-spacing:1px;">Integrantes</strong>
            <ul class="bd-cast-list">
                <?php if ($integrantes && is_array($integrantes)): ?>
                    <?php foreach ($integrantes as $integrante): ?>
                        <li>
                            <?php echo esc_html($integrante); ?>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <!-- Placeholders mientras no tengas el campo -->
                    <li><strong>Vocalista</strong> (placeholder)</li>
                    <li><strong>Guitarrista</strong> (placeholder)</li>
                    <li><strong>Bajista</strong> (placeholder)</li>
                    <li><strong>Baterista</strong> (placeholder)</li>
                <?php endif; ?>
            </ul>
        </div>
        <!-- descripción cancion -->
         <div class="col-md-6">
            <?php echo the_content();?>
         </div>
         <!-- info album -->
          <div class="col-md-4">
            <div class="row">
                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full');?>" alt="<?php echo esc_html($album); ?>">
                <p><?php echo get_field('desc_album');?></p>
            </div>
          </div>
    </section>

</article>