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

    <div class="single-img-container mb-3">
        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php echo get_the_title(); ?>">
    </div>

    <div class="px-3 px-md-0">

        <h1 class="single-title"><?php echo get_the_title(); ?></h1>

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