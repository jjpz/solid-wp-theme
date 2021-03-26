<?php get_header(); ?>
<?php get_template_part('includes/vars'); ?>
<?php //get_template_part('templates/blog/blog-header'); ?>
<?php get_template_part('templates/blog/blog-breadcrumbs'); ?>
<div class="container blog-container">
    <div class="row">
        <?php get_template_part('templates/blog/blog-nav'); ?>
        <main id="main" class="col-lg-8 order-lg-1 site-main blog-main">
            <header class="category-header">
                <?php the_archive_title( '<h1 class="category-title">', '</h1>' ); ?>
            </header>
            <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                get_template_part('templates/content', get_post_type());
            }
        }
        ?>
        </main>
    </div>
</div>
<?php get_footer(); ?>