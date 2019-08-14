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
$champ_corps = get_field_object('corps');
?>

<main class="container">

    <?php the_archive_title('<h1 class="page-title">', '</h1>') ?>

    <div class="row">
        <div class="col-lg-9">

            <?php if (have_posts()) : while (have_posts()) :
            the_post(); ?>

            <?php
            get_template_part('template-parts/content', 'actualite');
            ?>

        <?php endwhile; ?>
        <?php else : ?>
            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
        </div>
        <div class="col-lg-3">
            sidebar
        </div>
    </div>




</main>

<?php get_footer() ?>
