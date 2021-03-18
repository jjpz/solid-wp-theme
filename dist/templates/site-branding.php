<a class="site-branding" href="<?php echo get_home_url(); ?>">
    <?php
    $remove_title = $args['remove_title'];
    $nav_logo_id = $args['nav_logo_id'];
    if (!empty($nav_logo_id)) {
    $nav_logo_src = wp_get_attachment_image_src($nav_logo_id, 'full')[0];
    $nav_logo_title = get_the_title($nav_logo_id);
    $nav_logo_alt = get_post_meta( $nav_logo_id, '_wp_attachment_image_alt', true);
    ?>
    <img class="site-logo" src="<?php echo $nav_logo_src; ?>" title="<?php echo $nav_logo_title; ?>" alt="<?php echo $nav_logo_alt; ?>" />
    <?php } ?>
    <?php if (empty($remove_title) && $remove_title !== 'yes') { ?>
    <h1 class="site-title"><?php echo get_bloginfo('name'); ?></h1>
    <?php } ?>
</a>