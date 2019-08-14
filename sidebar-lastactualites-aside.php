<?php
/**
 * The last posts sidebar displayed before the footer.
 *
 * @package scratch
 */

$lastspots = get_posts(array(
    'numberposts' => 3,
    'post_type' => 'actualites',
    'orderby' => 'rand',
    'exclude' => get_the_ID()
));
?>

<section class="sidebar-lastspots">
    <div class="container">

        <div class="sidebar-header d-flex justify-content-between align-items-start mb-4">
            <h2 class="sidebar-title"><?php _e('Dernières publications', 'scratch'); ?></h2>
        </div>

        <?php if ($lastspots) : ?>
            <div class="spots-grid">

                <?php foreach ($lastspots as $post) :
                    setup_postdata($post);

                    get_template_part('template-parts/content', 'actualite');

                endforeach;
                wp_reset_postdata(); ?>
            </div>
        <?php endif; ?>
    </div>
</section>