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
    <div class="container-fluid my-3 px-5"><?php
			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'nota3-template' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'nota3-template' ) . '</span> <span class="nav-title">%title</span>',
				)
			);?>
    </div>
	<section class="container-fluid"><h2 class="ms-3"><?php echo esc_html($current_term->name);?></h2>
<?php include get_template_directory() . '/assets/modulos/modulo-video/loop-mp-carrusel-single.php'; ?></section>
    <?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();