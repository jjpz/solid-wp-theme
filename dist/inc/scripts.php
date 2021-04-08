<?php
// Enqueue stylesheets and scripts
if (!function_exists('solid_scripts')) {
    function solid_scripts() {
        // CSS
        wp_enqueue_style(
            'style', 
            get_stylesheet_uri(), 
            array(), 
            filemtime(get_theme_file_path('style.css')), 
            'all'
        );
        // JS
        wp_enqueue_script(
            'script', 
            get_template_directory_uri() . '/assets/js/script.js', 
            array(), 
            filemtime(get_theme_file_path('/assets/js/script.js')), 
            true
        );
        wp_localize_script(
            'script', 
            'php_vars', 
            array(
                'site_url' => site_url()
            )
        );
    }
    add_action('wp_enqueue_scripts', 'solid_scripts');
}