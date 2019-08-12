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

<main class="py-5">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article class="container">
            <h1 class="entry-title">
                <?php the_title(); ?>
            </h1>
            <div>
                <?php the_content() ?>
                <?php the_post_thumbnail() ?>
            </div>
        </article>

    <?php endwhile; ?>
    <?php else : ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
</main>

<?php get_footer() ?>

