<?php
get_header();

get_template_part('templates/front-page/home-hero');
get_template_part('templates/front-page/home-intro');

$cpt = get_post_types(
    array(
        'public'   => true,
        '_builtin' => false
    ),
    'names',
    'and'
);

if (!empty($cpt)) {
    $a = array(
        'update_post_meta_cache' => false,
        'update_post_term_cache' => false,
        'post_type'              => $cpt,
        'post_status'            => 'publish',
        'posts_per_page'         => 50,
        'no_found_rows'          => true,
        'orderby'                => 'menu_order',
        'order'                  => 'ASC'
    );

    $q = new WP_Query($a);

    foreach ($cpt as $pt) {
        getHomeSection($q, $pt);
    }
}

get_template_part('templates/front-page/home-contact');

get_footer();
?>