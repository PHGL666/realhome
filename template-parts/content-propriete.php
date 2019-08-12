<?php
/**
 * The main template file
 *
 * ...
 *
 * @package scratch
 *
 */

$champ_prix = get_field_object('prix');
$champ_ville = get_field_object('ville');
?>

<article <?php post_class('card-propriete-article col-md-6 col-lg-4'); ?>>
    <a class="card-spot_link" href="<?php the_permalink(); ?>">
        <figure class="card-propriete-figure mb-0">
            <?= get_the_post_thumbnail($post->ID, 'thumb-555', array('class' => 'img-fluid card-propriete_img')) ?>
        </figure>
        <p><?= $champ_prix['label'] ?> : <strong><?= $champ_prix['value'] ?> <?= $champ_prix['append'] ?></strong></p>
        <p><?= $champ_ville['label'] ?> : <strong><?= $champ_ville['text'] ?></strong></p>
        <div class="card-propriete_content p-3">
            <?php the_title('<h2 class="entry-title h4">', '</h2>'); ?>
            <p class="card-propriete_excerpt"><?= wp_trim_words(get_the_content(), 20, '...'); ?></p>
            <button class="card-propriete_btn btn btn-outline-light"><?php _e('Read More', 'scratch') ?></button>
        </div>
    </a>
</article>

