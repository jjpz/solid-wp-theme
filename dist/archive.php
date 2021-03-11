<?php get_header(); ?>

    <div class="container">
        <div class="row">

            <?php if (have_posts()) { ?>

            <header class="col-12 archive-header">
                <h2 class="page-title">
                    <?php echo str_replace('Archives: ', '', get_the_archive_title()); ?>
                </h2>
            </header>

            <?php while (have_posts()) { ?>
                <?php the_post(); ?>
                <?php get_template_part('templates/archive', get_post_type()); ?>
            <?php } ?>

            <?php } else { ?>
                <?php get_template_part('templates/content', 'none'); ?>
            <?php } ?>

        </div>
    </div>

<?php get_footer(); ?>