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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( ! twentynineteen_can_show_post_thumbnail() ) : ?>
        <header class="entry-header">
			<?php get_template_part( 'template-parts/header/entry', 'header' ); ?>
        </header>
	<?php endif; ?>

<?php endwhile; ?>
<?php else : ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php get_footer() ?>

