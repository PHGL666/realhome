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
$champ_corps = get_field_object('corps');
?>

<div class="my-5">
    <a href="<?php the_permalink(); ?>">
        <h4 class="actualite-title"><?php the_title() ?></h4>
    </a>
    <?= $champ_date['value'] ?><?= $champ_date['date'] ?>
    <figure>
        <?= get_the_post_thumbnail($post->ID, 'thumb-1000', array('class' => 'img-fluid card-propriete_img')) ?>

    </figure>
    <div class="text-justify">
       <?= wp_trim_words($champ_corps['value'], 20, '...'); ?>
       <?php the_excerpt(); ?>
    </div>
    <button class="card-spot_btn btn btn-outline-warning"><?php _e('Lire la suite', 'scratch') ?></button>
</div>







