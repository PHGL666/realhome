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
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="container pt-5">
        <h1><?php the_title() ?></h1>
    </div>
    <div class="container pb-5">
        <?php the_content() ?>
    </div>

<?php endwhile; ?>
<?php else : ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php get_footer() ?>
