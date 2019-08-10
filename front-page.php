<?php
/**
 * The main template file
 *
 * ...
 *
 * @package scratch
 *
 */

/*
$lastposts = get_posts( array(
	'numberposts' => 5,
	'post_type'   => 'spot',
) );
*/
get_header();
?>

<main class="py-6">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <article class="container">
            <h1 class="entry-title">
				<?php the_title(); ?>
            </h1>

			<?php if ( has_post_thumbnail() ) : ?>
                <div class="row flex-md-row-reverse">
                    <div class="col-md-6 col-lg-4">
						<?php the_post_thumbnail( 'thumb-510', array( 'class' => 'img-fluid' ) ); ?>
                    </div>
                    <div class="col-md-6 col-lg-8">
						<?php the_content() ?>
                    </div>
                </div>
			<?php else : ?>
				<?php the_content() ?>
			<?php endif; ?>
        </article>
<!--
		<?php foreach ( $lastposts as $post ) : ?>
			<?php setup_postdata( $post ); ?>

            <article class="container" <?php post_class(); ?>>
                <figure>
                    <a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'medium' ) ?></a>
                </figure>
                <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                <p><?php the_excerpt() ?></p>
            </article>

		<?php endforeach; ?>
		<?php wp_reset_postdata(); ?>
-->

	<?php endwhile; ?>
	<?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>
</main>

<?php //get_sidebar() ?>
<?php get_footer(); ?>
