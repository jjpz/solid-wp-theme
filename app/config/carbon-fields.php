<?php

add_action('after_setup_theme', 'crb_load');
function crb_load() {
    require_once dirname(__DIR__) . '/vendor/autoload.php';
    \Carbon_Fields\Carbon_Fields::boot();
}

require_once 'carbon-fields/theme-options.php';
require_once 'carbon-fields/team.php';