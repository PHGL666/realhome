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

$champ_prix = get_field_object('prix');
$champ_ville = get_field_object('ville');
$champ_surface = get_field_object('surface');
$champ_infos = get_field_object('infos');
$champ_nbr = get_field_object('nbre_de_pieces');
?>

<main class="py-5 container">

    <?php the_archive_title('<h1 class="page-title">', '</h1>') ?>

    <div class="row">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <?php
            get_template_part('template-parts/content', 'propriete');
            ?>

        <?php endwhile; ?>
        <!-- PAGNIATION +SCSS MAIS NE FONCTIONNE PAS-->
            <?php the_posts_pagination(); ?>
        <?php else : ?>
            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer() ?>

