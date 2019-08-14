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
    <div class="container">
        <?php the_content() ?>
    </div>
    <?php
    get_template_part('template-parts/content', 'barre-grise');
    ?>
<?php endwhile; ?>
<?php else : ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php get_footer() ?>
