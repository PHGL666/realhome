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
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="col-lg-4 col-md-6 col-sm-12">
        <div <?php post_class('card card-propriete-article my-2'); ?>>
            <a href="<?php the_permalink(); ?>">
                <figure class="card-img-top">
                    <?= get_the_post_thumbnail($post->ID, 'thumb-555', array('class' => 'img-fluid card-propriete_img py-1 px-1')) ?>
                </figure>
                <div class="card-body">
                    <h4 class="entry-title"><?php the_title() ?></h4>
                </div>
                <ul class="list-group align-items-center">
                    <strong><?= $champ_prix['value'] ?> <?= $champ_prix['append'] ?></strong><br>
                    <strong>nom <?= $champ_ville['taxonomy'] ?></strong>
                </ul>
                <ul class="card-body d-flex justify-content-between">
                    <strong><?= $champ_surface['value'] ?> <?= $champ_surface['append'] ?></strong>
                    <strong><?= $champ_nbr['value'] ?> <?= $champ_nbr['append'] ?></strong>
                    <strong><?= $champ_infos['value'] ?> <?= $champ_infos['append'] ?></strong>
                </ul>
            </a>
        </div>
    </div>

<?php endwhile; ?>
<?php else : ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>



<section>
    <?php the_archive_title('<h1 class="page-title">', '</h1>'); ?>

    <div class="container">
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
               class="btn btn-success my-5"><?php _e('Toutes nos propriétés', 'scratch'); ?></a>
        </div>
</section>


<?php get_footer() ?>

