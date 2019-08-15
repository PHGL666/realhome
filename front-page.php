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

    <!--
<?php //print_r($niveau); ?>
-->

    <main>
        <div>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article <?php post_class(); ?>>

                    <div class="front-img-bg img-fluid">

                    </div>

                    <div class="pt-5">
                        <?php
                        get_template_part('template-parts/content', 'front');
                        ?>
                        <?php
                        get_template_part('template-parts/content', 'barre-grise');
                        ?>
                    </div>
                </article>
            <?php endwhile; ?>
            <?php else : ?>
                <p><?php _e('Sorry, no posts matched your criteria.', 'scratch'); ?></p>
            <?php endif; ?>
        </div>

        <div class="container">
            <?php the_archive_title('<h2 class="page-title text-center">', '</h2>') ?>

            <div class="row d-flex flex-column">
                <div class="div-rouge col-md-2 offset-md-5 my-2">
                </div>
                <div class="text-center col-md-6 offset-md-3 mb-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor natus nihil perspiciatis repudiandae
                    sit suscipit unde! Aliquid consequuntur eum explicabo.
                </div>
            </div>

            <div class="row">
                <?php if ($lastproprietes) : ?>
                <?php foreach ($lastproprietes as $post) :
                    setup_postdata($post);
                    get_template_part('template-parts/content', 'propriete');
                endforeach; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        <?php endif; ?>

            <div class="text-center">
                <a href="<?= esc_url(home_url('/')) ?>/proprietes/"
                   class="btn btn-outline-danger my-5"><?php _e('Toutes les propriétés', 'scratch'); ?></a>
            </div>
    </main>


<?php //get_sidebar('lastposts') ?>
<?php get_footer(); ?>