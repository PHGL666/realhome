<?php
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

// Styles & scripts
    function scratch_scripts()
    {
        wp_enqueue_style( 'googlefont', '//fonts.googleapis.com/css?family=Raleway:500&display=swap' );
        wp_enqueue_style( 'googlefont', '//fonts.googleapis.com/css?family=Raleway:500,700&display=swap' );
        wp_enqueue_style( 'googlefont', '//fonts.googleapis.com/css?family=Playfair+Display&display=swap' );
        wp_enqueue_style('main-style', get_template_directory_uri() . '/css/main.min.css');

        wp_enqueue_script( 'jquery');
        wp_enqueue_script('bootstrap', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.min.js');
        wp_enqueue_script('slick', get_template_directory_uri() . '/node_modules/slick-carousel/slick/slick.min.js');
        wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js');
    }
    add_action('wp_enqueue_scripts', 'scratch_scripts');
