<?php
/**
 * The main template file
 *
 * ...
 *
 * @package scratch
 *
 */

get_header();

$lastproprietes = get_posts(array(
    'numberposts' => 4,
    'post_type' => 'proprietes',
    'orderby' => 'rand'
));

$champ_prix = get_field_object('prix');
$champ_ville = get_field_object('ville');
$champ_surface = get_field_object('surface');
$champ_infos = get_field_object('infos');
$champ_nbr = get_field_object('nbre_de_pieces');
$champ_description = get_field_object('description');
$ville_array = get_field_object('ville')['choices'];
$values = isset($_GET['ville']) ? (array) $_GET['ville'] : [];
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


    <section class="py-5 container">
        <h2><?php the_title() ?></h2>
        <article <?php post_class('card-propriete-single-propriete'); ?>>
            <a class="card-spot_link" href="<?php the_permalink(); ?>">
                <div class="row">
                    <figure class="card-propriete-figure mb-0 col-6">
                        <?= get_the_post_thumbnail($post->ID, 'thumb-555', array('class' => 'img-fluid card-propriete_img')) ?>
                    </figure>
                    <div class="col-6">
                        <h2 class="title-price-orangered">
                            <i class="fa fa-money" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;
                            <strong><?= $champ_prix['value'] ?> <?= $champ_prix['append'] ?></strong><br>
                        </h2>
                        <hr>
                        <p><?= $champ_ville['label'] ?> : <strong><?= $champ_ville['choices'][$champ_ville['value']] ?></strong></p>
                        <p><?= $champ_surface['label'] ?>
                            <strong><?= $champ_surface['value'] ?> <?= $champ_surface['append'] ?></strong></p>
                        <p><?= $champ_nbr['label'] ?>
                            <strong><?= $champ_nbr['value'] ?> <?= $champ_nbr['append'] ?></strong></p>
                        <p><?= $champ_infos['label'] ?>
                            <strong><?= $champ_infos['value'] ?> <?= $champ_infos['append'] ?></strong></p>
                        <hr>
                        <p><?= $champ_description['value'] ?></p>
                    </div>
                    <div class="card-body justify-content-center">
                    </div>
                </div>
            </a>
        </article>
    </section>

<?php endwhile; ?>
<?php else : ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<section>

    <div class="container">
        <?php the_archive_title('<h2 class="page-title">', '</h2>'); ?>
        <div class="row">
            <?php if ($lastproprietes) : ?>
            <?php foreach ($lastproprietes as $post) :
                setup_postdata($post);
                get_template_part('template-parts/content', 'single-propriete');
            endforeach; ?>
            <?php wp_reset_postdata(); ?>
        </div>
        <?php endif; ?>

        <div class="text-center">
            <a href="<?= esc_url(home_url('/')) ?>/proprietes/"
               class="btn btn-outline-danger my-5"><?php _e('Toutes nos propriétés', 'scratch'); ?></a>
        </div>
</section>

<?php get_footer() ?>


