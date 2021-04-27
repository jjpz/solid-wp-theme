<div class="site-nav">
    <div class="nav-close">
        <a class="nav-close-link" href="#">
            <span class="nav-close-btn">
                <span class="nav-close-btn-bar"></span>
                <span class="nav-close-btn-bar"></span>
            </span>
        </a>
    </div>
    <?php if (has_nav_menu('header-main') || has_nav_menu('header-lang') || has_nav_menu('header-button')) { ?>
    <div class="site-nav-left">
    <?php if (has_nav_menu('header-main')) {
        wp_nav_menu(array(
            'theme_location' => 'header-main',
            'container' => 'nav',
            'container_class' => 'main-nav',
            'link_before' => '<span>',
            'link_after'=>'</span>'
        ));
    } ?>
    </div>
    <div class="site-nav-right">
    <?php
    if (has_nav_menu('header-lang')) {
        wp_nav_menu(array(
            'theme_location' => 'header-lang',
            'container' => 'nav',
            'container_class' => 'lang-nav',
            'link_before' => '<span>',
            'link_after'=>'</span>'
        ));
    }
    if (has_nav_menu('header-button')) {
        wp_nav_menu(array(
            'theme_location' => 'header-button',
            'container' => 'nav',
            'container_class' => 'button-nav',
            'link_before' => '<span>',
            'link_after'=>'</span>'
        ));
    }
    ?>
    </div>
    <?php } ?>
</div>