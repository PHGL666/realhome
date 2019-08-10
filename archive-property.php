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

<main class="py-6">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <article class="container" <?php post_class(); ?>>
            <figure>
                <a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'medium' ) ?></a>
            </figure>
            <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
            <p><?php the_excerpt() ?></p>
        </article>

		<?php wp_reset_postdata(); ?>

	<?php endwhile; ?>
	<?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>

</main>

<?php get_footer() ?>
