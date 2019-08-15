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
$ville_array = get_field_object('ville')['choices'];
$values = isset($_GET['ville']) ? (array) $_GET['ville'] : [];
?>

<div class="col-lg-3 col-md-6 col-sm-12">
    <div <?php post_class('card card-propriete-article my-2'); ?>>
        <a href="<?php the_permalink(); ?>">
            <figure class="card-img-top">
                <?= get_the_post_thumbnail($post->ID, 'thumb-550', array('class' => 'img-fluid card-propriete_img')) ?>
            </figure>
            <div class="card-body">
                <h4 class="entry-title"><?php the_title() ?></h4>
            </div>
            <ul class="list-group align-items-center">
                <strong><?= $champ_ville['choices'][$champ_ville['value']] ?></strong>
                <strong><?= $champ_prix['value'] ?> <?= $champ_prix['append'] ?></strong><br>
            </ul>
        </a>
    </div>
</div>
