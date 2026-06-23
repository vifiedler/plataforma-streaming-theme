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
                <h2>Artista: <?php echo get_field('nombre_artista'); ?></h2>
                <p class="duracion-single mb-3">
                    Duración: <i class="bi bi-clock"></i> <?php echo get_field('duracion'); ?>
                </p>
                <div class="single-dek">
                    <?php echo get_the_excerpt(); ?>
                </div>
                <p><?php echo get_field('descripcion'); ?></p>
                <?php
                $generos = get_the_terms(get_the_ID(), 'genero_videos');
                if (!empty($generos) && !is_wp_error($generos)):
                ?>
                <div class="mb-2">
                    <?php foreach ($generos as $genero): ?>
                        <a href="<?php echo esc_url(get_term_link($genero)); ?>" class="badge-genero">
                            <?php echo esc_html($genero->name); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</article>

<!-- Videos relacionados -->
<?php
if (!empty($generos) && !is_wp_error($generos)):
    $slugs = wp_list_pluck($generos, 'slug');
    $relacionados = new WP_Query(array(
        'post_type'      => 'videos',
        'posts_per_page' => -1,
        'post__not_in'   => array(get_the_ID()),
        'orderby'        => 'rand',
        'tax_query'      => array(
            array(
                'taxonomy' => 'genero_videos',
                'field'    => 'slug',
                'terms'    => $slugs,
                'operator' => 'IN',
            ),
        ),
    ));
    if ($relacionados->have_posts()):
?>
<section class="container mt-5">
    <div class="col-12 section-header-border pb-2 mb-0">
        <h3 class="section-header-title text-uppercase fw-bold mb-0">Más videos</h3>
    </div>
    <div class="bd-carousel-wrap">
        <button class="bd-carousel-btn bd-carousel-prev">
            <i class="bi bi-chevron-left"></i>
        </button>
        <div class="bd-carousel-track">
            <?php while ($relacionados->have_posts()): $relacionados->the_post(); ?>
            <div class="bd-carousel-card">
                <a href="<?php the_permalink(); ?>" class="d-block text-decoration-none">
                    <div class="bd-carousel-thumb-wrap">
                        <img src="<?php echo esc_url(get_field('imagen_video')['url']); ?>"
                            alt="<?php echo esc_attr(get_the_title()); ?>"
                            class="bd-carousel-thumb">
                        <span class="bd-carousel-duration">
                            <?php echo esc_html(get_field('duracion')); ?>
                        </span>
                    </div>
                </a>
                <div class="bd-carousel-card-body">
                    <h5 class="bd-carousel-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h5>
                    <p class="bd-carousel-artist">
                        <?php echo esc_html(get_field('nombre_artista')); ?>
                    </p>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
        <button class="bd-carousel-btn bd-carousel-next">
            <i class="bi bi-chevron-right"></i>
        </button>
    </div>
</section>
<?php endif; endif; ?>