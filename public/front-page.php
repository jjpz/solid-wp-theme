<?php
get_header();
if (is_front_page()) {
    require_once 'includes/vars.php';
    require_once 'includes/posts.php';
    require_once 'templates/content-front-page.php';
}
get_footer();
?>