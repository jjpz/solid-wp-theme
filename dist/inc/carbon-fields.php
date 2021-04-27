<?php

add_action('after_setup_theme', 'crb_load');
function crb_load() {
    require_once dirname(__DIR__) . '/vendor/autoload.php';
    \Carbon_Fields\Carbon_Fields::boot();
}

add_filter( 'carbon_fields_theme_options_container_admin_only_access', '__return_false' );

require_once 'carbon-fields/theme-options.php';
require_once 'carbon-fields/team.php';