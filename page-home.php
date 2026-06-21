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
    <div class="row mb-5">
        <section class="col-12 section-header-border pb-2">
            <h2 class="section-header-title text-uppercase fw-bold mb-0">Destacados</h2>
            <?php include get_template_directory() . '/assets/modulos/modulo-video/loop-mp-destacados.php'; ?>
        </section>
    </div>
    <!-- Sección Nu Metal -->
    <section class="mb-5">
        <div class="container mb-3">
            <div class="col-12 section-header-border pb-2">
                <h3 class="section-header-title text-uppercase fw-bold mb-0">Nu Metal</h3><a
                    href="<?php echo esc_url(get_term_link('metalcore', 'genero_videos')); ?>" class="ver-mas">Ver más</a>
                <?php include get_template_directory() . '/assets/modulos/modulo-video/loop-mp-nu-metal.php'; ?>
            </div>
        </div>
    </section>
    <!-- Sección Metalcore -->
    <section class="mb-5">
        <div class="container mb-3">
            <div class="col-12 section-header-border pb-2">
                <h3 class="section-header-title text-uppercase fw-bold mb-0">Metalcore</h3><a
                    href="<?php echo esc_url(get_term_link('metalcore', 'genero_videos')); ?>" class="ver-mas">Ver más</a>
                <?php include get_template_directory() . '/assets/modulos/modulo-video/loop-mp-metalcore.php'; ?>
            </div>
        </div>
    </section>
    <!-- Sección Deathcore -->
    <section class="mb-5">
        <div class="container mb-3">
            <div class="col-12 section-header-border pb-2">
                <h3 class="section-header-title text-uppercase fw-bold mb-0">Deathore</h3><a
                    href="<?php echo esc_url(get_term_link('metalcore', 'genero_videos')); ?>" class="ver-mas">Ver más</a>
                <?php include get_template_directory() . '/assets/modulos/modulo-video/loop-mp-deathcore.php'; ?>
            </div>
        </div>
    </section>
    <!-- Sección Pop-punk -->
    <section class="mb-5">
        <div class="container mb-3">
            <div class="col-12 section-header-border pb-2">
                <h3 class="section-header-title text-uppercase fw-bold mb-0">Pop-Punk</h3><a
                    href="<?php echo esc_url(get_term_link('metalcore', 'genero_videos')); ?>" class="ver-mas">Ver más</a>
                <?php include get_template_directory() . '/assets/modulos/modulo-video/loop-mp-pop-punk.php'; ?>
            </div>
        </div>
    </section>
    <!-- Sección Easycore -->
    <section class="mb-5">
        <div class="container mb-3">
            <div class="col-12 section-header-border pb-2">
                <h3 class="section-header-title text-uppercase fw-bold mb-0">Easycore</h3><a
                    href="<?php echo esc_url(get_term_link('metalcore', 'genero_videos')); ?>" class="ver-mas">Ver más</a>
                <?php include get_template_directory() . '/assets/modulos/modulo-video/loop-mp-easycore.php'; ?>
            </div>
        </div>
    </section>
    <!-- Sección Hardcore -->
    <section class="mb-5">
        <div class="container mb-3">
            <div class="col-12 section-header-border pb-2">
                <h3 class="section-header-title text-uppercase fw-bold mb-0">Hardcore</h3><a
                    href="<?php echo esc_url(get_term_link('metalcore', 'genero_videos')); ?>" class="ver-mas">Ver más</a>
                <?php include get_template_directory() . '/assets/modulos/modulo-video/loop-mp-hardcore.php'; ?>
            </div>
        </div>
    </section>
</main>
<?php
get_sidebar();
get_footer();