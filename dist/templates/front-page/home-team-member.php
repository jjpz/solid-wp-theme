<?php
$ID = $member->ID;
$name = $member->post_title;
$slug = $member->post_name;
$content = apply_filters('the_content', $member->post_content);
$title = get_post_meta($ID, '_crb_team_title', true);
$image_id = get_post_thumbnail_id($ID);
$src = get_the_post_thumbnail_url($ID, 'full');
$srcset = wp_get_attachment_image_srcset($image_id, 'full');
$image_title = get_the_title($image_id);
$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true);
$prev_key = $key-1;
$next_key = $key+1;
?>
<article <?php post_class('col-sm-4', $ID) ?>>
    <?php require 'home-team-member-card.php'; ?>
    <?php require 'home-team-member-popup.php'; ?>
</article>