<?php
/**
 * The template file for archive
 *
 * ...
 *
 * @package scratch
 *
 */

get_header();

$champ_date = get_field_object('date');
$champ_texte = get_field_object('texte');
?>

<main class="container">

    <?php the_archive_title('<h1 class="page-title text-center pt-5">', '</h1>') ?>

    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12">

            <?php if (have_posts()) : while (have_posts()) :
                the_post(); ?>

                <?php get_template_part('template-parts/content', 'actualite'); ?>

                <a class="btn btn-outline-danger"
                   href="<?php the_permalink(); ?>"><?php _e('Lire la suite', 'scratch') ?></a>
                <hr>
            <?php endwhile; ?>
            <?php else : ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 pl-5 pt-5 text-left">
            <?php dynamic_sidebar('aside-single-actualite'); ?>
        </div>
    </div>
    <div class="d-flex justify-content-center my-4">

        <?php the_posts_pagination(); ?>
    </div>
</main>

<?php get_footer() ?>
