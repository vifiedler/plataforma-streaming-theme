<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nota3-template
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mb-5'); ?>>
    <div class="embed-container mb-3">
        <?php the_field('url_video'); ?>
    </div>
    <div class="px-3 px-md-0 container-fluid mb-3">
        <div class="col-12">
            <div class="mx-5">
                <h1 class="single-title">Canción: <?php echo get_the_title(); ?></h1>
                <h2>Artista:
                    <?php echo get_field('nombre_artista'); ?>
                </h2> <!-- Descripción corta -->
                <div class="single-dek my-3">
                    <?php echo get_the_excerpt(); ?>
                </div>
                <p class="duracion-single">Duración: <i class="bi bi-clock"></i>
                    <?php echo get_field('duracion'); ?>
                </p>
            </div>
        </div>
    </div>
</article>