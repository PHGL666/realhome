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
        <?php the_content() ?>
    </div>
    <?php
    get_template_part('template-parts/content', 'barre-grise');
    ?>

    <div class="container py-5 my-5">
        <h1>Notre équipe</h1>
        <div class="row text-center">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card">
                    <img src="<?php echo get_bloginfo( 'template_directory' ); ?>/images/equipe-1.jpg" alt="#"/>
                    <div class="card-body">
                        <h5 class="card-title">Maria Spielberg</h5>
                        <p class="card-text">Manager</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card">
                    <img src="<?php echo get_bloginfo( 'template_directory' ); ?>/images/equipe-2.jpg" alt="#"/>
                    <div class="card-body">
                        <h5 class="card-title">Stan Barnard</h5>
                        <p class="card-text">Agent</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card">
                    <img src="<?php echo get_bloginfo( 'template_directory' ); ?>/images/equipe-3.jpg" alt="#"/>
                    <div class="card-body">
                        <h5 class="card-title">John Doe</h5>
                        <p class="card-text">Agent</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card">
                    <img src="<?php echo get_bloginfo( 'template_directory' ); ?>/images/equipe-4.jpg" alt="#"/>
                    <div class="card-body">
                        <h5 class="card-title">Bill Muray</h5>
                        <p class="card-text">Commercial</p>
                    </div>
                </div>
            </div>
    </div>

        <div class="container mt-5">
            <h1>Nos partenaires</h1>
            <div class="row">
                <div class="col">
                    <img src="<?php echo get_bloginfo( 'template_directory' ); ?>/images/partner1.png" />
                    <img src="<?php echo get_bloginfo( 'template_directory' ); ?>/images/partner2.png" />
                    <img src="<?php echo get_bloginfo( 'template_directory' ); ?>/images/partner3.png" />
                    <img src="<?php echo get_bloginfo( 'template_directory' ); ?>/images/partner4.png" />
                </div>
            </div>
        </div>

<?php endwhile; ?>
<?php else : ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php get_footer() ?>
