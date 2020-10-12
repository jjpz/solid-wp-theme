<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div id="page" class="site">

        <?php get_template_part('templates/site-loader'); ?>
        <?php get_template_part('templates/main-nav'); ?>

        <div id="content" class="site-content">