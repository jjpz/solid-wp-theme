<?php get_header(); ?>
<?php get_template_part('includes/vars'); ?>
<?php get_template_part('templates/blog/blog-header'); ?>
<div class="container blog-container">
    <div class="row">
        <?php get_template_part('templates/blog/blog-nav'); ?>
        <main id="main" class="col-lg-8 order-lg-1 site-main blog-main">
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
    </div>
</div>
<?php get_footer(); ?>