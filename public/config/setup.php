<?php

if (!function_exists('solid_setup')) {
    function solid_setup() {
        load_theme_textdomain('solid', get_template_directory() . '/languages');

        add_theme_support('title-tag');

        add_theme_support('post-thumbnails');

        register_nav_menus(
            array(
                'main' => esc_html__('Top', 'solid'),
                'main-button' => esc_html__('Top Button', 'solid'),
                'footer-links' => esc_html__('Footer', 'solid')
            )
        );

        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            )
        );
    }
    add_action('after_setup_theme', 'solid_setup');
}

// Register widget area
function sample_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'sample' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'sample' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
//add_action('widgets_init', 'sample_widgets_init');

// Add custom class to menu li elements
function custom_menu_li_class($classes, $item, $args) {
    if (isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'custom_menu_li_class', 1, 3);