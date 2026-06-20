<?php
/**
 * Template part for displaying posts in archive / author pages
 *
 * @package nota2-template
 */

while (have_posts()):
    the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-12 mb-0'); ?>>
    <div class="archive-row-item row g-0 py-4 article-divider">

        <?php if (has_post_thumbnail()): ?>
        <div class="col-5 col-sm-4 pe-4">
            <a href="<?php the_permalink(); ?>" class="d-block foto-card-container">
                <img class="foto-card" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium_large'); ?>"
                    alt="<?php echo esc_attr(get_the_title()); ?>">
            </a>
        </div>
        <div class="col-7 col-sm-8">
            <?php else: ?>
            <div class="col-12">
                <?php endif; ?>

                <div class="archive-card-kicker mb-1">
                    <?php echo esc_html(nota3_template_entry_footer()) . '&nbsp;&nbsp;·&nbsp;&nbsp;';
                    nota2_template_posted_on();
                    ?>
                </div>

                <h2 class="archive-card-title mb-2">
                    <a href="<?php the_permalink(); ?>" class="text-decoration-none text-reset">
                        <?php the_title(); ?>
                    </a>
                </h2>

                <p class="archive-card-excerpt mb-2 d-none d-md-block">
                    <?php echo get_the_excerpt(); ?>
                </p>

                <div class="meta-text text-muted">
                    <?php nota2_template_posted_by(); ?>
                </div>

            </div>
        </div>
</article>

<?php endwhile; ?>

<div class="mt-4"><?php the_posts_navigation(); ?></div>