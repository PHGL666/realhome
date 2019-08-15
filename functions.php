<?php
// Theme configuration
function scratch_setup()
{
    // Document title
    add_theme_support('title-tag');

    // Post thumbnails
    add_theme_support('post-thumbnails');

    // Navigations
    register_nav_menus(
        array(
            'primary' => __('Primary Menu', 'scratch'),
            'social' => __('Social Menu', 'scratch'),
        )
    );

    // Custom Image sizes
    add_image_size('thumb-510', 500, 200, true);
    add_image_size('thumb-550', 550, 300, true);
    add_image_size('thumb-900', 900, 600, true);
    add_image_size('thumb-1100', 1100, 850, true);
}

add_action('after_setup_theme', 'scratch_setup');

// Styles & scripts
function scratch_scripts()
{
    wp_enqueue_style('Raleway', 'https://fonts.googleapis.com/css?family=Raleway:400,500,700&display=swap');
    wp_enqueue_style('Playfair', 'https://fonts.googleapis.com/css?family=Playfair+Display:400,700&display=swap');
    wp_enqueue_style('forkawesome', 'https://cdn.jsdelivr.net/npm/fork-awesome@1.1.7/css/fork-awesome.min.css');
    wp_enqueue_style('main-style', get_template_directory_uri() . '/css/main.min.css');

    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery.bootstrap.min', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.min.js', 'jquery', true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.min.js');
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', 'jquery', '1.0.0', true);}

add_action('wp_enqueue_scripts', 'scratch_scripts');

// Register Custome Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

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

function scratch_widgets_single_actualite() {
    register_sidebar(
        array (
            'name' => __( 'Side', 'scratch' ),
            'id' => 'aside-single-actualite',
            'description' => __( 'Custom Sidebar', 'scratch' ),
            'before_widget' => '<section>',
            'after_widget' => "</section>",
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'scratch_widgets_single_actualite' );


// AJOUTER DES CATEGORIES AU WIDGET
function add_categories_to_pages() {
    register_taxonomy_for_object_type( 'category', 'proprietes' );
    register_taxonomy_for_object_type( 'category', 'actualites' );
}
add_action( 'init', 'add_categories_to_pages' );

/**
 * ARCHIVE PROPRIETES FILTERING
 */
add_action('pre_get_posts', 'my_pre_get_posts');

function my_pre_get_posts($query)
{
    // validate
    if (is_admin()) return;

    if (!$query->is_main_query()) return;

    if (is_post_type_archive('proprietes')) {

        if (isset($_GET['ville'])) {

            $query->set('meta_key', 'ville');
            $query->set('meta_query', array(
                array(
                    'key' => 'ville',
                    'value' => $_GET['ville'],
                    'compare' => 'IN',
                )
            ));
        }
    }
    // always return
    return;
}

/* TITRE DES ARCHIVES */
function my_theme_archive_title($title)
{
    if (is_category()) {
        if (is_category('')) {
            $title = __('Nos actualités', 'scratch');
        } else {
            $title = single_cat_title(__('Nos actualités - ', 'scratch'), false);
        }
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_post_type_archive()) {
        if (get_post_type() == 'proprietes') {
            $title = __('Nos propriétés', 'scratch');
        } else {
            $title = post_type_archive_title('', false);
        }
    } elseif (is_tax()) {
        $title = single_term_title('', false);
    }
    return $title;
}

add_filter('get_the_archive_title', 'my_theme_archive_title');