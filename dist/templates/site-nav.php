<div class="site-nav">
    <div class="nav-close">
        <a class="nav-close-link" href="#">
            <span class="nav-close-btn">
                <span class="nav-close-btn-bar"></span>
                <span class="nav-close-btn-bar"></span>
            </span>
        </a>
    </div>
    <?php
    if (has_nav_menu('main')) {
        wp_nav_menu(array(
            'theme_location' => 'main',
            'container' => 'nav',
            'container_class' => 'main-nav',
            'link_before' => '<span>',
            'link_after'=>'</span>'
        ));
    }
    if (has_nav_menu('main-button')) {
        wp_nav_menu(array(
            'theme_location' => 'main-button',
            'container' => 'nav',
            'container_class' => 'button-nav',
            'link_before' => '<span>',
            'link_after'=>'</span>'
        ));
    }
    ?>
</div>