<?php
/**
 * The main template file
 *
 * ...
 *
 * @package scratch
 *
 */
$lastproprietes = get_posts(array(
    'numberposts' => 6,
    'post_type' => 'proprietes',
    'orderby' => 'rand'
));

get_header();
?>
    <main>
        <div>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article <?php post_class(); ?>>
                    <div class="py-5">
                        <?php the_content() ?>
                    </div>
                </article>
            <?php endwhile; ?>
            <?php else : ?>
                <p><?php _e('Sorry, no posts matched your criteria.', 'scratch'); ?></p>
            <?php endif; ?>
        </div>

        <div class="container">
                <article class="row">
            <?php if ($lastproprietes) : ?>

                    <?php foreach ($lastproprietes as $post) :
                        setup_postdata($post);
                        get_template_part('template-parts/content', 'propriete');
                    endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                </article>
            <?php endif; ?>

        </div>
        <div class="text-center">
            <a href="<?= esc_url(home_url('/')) ?>/proprietes/"
               class="btn btn-outline-success my-5"><?php _e('Toutes les propriétés', 'scratch'); ?></a>
        </div>
    </main>

<?php //get_sidebar('lastposts') ?>
<?php get_footer(); ?>