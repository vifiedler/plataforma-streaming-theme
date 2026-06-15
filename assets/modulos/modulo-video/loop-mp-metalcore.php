<!-- Custom loop metalcore -->
<?php
$temp = $wp_query;
$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'category',
            'field' => 'slug',
            'operator' => 'IN',
            'terms' => 'metalcore',
        ),
    ),
);
$wp_query = new WP_Query($args);
if ($wp_query->have_posts()):
    while ($wp_query->have_posts()):
        $wp_query->the_post(); ?>

        <div class="col-md-3 border-loop-abajo">
            <article class="py-3">
                <a href="<?php echo get_the_permalink(); ?>" class="uap2-img-wrap">
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium_large'); ?>"
                        alt="<?php echo esc_attr(get_the_title()); ?>" class="uap2-img">
                </a>
                <div class="archive-card-kicker mb-1">
                    <?php nota2_template_posted_on();?>
                </div>
                <a href="<?php echo get_the_permalink(); ?>" class="text-decoration-none">
                    <h3 class="lg__title-small mb-2 mt-0"><?php the_title(); ?></h3>
                </a>
                <div class="tease-dek-small mb-3">
                    <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                </div>
                <div class="meta-text text-muted">
                    <?php nota2_template_posted_by(); ?>
                </div>
            </article>
        </div>
    <?php endwhile;
endif;
wp_reset_query();
$wp_query = $temp; ?>