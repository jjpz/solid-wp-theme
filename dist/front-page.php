<?php
get_header();

get_template_part('templates/front-page/home-hero');
get_template_part('templates/front-page/home-intro');

$custom_post_types = get_post_types(
    array(
        'public'   => true,
        '_builtin' => false
    ),
    'names',
    'and'
);

if (!empty($custom_post_types)) {
    foreach ($custom_post_types as $custom_post_type) {
        getHomeSection($custom_post_type);
    }
}

get_template_part('templates/front-page/home-contact');

get_footer();
?>