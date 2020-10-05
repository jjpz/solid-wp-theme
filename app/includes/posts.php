<?php
function get_items($post_type) {
    $posts = get_posts(array(
        'post_type' => $post_type,
        'post_status' => 'publish',
        'numberposts' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC'
    ));
    return $posts;
}
?>