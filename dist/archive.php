<?php get_header(); ?>
<?php ${'title' . crb_lang_slug()} = get_option('_crb_home_' . get_post_type() . '_title' . crb_lang_slug()); ?>

    <div class="container">
        <div class="row <?php if (get_post_type() === 'member') {echo 'justify-content-center';} ?>">

            <?php if (have_posts()) { ?>

            <header class="col-12 archive-header">
                <h1 class="archive-title box-title">
                    <?php echo ${'title' . crb_lang_slug()}; ?>
                </h1>
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