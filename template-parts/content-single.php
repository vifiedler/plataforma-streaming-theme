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
    // ===== Video como hero (arriba de todo) =====
    $iframe = get_field('url_video');

    if (!empty($iframe)):

        preg_match('/src="(.+?)"/', $iframe, $matches);
        $src = $matches[1];

        $params = array(
            'controls' => 0,
            'hd'       => 1,
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

    <div class="px-3 px-md-0">

        <h1 class="single-title"><?php echo get_the_title(); ?></h1>

        <!-- Géneros -->
        <?php
        $generos = get_the_terms(get_the_ID(), 'genero_videos');
        if (!empty($generos) && !is_wp_error($generos)):
        ?>
        <div class="mb-2">
            <?php foreach ($generos as $genero): ?>
                <span class="badge-genero"><?php echo esc_html($genero->name); ?></span>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <!-- Artista y duración -->
        <p class="duracion-single mb-3">
            <?php
            $artista  = get_field('nombre_artista');
            $duracion = get_field('duracion');
            ?>
            <?php if (!empty($artista)): ?>
                <i class="bi bi-person-fill"></i> <?php echo esc_html($artista); ?>
            <?php endif; ?>
            <?php if (!empty($duracion)): ?>
                &middot; <i class="bi bi-clock"></i> <?php echo esc_html($duracion); ?>
            <?php endif; ?>
        </p>

        <!-- Descripción corta -->
        <div class="single-dek">
            <?php echo get_the_excerpt(); ?>
        </div>

        <div class="single-byline">
            <?php
            $autor_id = get_the_author_meta('ID');
            $avatar_url = get_avatar_url($autor_id, ['size' => 80]);
            if ($avatar_url):
                ?>
            <img src="<?php echo $avatar_url; ?>" alt="<?php echo get_the_author(); ?>">
            <?php endif; ?>
            <div>
                <div class="single-byline-name">
                    <a href="<?php echo esc_url(get_author_posts_url($autor_id)); ?>">
                        <?php nota3_template_posted_by(); ?>
                    </a>
                </div>
                <div class="single-byline-meta">
                    <?php nota3_template_posted_on(); ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="entry-content col-md-8">
                <?php the_content(); ?>
            </div>
        </div>

        <div class="mt-4 pt-3 border-top links-single">
            <?php nota3_template_entry_footer(); ?>
        </div>

    </div>

</article>