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
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo(); ?>"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="wrapper">

    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="navbar-brand mr-auto"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><img
                        src="<?= get_stylesheet_directory_uri() ?>/images/logo.svg"
                        alt="<?php bloginfo('name'); ?>"></a></div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
                <?php wp_nav_menu(array(
                    'theme_location' => 'primary',
                    //'container' => 'div',
                    'container_class' => 'mx-auto',
                    'container_id' => 'navbarNav',
                    'menu_class' => 'navbar-nav ml-auto',
                    'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                    'walker' => new WP_Bootstrap_Navwalker(),
                    // 'depth' => 1,
                )); ?>

            <?php wp_nav_menu(array(
                'theme_location' => 'social',
            ));
            ?>
        </div>
    </nav>
