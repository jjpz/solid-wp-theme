<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180"
        href="<?php echo get_stylesheet_directory_uri() ?>/assets/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32"
        href="<?php echo get_stylesheet_directory_uri() ?>/assets/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16"
        href="<?php echo get_stylesheet_directory_uri() ?>/assets/favicons/favicon-16x16.png">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() ?>/assets/favicons/favicon.ico">
    <link rel="manifest" href="<?php echo get_stylesheet_directory_uri() ?>/assets/favicons/site.webmanifest">
    <meta name="msapplication-config"
        content="<?php echo get_stylesheet_directory_uri() ?>/assets/favicons/browserconfig.xml">
    <meta name="msapplication-TileColor" content="#00a300">
    <meta name="msapplication-TileImage"
        content="<?php echo get_stylesheet_directory_uri() ?>/assets/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <meta property="og:title" content="<?php echo get_bloginfo('name'); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo get_home_url(); ?>" />
    <meta property="og:image"
        content="<?php echo get_stylesheet_directory_uri() ?>/assets/images/social-share-image.png" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div id="page" class="site">

        <?php get_template_part('templates/site-loader'); ?>
        <?php get_template_part('templates/site-header'); ?>

        <div id="content" class="site-content">
            <main id="main" class="site-main" role="main">