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

$champ_prix = get_field_object('prix');
$champ_ville = get_field_object('ville');
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <a class="card-spot_link" href="<?php the_permalink(); ?>">
            <figure class="card-propriete-figure mb-0">
                <?= get_the_post_thumbnail($post->ID, 'thumb-555', array( 'class' => 'img-fluid card-propriete_img' )) ?>
            </figure>
            <p><?= $champ_prix['label'] ?> : <strong><?= $champ_prix['value'] ?> <?= $champ_prix['append'] ?></strong></p>
            <p><?= $champ_ville['label'] ?> : <strong><?= $champ_ville['value'] ?></strong></p>
            <div class="card-propriete_content p-3">
                <?php the_title( '<h2 class="entry-title h4">', '</h2>' ); ?>
                <p class="card-propriete_excerpt"><?= wp_trim_words( get_the_content(), 20, '...' ); ?></p>
                <button class="card-propriete_btn btn btn-outline-light"><?php _e( 'Read More', 'scratch' ) ?></button>
            </div>
        </a>
    </article>

    <?php endwhile; ?>
    <?php else : ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>

    <?php get_footer() ?>

