<?php
$query = new WP_Query(array(
    'post_type' => array('award', 'service', 'member'),
    'post_status' => 'publish',
    'numberposts' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC'
));

if ( ! function_exists( 'getItems' ) ) {
    function getItems($query, $post_type) {
        $posts = [];
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                if ($query->post->post_type === $post_type) {
                    array_push($posts, $query->post);
                }
            }
            wp_reset_postdata();
        }
        return $posts;
    }
}
?>