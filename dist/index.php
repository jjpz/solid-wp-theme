<?php get_header(); ?>
<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
        get_template_part('templates/content', get_post_type());
    }
} else {
    get_template_part('templates/content', 'none');
}
?>
<?php get_footer(); ?>

<p>Hello World!</p>
<?php echo __DIR__; ?><br>
<?php echo dirname(__FILE__); ?><br>
<?php echo dirname(__DIR__); ?><br>
<?php echo dirname( dirname(__FILE__) ); ?><br>
<?php echo get_template_directory(); ?><br>
<?php echo get_template_directory_uri(); ?>