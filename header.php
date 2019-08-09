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
    <meta charset="<?php bloginfo(); ?>" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class();?>>

<div id="page" class="wrapper">