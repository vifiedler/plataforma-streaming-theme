<?php
/**
 * Template Name: Home Nota 3
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nota3-template
 */

get_header();
?>

<main class="mt-5">
<!-- Sección Destacados -->
    <div class="container">
        <div class="row mb-5">
            <section class="col-12 section-header-border pb-2">
                <h2 class="section-header-title text-uppercase fw-bold mb-0">Destacados</h2>
                <?php include get_template_directory() . '/assets/modulos/modulo-post/loop-mp-destacados.php'; ?>
            </section>
        </div>
    </div>
	<!-- Sección Metalcore -->
    <section class="mb-5">
        <div class="container mb-3">
            <div class="row">
                <div class="col-12 section-header-border pb-2">
                    <h3 class="section-header-title text-uppercase fw-bold mb-0">Metalcore</h3>
					<?php include get_template_directory() . '/assets/modulos/modulo-post/loop-mp-metalcore.php'; ?>
                </div>
            </div>
        </div>
    </section>
	<!-- Sección Deathcore -->
    <section class="mb-5">
        <div class="container mb-3">
            <div class="row">
                <div class="col-12 section-header-border pb-2">
                    <h3 class="section-header-title text-uppercase fw-bold mb-0">Deathore</h3>
					<?php include get_template_directory() . '/assets/modulos/modulo-post/loop-mp-deathcore.php'; ?>
                </div>
            </div>
        </div>
    </section>
	<!-- Sección Thrash -->
    <section class="mb-5">
        <div class="container mb-3">
            <div class="row">
                <div class="col-12 section-header-border pb-2">
                    <h3 class="section-header-title text-uppercase fw-bold mb-0">Thrash</h3>
					<?php include get_template_directory() . '/assets/modulos/modulo-post/loop-mp-thrash.php'; ?>
                </div>
            </div>
        </div>
    </section>
	<!-- Sección Heavy -->
    <section class="mb-5">
        <div class="container mb-3">
            <div class="row">
                <div class="col-12 section-header-border pb-2">
                    <h3 class="section-header-title text-uppercase fw-bold mb-0">Heavy</h3>
					<?php include get_template_directory() . '/assets/modulos/modulo-post/loop-mp-heavy.php'; ?>
                </div>
            </div>
        </div>
    </section>

</main>
<?php
get_sidebar();
get_footer();