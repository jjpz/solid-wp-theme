<?php get_header(); ?>
<?php get_template_part('includes/vars'); ?>
<?php get_template_part('templates/blog/blog-header'); ?>
<div class="blog-container">
    <main id="main" class="site-main">
        <header class="archive-header">
            <?php the_archive_title( '<h2 class="page-title archive-title">', '</h2>' ); ?>
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
    <?php get_template_part('templates/blog/blog-nav'); ?>
</div>
<?php get_footer(); ?>