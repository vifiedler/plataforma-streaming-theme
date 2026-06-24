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
	<section class="container-fluid"><h2 class="ms-3"><?php echo esc_html($current_term->name);?></h2>
<?php include get_template_directory() . '/assets/modulos/modulo-video/loop-mp-carrusel-single.php'; ?></section>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();