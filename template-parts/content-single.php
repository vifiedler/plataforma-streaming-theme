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

    <?php
    // video hero, sacado de acf
    $iframe = get_field('url_video');

    if (!empty($iframe)):

        preg_match('/src="(.+?)"/', $iframe, $matches);
        $src = $matches[1];

        $params = array(
            'controls' => 0,
            'hd' => 1,
            'autohide' => 1
        );
        $new_src = add_query_arg($params, $src);
        $iframe = str_replace($src, $new_src, $iframe);

        $attributes = 'frameborder="0"';
        $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
        ?>
        <div class="video-hero">
            <?php echo $iframe; ?>
        </div>
    <?php endif; ?>
    <div class="px-3 px-md-0 container">
        <div class="row">
            <div class="col-12">
                <h1 class="single-title">Canción: <?php echo get_the_title(); ?></h1>
                <h2>Artista:
                    <?php echo get_field('nombre_artista'); ?>
                </h2>
                <p class="duracion-single mb-3"><i class="bi bi-clock"></i> <?php echo get_field('duracion'); ?>
                </p>
                <!-- Descripción corta -->
                <div class="single-dek">
                    <?php echo get_the_excerpt(); ?>
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
        <div class="mt-4 pt-3 border-top links-single">
            <?php nota3_template_entry_footer(); ?>
        </div>
    </div>
    </div>

</article>