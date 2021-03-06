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

// FILTRE
$ville_array = get_field_object('ville')['choices'];
$values = isset($_GET['villes']) ? (array) $_GET['villes'] : [];
?>

<main class="container">

    <?php the_archive_title('<h1 class="page-title text-center pt-5">', '</h1>') ?>

    <aside class="aside-filter mb-5 p-3">
        <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="get" class="archive-filter-form form-inline">
            <h3 class="mb-lg-0 mr-4"><?php _e('Filtrer par ville(s) : ', 'scratch'); ?></h3>
            <?php foreach($ville_array as $key => $ville) : ?>
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="villes[]" value="<?= $key ?>" id="villes-<?= $key ?>" <?php if(in_array($key, $values)): ?>checked<?php endif; ?> class="spot-filters-field form-check-input">
                    <label for="villes-<?= $key ?>" class="form-check-label"><?= $ville ?></label>
                </div>
            <?php endforeach; ?>
            <button class="btn btn-outline-primary ml-auto" type="submit">Filtrer</button>
        </form>
    </aside>

    <?php //print_r($champ_ville); ?>
    <div class="row">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <?php
            get_template_part('template-parts/content', 'propriete');
            ?>

        <?php endwhile; ?>
        <?php else : ?>

            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
        <!-- PAGINATION-->
    </div>
    <div class="d-flex justify-content-center my-4">
        <?php the_posts_pagination(); ?>
    </div>
</main>

<?php get_footer() ?>

