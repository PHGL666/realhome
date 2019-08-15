<?php
/**
 * The main template file
 *
 * ...
 *
 * @package scratch
 *
 */
$champ_date = get_field_object('date');
$champ_texte = get_field_object('texte');

get_header();
?>

<div class="container my-5">
    <div class="row">
        <div class="col-lg-9">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div>
                    <a href="<?php the_permalink(); ?>">
                        <h1 class="actualite-title"><?php the_title() ?></h1>
                    </a>
                </div>
                <div class="pb-3">
                    <?= $champ_date['value'] ?><?= $champ_date['date'] ?>
                </div>
                <figure>
                    <?= get_the_post_thumbnail($post->ID, 'thumb-900', array('class' => 'img-fluid card-propriete_img')) ?>
                </figure>
                <div class="text-justify">
                    <?= $champ_texte['value'] ?>
                </div>
            <?php endwhile; ?>
            <?php else : ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
        </div>

        <div class="col-lg-3">
            <?php //get_sidebar(dynamic_sidebar()); ?>
            <?php get_sidebar('lastactualites-aside') ?>
            <div class="text-center">
                <a href="<?= esc_url(home_url('/')) ?>/actualites/"
                   class="btn btn-outline-danger"><?php _e('Toutes les actualites', 'scratch'); ?></a>
            </div>
        </div>
    </div>
</div>


<?php get_footer() ?>

