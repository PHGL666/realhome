# Scratch Theme

## Initialization
* `npm install` — Installing Dependencies
* `npm i bootstrap` - Compile your files when changes are made

## Build commands
* `npm run build` - Compile your files once
* `npm run watch` - Compile your files when changes are made


# CREATION DE SCRATCH

création des fichiers principaux :
footer / functions / header / index / style.css

installation du theme dans style.css :
```
/*
Theme Name: Scratch Theme
Description: Un thème à partir de presque rien
Author: Votre nom
Version: 1.0
Text Domain: scratch
*/
```

dans dashboard WP dans Apparence/Themes on active le theme Scratch.

## index.php

Ensuite on lie les documents principaux entre eux avec les gets. 

dans index.php
```
<?php get_header(); ?>

<?php get_footer(); ?>
```

## header.php

dans header.php + mise à jour du <html> + <meta charset> + <body>
```
<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section, header and top navigation areas
 *
 * @package scratch
 *
 */
?><!DOCTYPE html>
<html <?php // ?>>
<head>
    <meta charset="<?php // ?>" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php // ?>>

<div id="page" class="wrapper">
```
+ mise à jour du header des 3 balises suivantes :

<html <?php language_attributes(); ?>>
<meta charset="<?php bloginfo(); ?>" />
<body <?php body_class();?>>

## footer.php

dans footer.php
```
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
```

ensuite on ajoute les contenus

## index.php

dans index.php (obs : title = Accueil)
```
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?php the_title(); ?>

<?php endwhile; ?>
<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
```

## functions.php

ensuite dans functions.php
mise en place de la function montheme_setup() qui permet d'ajouter le title et d'appeler 
les images (thumbnails) ainsi que le menu ou un format d'image personnalisé etc.

```
// Theme configuration
function scratch_setup(){
    // Document title
    add_theme_support( 'title-tag' );

    // Post thumbnails
    add_theme_support( 'post-thumbnails' );

    // Navigations
    register_nav_menus(
        array(
            'primary' => __( 'Primary Menu', 'scratch' ),
        )
    );

    // Custom Image sizes
    add_image_size('thumb-510',510, 205, true);
}

add_action( 'after_setup_theme', 'scratch_setup' );
```
**obs :** il est conseillé de paramétrer les formats d'images avant de charger les contenus car autrement le format ne s'appliquera pas 
sauf en installant un plugin et diverses complications.

ensuite on ajoute les Styles & Scripts
```
// Styles & scripts
function scratch_scripts() {
    wp_enqueue_style( 'main-style', get_template_directory_uri() . '/css/main.min.css' );

    //wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'scratch_scripts' );
```

**obs :** bien mettre le même nom aux fonctions et à leur paramètres dans add actions, ex scratch_scripts.


# DASHBOARD WP

## Création du Menu
dans Apparence/Menus
paramétrer notre menu est bien **cocher primary menu** puis enregistrer.

pour l'afficher il faut ensutie aller dans le fichier php où nous allons l'appeler (ici ce 
sera le header) avec le code suivant :
```
<nav>
  <?php wp_nav_menu(); ?>
</nav>
```
code que l'on peut agrémenter de la manière suivante :
```
    <nav>
        <?php wp_nav_menu( array(
            'theme_location' => 'primary',
            'container_class' => 'ml-auto'
            // 'depth' => 1,
        )); ?>
    </nav>
```
**obs :** 'depth' permet de dire que l'on veut que 1 niveau sous menu, si on met 'depth' => 2, jusqu'à 2 niveaux sous menus etc.

Nous souhaitons mettre un thème bootstrap à la navbar. Nous récupérons donc un code navbar bootstrap et l'on
vient y coller notre code wp_nav_menu. 
```
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
  <?php wp_nav_menu( array(
    'theme_location' => 'primary',
  )); ?>
  </div>
</nav>
```

cette opération ne fonctionne pas car il nous manque le js de bootstrap. Pour qu'il fonctionne il faut appeler le script 
avec la ligne de code suivante dans le fichier functions.php section Styles & Scripts
```
wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.min.js' );
```

Nous ajoutons un logo dans la navbar avec
```
<div class="navbar-brand mr-auto"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><img
 src="<?= get_stylesheet_directory_uri() ?>/images/logo.svg"
 alt="<?php bloginfo('name'); ?>"></a></div>
```
et nous rajoutons du scss dans le scss/layout/header.scss

nous créons ensuite un fichier à la racine class-wp-bottstrap-navwalker.php et nous y mettons une code trouvé sur le net.


pour appeler le css de bootstrap nous ajoutons dans functions.php
```
// Register Custome Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
```

et on copie du net dans notre code nav header.php
```
            <?php
            wp_nav_menu( array(
                'theme_location'  => 'primary',
                'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
                'container'       => 'div',
                'container_class' => 'collapse navbar-collapse',
                'container_id'    => 'navbarNav',
                'menu_class'      => 'navbar-nav ml-auto',
                'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                'walker'          => new WP_Bootstrap_Navwalker(),
            ) );
            ?>
```
dans lequel on met à jour le container_id avec navbarNav et menu_class avec ml-auto. 
On supprimera aussi la div qui l'englobe avec ses class.

## functions.php SIDEBARS

dans notre functions.php nous créons la section sidebar afin de pouvoir travailler avec dans notre dashbaord WP.
Nous lui donnons l'id sidebar-footer pour pouvoir l'afficher par la suite.

```
// Sidebars
function scratch_widgets_init() {
    register_sidebar(
        array (
            'name' => __( 'Footer', 'scratch' ),
            'id' => 'sidebar-footer',
            'description' => __( 'Custom Sidebar', 'scratch' ),
            'before_widget' => '<section class="widget col-md-6 col-lg-4 d-flex flex-column align-items-center">',
            'after_widget' => "</section>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'scratch_widgets_init' );
```

dans le footer.php nous ajoutons le code pour afficher la sidebar.

```
    <footer class="footer bg-dark text-white pt-5 pb-3">
        <div class="container">
            <div class="row">
                <?php dynamic_sidebar('sidebar-footer') ?>
            </div>
        </div>
    </footer>
```


## index.php insertion des posts
Ajout des annotations au début et affichage des posts.
```
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
```

## archive.php 

**obs :** les archives sont toutes les pages ou il y a des listes (ex catégorie)

création du fichier archive.php en y copiant le même code que l'index. pour y afficher les témoignages on ajoute cette ligne de code. 
```
<?php the_archive_title('<h1 class="page-title">', '</h1>') ?>
```

nous mettons à jour l'affichage des témoignages de la façon suivante
```
    <main class="py-5 container">

        <?php the_archive_title('<h1 class="page-title">', '</h1>') ?>

        <div class="row">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <article class="col-md-6 col-lg-4">
                    <a href="<?php the_permalink() ?>"><h2 class="entry-title"><?php the_title() ?></h2>
                        <?php the_post_thumbnail(); ?>
                    </a>
                    <p>
                        <?php the_excerpt() ?>
                    </p>
                </article>

            <?php endwhile; ?>
            <?php else : ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>

        </div>
    </main>
```


OBS : extensions wp REGENERATES THUMBNAILS qu'on retrouve dans la section outils du dashboard. 
Elle permet de régénérer le format des images si l'opération a mal a ratée. 

Nous mettons à jour le format des thumbnail de la sorte :
```
<?php the_post_thumbnail('thumb-510', array('class'=>'img-fluid')); ?>
```

## mise à jour de l'index avec une condition ternaire :

```
        <article class="container">
            <h1 class="entry-title">
                <?php the_title(); ?>
            </h1>
            <?php if (has_post_thumbnail()) : ?>
            <div>
                <?php the_content() ?>
                <?php the_post_thumbnail() ?>
            </div>
            <?php else :  ?>
                <?php the_content() ?>
            <?php endif; ?>
        </article>
```

## ajout de bouton read more via functions.php

nous avons ajouté un filter et ajouter des classes bootstrap btn avec le code suivant :
```
// Excerpt
function scratch_excerpt_more( $more ) {
    $more = sprintf( '...<br><a class="btn btn-outline-primary read-more" href="%1$s">%2$s</a>',
        get_permalink( get_the_ID() ),
        __( 'Read More', 'scratch' )
    );
    return $more;
}
add_filter( 'excerpt_more', 'scratch_excerpt_more' );
```

## _variables.scss

avec ce fichier il est possible de modifier les consignes css de bootstrap.
dans node module/bootstrap/scss nous retrouvons le fichier _variables.scss, on
le copie dans notre fichier scss et on le renomme en _bootstrap_variables.scss.
Ce fichier ne nous sert que pour la consultation afin de modifier notre fichier _variables.scss.

nous pouvons ainsi dans notre fichiers _variables.scss venir modifier/ ajouter des valeurs des sélecteurs
qui remplaceront ceux du fichier d'origine mais sans surcharger et donc en gardant un code propre. 

**obs 1 :** dans _variables.scss on a modifier le $enable-rounded: false; de manière à ce que les boutons soit carrés.

**obs 2 :** _bootstrap_variables.scss a partir de ligne 693 pour toucher aux styles des NAVBARS.

exemple de surcharge pour stylysé la navbar et le burger : 
```
$navbar-light-color:                lighten($primary, 0.3);
$navbar-light-hover-color:          $primary;
$navbar-light-active-color:         $primary;
$navbar-light-toggler-border-color: transparent;
```

### mise en place d'un font avec google font (on utilisera functions & variables)

on copie uniquement l'url de google font et on va l'ajouter dans la file d'attente des styles et des scripts dans functions.php
```
https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700&display=swap
```
on l'ajoute donc dans functions styles & scripts 
```
wp_enqueue_style('Namun-Gothic', 'https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700&display=swap');
```
obs : on peut/doit ? Retirer le https:

on vient ensuite dans notre fichier _variables.scss modifier le font family base (piqué de bootstrap variable) de la manière suivante,
on prendra les règles css proposé par google font en même temps que l'url.
```
$font-family-base: 'Namun-Gothic', sans-serif;
```
2ieme exemple avec le font Dancing Script de google font
```
https://fonts.googleapis.com/css?family=Dancing+Script:400,700&display=swap
```
```
$font-family-base: 'Dancing-Script', cursive;
```

