<?php
$ID = $service->ID;
$title = $service->post_title;
$content = apply_filters('the_content', $service->post_content);
$image_id = get_post_thumbnail_id($ID);
if (!empty($image_id)) {
    $src = get_the_post_thumbnail_url($ID, 'full');
    $srcset = wp_get_attachment_image_srcset($image_id, 'full');
    $type = pathinfo($src)['extension'];
    $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true);
}
(empty($src)) ? $class = 'full-width' : $class = '';
?>
<?php require 'home-service-card.php'; ?>