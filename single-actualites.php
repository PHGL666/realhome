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
                <a href="<?php the_permalink(); ?>">
                    <h4 class="actualite-title"><?php the_title() ?></h4>
                </a>
                <?= $champ_date['value'] ?><?= $champ_date['date'] ?>
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
            <?php get_sidebar('lastactualites-aside') ?>
        </div>
    </div>
</div>


<?php get_footer() ?>

