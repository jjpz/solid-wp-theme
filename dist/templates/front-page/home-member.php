<?php foreach ($args as $key => $member) { ?>
    <?php
    $ID = $member->ID;
    $name = $member->post_title;
    $slug = $member->post_name;
    $content = apply_filters('the_content', $member->post_content);
    $title = get_post_meta($ID, '_crb_team_title', true);
    $image_id = get_post_thumbnail_id($ID);
    $prev_key = $key-1;
    $next_key = $key+1;
    ?>
    <article <?php post_class('col-sm-4', $ID) ?>>
        <?php require 'home-member-card.php'; ?>
        <?php require 'home-member-popup.php'; ?>
    </article>
<?php } ?>