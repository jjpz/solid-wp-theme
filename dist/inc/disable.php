<?php

// Redirect to the homepage all users trying to access feeds.
function disable_feeds() {
    wp_redirect(home_url());
    die;
}

// Disable global RSS, RDF & Atom feeds.
add_action('do_feed',      'disable_feeds', -1);
add_action('do_feed_rdf',  'disable_feeds', -1);
add_action('do_feed_rss',  'disable_feeds', -1);
add_action('do_feed_rss2', 'disable_feeds', -1);
add_action('do_feed_atom', 'disable_feeds', -1);

// Disable comment feeds.
add_action('do_feed_rss2_comments', 'disable_feeds', -1);
add_action('do_feed_atom_comments', 'disable_feeds', -1);

// Prevent feed links from being inserted in the <head> of the page.
add_action('feed_links_show_posts_feed',    '__return_false', -1);
add_action('feed_links_show_comments_feed', '__return_false', -1);
remove_action('wp_head', 'feed_links',       2);
remove_action('wp_head', 'feed_links_extra', 3);

// Disable XML-RPC
add_filter('xmlrpc_enabled', '__return_false');

// Remove emoji link and styles
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
// Remove WP JSON link
remove_action('wp_head', 'rest_output_link_wp_head');
// Remove RSD link (Really Simple Discovery - the discover mechanism used by XML-RPC clients)
remove_action('wp_head', 'rsd_link');
// Remove Windows Live Writer XML link
remove_action('wp_head', 'wlwmanifest_link');
// Remove WP version number
remove_action('wp_head', 'wp_generator');

// Remove admin bar when logged in
/*if (current_user_can('administrator')) {
remove_action('wp_footer', 'wp_admin_bar_render', 1000);
add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );
}*/

// Remove embeds script
if (!function_exists('deregister_scripts')) {
    function deregister_scripts() {
        wp_dequeue_script('wp-embed');
    }
    add_action('wp_footer', 'deregister_scripts');
}