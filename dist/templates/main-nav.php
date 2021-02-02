<?php if (has_nav_menu('main') || has_nav_menu('main-button')) { ?>
<?php
$remove_title = get_option('_crb_theme_remove_nav_site_title');
$nav_logo_id = get_option('_crb_theme_nav_logo');
$site_branding_class = '';
if (empty($nav_logo_id) && !empty($remove_title) && $remove_title === 'yes') {
    $site_branding_class = 'no-branding';
}
?>
<header id="masthead" class="site-header <?php echo $site_branding_class; ?>" role="banner">
    <div class="site-header-bg"></div>
    <a class="site-branding" href="<?php echo get_home_url(); ?>">
        <?php if (!empty($nav_logo_id)) { ?>
        <?php
        $nav_logo_src = wp_get_attachment_image_src($nav_logo_id, 'full')[0];
        $nav_logo_title = get_the_title($nav_logo_id);
        $nav_logo_alt = get_post_meta( $nav_logo_id, '_wp_attachment_image_alt', true);
        ?>
        <div class="site-logo">
            <img class="nav-logo" src="<?php echo $nav_logo_src; ?>" title="<?php echo $nav_logo_title; ?>" alt="<?php echo $nav_logo_alt; ?>">
        </div>
        <?php } ?>
        <?php if (empty($remove_title) && $remove_title !== 'yes') { ?>
        <h1 class="site-title"><?php echo get_bloginfo('name'); ?></h1>
        <?php } ?>
    </a>
    <div class="site-nav">
        <?php
        if (has_nav_menu('main')) {
            wp_nav_menu(array(
                'theme_location' => 'main',
                'container' => 'nav',
                'container_class' => 'main-nav'
            ));
        }
        if (has_nav_menu('main-button')) {
            wp_nav_menu(array(
                'theme_location' => 'main-button',
                'container' => 'nav',
                'container_class' => 'button-nav'
            ));
        }
        ?>
    </div>
    <div class="nav-toggle">
        <a class="nav-toggle-link nav-toggle-open" href="#">
            <span class="nav-toggle-btn">
                <span class="nav-toggle-btn-bar"></span>
                <span class="nav-toggle-btn-bar"></span>
                <span class="nav-toggle-btn-bar"></span>
                <span class="nav-toggle-btn-bar"></span>
            </span>
        </a>
    </div>
</header>
<?php } ?>