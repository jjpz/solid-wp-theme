<?php
if (has_nav_menu('main') || has_nav_menu('main-button')) {
$remove_title = get_option('_crb_theme_remove_nav_site_title');
$nav_logo_id = get_option('_crb_theme_nav_logo');
$site_branding_class = '';
if (empty($nav_logo_id) && !empty($remove_title) && $remove_title === 'yes') {
    $site_branding_class = 'no-branding';
}
?>
<header id="masthead" class="site-header <?php echo $site_branding_class; ?>" role="banner">
    <div class="site-header-bg"></div>

    <?php get_template_part(
        'templates/site-branding', 
        null, 
        array(
            'remove_title' => $remove_title,
            'nav_logo_id' => $nav_logo_id
        )
    ); ?>
    <?php get_template_part('templates/site-nav'); ?>

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