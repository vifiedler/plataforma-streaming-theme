<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package nota3-template
 */

get_header();
?>

	<main id="primary" class="site-main">

    <?php if (have_posts()) : ?>
        <header class="page-header mt-5">
            <h1 class="page-title">
                <?php
                printf(
                    esc_html__('Resultados de búsqueda para: %s', 'nota3-template'),
                    '<span>' . get_search_query() . '</span>'
                );
                ?>
            </h1>
        </header><!-- .page-header -->

        <div class="container-fluid row g-4">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content', 'videos'); ?>
            <?php endwhile; ?>
        </div>

        <?php the_posts_navigation(); ?>

    <?php else : ?>
        <?php get_template_part('template-parts/content', 'none'); ?>
    <?php endif; ?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();