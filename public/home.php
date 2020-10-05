<?php get_header(); ?>
<header class="page-header blog-header">
    <h1 class="page-title"><?php echo get_the_title(get_option('page_for_posts')); ?></h1>
</header>
<div class="blog-container">
    <main id="main" class="site-main">
        <?php
    if (is_home()) {
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                get_template_part('includes/vars');
                get_template_part('templates/content', get_post_type());
            }
        } else {
            get_template_part('templates/content', 'none');
        }
    }
    ?>
    </main>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>