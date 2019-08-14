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
?>

<div class="my-5">
    <a href="<?php the_permalink(); ?>">
        <h4 class="actualite-title"><?php the_title() ?></h4>
    </a>
    <?= $champ_date['value'] ?><?= $champ_date['date'] ?>
    <figure>
        <?= get_the_post_thumbnail($post->ID, 'thumb-900', array('class' => 'img-fluid card-propriete_img')) ?>
    </figure>
    <div class="text-justify">
        <?= wp_trim_words($champ_texte['value'], 20, '...'); ?>
        <p><?php the_excerpt() ?></p>
    </div>
    <a class="card-propriete_btn btn btn-success mt-2"
       href="<?php the_permalink(); ?>"><?php _e('Lire la suite', 'scratch') ?></a>
    <!--<button class="card-spot_btn btn btn-outline-succes"><?php //_e('Lire la suite', 'scratch') ?></button>-->
</div>







