<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nota3-template
 */
$current_term = get_queried_object();
get_header();
?>

<main id="primary" class="site-main">

    <?php if (have_posts()): ?>
    <!-- Slider categoria -->
    <div class="row mb-5">
		
        <section class="col-12 section-header-border pb-2">
            <?php include get_template_directory() . '/assets/modulos/modulo-video/loop-mp-archive.php'; ?>
        </section>
    </div>
    <section class="container-fluid"><h2 class="ms-3"><?php echo esc_html( $current_term->name );?></h2>
        <?php include get_template_directory() . '/assets/modulos/modulo-video/loop-mp-carrusel-archive.php'; ?>
	</section>
    <section class="container-fluid"><h2 class="ms-3">Relacionados</h2>
        <?php include get_template_directory() . '/assets/modulos/modulo-video/loop-mp-carrusel-archive-relacionados.php'; ?>
	</section>
    <!--<div class="row g-4 container-fluid page-header">

        <?php
			/* Start the Loop */
			while (have_posts()):
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part('template-parts/content-videos', get_post_type());

			endwhile; ?> <?php
				 the_posts_navigation();

	else:

		get_template_part('template-parts/content', 'none');

	endif;
	?>
    </div>

</main>-->
    <!-- #main -->

    <?php
get_sidebar();
get_footer();