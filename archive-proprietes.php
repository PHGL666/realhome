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
$niveau_array = get_field_object('niveau')['choices'];
$values = isset($_GET['niveau']) ? (array) $_GET['niveau'] : [];
?>

<main class="container">

    <?php the_archive_title('<h1 class="page-title text-center pt-5">', '</h1>') ?>

    <div class="row">

        <aside class="aside-filter bg-light mb-5 p-3">
            <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="get" class="archive-filter-form form-inline">
                <h3 class="mb-lg-0 mr-4"><?php _e('Filtrer par niveau : ', 'scratch'); ?></h3>
                <?php foreach($niveau_array as $key => $niveau) : ?>
                    <div class="form-check form-check-inline">
                        <input type="checkbox" name="niveau[]" value="<?= $key ?>" id="niveau-<?= $key ?>" <?php if(in_array($key, $values)): ?>checked<?php endif; ?> class="spot-filters-field form-check-input">
                        <label for="niveau-<?= $key ?>" class="form-check-label"><?= $niveau ?></label>
                    </div>
                <?php endforeach; ?>
                <button class="btn btn-outline-primary ml-auto" type="submit">Filtrer</button>
            </form>
        </aside>

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

