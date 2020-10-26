<?php if (has_nav_menu('main') || has_nav_menu('main-button')) { ?>
<?php $main_menu = wp_get_nav_menu_items('main'); ?>
<?php $main_btn = wp_get_nav_menu_items('main-button'); ?>
<?php if (!empty($main_menu) || !empty($main_btn)) { ?>
<header id="masthead" class="site-header" role="banner">
    <div class="site-header-bg"></div>
    <a class="site-branding" href="<?php echo get_home_url(); ?>">
        <div class="site-logo">
            <span class="icon-solid-star">
                <svg class="svg-solid-star" width="30" height="25" viewBox="0 0 576 512">
                    <path fill="currentColor"
                        d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                    </path>
                </svg>
            </span>
        </div>
        <h1 class="site-title"><?php echo get_bloginfo('name'); ?></h1>
    </a>
    <div class="site-nav">
        <?php wp_nav_menu(array(
        'theme_location' => 'main',
        'container' => 'nav',
        'container_class' => 'main-nav'
        )); ?>
        <?php
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
<?php } ?>