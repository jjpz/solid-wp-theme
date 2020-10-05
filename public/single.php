<?php get_header(); ?>
<main id="main" class="site-main">
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            get_template_part('includes/vars');
            get_template_part('templates/content', get_post_type());
        }
    }
    ?>
</main>
<?php get_footer(); ?>