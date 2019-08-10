<section class="sidebar-lastposts bg-light py-5">
    <div class="container">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="sidebar-header d-flex flex-wrap justify-content-between align-items-start ">
            <h2 class="sidebar-title">Dernières actualités</h2>
            <a href="#" class="btn btn-outline-primary">Toutes les actualités</a>
        </div>

        <div class="slick-posts px-sm-4 mt-5 mt-sm-4">
            <article class="card-post-article post-12 post type-post status-publish format-standard has-post-thumbnail hentry category-materiel">
                    <div class="card-post_content p-4 bg-white">
                    <figure class="card_figure mb-0">
                        <a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'medium' ) ?></a>
                    </figure>
                        <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                        <p><?php the_excerpt() ?></p>
                    </div>
                    <div><a class="btn btn-outline-primary">Lire la suite</a></div>
            </article>

			<?php wp_reset_postdata(); ?>

			<?php endwhile; ?>
			<?php else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>

        </div>
    </div>
</section>

