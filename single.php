<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package nota3-template
 */
$current_term=get_queried_object();
get_header();
?>

<main id="primary" class="site-main">

    <?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content-single', get_post_type() );?>

    <?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
    <section class="container-fluid">
        <h2 class="ms-3"><?php echo esc_html($current_term->name);?></h2>
        <?php include get_template_directory() . '/assets/modulos/modulo-video/loop-mp-carrusel-single.php'; ?>
    </section>
    <div class="container-fluid my-3 p-5">
        <div class="row mb-5">
            <!--imagen artista-->
            <div class="col-md-7">
                <h2><?php echo get_the_title(); ?></h2>
                <p><?php echo get_the_excerpt(); ?></p>
            </div><!-- Descripción del video -->
            <div class="col-md-5">
                <p><?php echo get_field('descripcion'); ?></p>
            </div>
        </div> <!-- Géneros -->
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
        <div class="mt-4 pt-3 links-single">
            <?php nota3_template_entry_footer(); ?>
        </div>
    </div>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();