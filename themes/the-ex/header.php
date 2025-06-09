<!DOCTYPE html>
<html>

<head>
    <title><?php bloginfo('name'); ?></title>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
</head>

<body>

    <div id="site-container">
        <nav id="top-navi">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'main-menu'
            ));
            ?>
        </nav>

        <header id="site-header">
            <h1><?php bloginfo('name'); ?></h1>
        </header>