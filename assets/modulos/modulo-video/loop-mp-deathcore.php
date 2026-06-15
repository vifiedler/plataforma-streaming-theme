
<!-- Custom loop deathcore -->
 <?php
$temp = $wp_query;
$args = array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
    'posts_per_page' => 1,
    'tax_query'      => array(
        array(
            'taxonomy' => 'category',
            'field' => 'slug',
            'operator' => 'IN',
            'terms' => 'deaethcore'
        ),
    ),
);

$wp_query = new WP_Query($args);

if ($wp_query->have_posts()):
    while ($wp_query->have_posts()):
        $wp_query->the_post(); ?>

<article class="d-flex flex-column mb-4">

    <a href="<?php echo get_the_permalink();?>" class="mb-4">
        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php echo get_the_title(); ?>"
            class="img-fluid w-100 object-fit-cover" style="aspect-ratio: 4/3;">
    </a>

    <div>
        <div class="meta-text text-uppercase fw-bold text-muted mb-2">
            <?php nota2_template_posted_on(); ?>
        </div>

        <a href="<?php echo get_the_permalink();?>" class="text-decoration-none">
            <h2 class="lg__title fw-bold mb-3"><?php echo get_the_title(); ?></h2>
        </a>

        <div class="tease-dek mb-4">
            <?php echo get_the_excerpt(); ?>
        </div>

        <div class="meta-text text-muted d-flex align-items-center">
            <span class="ms-1"><?php nota2_template_posted_by(); ?></span>
            <span class="ms-1"><?php nota2_template_entry_footer(); ?></span>
        </div>
    </div>
</article>

<?php endwhile;
endif;
wp_reset_query();
$wp_query = $temp; ?>