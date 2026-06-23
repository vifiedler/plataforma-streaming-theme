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
    <div class="px-3 px-md-0 container-fluid">
        <div class="container row">
            <div class="col-12">
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
                <div class="container my-5">
                    <div class="row">
                        <!--imagen artista-->
                        <div class="col-md-4">
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>"
                                alt="<?php echo get_the_title(); ?>" alt="" class="img-fluid">
                        </div><!-- Descripción del video -->
                        <div class="col-md-8">
                            <p><?php echo get_field('descripcion');?></p>
                        </div>
                    </div>
                </div>
                <!-- Géneros -->
                <?php
                $generos = get_the_terms(get_the_ID(), 'genero_videos');
                if (!empty($generos) && !is_wp_error($generos)):
                    ?>
                <div class="mb-2">
                    <?php foreach ($generos as $genero): ?>
                    <a href="<?php echo esc_url(get_term_link($genero)); ?>" class="tm-hero-btn">
                        <?php echo esc_html($genero->name); ?>
                    </a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="single-byline">

                <div class="single-byline-meta">
                    <?php nota3_template_posted_on(); ?>
                </div>
            </div>
        </div>
        <div class="mt-4 pt-3 links-single">
            <?php nota3_template_entry_footer(); ?>
        </div>
    </div>
</article>