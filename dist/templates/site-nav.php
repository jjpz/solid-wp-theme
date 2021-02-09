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